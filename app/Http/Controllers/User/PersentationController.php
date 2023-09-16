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

    public function update(Request $request, $id)
    {
        $request->validate([
            'ppt'  => 'required',
            'paper'         => 'required',
        ]);

        $submission = $this->submission->find($id);

        $ppt = Storage::putFile('public/paper', $request->ppt);
        $paper = Storage::putFile('public/paper', $request->paper);

        $submission->forceFill([
            'ppt'     => $ppt,
            'paper'   => $paper,
        ])->save();
        return redirect('/user/submission')->with('msg.persentation', 'Persentation and Paper has ben submited');
    }
}
