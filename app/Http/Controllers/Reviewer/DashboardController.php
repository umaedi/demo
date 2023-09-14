<?php

namespace App\Http\Controllers\Reviewer;

use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SubmissionService;

class DashboardController extends Controller
{
    public $submission;
    public function __construct(SubmissionService $submissionService)
    {
        $this->submission = $submissionService;
    }

    public function index()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('reviewer_id', auth()->user()->id)->whereNull('acc')->where('status', '1')->get();
            return view('reviewer.dashborad._data_table', $data);
        }

        $data['title'] = 'Reviewer | Dashboard';
        $data['submission'] = Submission::whereNull('reviewer_id')->where('histories', 1)->count();
        $data['submission_revised'] = Submission::whereNull('acc')->where('status', '1')->count();
        $data['submission_accepted'] = Submission::where('reviewer_id', auth()->user()->id)->where('status', '2')->count();
        $data['submission_rejected'] = Submission::where('reviewer_id', auth()->user()->id)->where('status', '3')->count();
        return view('reviewer.dashborad.index', $data);
    }
}
