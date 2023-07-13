<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronViewController extends Controller
{
    public function index(){

        return view ('admin.cron_view.CronView');
    }
}
