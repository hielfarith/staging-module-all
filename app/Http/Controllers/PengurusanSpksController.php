<?php

namespace App\Http\Controllers;
use App\Models\InstrumenSkpakSpksIkeps;
use App\Models\SpksPengisian;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PengurusanSpksController extends Controller
{
    public function BorangSpksBaru(Request $request, $id = ''){
        $disabled = '';
        $spks = null;
        if(!empty($id)) {
            $spks = SpksPengisian::where('id', $id)->first();
        }
        return view('spks.index', compact('disabled', 'spks'));
    }

    public function ValidasiSpksSenarai(Request $request){
        return view('spks.list');
    }

    public function ValidasiSpks (Request $request) 
    {
        $disabled = '';
        $spks = null;

        return view('spks.index_validasi', compact('disabled', 'spks'));
    }
    public  function saveSpks(Request $request, $tab)
    {
        DB::beginTransaction();
        try { 
            $input = $request->input();
            $tabsarray = ['aspek1','aspek2','aspek3','aspek4','aspek5','aspek6'];
            $instrument = InstrumenSkpakSpksIkeps::where('type', 'SPKS')->where('status',1)->first();
            $input['status'] = 1;
            
            $data['spks_id'] = $input['spks_id'];
            $data['instrumen_id'] = $instrument->id;
            $data[$tab] = json_encode($input);
            unset($data['spks_id']);

            if (isset($data['spks_id'])) {
                $SpksPengisian = SpksPengisian::where('id', $input['spks_id'])->first();
                $spksPengisian = $SpksPengisian->update($data);
            } else {
                $SpksPengisian = new SpksPengisian;
                $SpksPengisian = $SpksPengisian->create($data);
            }

            DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $SpksPengisian]);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
    }
}
