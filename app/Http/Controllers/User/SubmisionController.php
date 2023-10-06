<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\SubmissionService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SubmisionController extends Controller
{
    protected $submission;
    public function __construct(SubmissionService $submissionService)
    {
        $this->middleware('presenter');
        $this->submission = $submissionService;
    }

    public function index()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('user_id', auth()->user()->id)->where('histories', 1)->get();
            return view('user.submision._data_table', $data);
        }

        $data['title'] = "User Submission";
        $data['submission'] = $this->submission->Query()->where('user_id', auth()->user()->id)->where('status', 2)->first();
        return view('user.submision.index', $data);
    }

    public function create()
    {
        $data['title'] = "Create Submission";
        return view('user.submision.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|max:255',
            'abstract'  => 'required',
            'abstract_file'  => 'required|mimes:pdf,docx,doc|max:2048',
            'keyword'   => 'required|max:255',
            'topic'     => 'required|max:255',
            'author'     => 'required|max:255',
        ]);

        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;

        $cekSubmission = $this->submission->Query()->where('user_id', auth()->user()->id)->latest()->first();
        if ($cekSubmission && $cekSubmission->status !== "2" && $cekSubmission->acc == null) {
            return back()->with('msgQueue', 'Sepertinya Anda masih memiliki submission yang harus di perbaiki!');
        }

        $data['registrasi_id'] = strtoupper(Str::random(16));
        $abstract_file = $request->file('abstract_file');
        $rename_abstract_file = Str::replace(' ', '_',  auth()->user()->name) . '_abstract_icomesh' . $data['registrasi_id'] . '.' . $abstract_file->getClientOriginalExtension();
        $data['abstract_file'] = $abstract_file->storeAs('public/paper', $rename_abstract_file);

        if (!is_null($request->file('paper'))) {
            $paper = $request->file('paper');
            $rename_paper = Str::replace(' ', '_',  auth()->user()->name) . '_paper_icomesh' . $data['registrasi_id'] . '.' . $paper->getClientOriginalExtension();
            $data['paper'] = $paper->storeAs('public/paper', $rename_paper);
        }

        DB::beginTransaction();
        try {
            $this->submission->store($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();
        return redirect('/user/submission')->with('message', 'Submission has ben created');
    }

    public function show($id)
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('user_id', auth()->user()->id)->where('registrasi_id', $id)->get();
            return view('user.submision._data_table_show', $data);
        }

        $data['submission'] = $this->submission->Query()->where('registrasi_id', $id)->where('user_id', auth()->user()->id)->first();
        $data['title'] = "Edit Submission";
        return view('user.submision.show', $data);
    }

    public function edit($id)
    {
        $data['submission'] = $this->submission->Query()->where('id', $id)->where('user_id', auth()->user()->id)->first();
        $data['title'] = "Edit Submission";
        return view('user.submision.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'     => 'required|max:255',
            'abstract'  => 'required',
            'abstract_file'  => 'mimes:pdf,docx|max:2048',
            'keyword'   => 'required|max:255',
            'topic'     => 'required|max:255',
        ]);

        $submission = $this->submission->Query()->whereId($id)->where('user_id', auth()->user()->id)->first();
        if (is_null($submission->reviewer_id)) {
            return back()->with(['msg' => 'Your submission is still in queue!']);
        }

        if (in_array($submission->acc, [2, 3, 4])) {
            return back();
        }

        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        $data['reviewer_id'] = $submission->reviewer_id;
        $data['histories'] = $submission->histories + 1;
        $data['registrasi_id'] = $submission->registrasi_id;

        if ($request->file('abstract_file')) {
            $abstract_file = $request->file('abstract_file');
            $rename_abstract_file = Str::replace(' ', '_',  auth()->user()->name) . '_abstract_icomesh_' . $data['registrasi_id'] . '.' . $abstract_file->getClientOriginalExtension();
            $data['abstract_file'] = $abstract_file->storeAs('public/paper', $rename_abstract_file);
        } else {
            $data['abstract_file'] = $submission->abstract_file;
        }

        if (!is_null($request->file('paper'))) {
            $paper = $request->file('paper');
            $rename_paper = Str::replace(' ', '_',  auth()->user()->name) . '_paper_icomesh_' . $data['registrasi_id'] . '.' . $paper->getClientOriginalExtension();
            $data['paper'] = $paper->storeAs('public/paper', $rename_paper);
        } else {
            $data['paper'] = $submission->paper;
        }

        DB::beginTransaction();
        try {
            $this->submission->store($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();
        return redirect('/user/submission')->with('message', 'Submission has ben updated');
    }

    public function withdraw($id)
    {
        DB::beginTransaction();
        try {
            $this->submission->withdraw($id);
        } catch (\Throwable $th) {
            throw $th;
        }

        DB::commit();
        return back()->with('msg_withdraw', 'You just resigned!');
    }

    public function delete($id)
    {
        $this->submission->delete($id);
        return redirect('/user/submission')->with('msg_delete', 'Submissions has been deleted!');
    }
}
