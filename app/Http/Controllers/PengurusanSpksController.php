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
        $disabled = $type = '';
        $spks = null;
        if(!empty($id)) {
            $spks = SpksPengisian::where('id', $id)->first();
        }
        return view('spks.index', compact('disabled', 'spks', 'type'));
    }

    public function ValidasiSpksSenarai(Request $request){
         if($request->ajax()) {

            $spks = SpksPengisian::select(['instrumen_skpak_spks_ikep.pengguna_instrumen', 'instrumen_skpak_spks_ikep.pengisian_oleh', 'instrumen_skpak_spks_ikep.tempoh_pengisian', 'instrumen_skpak_spks_ikep.tempoh_pengisian_lain', 'spks_pengisians.status', 'spks_pengisians.id as spks_id'])->join('instrumen_skpak_spks_ikep', 'instrumen_skpak_spks_ikep.id', '=', 'spks_pengisians.instrumen_id')->whereIn('spks_pengisians.status', [1,2,3]);

            return Datatables::of($spks)
                ->editColumn('pengguna_instrumen', function ($skpak) {
                    return $skpak->pengguna_instrumen;
                })
                ->editColumn('pengisian_oleh', function ($skpak) {
                    return $skpak->pengisian_oleh;
                })
                ->editColumn('tempoh_pengisian', function ($skpak) {
                    return $skpak->tempoh_pengisian;
                })
                 ->editColumn('tempoh_pengisian_lain', function ($skpak) {
                    return $skpak->tempoh_pengisian_lain;
                })
                  ->editColumn('status', function ($skpak) {
                    return $skpak->status;
                })
                ->addColumn('DT_RowIndex', function ($skpak) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('action', function ($skpak) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatSpks(' . $skpak->spks_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSpksValidasi(' . $skpak->spks_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('spks.list');
    }

    public function verfikasiSpksSenarai(Request $request){
         if($request->ajax()) {

            $spks = SpksPengisian::select(['instrumen_skpak_spks_ikep.pengguna_instrumen', 'instrumen_skpak_spks_ikep.pengisian_oleh', 'instrumen_skpak_spks_ikep.tempoh_pengisian', 'instrumen_skpak_spks_ikep.tempoh_pengisian_lain', 'spks_pengisians.status', 'spks_pengisians.id as spks_id'])->join('instrumen_skpak_spks_ikep', 'instrumen_skpak_spks_ikep.id', '=', 'spks_pengisians.instrumen_id')->whereIn('spks_pengisians.status', [1,2,3]);

            return Datatables::of($spks)
                ->editColumn('pengguna_instrumen', function ($skpak) {
                    return $skpak->pengguna_instrumen;
                })
                ->editColumn('pengisian_oleh', function ($skpak) {
                    return $skpak->pengisian_oleh;
                })
                ->editColumn('tempoh_pengisian', function ($skpak) {
                    return $skpak->tempoh_pengisian;
                })
                 ->editColumn('tempoh_pengisian_lain', function ($skpak) {
                    return $skpak->tempoh_pengisian_lain;
                })
                  ->editColumn('status', function ($skpak) {
                    return $skpak->status;
                })
                ->addColumn('DT_RowIndex', function ($skpak) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('action', function ($skpak) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatSpks(' . $skpak->spks_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSpksverfikasi(' . $skpak->spks_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('spks.list');
    }

    public function verfikasiSpks(Request $request, $id)
    {
        $spks = $type = null;
        if(!empty($id)) {
            $spks = SpksPengisian::where('id', $id)->first();
        }
        $disabled = 'disabled';
        return view('spks.index_validasi', compact('disabled', 'spks'));
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
            dd($input);
            $tabsarray = ['aspek1','aspek2','aspek3','aspek4','aspek5','aspek6'];
            $instrument = InstrumenSkpakSpksIkeps::where('type', 'SPKS')->where('status',1)->first();
            $input['status'] = 1;
            
            $data['spks_id'] = $input['spks_id'];
            $data['instrumen_id'] = $instrument->id;
            $data[$tab] = json_encode($input);
            if (isset($data['spks_id'])) {
                $SpksPengisian = SpksPengisian::where('id', $input['spks_id'])->first();
                unset($data['spks_id']);
                $spksPengisian = $SpksPengisian->update($data);
            } else {
                $SpksPengisian = new SpksPengisian;
                unset($data['spks_id']);
                $SpksPengisian = $SpksPengisian->create($data);
            }

            DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $SpksPengisian]);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
    }

    public function GetJumlah(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $array = [];
        $spks = null;
        if ($type == 'lihat') {
            $disabled = 'disabled';
        } else {
            $disabled = '';
        }
        if ($id) {
            $spks = SpksPengisian::where('id', $id)->first();
            $tabsarray = ['aspek1','aspek2','aspek3','aspek4','aspek5','aspek6'];

            $array = [];
            foreach ($tabsarray as $variable) {
                $$variable = json_decode($spks->$variable, true);
                $zero = $one = $two = $tb = 0;
                if (!empty($$variable)) {
                    foreach ($$variable as $key =>  $value) {
                        if (str_contains($key, 'spks') || str_contains($key, 'catatan') || str_contains($key, 'status')) {
                            continue;
                        }
                        if ($value == '0') {
                            $zero += 1;
                            $array[$variable][0] = $zero;
                        }
                        if ($value == '1') {
                            $one += 1;
                            $array[$variable][1] = $one;
                        }
                        if ($value == '2') {
                            $two += 1;
                            $array[$variable][2] = $two;
                        }
                        if ($value == 'TB') {
                            $tb += 1;
                            $array[$variable]['tb'] = $tb;
                        }
                    }
                }

            }
        }

        foreach ($array as $key => $value) {
            // dd($array);
        }

        return view('spks.borang_spks.jumlah', compact('array', 'spks', 'disabled'));
    }

    public function SenaraiSpks(Request $request)
    {
         if($request->ajax()) {

            $spks = SpksPengisian::select(['instrumen_skpak_spks_ikep.pengguna_instrumen', 'instrumen_skpak_spks_ikep.pengisian_oleh', 'instrumen_skpak_spks_ikep.tempoh_pengisian', 'instrumen_skpak_spks_ikep.tempoh_pengisian_lain', 'spks_pengisians.status', 'spks_pengisians.id as spks_id'])->join('instrumen_skpak_spks_ikep', 'instrumen_skpak_spks_ikep.id', '=', 'spks_pengisians.instrumen_id')->whereIn('spks_pengisians.status', [1,2]);

            return Datatables::of($spks)
                ->editColumn('pengguna_instrumen', function ($skpak) {
                    return $skpak->pengguna_instrumen;
                })
                ->editColumn('pengisian_oleh', function ($skpak) {
                    return $skpak->pengisian_oleh;
                })
                ->editColumn('tempoh_pengisian', function ($skpak) {
                    return $skpak->tempoh_pengisian;
                })
                 ->editColumn('tempoh_pengisian_lain', function ($skpak) {
                    return $skpak->tempoh_pengisian_lain;
                })
                  ->editColumn('status', function ($skpak) {
                    return $skpak->status;
                })
                ->addColumn('DT_RowIndex', function ($skpak) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('action', function ($skpak) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatSpks(' . $skpak->spks_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSpksEdit(' . $skpak->spks_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('spks.list');
    }

    public function borangView(Request $request, $id, $type){
        if (!empty($id)) {
            $spks = SpksPengisian::where('id', $id)->first();
        } else {
            $spks = null;
        }

        if ($type == 'kemaskini') {
            $disabled = '';
        } else {
            $disabled = 'disabled';
        }
        return view ('spks.index', compact('spks', 'disabled', 'type'));
    }
}
