<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $countdown = Event::pluck('end_time')->first();
        $now = Carbon::now();
        $end_time = Carbon::parse($countdown);
        $difference = $now->diffInSeconds($end_time, false);
        $partisipant = User::where('level', 'user')->count();
        return view('welcome', compact('end_time', 'difference', 'partisipant'));
    }
}
