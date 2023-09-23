<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProceedingController extends Controller
{
    public function index()
    {
        $data['title'] = "Proceeding";
        return view('proceeding.index', $data);
    }

    public function show()
    {
        $data['title'] = "Proceeding";
        return view('proceeding.show', $data);
    }

    public function topic1()
    {
        $data['title'] = "Proceeding Show Paper";
        return view('proceeding.topic1', $data);
    }
    public function topic2()
    {
        $data['title'] = "Proceeding Show Paper";
        return view('proceeding.topic2', $data);
    }
    public function topic3()
    {
        $data['title'] = "Proceeding Show Paper";
        return view('proceeding.topic3', $data);
    }

    public function paper()
    {
        $data['title'] = "Proceeding Show Paper";
        return view('proceeding.paper', $data);
    }
}
