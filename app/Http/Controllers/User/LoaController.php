<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\SubmissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LoaController extends Controller
{
    protected $submission;
    public function __construct(SubmissionService $submissionService)
    {
        $this->submission = $submissionService;
    }
    public function index()
    {
        if (request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('user_id', auth()->user()->id)->whereNotNull('loa')->get();
            return view('user.loa._data_table', $data);
        }
        $data['title'] = __('User LOA');
        return view('user.loa.index', $data);
    }

    public function download($id)
    {
        $submission = $this->submission->find($id);
        $image = imagecreatefromjpeg(public_path('loa/loa.jpg'));

        $imageWidth = imagesx($image);
        $textColor = imagecolorallocate($image, 0, 0, 0);

        // $color = imagecolorallocate($image, 51, 51, 102);
        $fontPath = public_path('fonts/Poppins-SemiBold.ttf');

        $margin = '1514';
        // The text to be centered
        $title = $submission->title;

        // Periksa apakah lebar teks melebihi batas kertas
        if ($title > $margin) {
            // Jika ya, tambahkan tag <br> untuk turun ke baris berikutnya
            $title = wordwrap($title);
        }

        $presensi = '"' . $submission->user->presence . '"';

        // Get the size of the text bounding box
        $fontSize = 24;
        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $title);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];

        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $presensi);
        $textWidth1 = $textBoundingBox[2] - $textBoundingBox[0];

        // Calculate coordinates to center the text
        $title_of_image = ($imageWidth - $textWidth) / 2;
        $presensi_of_image = ($imageWidth - $textWidth1) / 2;

        // Add the centered text to the image
        imagettftext($image, $fontSize, 0, $title_of_image, 730, $textColor, $fontPath, $title);

        imagettftext($image, $fontSize, 0, $presensi_of_image, 1060, $textColor, $fontPath, $presensi);

        $authors = $submission->author;
        imagettftext($image, 24, 0, 280, 600, $textColor, $fontPath, $authors);

        // Set the content type header and output the image
        header("Content-type: image/png");

        //file name
        $file_name = $submission->user->name . '-' . $submission->loa;
        imagepng($image, "loa/$file_name.png");

        // Clean up resources
        imagedestroy($image);

        $loa = public_path("loa/$file_name.png");
        return Response::download($loa);
    }
}
