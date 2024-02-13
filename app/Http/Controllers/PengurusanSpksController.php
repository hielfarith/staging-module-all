<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusanSpksController extends Controller
{
    public function BorangSpksBaru(Request $request){
        return view('spks.index');
    }

    public function VerifikasiSpksSenarai(Request $request){
        return view('spks.list');
    }
}
