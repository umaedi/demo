<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IcomeshController extends Controller
{
    public function index()
    {
        $data['title'] = "ISOMESH 2023";
        return view('icomesh.index', $data);
    }
}
