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

    public function BorangSkipsBaru(Request $request, $id = null){
        $negeris = MasterState::all();
        $butiran_id = $id;
        if (!empty($butiran_id)) {
            $butiranInstitusi = ButiranInstitusiSkips::where('id', $butiran_id)->first();
            if (empty($butiranInstitusi)) {
                return redirect()->route('skips.skips_baru');
            }
        }
        $type = $request->segment(2);
        return view ('skips.index', compact('negeris', 'butiran_id', 'type'));
    }

    public function RingkasanSkips(Request $request){
        return view ('skips.ringkasan_skips');
    }

    public function store(Request $request, $tab) {
        $input = $request->input();
        DB::beginTransaction();
        try {
            if ($tab == 'butiran_pemeriksaan') {
                if (isset($input['instrumen_id']) && !empty($input['instrumen_id'])) {
                    $butiran = ButiranPemeriksaanSkips::where('instrumen_id', $input['instrumen_id'])->first();
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
                if (isset($input['butiranInstitusi_id']) && !empty($input['butiranInstitusi_id'])) {
                    $butiran = ButiranInstitusiSkips::where('id', $input['butiranInstitusi_id'])->first();
                    unset($input['butiranInstitusi_id']);
                    $butiran = $butiran->update($input);
                } else {
                    $butiran = new ButiranInstitusiSkips;
                    $butiran = $butiran->create($input);
                }

            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'data' => $butiran]);

            } elseif(in_array($tab, ['pengurusan_institusi', 'penubuhan_pendaftaran', 'pengurusan_kurikulum', 'pengajaran','pengurusan_penilaian', 'pengurusan_pembangunan_guru','displin', 'piawaian', 'kebersihan', 'pengurusan_pelajar_antarabangsa'])) {
                if (isset($input['butiran_institusi_id']) && !empty($input['butiran_institusi_id'])) {
                    $item = ItemStandardQualitySkips::where('butiran_institusi_id', $input['butiran_institusi_id'])->first();
                    $data[$tab] = json_encode($input);
                    if($input['usertype'] == 'verfikasi') {
                        unset($input['usertype']);
                        unset($data[$tab]);
                        $data['status'] = 2;
                        $data[$tab.'_verfikasi'] = json_encode($input);
                    }
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
            } elseif ($tab == 'ulasan') {
                if (isset($input['butiran_institusi_id']) && !empty($input['butiran_institusi_id'])) {
                    $ulasan = UlasanKeseluruhanPemeriksaanSkips::where('butiran_institusi_id', $input['butiran_institusi_id'])->first();
                    if(!empty($ulasan)) {
                        $ulasan->update($input);
                    } else {
                        $ulasan = new UlasanKeseluruhanPemeriksaanSkips;
                        $ulasan = $ulasan->create($input);
                    }
                } else {
                    $ulasan = new UlasanKeseluruhanPemeriksaanSkips;
                    $ulasan = $ulasan->create($input);
                }
                $item = ItemStandardQualitySkips::where('butiran_institusi_id', $input['butiran_institusi_id'])->first();
                $item->status = 3;
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
        if ($request->segment('2') == 'verfikasi-skips') {
            $status = [1,2];
        } elseif ($request->segment('2') == 'validasi-skips') {
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
                    if ($instrument->status == 1) {
                        return 'Telah dihantar';
                    } elseif ($instrument->status == 2) {
                        return 'Menunggu Validasi';
                    } elseif ($instrument->status == 3) {
                        return 'Menunggu Validasi';
                    }
                    return $instrument->status;
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
        // $tables = ButiranInstitusiSkips::get()->groupBy('negeri');

        // $data = [];

        // foreach($tables as $key => $table){
        //     foreach($table as $list){
        //         return $list;
        //     }
        // }
        // if($request->type){
        //     if ($request->ajax()) {
        //         if($request->type == 1) {
        //             $table = ButiranInstitusiSkips::groupBy('negeri');
        //         } else if($request->type == 2) {
        //             $table = ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id);
        //         } else if($request->type == 3) {
        //             // $table = ;
        //         }

        //         return Datatables::of($table)
        //             ->editColumn('negeri', function ($table) {
        //                 return $negeri->nama_institusi;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        //     }
        // }
        
        return view ('dashboard.dashboard_skips');
    }
}
