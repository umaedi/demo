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
            $data['data'] = $this->submission->find($id);
            return view('modal._data_download', $data);
        }
    }
}
