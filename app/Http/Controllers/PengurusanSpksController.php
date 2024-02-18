<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusanSpksController extends Controller
{
    public function BorangSpksBaru(Request $request){
        $disabled = '';
        return view('spks.index', compact('disabled'));
    }

    public function ValidasiSpksSenarai(Request $request){
        return view('spks.list');
    }

    public function ValidasiSpks (Request $request) {
        $disabled = '';
        return view('spks.index_validasi', compact('disabled'));
    }
}
