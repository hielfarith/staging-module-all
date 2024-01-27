<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master\MasterState;
use App\Models\ButiranPemeriksaanSkips;
use App\Models\ButiranInstitusiSkips;

class PengurusanSkipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangSkipsBaru(Request $request, $id=null){
        $negeris = MasterState::all();
        $butiran_id = $id;
        return view ('skips.index', compact('negeris', 'butiran_id'));
    }

    public function RingkasanSkips(Request $request){
        return view ('skips.ringkasan_skips');
    }

    public function store(Request $request, $tab) {
        $input = $request->input();
        DB::beginTransaction();
        try {
            if ($tab == 'butiran_pemeriksaan') {
                $butiran = new ButiranPemeriksaanSkips;
                $butiran = $butiran->create($input);
            } else if($tab == 'butiran_institusi') {
                $butiran = new ButiranInstitusiSkips;
                $butiran = $butiran->create($input);
            }
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $butiran]);
    }
}
