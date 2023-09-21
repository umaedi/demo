<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Submission;
use App\Services\PersentationService;
use App\Services\SubmissionService;
use Illuminate\Support\Facades\Storage;

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

        $ppt = Storage::putFile('public/paper', $request->ppt);

        $submission->forceFill([
            'ppt'     => $ppt,
        ])->save();
        return redirect('/user/submission')->with('msg.persentation', 'Persentation has ben submited');
    }

    public function paper(Request $request, $id)
    {
        $request->validate([
            'paper'  => 'required|mimes:pdf,docx,pptx|max:2048',
        ]);

        $submission = $this->submission->find($id);

        $paper = Storage::putFile('public/paper', $request->paper);

        $submission->forceFill([
            'paper'   => $paper,
        ])->save();
        return redirect('/user/submission')->with('msg.persentation', 'Paper has ben submited');
    }
}
