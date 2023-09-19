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

        $uniqueData = $this->submission->Query()->groupBy('registrasi_id')->get(['registrasi_id', DB::raw('MAX(id) as max_id')])->pluck('max_id');
        if (\request()->ajax()) {
            $data['table'] = Submission::whereIn('id', $uniqueData)->where('reviewer_id', auth()->user()->id)->where('status', '1')->get();
            return view('reviewer.dashborad._data_table', $data);
        }

        $data['title'] = 'Reviewer Dashboard';
        $data['submission'] = $this->submission->Query()->whereNull('reviewer_id')->where('histories', '1')->count();
        $data['submission_revised'] = Submission::whereIn('id', $uniqueData)->where('reviewer_id', auth()->user()->id)->where('status', '1')->count();
        $data['submission_accepted'] = $this->submission->Query()->where('reviewer_id', auth()->user()->id)->where('status', '2')->count();
        $data['submission_rejected'] = $this->submission->Query()->where('reviewer_id', auth()->user()->id)->where('status', '3')->count();
        return view('reviewer.dashborad.index', $data);
    }
}
