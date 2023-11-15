<?php

namespace App\Http\Controllers\PrototypeController;

use App\Http\Controllers\Controller;

class CronViewController extends Controller
{
    public function index(){

        return view ('admin.cron_view.CronView');
    }
}
