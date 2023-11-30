<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'salutation' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:255'],
            'type_user' => ['required', 'string', 'max:255'],
            'img' => ['image', 'max:2048', 'mimes:jpg,jpeg,png'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['img'])) {
            $img = Storage::putFile('public/avatar', $input['img']);
            if ($input['img'] != 'avatar.png') {
                Storage::delete($user->img);
            }
        } else {
            $img = $user->img;
        }
        $id_sertifikat = strtoupper(Str::random(16));
        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'salutation' => $input['salutation'],
                'gender' => $input['gender'],
                'institution' => $input['institution'],
                'country' => $input['country'],
                'no_tlp' => $input['no_tlp'],
                'type_user' => $input['type_user'],
                'sertifikat'    => $id_sertifikat,
                'img'   => $img,
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
