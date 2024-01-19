<?php

namespace App\Http\Controllers;

use App\Models\Master\MasterState;
use Illuminate\Http\Request;

class PengurusanSkipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangSkipsBaru(Request $request){
        $negeris = MasterState::all();

        return view ('skips.index', compact('negeris'));
    }

    public function RingkasanSkips(Request $request){
        return view ('skips.ringkasan_skips');
    }
}
