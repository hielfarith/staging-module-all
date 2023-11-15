<?php

namespace App\Http\Controllers\PrototypeController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermohonanController extends Controller
{
    public function SenaraiPermohonan(){
        return view('senarai_permohonan');
    }

    public function Borang(){
        return view('borang');
    }

    public function Dashboard (){
        return view('statistik_laporan.dashboard');
    }

    public function BorangPermohonan (){
        return view('permohonan.borang_baru.index_permohonan');
    }
}
