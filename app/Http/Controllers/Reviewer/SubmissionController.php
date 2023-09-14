<?php

namespace App\Http\Controllers\Reviewer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\SubmissionService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
            $data['table'] = $this->submission->Query()->whereNull('reviewer_id')->where('histories', 1)->get();
            return view('reviewer.submission._data_table', $data);
        }

        $data['title'] = 'Reviewer | Submission';
        return view('reviewer.submission.index', $data);
    }

    public function show($id)
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('registrasi_id', $id)->where('reviewer_id', auth()->user()->id)->get();
            return view('reviewer.submission._data_table', $data);
        }

        $data['title'] = 'Reviewer Submission Show';
        return view('reviewer.submission.show', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Reviewer Submission Edit';
        $data['submission'] = $this->submission->find($id);
        return view('reviewer.submission.edit', $data);
    }

    public function review($id)
    {
        $data['title'] = 'Reviewer Submission Edit';
        $data['submission'] = $this->submission->Query()->where('id', $id)->where('reviewer_id', auth()->user()->id)->first();
        return view('reviewer.submission.review', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'     => 'required',
            'abstract'  => 'required',
            'keyword'   => 'required',
            'topic'     => 'required',
            'status'    => 'required'
        ]);

        $data = $request->except('_token');

        $submission = $this->submission->find($id);
        $data['user_id'] = $submission->user_id;
        $data['reviewer_id'] = auth()->user()->id;
        $data['histories'] = $submission->histories;

        if (isset($data['paper'])) {
            $data['paper'] = Storage::putFile('public/paper', $data['paper']);
        } else {
            $data['paper'] = $submission->paper;
        }

        if (isset($data['loa'])) {
            $data['loa'] = Storage::putFile('public/loa', $data['loa']);
            $this->submission->Query()->where('registrasi_id', $submission->registrasi_id)->update(['acc' => 1]);
        }

        DB::beginTransaction();
        try {
            $this->submission->update($id, $data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();
        return back()->with('message', 'Submission has ben updated');
    }

    public function revised()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('reviewer_id', auth()->user()->id)->where('status', 1)->get();
            return view('reviewer.submission._data_table_show', $data);
        }
        $data['title'] = "Submission Revised";
        return view('reviewer.submission.revised', $data);
    }

    public function accepted()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('reviewer_id', auth()->user()->id)->where('status', 2)->get();
            return view('reviewer.submission._data_table_show', $data);
        }
        $data['title'] = "Submission Revised";
        return view('reviewer.submission.accepted', $data);
    }

    public function rejected()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('reviewer_id', auth()->user()->id)->where('status', 3)->get();
            return view('reviewer.submission._data_table_show', $data);
        }
        $data['title'] = "Submission Revised";
        return view('reviewer.submission.revised', $data);
    }
}
