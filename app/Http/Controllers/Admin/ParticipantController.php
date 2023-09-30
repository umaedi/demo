<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Services\SubmissionService;

class ParticipantController extends Controller
{
    public $user;
    public $submssion;
    public function __construct(UserService $userService, SubmissionService $submissionService)
    {
        $this->user = $userService;
        $this->submssion = $submissionService;
    }
    public function index()
    {
        $users = $this->user->Query();
        if (request()->ajax()) {
            $page = request('pagination', 15);

            if (request()->q) {
                $users->where('name', 'like', '%' . request()->q . '%');
            }

            if (request()->presence) {
                $users->where('presence', request()->presence);
            }

            if (request()->type_user) {
                $users->where('type_user', request()->type_user);
            }

            $data['table'] = $users->where('level', 'user')->paginate($page);
            return view('admin.participants._data_table', $data);
        }
        $data['title'] = 'Admin | Participants';
        $data['offline'] = $this->user->Query()->where('presence', 'Offline')->count();
        $data['online'] = $this->user->Query()->where('presence', 'Online')->count();
        $data['presenter'] = $this->user->Query()->where('type_user', 'Presenter')->count();
        $data['participant'] = $this->user->Query()->where('type_user', 'Participant Only')->count();
        return view('admin.participants.index', $data);
    }

    public function show($id)
    {
        if (request()->ajax()) {
            $data['table'] = $this->submssion->Query()->where('user_id', $id)->get();
            return view('admin.participants._data_table_submission', $data);
        }
        $data['title'] = "Admin | Show participant";
        $data['participant'] = $this->user->find($id);
        return view('admin.participants.show', $data);
    }
}