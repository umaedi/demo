<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\PersentationService;
use Illuminate\Support\Facades\Storage;

class PersentationController extends Controller
{

    protected $persentation;
    public function __construct(PersentationService $persentationService)
    {
        $this->persentation = $persentationService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'persentation'  => 'required',
            'paper'         => 'required',
        ]);

        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        $data['persentation'] = Storage::putFile('public/persentation', $request->persentation);
        $data['paper'] = Storage::putFile('public/persentation', $request->paper);

        DB::beginTransaction();

        try {
            $this->persentation->store($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }

        DB::commit();
        return redirect('/user/submission')->with('msg.persentation', 'Persentation and Paper has ben submited');
    }
}
