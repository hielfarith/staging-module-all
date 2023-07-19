<?php

namespace App\Http\Controllers\PrototypeController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function UserProfile(){

        $roles = Role::get();

        return view('user_information.user_information',compact('roles'));
    }

    public function SenaraiInstrumen(){

        return view('instrumen.senarai_instrumen');
    }

    public function TambahInstrumen(){

        return view('instrumen.tambah_instrumen');
    }

    public function JawabInstrumen(){

        return view ('instrumen.jawab_instrumen');
    }
}
