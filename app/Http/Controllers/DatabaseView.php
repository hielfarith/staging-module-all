<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseView extends Controller
{
    //
    public function index()
    {

        return view('admin.database_view.index');
    }
}
