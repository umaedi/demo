<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\AccessZoom;
use App\Models\User;
use Illuminate\Http\Request;

class ZoomController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'zoom_id'   => 'required|max:15',
            'zoom_password'   => 'required|max:255',
        ]);

        User::where('presence', 'Online')->update([
            'zoom_id'   => $request->zoom_id,
            'zoom_password' => $request->zoom_password,
        ]);

        $data = [
            'email' => User::where('presence', 'Online')->pluck('email'),
            'zoom_id'   => $request->zoom_id,
            'zoom_password' => $request->zoom_password,
        ];

        dispatch(new AccessZoom($data));
        return back()->with('msg_zoom', 'zoom rom has ben created!');
    }
}
