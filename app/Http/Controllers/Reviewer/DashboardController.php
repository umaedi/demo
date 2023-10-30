<?php

namespace App\Http\Controllers\Reviewer;

use Illuminate\Support\Facades\DB;
use App\Services\SubmissionService;
use App\Http\Controllers\Controller;
use App\Models\Submission;

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
            $data['table'] = $this->submission->Query()->where('acc', '1')->get();
            return view('reviewer.dashborad._data_table', $data);
        }

        $data['title'] = 'Reviewer Dashboard';
        $data['submission'] = $this->submission->Query()->whereNull('reviewer_id')->where('histories', '1')->count();
        $data['submission_revised'] = $this->submission->Query()->where('acc', 1)->count();
        $data['submission_accepted'] = $this->submission->Query()->where('reviewer_id', auth()->user()->id)->where('status', '2')->count();
        $data['submission_rejected'] = $this->submission->Query()->where('reviewer_id', auth()->user()->id)->where('status', '3')->count();
        return view('reviewer.dashborad.index', $data);
    }
}
