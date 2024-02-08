<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkpakStandardPenilaian;
use App\Models\InstrumenSkpakSpksIkeps;
use App\Models\Module;
use App\Models\MasterAction;
use App\Models\ModuleStatus;

use App\Helpers\FMF;
use App\Models\Master\MasterState;
use App\Models\MasterDaerah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PengurusanSkpakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangSkpakBaru(Request $request, $id = null){
        if (!empty($id)) {
            $skpak = SkpakStandardPenilaian::where('id', $id)->first();
        } else {
            $skpak = null;
        }
        return view ('skpak.index', compact('skpak'));
    }

    public function RingkasanSkpak(Request $request){
        // return view ('skpak.ringkasan_skips');
    }

    public function ValidasiSkpak (Request $request) {
        return view('skpak.index_validasi');
    }
    public function saveSkpak(Request $request, $tab) {
        $input = $request->input();
        $tabsarray = ['penilaian1','penilaian2','penilaian3','penilaian4','penilaian5','penilaian6'];
        $instrument = InstrumenSkpakSpksIkeps::where('type', 'SKPAK')->where('status',1)->first();

        DB::beginTransaction();
        try {
            $input[$tab] = json_encode($input);
            if (!empty($instrument)) {
                $input['instrument_id'] = $instrument->id;
            }
            $input['status'] = 1;
            if (isset($input['skpak_id']) && !empty($input['skpak_id'])) {
                $skpak = SkpakStandardPenilaian::where('id', $input['skpak_id'])->first();
                // get next status from the module->status
                // $butiranInstitusi = ButiranInstitusiSkips::where('id',$input['instrumen_id'])->first();
                // $moduleId = Module::where('module_name', $butiranInstitusi->instrumen_skips_id)->first();
                // $nextStatus = FMF::getNextStatus($moduleId->id, $item->status, 'success');

                if (empty($skpak)) {
                    $skpak = new SkpakStandardPenilaian;
                    $butiran = $butiran->create($input);
                } else {
                    $skpak->update($input);
                }
            } else {
                $skpak = new SkpakStandardPenilaian;
                $skpak = $skpak->create($input);
            }
            DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $skpak]);

        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
    }
    public function GetJumlah(Request $request)
    {
        $id = $request->id;
        $array = [];
        $skpak = null;
        if ($id) {
            $skpak = SkpakStandardPenilaian::where('id', $id)->first();
            for ($i=1; $i < 7; $i++) {
                $name = 'penilaian'.$i;
                if (isset($skpak->$name)) {
                    $val = json_decode($skpak->$name, true);
                    $ya = $tidak = 0 ;
                    foreach ($val as $key => $value) {
                        if ($value == 'YA') {
                            $array[$name]['YA'] = ++$ya;
                        }
                        if ($value == 'TIDAK') {
                            $array[$name]['TIDAK'] = ++$tidak;
                        }
                    }
                }

            }
        }
        $totalya = $totaltidak = 0 ;
        if (!empty($array)) {
            foreach ($array as $key => $value) {
                $totalya += $value['YA'];
                $totaltidak += $value['TIDAK'];
            }
        }

        return view('skpak.borang_skpak.jumlah', compact('array', 'totalya', 'totaltidak', 'skpak'));
    }
    public function SubmitSpkak(Request $request)
    {
        if ($request->id) {
            $skpak = SkpakStandardPenilaian::where('id', $id)->first();
            $skpak->status = 2;
            $skpak->save();
        }
        return ['success' => true];
    }
    public function SenaraiSkpak(Request $request)
    {
        //  if($request->ajax()) {

        //     $skpak = SkpakStandardPenilaian::all()

        //     return Datatables::of($skpak)
        //         ->editColumn('nama_institusi', function ($skpak) {
        //             return $skpak->nama_institusi;
        //         })
        //         ->editColumn('nama_pengetua', function ($skpak) {
        //             return $skpak->nama_pengetua;
        //         })
        //         ->editColumn('status', function ($skpak) {
        //             $item = ItemStandardQualitySkips::where('butiran_institusi_id', $skpak->id)->first();
        //             return $item->statuses->status_description;
        //         })
        //         ->addColumn('DT_RowIndex', function ($skpak) {
        //             static $index = 1;
        //             return $index++;
        //         })
        //         ->editColumn('action', function ($skpak) {
        //             $button = "";
        //             $button .= '<div class="btn-group " role="group" aria-label="Action">';

        //             $button .= '<a onclick="maklumatInstrumen(' . $skpak->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

        //             $button .= "</div>";

        //             return $button;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('skpak.list');
    }

    public function DashboardSkpak (Request $request){

        $states = MasterState::all();
        $daerahs = MasterDaerah::all();

        // if($request->ajax()) {

        //     $skpak = SkpakStandardPenilaian::all()

        //     return Datatables::of($skpak)
        //         ->editColumn('nama_institusi', function ($skpak) {
        //             $alamats = '';
        //             $alamats .= '<p class="fw-bolder>'. $skpak->nama_taska .'</p>';
        //             $alamats .= '<p>'. $skpak->alamat_1 .'</p>';
        //             $alamats .= '<p>'. $skpak->alamat_2 .'</p>';
        //             $alamats .= '<p>'. $skpak->alamat_3 .'</p>';
        //             $alamats .= '<p>'. $skpak->poskod . ', ' . $skpak->daerah .  ', ' . $skpak->negeri . '</p>';

        //             return $alamats;
        //         })
        //         ->editColumn('star_rating', function ($skpak) {
        //             $stars = '';
        //             $stars .= '<div class="d-flex justify-content-center align-items-center">';

        //             // Looping star starts here
        //             $stars .= '<i class="fa fa-star text-primary" aria-hidden="true"></i>';
        //             // Ends here

        //             $stars .= '</div>';

        //             return $stars;
        //         })
        //         ->editColumn('tarikh_luput', function ($skpak) {
        //             return $skpak->tarikh_luput;
        //         })
        //         ->editColumn('status', function ($skpak) {
        //             return $skpak->status;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('dashboard.dashboard_skpak', compact('states','daerahs'));
    }
}
