<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master\MasterState;
use App\Models\ButiranPemeriksaanSkips;
use App\Models\ButiranInstitusiSkips;
use App\Models\ItemStandardQualitySkips;
use App\Models\PengerusiPengetuaGuru;
use App\Models\SkipsInstitusiPendidikan;
use App\Models\UlasanKeseluruhanPemeriksaanSkips;
use App\Models\InstrumenSkpakSpksIkeps;
use App\Models\Module;
use App\Models\MasterAction;
use App\Models\ModuleStatus;

use App\Helpers\FMF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PengurusanSkipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangSkipsBaru(Request $request, $id = null, $type = null) {
        $negeris = MasterState::all();
        $allInstitutes = SkipsInstitusiPendidikan::pluck('nama','id');
        $butiran_id = $id;
        if ($type == 'laporan') {
            $disabled = 'disabled';
            $readonly = 'readonly';
        } else {
            $disabled = $readonly = '';
        }

        $status = null;
        return view ('skips.index', compact('negeris', 'butiran_id', 'type', 'allInstitutes', 'status', 'disabled', 'readonly'));
         
    }

    public function FmfView(Request $request, $id = null){
        $negeris = MasterState::all();
        $allInstitutes = SkipsInstitusiPendidikan::pluck('nama','id');
        $butiran_id = $id;
        if (!empty($butiran_id)) {
            $butiranInstitusi = ButiranInstitusiSkips::where('id', $butiran_id)->first();
            if (empty($butiranInstitusi)) {
                return redirect()->route('skips.skips_baru');
            }
            $item = ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_id)->first();
        }

        // get it from the fmf
        // // get skips instrumen configuration id
        $DynamicFormData = InstrumenSkpakSpksIkeps::where('type','skips')->where('status',1)->first();
        $moduleId = Module::where('module_name',$DynamicFormData->id)->first();
        $dynamicModuleId = $moduleId->id;
        $canView = FMF::checkPermission($dynamicModuleId, $item->status, 'view form');
        $canVerify = FMF::checkPermission($dynamicModuleId, $item->status, 'verify form');
        $canApprove = FMF::checkPermission($dynamicModuleId, $item->status, 'approve form');
        $canQuery = FMF::checkPermission($dynamicModuleId, $item->status, 'query');
        $canReject = FMF::checkPermission($dynamicModuleId, $item->status, 'reject');
        $status = $item->statuses->status_description;
        if ($status == 'Telah dihantar') {
            $type = 'verfikasi';
        }
        if ($status == 'Menunggu Validasi' && $canApprove) {
            $type = 'validasi';
        }else{
            $type = 'verfikasi';
        }
        if ($status == 'done') {
            $type = 'done';
        }
        return view ('skips.fmf.index', compact('negeris', 'butiran_id', 'type', 'allInstitutes', 'status', 'canView','canVerify', 'canApprove'));
    }

    public function chooseInstituteDetails(Request $request)
    {
        $id = $request->id;
        $institute = SkipsInstitusiPendidikan::where('nama', $id)->first();
        return ['success' => true, 'data' => $institute];
    }

    public function RingkasanSkips(Request $request){
        return view ('skips.ringkasan_skips');
    }

    public function store(Request $request, $tab) {
        $input = $request->input();
        $tabsarray = ['pengurusan_institusi', 'penubuhan_pendaftaran', 'pengurusan_kurikulum', 'pengajaran','pengurusan_penilaian', 'pengurusan_pembangunan_guru','displin', 'piawaian', 'kebersihan', 'pengurusan_pelajar_antarabangsa'];

        DB::beginTransaction();
        try {
            if ($tab == 'butiran_pemeriksaan') {
                if (isset($input['instrumen_id']) && !empty($input['instrumen_id'])) {
                    $butiran = ButiranPemeriksaanSkips::where('instrumen_id', $input['instrumen_id'])->first();
                    $item = ItemStandardQualitySkips::where('butiran_institusi_id', $input['instrumen_id'])->first();
                    // get next status from the module->status
                    $butiranInstitusi = ButiranInstitusiSkips::where('id',$input['instrumen_id'])->first();
                    $moduleId = Module::where('module_name', $butiranInstitusi->instrumen_skips_id)->first();
                    $nextStatus = FMF::getNextStatus($moduleId->id, $item->status, 'success');

                    $item->status = $nextStatus;
                    $item->save();

                    if (empty($butiran)) {
                        $butiran = new ButiranPemeriksaanSkips;
                        $butiran = $butiran->create($input);
                    } else {
                        $butiran->update($input);
                    }
                } else {
                    $butiran = new ButiranPemeriksaanSkips;
                    $butiran = $butiran->create($input);
                }
                DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $butiran]);
            } elseif($tab == 'butiran_institusi') {
                // update the configiuration instrumen id
                // get active configuration id
                $instrument = InstrumenSkpakSpksIkeps::where('type', 'SKIPS')->where('status',1)->orderBy('id','desc')->get();
                foreach ($instrument as $key => $value) {
                    $moduleId = Module::where('module_name', $value->id)->first();
                    if ($moduleId) {
                        $input['instrumen_skips_id'] = $value->id;
                    }
                }

                if (!isset($input['instrumen_skips_id'])) {
                    return response()->json(['title' => 'Gagal', 'status' => 'error', 'message' => "Aliran dinamik tidak ditakrifkan", 'detail' => "Aliran dinamik tidak ditakrifkan", 'data' => '']);
                }

                if (isset($input['butiranInstitusi_id']) && !empty($input['butiranInstitusi_id'])) {
                    $butiran = ButiranInstitusiSkips::where('id', $input['butiranInstitusi_id'])->first();
                    unset($input['butiranInstitusi_id']);
                    $butiranupdate = $butiran->update($input);
                } else {
                    $butiran = new ButiranInstitusiSkips;
                    $butiran = $butiran->create($input);
                    $item = new ItemStandardQualitySkips;
                    // get next status
                    // get next status from the module->status
                    $moduleId = Module::where('module_name', $input['instrumen_skips_id'])->first();
                    $moduleStatus  = ModuleStatus::where('status_index', 1)->where('module_id', $moduleId->id)->first();
                    $item->status = $moduleStatus->id;
                    $item->butiran_institusi_id = $butiran->id;
                    $item->save();
                }
            DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $butiran]);

            } elseif(in_array($tab, $tabsarray)) {
                if (isset($input['butiran_institusi_id']) && !empty($input['butiran_institusi_id'])) {
                    $item = ItemStandardQualitySkips::where('butiran_institusi_id', $input['butiran_institusi_id'])->first();
                    $data[$tab] = json_encode($input);
                    if($input['usertype'] == 'verfikasi') {
                        unset($input['usertype']);
                        unset($data[$tab]);
                        // $data['status'] = 2;
                        $data[$tab.'_verfikasi'] = json_encode($input);

                        $formfilled = true;
                        // getnext status
                        foreach ($tabsarray as $value) {
                            $key = $value.'_verfikasi';
                            if ($key == $tab.'_verfikasi') {
                                continue;
                            } else {
                                if (empty($item->$key)) {
                                    $formfilled = false;
                                }
                            }
                        }

                        if ($formfilled) {
                            $butiranInstitusi = ButiranInstitusiSkips::where('id', $input['butiran_institusi_id'])->first();
                            $moduleId = Module::where('module_name', $butiranInstitusi->instrumen_skips_id)->first();
                            $nextStatus = FMF::getNextStatus($moduleId->id, $item->status, 'success');

                            // $data['status'] = $nextStatus;
                        }
                    }

                    if(isset($input['usertype'] ) && $input['usertype'] == 'borang') {
                        unset($input['usertype']);
                        $formfilled = true;

                        // getnext status
                        // we need to skips the antarbangsa if jenis_ips has selcted values
                        foreach ($tabsarray as $value) {
                            if ($value == $tab) {
                                continue;
                            } else {
                                if (empty($item->$value)) {
                                    $formfilled = false;
                                }
                            }
                        }
                        if ($formfilled) {
                            $butiranInstitusi = ButiranInstitusiSkips::where('id', $input['butiran_institusi_id'])->first();
                            $moduleId = Module::where('module_name', $butiranInstitusi->instrumen_skips_id)->first();
                            $nextStatus = FMF::getNextStatus($moduleId->id, $item->status, 'success');

                            $data['status'] = $nextStatus;
                        }
                    }

                    $data['butiran_institusi_id'] = $input['butiran_institusi_id'];

                    if (!empty($item)) {
                        $itemupdate = $item->update($data);
                    } else {
                        $item = new ItemStandardQualitySkips;
                        $item = $item->create($data);
                    }
                }
                DB::commit();
                return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $item]);
            } elseif ($tab == 'ulasan') {
                if (isset($input['butiran_institusi_id']) && !empty($input['butiran_institusi_id'])) {
                    $ulasan = UlasanKeseluruhanPemeriksaanSkips::where('butiran_institusi_id', $input['butiran_institusi_id'])->first();
                    if(!empty($ulasan)) {
                        $uslasanUpdate = $ulasan->update($input);
                    } else {
                        $ulasan = new UlasanKeseluruhanPemeriksaanSkips;
                        $ulasan = $ulasan->create($input);
                    }
                } else {
                    $ulasan = new UlasanKeseluruhanPemeriksaanSkips;
                    $ulasan = $ulasan->create($input);
                }
                $item = ItemStandardQualitySkips::where('butiran_institusi_id', $input['butiran_institusi_id'])->first();
                 // get next status from the module->status
                $butiranInstitusi = ButiranInstitusiSkips::where('id',$input['butiran_institusi_id'])->first();
                $moduleId = Module::where('module_name', $butiranInstitusi->instrumen_skips_id)->first();
                $nextStatus = FMF::getNextStatus($moduleId->id, $item->status, 'success');

                $item->status = $nextStatus;
                $item->save();

                DB::commit();
                return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $ulasan]);
            }
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
    }

    // View Senarai Borang Instrumen Telah Dijawab
    public function SenaraiSkips(Request $request){
        $DynamicFormData = InstrumenSkpakSpksIkeps::where('type','skips')->where('status',1)->first();
        if ($request->segment('2') == 'verfikasi') {
            $status = [1,2];
        } elseif ($request->segment('2') == 'validasi') {
            $status = [3];
        }
        if($request->ajax()) {

            $instrumentListings = ButiranInstitusiSkips::select(['butiran_institusi_id','item_standard_quality_skips.id as item_id', 'butiran_institusi_skips.id as id', 'butiran_institusi_skips.nama_institusi', 'butiran_institusi_skips.nama_pengetua','butiran_institusi_skips.negeri','item_standard_quality_skips.status'])->join('item_standard_quality_skips','item_standard_quality_skips.butiran_institusi_id','=','butiran_institusi_skips.id')
                ->whereIn('item_standard_quality_skips.status', $status);

            return Datatables::of($instrumentListings)
                ->editColumn('nama_institusi', function ($instrument) {
                    return $instrument->nama_institusi;
                })
                ->editColumn('nama_pengetua', function ($instrument) {
                    return $instrument->nama_pengetua;
                })
                ->editColumn('status', function ($instrument) {
                    $item = ItemStandardQualitySkips::where('butiran_institusi_id', $instrument->id)->first();
                    return $item->statuses->status_description;
                })
                ->addColumn('DT_RowIndex', function ($instrument) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('action', function ($instrument) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatInstrumen(' . $instrument->butiran_institusi_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('skips.list');
    }

    public function kemaskiniProfil(Request $request){
        if($request->ajax()) {

            $pengetuaList = PengerusiPengetuaGuru::where('id', '!=', 0);
           if ($request->has('nama_pengguna') && !empty($request->input('nama_pengguna'))) {
               $pengetuaList->where('nama', 'like','%'. $request->input('nama_pengguna'). '%');
           }
           if ($request->has('no_kad') && !empty($request->input('no_kad'))) {
               $pengetuaList->where('no_kp', $request->input('no_kad'));
           }
           if ($request->has('email_peribadi') && !empty($request->input('email_peribadi'))) {
               $pengetuaList->where('email', $request->input('email_peribadi'));
           }

           return Datatables::of($pengetuaList)
               ->editColumn('nama_pengguna', function ($pengetuaList) {
                    return $pengetuaList->nama;
               })
               ->editColumn('no_kad', function ($pengetuaList) {
                    return $pengetuaList->no_kp;
               })
               ->editColumn('email_peribadi', function ($pengetuaList) {
                    return $pengetuaList->email;
               })
               ->editColumn('no_tel', function ($pengetuaList) {
                    return $pengetuaList->no_tel;
               })
                ->editColumn('institusi', function ($pengetuaList) {
                    if($pengetuaList->institusiSkips){
                        $institusi_skips = $pengetuaList->institusiSkips->nama;
                    } else {
                        $institusi_skips = null;
                    }
                    return $institusi_skips;
               })
               ->editColumn('status', function ($pengetuaList) {
                if($pengetuaList->status == 'Menunggu Verifikasi'){
                    $status = '<span class="badge rounded-pill badge-light-info"> '.$pengetuaList->status.' </span>';
                } else {
                    $status = '<span class="badge rounded-pill badge-light-primary"> '.$pengetuaList->status.' </span>';
                }
                    return $status;
                })
               ->editColumn('action', function ($pengetuaList) {
                   $button = "";
                   $button .= '<div class="btn-group " role="group" aria-label="Action">';

                   $button .= '<a onclick="maklumatpengetua(' . $pengetuaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

                    $button .= '<a onclick="maklumatpengetuaEdit(' . $pengetuaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';


                   $button .= "</div>";

                   return $button;
               })
               ->rawColumns(['action'])
               ->make(true);
       }

       return view('pengurusan.pengetua.list');
    }

    public function updateStatus(Request $request)
    {
        $input = $request->input();
        $item = ItemStandardQualitySkips::where('butiran_institusi_id', $input['institusi'])->first();
        if ($item) {
            $item->status = 1;
            $item->save();
        }
        return ['status' => true, 'data' => $item ];
    }

    public function laporanSkips(Request $request)
    {
        if($request->ajax()){
            $institutions = ButiranInstitusiSkips::with([
                'itemStandardKualiti' => function ($query) {
                    $query->whereNotNull('status');
                    $query->whereHas('statuses', function ($query) {
                        $query->whereNotIn('status_name', ['draft', 'Telah dihantar']);
                    });
                },
                'institusiPendidikan'
            ])
            ->get()
            ->filter(function ($item) {
                // Check if itemStandardKualiti relationship exists and is not empty
                return optional($item->itemStandardKualiti)->count() > 0;
            });

            return Datatables::of($institutions)
                ->addColumn('DT_RowIndex', function ($institutions) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('nama_institusi', function ($institutions) {
                    return $institutions->institusiPendidikan->nama;
                })
                ->editColumn('nama_pengetua', function ($institutions) {
                    return $institutions->institusiPendidikan->nama_pengetua_gurubesar;
                })
                ->editColumn('ppd', function ($institutions) {
                    return $institutions->institusiPendidikan->ppd;
                })
                ->editColumn('status', function ($institutions) {
                    return $institutions->itemStandardKualiti->statuses->status_description;
                })
                ->editColumn('action', function ($institutions) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="downloadDemografi(' . $institutions->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-file text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('skips.laporan');
    }

    public function downloadDemografi(Request $request)
    {
        $institusi = ButiranInstitusiSkips::with([
            //'itemStandardKualiti',
            'institusiPendidikan'
        ])->find($request->institusi_id);

        //$itemStandardKualiti = $institusi->itemStandardKualiti;
        $institusiPendidikan = $institusi->institusiPendidikan;
        return view('pdf.borang_demografi_skips', compact('institusi', 'institusiPendidikan'));
    }

    // Modul tambah/kemaskini institusi
    public function SenaraiInstitusi(Request $request){

        if($request->ajax()) {

            $institusi = SkipsInstitusiPendidikan::where('id', '!=', 0);

           return Datatables::of($institusi)
               ->editColumn('no_perakuan', function ($institusi) {
                   return $institusi->no_perakuan;
               })
               ->editColumn('nama', function ($institusi) {
                   return $institusi->nama;
               })
               ->editColumn('alamat', function ($institusi) {
                    $alamats = '';
                    $alamats .= '<p>'. $institusi->alamat .'</p>';
                    $alamats .= '<p>'. $institusi->alamat_2 .'</p>';
                    $alamats .= '<p>'. $institusi->alamat_3 .'</p>';
                    $alamats .= '<p>'. $institusi->poskod . ', ' . $institusi->daerah .  ', ' . $institusi->negeri . '</p>';

                    return $alamats;
               })
               ->editColumn('jenis', function ($institusi) {
                   return $institusi->jenis;
               })
               ->editColumn('status', function ($institusi) {
                if($institusi->status == 'beroperasi'){
                    $status = '<span class="badge rounded-pill badge-light-primary"> Beroperasi </span>';
                } else if($institusi->status == 'tidak_beroperasi'){
                    $status = '<span class="badge rounded-pill badge-light-warning"> Tidak Beroperasi </span>';
                } else {
                    $status = '<span class="badge rounded-pill badge-light-danger"> Tutup </span>';
                }
                return $status;
                })
               ->editColumn('action', function ($institusi) {
                   $button = "";
                   $button .= '<div class="btn-group " role="group" aria-label="Action">';

                   $button .= '<a onclick="maklumatInstitusi(' . $institusi->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

                    $button .= '<a onclick="maklumatmaklumatInstitusiEdit(' . $institusi->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';


                   $button .= "</div>";

                   return $button;
               })
               ->rawColumns(['action'])
               ->make(true);
       }

        return view('skips.pengurusan_institusi.senarai_institusi');
    }

    public function InstitusiBaru(){
        return view('skips.pengurusan_institusi.institusi_baru');
    }

    public function saveInstitusi(Request $request){
        DB::beginTransaction();
        try {

            $input = $request->input();
			if (array_key_exists('pengetua_id', $input)) {
            	$institusi = SkipsInstitusiPendidikan::where('id', $input['institusi_id'])->first();
            	unset($input['institusi_id']);

            	$institusi->update($input);
            } else {
            	$institusi = new SkipsInstitusiPendidikan;
        		$institusi->create($input);
            }

          DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => true, 'message' => "Berjaya", 'detail' => "berjaya"]);
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
    }

    public function DashboardSkips(Request $request){

        if($request->ajax()) {

            $instrumentListings = InstrumenSkpakSpksIkeps::where('type', 'SKIPS');

            return Datatables::of($instrumentListings)
                ->editColumn('nama_instrumen', function ($instrument) {
                    return $instrument->nama_instrumen;
                })
                ->addColumn('DT_RowIndex', function ($instrument) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('action', function ($instrument) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatDashboard(' . $instrument->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view ('dashboard.dashboard_skips');
    }

    public function SenaraiSkipsInstitusi(Request $request) {
        // link fmf
        if($request->ajax()) {

            $instrumentListings = ButiranInstitusiSkips::select(['butiran_institusi_id','item_standard_quality_skips.id as item_id', 'butiran_institusi_skips.id as id', 'butiran_institusi_skips.nama_institusi', 'butiran_institusi_skips.nama_pengetua','butiran_institusi_skips.negeri','item_standard_quality_skips.status'])->join('item_standard_quality_skips','item_standard_quality_skips.butiran_institusi_id','=','butiran_institusi_skips.id')->where('item_standard_quality_skips.status', '!=' , null);

            return Datatables::of($instrumentListings)
                ->editColumn('nama_institusi', function ($instrument) {
                    return $instrument->nama_institusi;
                })
                ->editColumn('nama_pengetua', function ($instrument) {
                    return $instrument->nama_pengetua;
                })
                ->editColumn('status', function ($instrument) {
                    $item = ItemStandardQualitySkips::where('id', $instrument->item_id)->first();
                    if ($item->statuses?->status_description == 'done') {
                        return 'Selesai';
                    } else {
                        return $item->statuses?->status_description;
                    }
                })
                ->addColumn('DT_RowIndex', function ($instrument) {
                    static $index = 1;
                    return $index++;
                })
                 ->addColumn('document', function ($instrumenList) {
                    $button = '<a onclick="#" class="btn btn-xs btn-default" title="">Document<i class="fas fa-download text-primary"></i></a>';

                    return $button;
                })
                ->editColumn('action', function ($instrument) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';
                    $item = ItemStandardQualitySkips::where('id', $instrument->item_id)->first();
                    if ($item->statuses?->status_description == 'done') {
                        $button .= '<a onclick="maklumatInstrumen(' . $instrument->butiran_institusi_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-search text-primary"></i></a>';
                    } else {
                        $button .= '<a onclick="maklumatInstrumen(' . $instrument->butiran_institusi_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';
                    }


                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action', 'document'])
                ->make(true);
        }

        return view('skips.pengurusan_institusi.senarai_skips_institusi');
    }

    

    public function SenaraiSkipsInstitusiSekolah(Request $request) {

        return view('skips.pengurusan_institusi.senarai_skips_institusi_sekolah');
    }


    public function dashboardInstrumen(Request $request){

        $star = ButiranInstitusiSkips::peratusanBintang($request->instrumen_id);
        $kriteria = ButiranInstitusiSkips::peratusanKriteria($request->instrumen_id);

        if($request->ajax()){
            if($request->table == '1'){
                $states = MasterState::whereNot('code', '00')->get();

                $dataNegeri = [];

                foreach($states as $state){
                    if($state->name == 'Wilayah Persekutuan Kuala Lumpur' || $state->name == 'Wilayah Persekutuan Labuan' || $state->name == 'Wilayah Persekutuan Putrajaya'){
                        $negeri = strtoupper(str_replace('Wilayah Persekutuan', 'WP', $state->name));
                    }  else {
                        $negeri = strtoupper($state->name);
                    }

                    $bilInstitusi = count(SkipsInstitusiPendidikan::where('negeri', $negeri)->get());

                    $dataNegeri[$negeri] = [
                        'negeri' => $state->name,
                        'bil_institusi' => $bilInstitusi,
                    ];
                }

                return Datatables::of($dataNegeri)
                ->addColumn('DT_RowIndex', function ($dataNegeri) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('negeri', function ($dataNegeri) {
                    return $dataNegeri['negeri'];
                })
                ->editColumn('bil_institusi', function ($dataNegeri) {
                    return $dataNegeri['bil_institusi'];
                })
                ->make(true);
            }
            if($request->table == '2'){
                $instrumen = ButiranInstitusiSkips::with([
                    'itemStandardKualiti' => function ($query) {
                        $query->whereNotNull('status');
                        $query->whereHas('statuses', function ($query) {
                            $query->whereNot('status_name', 'draft');
                        });
                    },
                    'institusiPendidikan'
                ])
                ->where('instrumen_skips_id', $request->instrumen_id)
                ->get()
                ->filter(function ($item) {
                    // Check if itemStandardKualiti relationship exists and is not empty
                    return optional($item->itemStandardKualiti)->count() > 0;
                })
                ->groupBy(function ($item) {
                    return $item->institusiPendidikan->negeri;
                });

                $states = MasterState::whereNot('code', '00')->get();

                $dataNegeri = [];
                $negeri = null;
                foreach($states as $state){
                    if($state->name == 'Wilayah Persekutuan Kuala Lumpur' || $state->name == 'Wilayah Persekutuan Labuan' || $state->name == 'Wilayah Persekutuan Putrajaya'){
                        $negeri = strtoupper(str_replace('Wilayah Persekutuan', 'WP', $state->name));
                    }  else {
                        $negeri = strtoupper($state->name);
                    }

                    $bilInstitusi = count(SkipsInstitusiPendidikan::where('negeri', $negeri)->get());

                    if(array_key_exists($negeri, $instrumen->toArray())){
                        $bilHantar = count($instrumen[$negeri]);
                        $bilVerifikasi = 0;
                        foreach($instrumen[$negeri] as $instrumenNegeri){
                            if($instrumenNegeri->itemStandardKualiti->statuses->status_name == 'done'){
                                $bilVerifikasi++;
                            }
                        }
                    } else {
                        $bilHantar = 0;
                        $bilVerifikasi = 0;
                    }

                    $dataNegeri[$negeri] = [
                        'negeri' => $state->name,
                        'bil_institusi' => $bilInstitusi,
                        'bil_hantar' => $bilHantar,
                        'bil_belum_hantar' => $bilInstitusi - $bilHantar,
                        'bil_verifikasi' => $bilVerifikasi,
                    ];
                }

                return Datatables::of($dataNegeri)
                ->addColumn('DT_RowIndex', function ($dataNegeri) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('negeri', function ($dataNegeri) {
                    return $dataNegeri['negeri'];
                })
                ->editColumn('bil_institusi', function ($dataNegeri) {
                    return $dataNegeri['bil_institusi'];
                })
                ->editColumn('bil_hantar', function ($dataNegeri) {
                    return $dataNegeri['bil_hantar'];
                })
                ->editColumn('bil_belum_hantar', function ($dataNegeri) {
                    return $dataNegeri['bil_belum_hantar'];
                })
                ->editColumn('bil_verifikasi', function ($dataNegeri) {
                    return $dataNegeri['bil_verifikasi'];
                })
                ->make(true);
            }
            if($request->table == '4'){
                $tabs = config('staticdata.skips.name');
                // $test = 'kelulusan_penubuhan';
                // return config('staticdata.skips.name.penubuhan_pendaftaran');
                //unset($tab['name']);
                $dataTab = [];
                for($i=0;$i<count($tabs);$i++){
                    $dataTab[$i] = [
                        'name' => $tabs[$i]
                    ];
                }
                return Datatables::of($dataTab)
                ->addColumn('DT_RowIndex', function ($tab) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('name', function ($dataTab) {
                    return $dataTab['name'];
                })
                ->editColumn('percentage', function ($dataTab) use ($kriteria) {
                    static $index = 1;
                    return $kriteria[$index++];
                })
                ->make(true);
            }
        }

        return view ('dashboard.dashboard_instrumen', compact('star', 'kriteria'));
    }

    public function BorangSkipsSekolahBaru(Request $request)
    {
        $states = MasterState::all();
        return view('skips.borang_skips_sekolah.index', compact('states'));
    }

}
