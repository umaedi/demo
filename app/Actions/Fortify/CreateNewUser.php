<?php

namespace App\Actions\Fortify;

use App\Jobs\AccountJob;
use App\Mail\SendAccount;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'salutation' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:255'],
            'type_user' => ['required', 'string', 'max:255'],
            'presence' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        if ($input['presence'] == "Offline") {
            $user = User::where('presence', 'Offline')->count();
            if ($user >= 200) {
                return back()->with('msgPersence', 'Sorry, offline registration has been fulfilled!');
            }
        }

        $userid = rand(0, 999999);
        $account = [
            'user_id'   => $userid,
            'email' => $input['email'],
            'password'  => $input['password'],
        ];

        dispatch(new AccountJob($account));
        return User::create([
            'user_id'   => $userid,
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'salutation' => $input['salutation'],
            'gender' => $input['gender'],
            'institution' => $input['institution'],
            'country' => $input['country'],
            'no_tlp' => $input['no_tlp'],
            'type_user' => $input['type_user'],
            'presence' => $input['presence'],
        ]);
    }
}
