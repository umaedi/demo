<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SertifikatController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        if ($user->status == '0' && $user->sertfikat == null) {
            return back();
        }

        $sertifikat = public_path('sertifikat/' . $user->sertifikat . '.jpg');

        $headers = array(
            'Content-Type: image/jpeg'
        );

        return Response::download($sertifikat, $user->sertifikat . '.jpg', $headers);
    }
}
