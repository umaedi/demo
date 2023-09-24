<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        if (\request()->ajax()) {
            $user = $this->user->Query();
            if ($request->data) {
                $user = $user->where('persence', $request->data);
            }

            $data['table'] = $user->where('level', 'user')->get();
            return view('admin.dashboard._data_table', $data);
        }

        $data['participants'] = $this->user->Query()->where('level', 'user')->count();
        $data['participantsOffline'] = $this->user->Query()->where('level', 'user')->where('persence', 'Offline')->count();
        $data['participantsOnline'] =  $this->user->Query()->where('level', 'user')->where('persence', 'Online')->count();
        return view('admin.dashboard.index', $data);
    }
}
