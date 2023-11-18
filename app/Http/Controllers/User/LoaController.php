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
        // title
        $title = wordwrap($submission->title);
        if (strlen($title) <= 69) {
            $image = imagecreatefromjpeg(public_path('loa/loa_1.jpg'));
            $position_title = 730;
            $position_presence = 965;
        } elseif (strlen($title) <= 137) {
            $image = imagecreatefromjpeg(public_path('loa/loa_2.jpg'));
            $position_title = 723;
            $position_presence = 1004;
        } else {
            $image = imagecreatefromjpeg(public_path('loa/loa_3.jpg'));
            $position_title = 715;
            $position_presence = 1041;
        }

        $imageWidth = imagesx($image);
        $textColor = imagecolorallocate($image, 0, 0, 0);

        $fontPath = public_path('fonts/Poppins-SemiBold.ttf');

        $presensi = '"' . $submission->user->presence . '"';

        $fontSize = 24;
        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $title);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];

        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $presensi);
        $textWidth1 = $textBoundingBox[2] - $textBoundingBox[0];

        // Calculate coordinates to center the text
        $title_of_image = ($imageWidth - $textWidth) / 2;
        $presensi_of_image = ($imageWidth - $textWidth1) / 2;

        // Add the centered text to the image
        imagettftext($image, $fontSize, 0, $title_of_image, $position_title, $textColor, $fontPath, $title);

        imagettftext($image, $fontSize, 0, $presensi_of_image, $position_presence, $textColor, $fontPath, $presensi);

        $authors = $submission->author;
        imagettftext($image, 24, 0, 190, 600, $textColor, $fontPath, $authors);

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
