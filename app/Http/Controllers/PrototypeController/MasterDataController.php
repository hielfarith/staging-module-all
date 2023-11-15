<?php

namespace App\Http\Controllers\PrototypeController;

use App\Http\Controllers\Controller;

class MasterDataController extends Controller
{
    public function parameter(){

        return view ('admin.master_data.parameter');
    }

    public function RunningNoList(){

        return view ('admin.master_data.Runningnumber');
    }
}
