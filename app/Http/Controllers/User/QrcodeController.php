<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    public function index()
    {
        $data['title'] = "Scan Qrcode";
        return view('user.qrcode.index', $data);
    }

    public function validation()
    {
        $data['title'] = "Scan Qrcode";
        return view('user.qrcode.validation', $data);
    }
}
