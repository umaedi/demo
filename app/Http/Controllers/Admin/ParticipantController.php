<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use App\Services\SubmissionService;
use App\Http\Controllers\Controller;

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
                $users->where('name', 'like', '%' . request()->q . '%')->orWhere('user_id', 'like', '%' . request()->q . '%');
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

    public function persence(Request $request, $id)
    {
        $participant = $this->user->find($id);

        if ($request->value == '1') {
            if ($participant->status == '1') {
                $status = '0';
            } else {
                $status = '1';
            }
        }

        if ($request->value == '2') {
            if ($participant->status == '2') {
                $status = '1';
            } else {
                $status = '2';
                $id_sertifikat = strtoupper(Str::random(16));
            }
        }

        DB::beginTransaction();
        try {
            $this->user->update($participant, $status, $id_sertifikat ?? NULL);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage());
        }

        DB::commit();
        return $this->success();
    }

    public function destroy($id)
    {
        $participant = User::find($id);
        $participant->destroy($id);
        $participant->submission()->delete($id);
        return redirect('/admin/participants')->with('msg_delete', 'Participant has been deleted!');
    }
}
