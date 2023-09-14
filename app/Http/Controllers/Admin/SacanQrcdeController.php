<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SacanQrcdeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function __invoke(Request $request)
    {
        $user = User::where('qrcode', $request->qrcode)->first();

        if ($user) {
            $user->update(['status', '1']);
            return response()->json(['message' => 'Qrcode berhasil divaliddasi']);
        } else {
            return response()->json(['message' => 'Qrcode tidak valid!']);
        }
    }
}
