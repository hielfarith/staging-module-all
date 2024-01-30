<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master\MasterState;
use App\Models\ButiranPemeriksaanSkips;
use App\Models\ButiranInstitusiSkips;
use App\Models\ItemStandardQualitySkips;
use App\Models\PengerusiPengetuaGuru;
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

            } elseif(in_array($tab, ['pengurusan_institusi', 'penubuhan_pendaftaran', 'pengurusan_kurikulum', 'pengajaran','pengurusan_penilaian', 'pengurusan_pembangunan_guru','displin', 'piawaian', 'kebersihan'])) {
                if (isset($input['butiran_institusi_id']) && !empty($input['butiran_institusi_id'])) {
                    $item = ItemStandardQualitySkips::where('butiran_institusi_id', $input['butiran_institusi_id'])->first();
                    $data[$tab] = json_encode($input);
                    if($input['usertype'] == 'verfikasi') {
                        unset($input['usertype']);
                        unset($data[$tab]);
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
            }
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
    }

    // View Senarai Borang Instrumen Telah Dijawab
    public function SenaraiSkips(Request $request){

        if($request->ajax()) {
            $instrumentListings = ButiranInstitusiSkips::select(['butiran_institusi_id','item_standard_quality_skips.id as item_id', 'butiran_institusi_skips.id as id', 'butiran_institusi_skips.nama_institusi', 'butiran_institusi_skips.nama_pengetua','butiran_institusi_skips.negeri'])->join('item_standard_quality_skips','item_standard_quality_skips.butiran_institusi_id','=','butiran_institusi_skips.id')
                ->where('item_standard_quality_skips.status',1);

            return Datatables::of($instrumentListings)
                ->editColumn('nama_institusi', function ($instrument) {
                    return $instrument->nama_institusi;
                })
                ->editColumn('nama_pengetua', function ($instrument) {
                    return $instrument->nama_pengetua;
                })
                ->editColumn('negeri', function ($instrument) {
                    return $instrument->negeri;
                })
                ->addColumn('DT_RowIndex', function ($instrument) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('action', function ($instrument) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatInstrumen(' . $instrument->butiran_institusi_id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

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
                   return $pengetuaList->institusi;
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
    public function SenaraiInstitusi(){
        return view('skips.pengurusan_institusi.senarai_institusi');
    }

    public function InstitusiBaru(){
        return view('skips.pengurusan_institusi.institusi_baru');
    }
}
