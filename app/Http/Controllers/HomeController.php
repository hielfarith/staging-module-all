<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ProfileUpdated;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();

        return view('content.dashboard.dashboard-ecommerce', compact('user'));

        // $pageConfigs = ['pageHeader' => false];

        // return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
    }
}
