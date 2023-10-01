<?php

namespace App\Http\Controllers\Reviewer;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\SubmissionService;
use App\Http\Controllers\Controller;
use App\Jobs\SendNotification;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public $submission;
    public $persentattion;
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
        $data['submission'] = $this->submission->Query()->where('registrasi_id', $id)->first();
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
        $rules = [
            'title'     => 'required|string|max:255',
            'abstract'  => 'required',
            'keyword'   => 'required|string|max:255',
            'topic'     => 'required|string|max:255',
            'status'    => 'required|string|max:255'
        ];

        if ($request->rev_abstract_file) {
            $rules['rev_abstract_file'] = 'mimes:pdf,docx|max:2048';
        }

        if ($request->rev_paper) {
            $rules['rev_paper'] = 'mimes:pdf,docx|max:2048';
        }

        $request->validate($rules);

        $data = $request->except('_token');

        $submission = $this->submission->find($id);

        $data['user_id'] = $submission->user_id;
        $data['reviewer_id'] = auth()->user()->id;
        $data['histories'] = $submission->histories;
        $data['abstract'] = $submission->abstract;
        $data['abstract_file'] = $submission->abstract_file;
        $data['paper'] = $submission->paper;

        if (isset($data['rev_abstract_file'])) {
            $data['rev_abstract_file'] = Storage::putFile('public/paper', $data['rev_abstract_file']);
        }

        if (isset($data['rev_paper'])) {
            $data['rev_paper'] = Storage::putFile('public/paper', $data['rev_paper']);
        }

        if ($data['status'] == "1") {
            $this->submission->Query()->where('registrasi_id', $submission->registrasi_id)->update(['acc' => 1]);
        } elseif ($data['status'] == "2") {
            $this->submission->Query()->where('registrasi_id', $submission->registrasi_id)->update(['acc' => 2]);
            $data['loa'] = strtoupper(Str::random(16));
        } else {
            $this->submission->Query()->where('registrasi_id', $submission->registrasi_id)->update(['acc' => 3]);
        }

        DB::beginTransaction();
        try {
            $this->submission->update($id, $data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();

        $dataEmail = [
            'name' => $submission->user->name,
            'email' => $submission->user->email,
        ];

        dispatch(new SendNotification($dataEmail));
        return redirect('/reviewer/submission/show/' . $submission->registrasi_id)->with('message', 'Submission has ben updated');
    }

    public function revised()
    {
        if (\request()->ajax()) {
            $uniqueData = $this->submission->Query()->groupBy('registrasi_id')->get(['registrasi_id', DB::raw('MAX(id) as max_id')])->pluck('max_id');
            $data['table'] = $this->submission->Query()->whereIn('id', $uniqueData)->where('reviewer_id', auth()->user()->id)->where('status', '1')->paginate(10);
            return view('reviewer.submission._data_table_show', $data);
        }
        $data['title'] = "Submission Revised";
        return view('reviewer.submission.revised', $data);
    }

    public function accepted()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->with('user')->where('reviewer_id', auth()->user()->id)->where('status', 2)->paginate(10);
            return view('reviewer.submission._data_table_show', $data);
        }
        $data['title'] = "Submission Accepted";
        return view('reviewer.submission.accepted', $data);
    }

    public function rejected()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->with('user')->where('reviewer_id', auth()->user()->id)->where('status', 3)->paginate(10);
            return view('reviewer.submission._data_table_show', $data);
        }
        $data['title'] = "Submission Rejected";
        return view('reviewer.submission.rejected', $data);
    }
}
