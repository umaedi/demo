<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SubmissionService;
use App\Services\UserService;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $user;
    public $submission;
    public function __construct(UserService $userService, SubmissionService $submissionService)
    {
        $this->user = $userService;
        $this->submission = $submissionService;
    }

    public function __invoke(Request $request)
    {
        if (\request()->ajax()) {
            $user = $this->user->Query();
            if ($request->data) {
                $user = $user->where('presence', $request->data);
            }

            $data['table'] = $user->where('level', 'user')->limit(10)->get();
            return view('admin.dashboard._data_table', $data);
        }

        $data['participants'] = $this->user->Query()->where('level', 'user')->count();
        $data['reviewers'] = $this->user->Query()->where('level', 'reviewer')->count();
        $data['participantsOffline'] = $this->user->Query()->where('level', 'user')->where('presence', 'Offline')->count();
        $data['participantsOnline'] =  $this->user->Query()->where('level', 'user')->where('presence', 'Online')->count();
        $data['submissions'] =  $this->submission->Query()->where('histories', '1')->count();
        $data['zoom'] = $this->user->Query()->where('presence', 'Online')->first();
        return view('admin.dashboard.index', $data);
    }
}
