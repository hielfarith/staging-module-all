<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusanSkipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangSkipsBaru(Request $request){
        return view ('skips.index');
    }

    public function RingkasanSkips(Request $request){
        return view ('skips.ringkasan_skips');
    }
}
