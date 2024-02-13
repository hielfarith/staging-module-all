<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkpakStandardPenilaian;
use App\Models\InstrumenSkpakSpksIkeps;
use App\Models\Module;
use App\Models\MasterAction;
use App\Models\ModuleStatus;
use App\Models\ProfilPengguna;
use App\Models\SkpakVerfikasiValidasi;

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
        $disabled = '';
        return view ('skpak.index', compact('skpak', 'disabled'));
    }
    public function borangView(Request $request, $id, $type){
        if (!empty($id)) {
            $skpak = SkpakStandardPenilaian::where('id', $id)->first();
        } else {
            $skpak = null;
        }
        if ($type == 'kemaskini') {
            $disabled = '';
        } else {
            $disabled = 'disabled';
        }
        return view ('skpak.index', compact('skpak', 'disabled'));
    }

    public function RingkasanSkpak(Request $request){
        // return view ('skpak.ringkasan_skips');
    }

     public function validasiSkpakSenarai(Request $request)
    {
         if($request->ajax()) {

            $skpak = SkpakStandardPenilaian::select(['profil_pengguna.nama_taska','profil_pengguna.nama_pengguna','skpak_standard_penilaians.status','skpak_standard_penilaians.id as skpak_id'])->join('profil_pengguna','profil_pengguna.id','=','skpak_standard_penilaians.nama_taska')->where('skpak_standard_penilaians.status','=',3);

            return Datatables::of($skpak)
                ->editColumn('nama_taska', function ($skpak) {
                    return $skpak->nama_taska;
                })
                ->editColumn('nama_pengguna', function ($skpak) {
                    return $skpak->nama_pengguna;
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

                    $button .= '<a onclick="maklumatSkpak(' . $skpak->skpak_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSkpakValidasi(' . $skpak->skpak_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('skpak.list');
    }
    public function ValidasiSkpak (Request $request, $id) {
        $skpakfilleddata = SkpakVerfikasiValidasi::where('skpak_standard_penilaian_id',$id)->first();
        $disabled = 'disabled';
        return view('skpak.index_validasi', compact('id', 'skpakfilleddata', 'disabled'));
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
            $skpak = SkpakStandardPenilaian::where('id', $request->id)->first();
            $skpak->status = 2;
            $skpak->save();
        }
        return ['success' => true];
    }

    public function SenaraiSkpak(Request $request)
    {
         if($request->ajax()) {

            $skpak = SkpakStandardPenilaian::select(['profil_pengguna.nama_taska','profil_pengguna.nama_pengguna','skpak_standard_penilaians.status','skpak_standard_penilaians.id as skpak_id'])->join('profil_pengguna','profil_pengguna.id','=','skpak_standard_penilaians.nama_taska');

            return Datatables::of($skpak)
                ->editColumn('nama_taska', function ($skpak) {
                    return $skpak->nama_taska;
                })
                ->editColumn('nama_pengguna', function ($skpak) {
                    return $skpak->nama_pengguna;
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

                    $button .= '<a onclick="maklumatSkpak(' . $skpak->skpak_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSkpakEdit(' . $skpak->skpak_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('skpak.list');
    }

    public function verfikasiSkpakSenarai(Request $request)
    {
         if($request->ajax()) {

            $skpak = SkpakStandardPenilaian::select(['profil_pengguna.nama_taska','profil_pengguna.nama_pengguna','skpak_standard_penilaians.status','skpak_standard_penilaians.id as skpak_id'])->join('profil_pengguna','profil_pengguna.id','=','skpak_standard_penilaians.nama_taska')->where('skpak_standard_penilaians.status','=',2);

            return Datatables::of($skpak)
                ->editColumn('nama_taska', function ($skpak) {
                    return $skpak->nama_taska;
                })
                ->editColumn('nama_pengguna', function ($skpak) {
                    return $skpak->nama_pengguna;
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

                    $button .= '<a onclick="maklumatSkpak(' . $skpak->skpak_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSkpakverfikasi(' . $skpak->skpak_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('skpak.list');
    }

     public function VerfikasiSkpak (Request $request, $id) {
        $skpakfilleddata = SkpakVerfikasiValidasi::where('skpak_standard_penilaian_id',$id)->first();
        $disabled = '';
        return view('skpak.index_verfikasi', compact('id','skpakfilleddata', 'disabled'));
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

    public function saveVerfiksai(Request $request, $tab)
    {
        if ($tab == 'permarkahan') {
            // update the status to validasi
            $id = $request->skpak_standard_penilaian_id;
            $verfikasi = SkpakVerfikasiValidasi::where('skpak_standard_penilaian_id', $id)->first();
            $verfikasi->status = 2;
            $verfikasi->save();
            $SkpakStandardPenilaian = SkpakStandardPenilaian::where('id',$id)->first();
            $SkpakStandardPenilaian->status = 3;
            $SkpakStandardPenilaian->save();

            return ['success' => true ,'data' => $verfikasi, 'message' => 'verfication done'];
        }

        $tabdata = explode("_", $tab);
        $tabname = $tabdata[0];
        $tabtype = $tabdata[1];
        $input = $request->input();
        $path = [];
        if ($request->file()) {
            foreach ($request->file() as $key1 => $files) {
                foreach ($files as $key => $value) {
                    $filenameWithExt = $value->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $value->getClientOriginalExtension();
                    $fileNameToStore = $filename.'.'.$extension;
                    $path[$key] = $value->storeAs('public/uploads/'.$key1.'/'.$input['skpak_standard_penilaian_id'],$fileNameToStore);
                }
                $input[$key1] = $path;
            }
        }

        $data['skpak_standard_penilaian_id'] = $input['skpak_standard_penilaian_id'];
        unset($input['skpak_standard_penilaian_id']);
        $savedData = SkpakVerfikasiValidasi::where('skpak_standard_penilaian_id', $data['skpak_standard_penilaian_id'])->first();
        if ($savedData) {
            $tabData = $savedData->$tabname;
            $array = [];
            $array[$tabtype] = $input;
            $data[$tabname] = json_encode($array);
            if ($tabData) {

                $existingJson = json_decode($tabData, true);
                $updatedDaata = array_merge($existingJson, $array);
                $data[$tabname] = json_encode($updatedDaata);
            } 
            $verfikasi = $savedData->update($data);
            $verfikasi = $savedData;
        } else {
            $array = [];
            $array[$tabtype] = $input;
            $data[$tabname] = json_encode($array);
             
            $verfikasi = new SkpakVerfikasiValidasi;
            $verfikasi = $verfikasi->create($data);
        }
        $senaraisemak = [];
        if ($tab == 'senaraisemak_ruangluar' || $tab == 'senaraisemak_ruangdalam') {
            $tabData = json_decode($verfikasi->senaraisemak, true);
            $countYa = $countTidak = $countTidakberkenaan = 0;
            foreach ($tabData as $key => $value) {
                if ($tab == 'senaraisemak_ruangluar') {
                    if ($key == 'ruangluar') {
                        foreach ($value as $key1 => $subvalue) {
                            if ($subvalue == 'YA') {
                                $countYa += 1;
                            } elseif ($subvalue == 'TIDAK') {
                                $countTidak += 1;
                            } elseif ($subvalue == 'TIDAK BERKENAAN') {
                                $countTidakberkenaan +=1;
                            }
                       }
                    } else {
                        continue;
                    }
                } 
                if ($tab == 'senaraisemak_ruangdalam') {
                    if ($key == 'ruangdalam') {
                         foreach ($value as $key1 => $subvalue) {
                            if ($subvalue == 'YA') {
                                $countYa += 1;
                            } elseif ($subvalue == 'TIDAK') {
                                $countTidak += 1;
                            } elseif ($subvalue == 'TIDAK BERKENAAN') {
                                $countTidakberkenaan +=1;
                            }
                       }
                   } else {
                    continue;
                   }
                }

                $total = $countYa+$countTidak;

                $percentage = round($countYa / $total *100);

                if ($percentage <= 0) {
                    $rubik = 0;
                } elseif($percentage > 0 && $percentage <= 40) {
                    $rubik = 1;
                 } elseif($percentage > 40 && $percentage <= 80) {
                    $rubik = 2;
                } elseif($percentage > 80 && $percentage <= 99) {
                    $rubik = 3;
                } elseif($percentage > 99) {
                    $rubik = 4;
                } else {
                    $rubik = '-';
                }
                $senaraisemak = [
                    'countYa' => $countYa,
                    'countTidak' => $countTidak,
                    'countTidakberkenaan' => $countTidakberkenaan,
                    'rubik' => $rubik,
                    'percentage' => $percentage
                ];     
             } 

        }
        return ['success' => true ,'data' => $verfikasi, 'senaraisemak' => $senaraisemak];
    }

    public function GetTabJumlahVerfikasi(Request $request)
    {
        $verficationData = SkpakVerfikasiValidasi::where('skpak_standard_penilaian_id', $request->id)->first();
        $tabname = $request->tabname;
        $array = [];
        $totalValue = 0;
        $ulasan = '';
        if ($verficationData) {
            $tabData = $verficationData->$tabname;
            if ($tabData) {
                $tabData = json_decode($tabData, true);
                if (array_key_exists('jumlah', $tabData)) {
                    $ulasan = $tabData['jumlah']['ulasan'];
                }
                foreach ($tabData as $key1 => $value) {
                    $array[$key1] = 0;
                    foreach ($value as $key => $subtab) {
                        if (str_contains($key, 'upload') || str_contains($key, 'catatan') || str_contains($key, 'ulasan')) { 
                            continue;
                        }
                        $array[$key1] += $subtab;
                    }
                }
                foreach ($array as $key => $value) {
                    $totalValue += $value;
                }
            }
        }
        $id = $request->id;
        if ($tabname == 'itemcq1') {
            return view('skpak.validasi_skpak.cq1.jumlah', compact('array', 'tabData', 'totalValue', 'id', 'ulasan'));
        } elseif ($tabname == 'itemcq2') {
            return view('skpak.validasi_skpak.cq2.jumlah', compact('array', 'tabData', 'totalValue' , 'id', 'ulasan'));
        } elseif ($tabname == 'itemcq3') {
            return view('skpak.validasi_skpak.cq3.jumlah', compact('array', 'tabData', 'totalValue' , 'id', 'ulasan'));
        } elseif ($tabname == 'itemcq4') {
            return view('skpak.validasi_skpak.cq4.jumlah', compact('array', 'tabData', 'totalValue' , 'id', 'ulasan'));
        } elseif ($tabname == 'itemcq5') {
            return view('skpak.validasi_skpak.cq5.jumlah', compact('array', 'tabData', 'totalValue' , 'id', 'ulasan'));
        } 
    }

    public function GetJumlahSkor(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        if ($type == 'verfikasi') {
            $disabled = '';
        } else {
            $disabled = 'disabled';
        }
        $array = [];
        $skpak = null;
        $tabs = ['itemcq1', 'itemcq2', 'itemcq3', 'itemcq4', 'itemcq5'];
        $skpak_standard_penilaian_id = $request->id;
        if ($id) {
            $skpak = SkpakVerfikasiValidasi::where('skpak_standard_penilaian_id', $request->id)->first();
            if (!empty($skpak)) {
                foreach ($tabs as  $tab) {
                    if ($skpak->$tab) {                    
                        $tabData = json_decode($skpak->$tab, true);
                        foreach ($tabData as $key => $value) {
                            if (str_contains($key, 'jumlah') ) {
                                continue;
                            }
                            $val = 0;
                            foreach ($value as $key1 => $sq) {
                                if (str_contains($key1, 'upload') || str_contains($key1, 'catatan') || str_contains($key1, 'jumlah')){ 
                                    continue;
                                }
                                $array[$tab][$key] = $val+$sq;
                                $val = $array[$tab][$key] ;
                            }
                        }
                    } else {
                        $array[$tab] = null;
                    }
                }
            }
        }
        $totalSkor = [];
        foreach ($array as $key2 => $value) {
            $val = 0;
            if (is_array($value)) {
                foreach ($value as $key => $data) {
                    $totalSkor[$key2] = $val+$data;
                    $val =  $totalSkor[$key2];                   
                }
            } else {
                $totalSkor[$key2] =  0;
            }
        }
        $finalskore = 0;
        foreach ($totalSkor as $key => $value) {
            $finalskore += $value;
        }
        $percentage = round($finalskore / 296 *100);
        $penilai = SkpakStandardPenilaian::where('id', $request->id)->first();
        $getConfiguration = InstrumenSkpakSpksIkeps::where('id', $penilai->instrument_id)->first();
        
        $startDate = $getConfiguration->tarikh_kuatkuasa;
        $startDate = str_replace('/', '-', $startDate);
        
        $addpengisian = $getConfiguration->tempoh_pengisian_lain;
        if ($getConfiguration->tempoh_pengisian == 'Bulan') {
            //add weeks
            $verficationStartDate = date('Y-m-d', strtotime('+'.$addpengisian.' week', strtotime($startDate)));
        } else {
            $verficationStartDate = date('Y-m-d', strtotime('+'.$addpengisian.' month', strtotime($startDate)));
        }        

        $addpengeshan = $getConfiguration->tempoh_pengisian_lain;
        if ($getConfiguration->tempoh_pengeshan == 'Bulan') {
            //add weeks
            $verficationStartDate = date('Y-m-d', strtotime('+'.$addpengeshan.' week', strtotime($verficationStartDate)));
        } else {
            $verficationStartDate = date('Y-m-d', strtotime('+'.$addpengeshan.' month', strtotime($verficationStartDate)));
        }    
        //add 2 weeks 
        $verficationdateAfter2weeks = date('Y-m-d', strtotime('+2 weeks', strtotime($verficationStartDate)));
        //add 4 weeks 
        $verficationdateAfter4weeks = date('Y-m-d', strtotime('+4 weeks', strtotime($verficationStartDate)));
       $currentdate = strtotime(date('Y-m-d'));
       $color = 'btn-success';
       if ($currentdate >= strtotime($verficationStartDate) && $currentdate <= $verficationdateAfter2weeks) {
            $color = 'btn-success';
       }
       if ($currentdate > $verficationdateAfter2weeks && $currentdate < $verficationdateAfter4weeks) {
            $color = 'btn-warning';
       }
       if ($currentdate > $verficationdateAfter4weeks) {
            $color = 'btn-danger';
       }

        return view('skpak.validasi_skpak.permarkahan', compact('array', 'totalSkor', 'finalskore', 'percentage', 'skpak_standard_penilaian_id', 'color'));
    }
}
