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
        $this->middleware('persenter');
        $this->submission = $submissionService;
    }

    public function index()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('user_id', auth()->user()->id)->latest()->where('histories', 1)->get();
            return view('user.submision._data_table', $data);
        }

        $data['title'] = "User Submission";
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
            'title'         => 'required|string|max:255',
            'abstract'      => 'required|string',
            'abstract_file' => 'mimes:pdf,docx|max:2048',
            'keyword'       => 'required|string|max:255',
            'topic'         => 'required|string|max:255',
        ]);

        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;

        if ($request->id) {
            $submission = $this->submission->Query()->whereId($request->id)->where('user_id', auth()->user()->id)->first();
            if (is_null($submission->reviewer_id)) {
                return back()->with(['msg' => 'Your submission is still in queue!']);
            }

            if ($submission->acc == 1) {
                return back();
            }

            $data['reviewer_id'] = $submission->reviewer_id;
            $data['histories'] = $submission->histories + 1;
            $data['registrasi_id'] = $submission->registrasi_id;
        } else {
            $cekSubmission = $this->submission->Query()->where('user_id', auth()->user()->id)->latest()->first();
            if ($cekSubmission && $cekSubmission->status !== "2" && $cekSubmission->acc == null) {
                return back()->with('msgQueue', 'Sepertinya Anda masih memiliki submission yang harus di perbaiki!');
            }

            $data['registrasi_id'] = strtoupper(Str::random(16));
        }

        if (isset($data['abstract_file'])) {
            $data['abstract_file'] = Storage::putFile('public/paper', $data['abstract_file']);
        } else {
            $data['abstract_file'] = $submission->abstract_file;
        }

        if (isset($data['paper'])) {
            $data['paper'] = Storage::putFile('public/paper', $data['paper']);
        } else {
            $data['paper'] = $submission->paper ?? "";
        }

        DB::beginTransaction();
        try {
            $this->submission->store($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();

        if ($request->id) {
            return redirect('/user/submission')->with('message', 'Submission has ben updated');
        } else {
            return redirect('/user/submission')->with('message', 'Submission has ben created');
        }
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
}
