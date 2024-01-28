<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master\MasterState;
use App\Models\ButiranPemeriksaanSkips;
use App\Models\ButiranInstitusiSkips;
use App\Models\ItemStandardQualitySkips;

use App\Helpers\FMF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PengurusanSkipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangSkipsBaru(Request $request, $id = null){
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

            } elseif($tab == 'butiran_institusi') {
                if (isset($input['butiranInstitusi_id']) && !empty($input['butiranInstitusi_id'])) {
                    $butiran = ButiranInstitusiSkips::where('id', $input['butiranInstitusi_id'])->first();
                    unset($input['butiranInstitusi_id']);
                    $butiran = $butiran->update($input);
                } else {
                    $butiran = new ButiranInstitusiSkips;
                    $butiran = $butiran->create($input);
                }
                
            DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $butiran]);

            } elseif(in_array($tab, ['pengurusan_institusi', 'penubuhan_pendaftaran', 'pengurusan_kurikulum', 'pengajaran','pengurusan_penilaian', 'pengurusan_pembangunan_guru','displin', 'piawaian', 'kebersihan'])) {
                if (isset($input['butiran_institusi_id']) && !empty($input['butiran_institusi_id'])) {
                    $item = ItemStandardQualitySkips::where('butiran_institusi_id', $input['butiran_institusi_id'])->first();
                    $data[$tab] = json_encode($input);
                    $data['butiran_institusi_id'] = $input['butiran_institusi_id'];
                    if (!empty($item)) {
                        $item = $item->update($data);
                    } else {
                        $item = new ItemStandardQualitySkips;
                        $item = $item->create($data);
                    }
                } 
                DB::commit();
                return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $item]);
            }
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

    }
}
