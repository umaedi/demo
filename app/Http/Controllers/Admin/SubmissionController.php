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
                $submissions->whereHistories('1')->whereStatus('1');
            }

            if (request()->status == '2') {
                $submissions->whereStatus('2');
            }

            if (request()->status == '3') {
                $submissions->whereStatus('3');
            }

            if (request()->status == '0') {
                $submissions->whereNull('reviewer_id');
            }

            if (request()->topic) {
                $submissions->whereTopic(request()->topic);
            }

            $data['table'] = $submissions->where('histories', request()->status ?? '1')->paginate($page);
            return view('admin.submissions._data_table', $data);
        }

        $data['title'] = 'Admin | Submissions';
        return view('admin.submissions.index', $data);
    }

    public function show($id)
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->with('user')->where('registrasi_id', $id)->get();
            return view('admin.submissions._data_table_histories', $data);
        }

        $data['title'] = 'Admin | Submission Show';
        $data['submission'] = $this->submission->Query()->with('user')->where('registrasi_id', $id)->first();
        return view('admin.submissions.show', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Admin | Submission Edit';
        $data['submission'] = $this->submission->Query()->with('user')->whereId($id)->first();
        return view('admin.submissions.edit', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Admin | Submission Show';
        $data['submission'] = $this->submission->Query()->with('user')->whereId($id)->first();
        return view('admin.submissions.edit', $data);
    }
}
