<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Pengumuman;

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
        $pengumumans = Pengumuman::orderBy('created_at', 'desc')->get();
    
        $user = Auth::user();

        $apiKey = config('api.key');

        $response = Http::withHeaders([
            'APIKEY' => $apiKey,
        ])->withOptions([
            'verify' => false,
        ])->get('https://integrasi.moe.gov.my/General-stage/staffKPM?NoKP='.$user->no_ic);

        $user = $response['details'][0];

        $institusiUser = Http::withHeaders([
            'APIKEY' => $apiKey,
        ])->withOptions([
            'verify' => false,
        ])->get('https://integrasi.moe.gov.my/Institusi-stage/instituteprofile?inkod=' . $user['kod_institusi']);

        $institusi = $institusiUser;

        return view('dashboard.dashboard_main', compact('pengumumans', 'user', 'institusi'));

        // $pageConfigs = ['pageHeader' => false];

        // return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
    }
}
