<?php

namespace App\Http\Controllers\Admin;

use App\Services\SubmissionService;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public $submission;
    public function __construct(SubmissionService $submissionService)
    {
        $this->submission = $submissionService;
    }
    public function index($id)
    {
        if (request()->ajax()) {
            $data =  $this->submission->Query()->where('registrasi_id', $id)->latest()->first();
            return view('modal._data_download', compact('data'));
        }
    }
}
