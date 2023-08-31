<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        if (auth()->user()->sertifikat !== null) {
            $image = imagecreatefromjpeg(public_path('img/template_sertifikat.jpg'));

            $imageWidth = imagesx($image);
            $textColor = imagecolorallocate($image, 0, 0, 0);

            $text = auth()->user()->name;

            $fontPath = public_path('fonts/arial.ttf');
            $fontSize = 86;
            $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $text);
            $textWidth = $textBoundingBox[2] - $textBoundingBox[0];

            // Calculate coordinates to center the text
            $textX = ($imageWidth - $textWidth) / 2;

            // Add the centered text to the image
            imagettftext($image, $fontSize, 0, $textX, 890, $textColor, $fontPath, $text);

            imagejpeg($image, "sertifikat/$text.jpg");
            imagedestroy($image);
        }

        return view('user.dashboard.index');
    }
}
