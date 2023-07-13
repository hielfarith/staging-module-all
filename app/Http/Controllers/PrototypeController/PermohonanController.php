<?php

namespace App\Http\Controllers\PrototypeController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermohonanController extends Controller
{
    public function SenaraiPermohonan(){
        return view('senarai_permohonan');
    }
}
