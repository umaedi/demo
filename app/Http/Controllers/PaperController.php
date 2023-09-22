<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function index()
    {
        $data['title'] = "Call For Papers";
        return view('papers.index', $data);
    }
}
