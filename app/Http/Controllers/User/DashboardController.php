<?php

namespace App\Http\Controllers\User;

use App\Models\Submission;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (\request()->ajax()) {
            if (auth()->user()->sertifikat !== null && Auth::user()->status == '2') {

                if (Auth()->user()->type_user == 'Presenter') {
                    $image = imagecreatefromjpeg(public_path('template/sertifikat_presenter.jpg'));
                } else {
                    $image = imagecreatefromjpeg(public_path('template/sertifikat_participant.jpg'));
                }

                $imageWidth = imagesx($image);
                $textColor = imagecolorallocate($image, 0, 0, 0);

                $name = Auth()->user()->name;
                $id_sertifikat = Auth()->user()->sertifikat;
                $no_sertifikat = Auth()->user()->id;

                if ($no_sertifikat < 10) {
                    $no_sertifikat = '00' . $no_sertifikat;
                } elseif ($no_sertifikat < 100) {
                    $no_sertifikat = '0' . $no_sertifikat;
                } else {
                    $no_sertifikat = $no_sertifikat;
                }

                $fontPath = public_path('fonts/Poppins-SemiBold.ttf');
                $fontSize = 60;
                $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $name);
                $textWidth = $textBoundingBox[2] - $textBoundingBox[0];

                // Calculate coordinates to center the text
                $textX = ($imageWidth - $textWidth) / 2;

                //no sertifikat
                imagettftext($image, 36, 0, 1475, 807, $textColor, $fontPath, $no_sertifikat);

                //name
                imagettftext($image, $fontSize, 0, $textX,  1020, $textColor, $fontPath, $name);

                imagejpeg($image, "sertifikat/$id_sertifikat.jpg");
                imagedestroy($image);
            }
        }

        $data['submission'] = Submission::where('user_id', auth()->user()->id)->where('histories', '1')->count();
        $data['loa'] = Submission::where('user_id', auth()->user()->id)->whereNotNull('loa')->count();
        return view('user.dashboard.index', $data);
    }
}
