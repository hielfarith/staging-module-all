<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\MasterCountry;
use App\Models\Master\MasterState;
class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $negaras = MasterCountry::all();
        $jantinas = [1=> 'Lelaki', 2=> 'Perempuan'];
        $kaums = [1=> 'Melayu', 2=> 'Cina', 3=> 'India', 4=> 'Bumiputera Sabah', 5=> 'Bumiputera Sarawak', 6=> 'Lain-lain'];
        $negeris = MasterState::all();
        $sukans = [ 1 => 'Bola Sepak',
                    2 => 'Bola Keranjang',
                    3 => 'Tenis',
                    4 => 'Renang',
                    5 => 'Badminton',
                    6 => 'Larian',
                    7 => 'Gimnastik',
                    8 => 'Bola Tampar',
                    9 => 'Berbasikal',
                    10 => 'Ping Pong',
                ];
        return view('landing_page.index', compact('negaras','jantinas','kaums','negeris', 'sukans'));
    }
}
