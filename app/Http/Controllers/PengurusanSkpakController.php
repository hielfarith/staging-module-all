<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusanSkpakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangSkpakBaru(Request $request, $id = null){
        return view ('skpak.index');
    }

    public function RingkasanSkpak(Request $request){
        // return view ('skpak.ringkasan_skips');
    }
}
