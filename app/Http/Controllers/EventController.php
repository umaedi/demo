<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $data['title'] = "Steering Committee";
        return view('event.index', $data);
    }

    public function about()
    {
        $data['title'] = "About Event";
        return view('event.about', $data);
    }

    public function schedule()
    {
        $data['title'] = "Schedule";
        return view('event.schedule', $data);
    }
}
