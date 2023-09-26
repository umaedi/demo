<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\SubmissionService;
use App\Http\Controllers\Controller;


class PersentationController extends Controller
{

    protected $submission;
    public function __construct(SubmissionService $submissionService)
    {
        $this->submission = $submissionService;
    }

    public function ppt(Request $request, $id)
    {
        $request->validate([
            'ppt'  => 'required|mimes:pdf,docx,pptx|max:2048',
        ]);

        $submission = $this->submission->find($id);

        $ppt = $request->file('ppt');
        $renamePpt =  Str::replace(' ', '_', auth()->user()->name) . '_PPT_' . $submission->registrasi_id . '.' . $ppt->getClientOriginalExtension();

        $submission->forceFill([
            'ppt'     => $ppt->storeAs('public/paper', $renamePpt),
        ])->save();
        return redirect('/user/submission')->with('msg.persentation', 'Persentation has ben submited');
    }

    public function paper(Request $request, $id)
    {
        $request->validate([
            'paper'  => 'required|mimes:pdf,docx,pptx|max:2048',
        ]);

        $submission = $this->submission->find($id);

        $paper = $request->file('paper');
        $renamePaper =  Str::replace(' ', '_', auth()->user()->name) . '_Paper_' . $submission->registrasi_id . '.' . $paper->getClientOriginalExtension();

        $submission->forceFill([
            'paper'   => $paper->storeAs('public/paper', $renamePaper),
        ])->save();
        return redirect('/user/submission')->with('msg.persentation', 'Paper has ben submited');
    }
}
