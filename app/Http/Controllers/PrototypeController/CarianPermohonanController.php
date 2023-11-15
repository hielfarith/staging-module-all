<?php

namespace App\Http\Controllers\PrototypeController;

use App\Http\Controllers\Controller;

class CarianPermohonanController extends Controller
{
    public function CarianPermohonan(){
        return view('permohonan.carian_permohonan.index');
    }
    public function SenaraiInstitusi(){
        return view('permohonan.pengurusan_institusi.senarai_institusi');
    }
}
