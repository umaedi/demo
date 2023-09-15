<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\SubmissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LoaController extends Controller
{
    protected $submission;
    public function __construct(SubmissionService $submissionService)
    {
        $this->submission = $submissionService;
    }
    public function index()
    {
        if (request()->ajax()) {
            $data['table'] = $this->submission->Query()->where('user_id', auth()->user()->id)->whereNotNull('loa')->get();
            return view('user.loa._data_table', $data);
        }
        $data['title'] = __('User LOA');
        return view('user.loa.index', $data);
    }

    public function download($id)
    {
        $loa = public_path('loa/icomesh_loa.png');
        return Response::download($loa);
    }
}
