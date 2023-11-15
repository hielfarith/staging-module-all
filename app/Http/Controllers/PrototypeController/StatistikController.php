<?php

namespace App\Http\Controllers\PrototypeController;

use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
    public function viewLaporan (Request $request){
        return view ('statistik_laporan.laporan');
    }

    public function viewStatistik (Request $request){
        return view ('statistik_laporan.statistik');
    }
}
