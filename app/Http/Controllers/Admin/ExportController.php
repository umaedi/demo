<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $user;
    public function __construct(UserService $userService)
    {
        $this->user = $userService;
    }
    public function __invoke(Request $request)
    {
        $users = $this->user->Query();
        if ($request->presence) {
            $users->where('presence', $request->presence);
        }

        if ($request->type_user) {
            $users->where('type_user', $request->type_user);
        }

        $users = $users->where('level', 'user')->get();
        return Excel::download(new UsersExport($users), 'data_participants_' . Carbon::now() . '.xlsx');
    }
}
