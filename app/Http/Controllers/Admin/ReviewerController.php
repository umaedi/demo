<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ReviewerController extends Controller
{
    public $user;
    public function __construct(UserService $userService)
    {
        $this->user = $userService;
    }
    public function index()
    {
        if (request()->ajax()) {
            $users = $this->user->Query();
            $page = request('pagination', 1);

            if (request()->q) {
                $users->where('name', 'like', '%' . request()->q . '%');
            }

            $data['table'] = $users->where('level', 'reviewer')->paginate($page);
            return view('admin.reviewers._data_table', $data);
        }
        $data['title'] = 'Admin | Reviewers';
        return view('admin.reviewers.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|unique:users',
            'no_tlp'    => 'required|max:20',
            'password'  => 'required',
        ]);

        $data = $request->except('_token');
        $data['password'] = Hash::make($request->password);
        $data['institution'] = 'host';
        $data['salutation'] = 'host';
        $data['country'] = 'host';
        $data['type_user'] = 'host';
        $data['presence'] = 'host';
        $data['level'] = 'reviewer';

        DB::beginTransaction();
        try {
            $this->user->store($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        DB::commit();
        return back()->with('msg_store', 'Reviewer has ben created!');
    }
}
