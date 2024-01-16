<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengurusanIkepsController extends Controller
{
    public function BorangIkepsBaru (Request $request){
        return view ('ikeps.index');
    }

    public function RingkasanIkeps (Request $request){
        return view ('ikeps.ringkasan_ikeps');
    }
}
