<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('reviewer');
    }
    public function __invoke(Request $request)
    {
        $data['title'] = 'Reviewer Profile';
        return view('reviewer.profile.index', $data);
    }
}
