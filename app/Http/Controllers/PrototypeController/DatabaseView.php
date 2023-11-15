<?php

namespace App\Http\Controllers\PrototypeController;

use App\Http\Controllers\Controller;

class DatabaseView extends Controller
{
    public function index()
    {

        return view('admin.database_view.index');
    }
}
