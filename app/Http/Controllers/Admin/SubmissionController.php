<?php

namespace App\Http\Controllers\Admin;

use App\Services\SubmissionService;
use App\Http\Controllers\Controller;

class SubmissionController extends Controller
{

    public $submission;
    public function __construct(SubmissionService $submissionService)
    {
        $this->submission = $submissionService;
    }
    public function index()
    {
        if (\request()->ajax()) {

            $submissions = $this->submission->Query();
            $page = request()->get('paginate', 10);

            if (request()->status == '1') {
                $submissions->where('histories', '1')->whereNull('acc');
            }

            if (request()->status == '2') {
                $submissions->where('status', '2');
            }

            if (request()->status == '3') {
                $submissions->where('histories', '1')->where('acc', 2);
            }

            if (request()->status == '0') {
                $submissions->whereNull('reviewer_id');
            }

            $data['table'] = $submissions->paginate($page);
            return view('admin.submissions._data_table', $data);
        }

        $data['title'] = 'Admin Submissions';
        return view('admin.submissions.index', $data);
    }

    public function show($id)
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('registrasi_id', $id)->where('reviewer_id', auth()->user()->id)->get();
            return view('reviewer.submission._data_table', $data);
        }

        $data['title'] = 'Admin Submission Show';
        $data['submission'] = $this->submission->Query()->where('registrasi_id', $id)->first();
        return view('admin.submissions.show', $data);
    }
}
