<?php

namespace App\Http\Controllers;

use App\Models\InstrumenSkpakSpksIkeps;
use App\Models\Master\MasterState;
use App\Models\SkipsInstitusiPendidikan;
use App\Models\TetapanAspek;
use App\Models\TetapanItem;
use App\Models\TetapanTarikhInstrumen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

use App\Models\IkepsKemudahanSukan;
use App\Models\Configuration;
use App\Models\IkepsPrasaranaSukan;
use App\Models\IkepsPerancanganSukan;
use App\Models\IkepsStatusPenyertaan;
use App\Models\IkepsProgramSekolah;
use Carbon;
use PDO;

class InstrumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewForm(Request $request)
    {
        if ($request->type == 'instrumen') {

            if (strpos('pentadbir_instrumen', Auth::user()->getRolesDisplay()) !== false || strpos('superadmin', Auth::user()->getRolesDisplay()) !== false) {
                return view('instrumen_update.form');
            } else {
                return response()->json(
                    [
                        'errors' => [
                            'status' => 401,
                            'message' => 'Unthorized',
                        ],
                    ],
                    401
                );
            }
        } elseif ($request->type == 'tetapan-aspek') {
            return view('instrumen_update.tetapan-aspek.form');
        } elseif ($request->type == 'tetapan-item') {
            return view('instrumen_update.tetapan-item.form');
        } elseif ($request->type == 'sedia-ada') {
            $suSukan = User::whereHas('roles', function ($query) {
                $query->where('name', 'setiausaha_sukan');
            })->get();

            $guruBesar = User::whereHas('roles', function ($query) {
                $query->where('name', 'pengetua_guru_besar');
            })->get();

            $tahun = Carbon::now()->format('Y');
            $prasaranaSukan = IkepsPrasaranaSukan::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
            $kemudahanSukan = IkepsKemudahanSukan::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
            $perancanganSukan = IkepsPerancanganSukan::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
            $statusPenyertaan = IkepsStatusPenyertaan::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
            $programSekolah = IkepsProgramSekolah::where('kod_sekolah', 0)->where('tahun', $tahun)->first();

            return view('instrumen_update.sedia-ada.form', compact('suSukan', 'guruBesar', 'prasaranaSukan','kemudahanSukan','perancanganSukan','statusPenyertaan','programSekolah'));
        } elseif ($request->type == 'skips') {
            return view('instrumen_update.skips.form');
        }
    }

    public function saveIkeps(Request $request)
    {
        DB::beginTransaction();
        try {

            $input = $request->input();
            $input['status'] = 1;
            if (!isset($input['type'])) {
                $input['type'] = 'IKEPS';
            }
            if (array_key_exists('instrumen_id', $input) && $input['instrumen_id'] != 0) {
                $instrumenSkpakSpksIkeps = InstrumenSkpakSpksIkeps::where('id', $input['instrumen_id'])->first();
                unset($input['instrumen_id']);
                $instrumenSkpakSpksIkeps = $instrumenSkpakSpksIkeps->update($input);
            } else {
                $instrumenSkpakSpksIkeps = new InstrumenSkpakSpksIkeps;
                $instrumenSkpakSpksIkeps = $instrumenSkpakSpksIkeps->create($input);
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();

        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penggunalist'), 'data' => $instrumenSkpakSpksIkeps]);
    }

    public function listInstrumenIkeps(Request $request)
    {
        if ($request->ajax()) {
            $instrumenList = InstrumenSkpakSpksIkeps::where('id', '!=', 0)->where('type', 'IKEPS');
            if ($request->has('nama_instrumen') && !empty($request->input('nama_instrumen'))) {
                $instrumenList->where('nama_instrumen', 'LIKE', '%' . $request->input('nama_instrumen') . '%');
            }
            if ($request->has('tujuan_instrumen') && !empty($request->input('tujuan_instrumen'))) {
                $instrumenList->where('tujuan_instrumen', 'LIKE', '%' . $request->input('tujuan_instrumen') . '%');
            }
            if ($request->has('pengguna_instrumen') && !empty($request->input('pengguna_instrumen'))) {
                $instrumenList->where('pengguna_instrumen', 'LIKE', '%' . $request->input('pengguna_instrumen') . '%');
            }
            return Datatables::of($instrumenList)
                ->addIndexColumn()
                ->editColumn('nama_instrumen', function ($instrumenList) {
                    return $instrumenList->nama_instrumen;
                })
                ->editColumn('tujuan_instrumen', function ($instrumenList) {
                    return $instrumenList->tujuan_instrumen;
                })
                ->editColumn('pengguna_instrumen', function ($instrumenList) {
                    return $instrumenList->pengguna_instrumen;
                })
                ->editColumn('tarikh_kuatkuasa', function ($instrumenList) {
                    return $instrumenList->tarikh_kuatkuasa;
                })
                ->editColumn('pengisian_oleh', function ($instrumenList) {
                    return $instrumenList->pengisian_oleh;
                })
                ->editColumn('pengesahan_ole', function ($instrumenList) {
                    return $instrumenList->pengesahan_ole;
                })
                ->editColumn('verifikasi_oleh', function ($instrumenList) {
                    return $instrumenList->verifikasi_oleh;
                })
                ->editColumn('validasi_oleh', function ($instrumenList) {
                    return $instrumenList->validasi_oleh;
                })
                ->editColumn('perakuan_oleh', function ($instrumenList) {
                    return $instrumenList->perakuan_oleh;
                })
                ->editColumn('action', function ($instrumenList) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatInstrumen(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatInstrumenEdit(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.list');
    }

    public function viewInstrumenIkeps(Request $request)
    {
        $instrumen = InstrumenSkpakSpksIkeps::where('id', $request->id)->first();
        if ($request->type == 'view') {
            $readonly = 'readonly';
            $disabled = 'disabled';
        } else {
            $readonly = '';
            $disabled = '';
        }

        return view('instrumen_update.view-profile', compact('instrumen', 'readonly', 'disabled'));
    }

     public function viewConfiguration(Request $request)
    {
        if ($request->type == 'view') {
            $readonly = 'readonly';
            $disabled = 'disabled';
        } else {
            $readonly = '';
            $disabled = '';
        }
        $configurationID = $request->id;
        
        return view('instrumen_update.view-configuration', compact('readonly', 'disabled', 'configurationID'));
    }

    // Aspek //

    public function saveAspek(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->input();
            $input['status'] = 1;
            if (array_key_exists('tetapan_aspek_id', $input)) {
                $TetapanAspek = TetapanAspek::where('id', $input['tetapan_aspek_id'])->first();
                unset($input['tetapan_aspek_id']);
                $TetapanAspek->update($input);
            } elseif (array_key_exists('instrumen_id', $input)) {
                $TetapanAspek = TetapanAspek::where('instrumen_id', $input['instrumen_id'])->first();

                if (!empty($TetapanAspek)) {
                    $TetapanAspek->update($input);
                } else {
                    $TetapanAspek = new TetapanAspek;
                    $TetapanAspek->create($input);
                }
            } else {
                $TetapanAspek = new TetapanAspek;
                $TetapanAspek->create($input);
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penggunalist')]);
    }

    public function listTetapanAspek(Request $request)
    {
        $type = 'SKPAK';
        if (request()->route()->getName() == 'admin.instrumen.tetapan-aspek-list') {
            $tetapanAspek = TetapanAspek::where('id', '!=', 0)->where('type', 'SKPAK');
            $type = 'SKPAK';
        }
        if (request()->route()->getName() == 'admin.instrumen.tetapan-aspek-ikeps-list') {
            $tetapanAspek = TetapanAspek::where('id', '!=', 0)->where('type', 'IKEPS');
            $type = 'IKEPS';
        }
        if (request()->route()->getName() == 'admin.instrumen.tetapan-aspek-sub-list') {
            $tetapanAspek = TetapanAspek::where('id', '!=', 0)->where('type', 'SUB');
            $type = 'SUB';
        }

        if ($request->ajax()) {

            if ($request->has('nama_aspek') && !empty($request->input('nama_aspek'))) {
                $tetapanAspek->where('nama_aspek', 'LIKE', '%' . $request->input('nama_aspek') . '%');
            }
            if ($request->has('status_aspek') && !empty($request->input('status_aspek'))) {
                $tetapanAspek->where('status_aspek', 'LIKE', '%' . $request->input('status_aspek') . '%');
            }
            if ($request->has('belum_set') && !empty($request->input('belum_set'))) {
                $tetapanAspek->where('belum_set', 'LIKE', '%' . $request->input('belum_set') . '%');
            }
            return Datatables::of($tetapanAspek)
                ->addIndexColumn()
                ->editColumn('nama_aspek', function ($tetapanAspek) {
                    return $tetapanAspek->nama_aspek;
                })
                ->editColumn('status_aspek', function ($tetapanAspek) {
                    return $tetapanAspek->status_aspek;
                })
                ->editColumn('belum_set', function ($tetapanAspek) {
                    return $tetapanAspek->belum_set;
                })
                ->editColumn('action', function ($tetapanAspek) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatAspek(' . $tetapanAspek->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatAspekEdit(' . $tetapanAspek->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.tetapan-aspek.list', compact('type'));
    }

    public function viewTetapanAspek(Request $request)
    {
        $aspek = TetapanAspek::where('id', $request->id)->first();
        if ($request->type == 'view') {
            $readonly = 'readonly';
            $disabled = 'disabled';
        } else {
            $readonly = '';
            $disabled = '';
        }
        $type = $request->typedata;

        return view('instrumen_update.tetapan-aspek.view-profile', compact('aspek', 'readonly', 'disabled', 'type'));
    }

    // tetapan item //

    public function saveItem(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->input();

            if (array_key_exists('tetapan_item_id', $input)) {
                $TetapanItem = TetapanItem::where('id', $input['tetapan_item_id'])->first();
                unset($input['tetapan_item_id']);
                $TetapanItem->update($input);
            } elseif (array_key_exists('instrumen_id', $input)) {
                $TetapanItem = TetapanItem::where('instrumen_id', $input['instrumen_id'])->first();

                if (!empty($TetapanItem)) {
                    $TetapanItem->update($input);
                } else {
                    $TetapanItem = new TetapanItem;
                    $TetapanItem->create($input);
                }
            } else {
                $TetapanItem = new TetapanItem;
                $TetapanItem->create($input);
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penggunalist')]);
    }

    public function listTetapanItem(Request $request)
    {
        $type = 'SKPAK';
        if (request()->route()->getName() == 'admin.instrumen.tetapan-item-list') {
            $tetapanItem = TetapanItem::where('id', '!=', 0)->where('type', 'SKPAK');
            $type = 'SKPAK';
        }
        if (request()->route()->getName() == 'admin.instrumen.tetapan-item-sub-list') {
            $tetapanItem = TetapanItem::where('id', '!=', 0)->where('type', 'SPKS');
            $type = 'SPKS';
        }

        if ($request->ajax()) {

            if ($request->has('nama_item') && !empty($request->input('nama_item'))) {
                $tetapanItem->where('nama_item', 'LIKE', '%' . $request->input('nama_item') . '%');
            }
            if ($request->has('status_item') && !empty($request->input('status_item'))) {
                $tetapanItem->where('status_item', 'LIKE', '%' . $request->input('status_item') . '%');
            }
            if ($request->has('belum_set') && !empty($request->input('belum_set'))) {
                $tetapanItem->where('belum_set', 'LIKE', '%' . $request->input('belum_set') . '%');
            }
            return Datatables::of($tetapanItem)
                ->addIndexColumn()
                ->editColumn('nama_item', function ($tetapanItem) {
                    return $tetapanItem->nama_item;
                })
                ->editColumn('status_item', function ($tetapanItem) {
                    return $tetapanItem->status_item;
                })
                ->editColumn('belum_set', function ($tetapanItem) {
                    return $tetapanItem->belum_set;
                })
                ->editColumn('action', function ($tetapanItem) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatItem(' . $tetapanItem->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatItemEdit(' . $tetapanItem->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.tetapan-item.list', compact('type'));
    }

    public function viewTetapanItem(Request $request)
    {
        $item = TetapanItem::where('id', $request->id)->first();
        if ($request->type == 'view') {
            $readonly = 'readonly';
            $disabled = 'disabled';
        } else {
            $readonly = '';
            $disabled = '';
        }
        $type = $request->typedata;

        return view('instrumen_update.tetapan-item.view-profile', compact('item', 'readonly', 'disabled', 'type'));
    }

    public function listTetapanTarikh(Request $request)
    {

        if ($request->ajax()) {
            $tetapanTarikh = TetapanTarikhInstrumen::where('id', '!=', 0);

            return Datatables::of($tetapanTarikh)
                ->addIndexColumn()
                ->editColumn('tarikh_mula', function ($tetapanTarikh) {
                    return $tetapanTarikh->tarikh_mula;
                })
                ->editColumn('tarikh_mula_bulan', function ($tetapanTarikh) {
                    return $tetapanTarikh->tarikh_mula_bulan;
                })
                ->editColumn('tarikh_mula_tahun', function ($tetapanTarikh) {
                    return $tetapanTarikh->tarikh_mula_tahun;
                })
                ->editColumn('tarikh_akhir', function ($tetapanTarikh) {
                    return $tetapanTarikh->tarikh_akhir;
                })
                ->editColumn('tarikh_akhir_bulan', function ($tetapanTarikh) {
                    return $tetapanTarikh->tarikh_akhir_bulan;
                })
                ->editColumn('tarikh_akhir_tahun', function ($tetapanTarikh) {
                    return $tetapanTarikh->tarikh_akhir_tahun;
                })
                ->editColumn('action', function ($tetapanTarikh) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatTarikh(' . $tetapanTarikh->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatTarikhEdit(' . $tetapanTarikh->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.tetapan-tarikh.list');
    }

    public function viewFormTetapanTarikh(Request $request)
    {
        return view('instrumen_update.tetapan-tarikh.form');
    }

    public function viewTetapanTarikh(Request $request)
    {
        $tetapanTarikh = TetapanTarikhInstrumen::where('id', $request->id)->first();
        if ($request->type == 'view') {
            $readonly = 'readonly';
            $disabled = 'disabled';
        } else {
            $readonly = '';
            $disabled = '';
        }
        return view('instrumen_update.tetapan-tarikh.view-profile', compact('tetapanTarikh', 'readonly', 'disabled'));
    }

    public function saveTarikh(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->input();

            if (array_key_exists('tetapan_tarikh_id', $input)) {
                $TetapanTarikhInstrumen = TetapanTarikhInstrumen::where('id', $input['tetapan_tarikh_id'])->first();
                unset($input['tetapan_tarikh_id']);
                $TetapanTarikhInstrumen->update($input);
            } else {
                $TetapanTarikhInstrumen = new TetapanTarikhInstrumen;
                $TetapanTarikhInstrumen->create($input);
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya"]);

    }

    public function listSediaAda(Request $request)
    {

        if ($request->ajax()) {
            $instrumenList = InstrumenSkpakSpksIkeps::where('id', '!=', 0)->where('type', 'SEDIA');
            if ($request->has('nama_instrumen') && !empty($request->input('nama_instrumen'))) {
                $instrumenList->where('nama_instrumen', 'LIKE', '%' . $request->input('nama_instrumen') . '%');
            }
            if ($request->has('tujuan_instrumen') && !empty($request->input('tujuan_instrumen'))) {
                $instrumenList->where('tujuan_instrumen', 'LIKE', '%' . $request->input('tujuan_instrumen') . '%');
            }
            if ($request->has('pengguna_instrumen') && !empty($request->input('pengguna_instrumen'))) {
                $instrumenList->where('pengguna_instrumen', 'LIKE', '%' . $request->input('pengguna_instrumen') . '%');
            }
            return Datatables::of($instrumenList)
                ->addIndexColumn()
                ->editColumn('nama_instrumen', function ($instrumenList) {
                    return $instrumenList->nama_instrumen;
                })
                ->editColumn('tujuan_instrumen', function ($instrumenList) {
                    return $instrumenList->tujuan_instrumen;
                })
                ->editColumn('pengguna_instrumen', function ($instrumenList) {
                    return $instrumenList->pengguna_instrumen;
                })
                ->editColumn('tarikh_kuatkuasa', function ($instrumenList) {
                    return $instrumenList->tarikh_kuatkuasa;
                })
                ->editColumn('action', function ($instrumenList) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatInstrumen(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatInstrumenEdit(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.sedia-ada.list');
    }

    public function tambahSkips(Request $request)
    {
        $negeris = MasterState::all();
        $allInstitutes = SkipsInstitusiPendidikan::pluck('nama', 'id');

        $type = 'borang';
        $butiran_id = null;
        return view('instrumen_update.skips.form', compact('negeris', 'type', 'butiran_id', 'allInstitutes'));
    }

    public function saveSkips(Request $request)
    {
        DB::beginTransaction();
        try {

            $input = $request->input();
            // $input['status'] = 1;
            if (!isset($input['type'])) {
                $input['type'] = 'SKIPS';
            }
            if (array_key_exists('instrumen_id', $input) && $input['instrumen_id'] != 0) {
                $instrumenSkpakSpksIkeps = InstrumenSkpakSpksIkeps::where('id', $input['instrumen_id'])->first();
                $id = $input['instrumen_id'];
                unset($input['instrumen_id']);
                $instrumenSkpakSpksIkeps = $instrumenSkpakSpksIkeps->update($input);
            } else {
                $instrumenSkpakSpksIkeps = new InstrumenSkpakSpksIkeps;
                $instrumenSkpakSpksIkeps = $instrumenSkpakSpksIkeps->create($input);
                $id = $instrumenSkpakSpksIkeps->id;

            }
            //update remaining records to 0
            if ($input['status'] == '1') {
                InstrumenSkpakSpksIkeps::where('id','!=', $id)->where('type','SKIPS')->update(['status' => '2']);
            }
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();

        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penggunalist'), 'data' => $instrumenSkpakSpksIkeps]);
    }

    public function listSkips(Request $request)
    {
        if ($request->ajax()) {
            $instrumenList = InstrumenSkpakSpksIkeps::where('id', '!=', 0)->where('type', 'SKIPS');
            if ($request->has('nama_instrumen') && !empty($request->input('nama_instrumen'))) {
                $instrumenList->where('nama_instrumen', 'LIKE', '%' . $request->input('nama_instrumen') . '%');
            }
            if ($request->has('tujuan_instrumen') && !empty($request->input('tujuan_instrumen'))) {
                $instrumenList->where('tujuan_instrumen', 'LIKE', '%' . $request->input('tujuan_instrumen') . '%');
            }
            if ($request->has('pengguna_instrumen') && !empty($request->input('pengguna_instrumen'))) {
                $instrumenList->where('pengguna_instrumen', 'LIKE', '%' . $request->input('pengguna_instrumen') . '%');
            }
            return Datatables::of($instrumenList)
                ->addIndexColumn()
                ->editColumn('nama_instrumen', function ($instrumenList) {
                    return $instrumenList->nama_instrumen;
                })
                ->editColumn('tujuan_instrumen', function ($instrumenList) {
                    return $instrumenList->tujuan_instrumen;
                })
                ->editColumn('pengguna_instrumen', function ($instrumenList) {
                    return $instrumenList->pengguna_instrumen;
                })
                ->editColumn('tarikh_kuatkuasa', function ($instrumenList) {
                    return $instrumenList->tarikh_kuatkuasa;
                })
               
                ->editColumn('action', function ($instrumenList) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatSkips(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSkipsEdit(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.skips.list');
    }

    public function tambahSkpak(Request $request)
    {
        $negeris = MasterState::all();
        $skpak = null;
        $totalya = 0;
        $totaltidak = 0;
        $disabled = '';
        return view('instrumen_update.skpak.form', compact('negeris', 'skpak', 'totalya', 'totaltidak', 'disabled'));
    }

    public function saveSkpak(Request $request)
    {
        DB::beginTransaction();
        try {

            $input = $request->input();

            if (!isset($input['type'])) {
                $input['type'] = 'SKPAK';
            }
            if (array_key_exists('instrumen_id', $input) && $input['instrumen_id'] != 0) {
                $instrumenSkpakSpksIkeps = InstrumenSkpakSpksIkeps::where('id', $input['instrumen_id'])->first();
                unset($input['instrumen_id']);
                $instrumenSkpakSpksIkeps = $instrumenSkpakSpksIkeps->update($input);
            } else {
                $instrumenSkpakSpksIkeps = new InstrumenSkpakSpksIkeps;
                $instrumenSkpakSpksIkeps = $instrumenSkpakSpksIkeps->create($input);
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();

        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penggunalist'), 'data' => $instrumenSkpakSpksIkeps]);
    }

    public function listSkpak(Request $request)
    {
        if ($request->ajax()) {
            $instrumenList = InstrumenSkpakSpksIkeps::where('id', '!=', 0)->where('type', 'SKPAK');
            if ($request->has('nama_instrumen') && !empty($request->input('nama_instrumen'))) {
                $instrumenList->where('nama_instrumen', 'LIKE', '%' . $request->input('nama_instrumen') . '%');
            }
            if ($request->has('tujuan_instrumen') && !empty($request->input('tujuan_instrumen'))) {
                $instrumenList->where('tujuan_instrumen', 'LIKE', '%' . $request->input('tujuan_instrumen') . '%');
            }
            if ($request->has('pengguna_instrumen') && !empty($request->input('pengguna_instrumen'))) {
                $instrumenList->where('pengguna_instrumen', 'LIKE', '%' . $request->input('pengguna_instrumen') . '%');
            }
            return Datatables::of($instrumenList)
                ->addIndexColumn()
                ->editColumn('nama_instrumen', function ($instrumenList) {
                    return $instrumenList->nama_instrumen;
                })
                ->editColumn('tujuan_instrumen', function ($instrumenList) {
                    return $instrumenList->tujuan_instrumen;
                })
                ->editColumn('pengguna_instrumen', function ($instrumenList) {
                    return $instrumenList->pengguna_instrumen;
                })
                ->editColumn('tarikh_kuatkuasa', function ($instrumenList) {
                    return $instrumenList->tarikh_kuatkuasa;
                })
                ->editColumn('action', function ($instrumenList) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatSkpak(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSkpakEdit(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.skpak.list');
    }

    public function listSpks(Request $request)
    {
        if ($request->ajax()) {
            $instrumenList = InstrumenSkpakSpksIkeps::where('id', '!=', 0)->where('type', 'SPKS');
            if ($request->has('nama_instrumen') && !empty($request->input('nama_instrumen'))) {
                $instrumenList->where('nama_instrumen', 'LIKE', '%' . $request->input('nama_instrumen') . '%');
            }
            if ($request->has('tujuan_instrumen') && !empty($request->input('tujuan_instrumen'))) {
                $instrumenList->where('tujuan_instrumen', 'LIKE', '%' . $request->input('tujuan_instrumen') . '%');
            }
            if ($request->has('pengguna_instrumen') && !empty($request->input('pengguna_instrumen'))) {
                $instrumenList->where('pengguna_instrumen', 'LIKE', '%' . $request->input('pengguna_instrumen') . '%');
            }
            return Datatables::of($instrumenList)
                ->addIndexColumn()
                ->editColumn('nama_instrumen', function ($instrumenList) {
                    return $instrumenList->nama_instrumen;
                })
                ->editColumn('tujuan_instrumen', function ($instrumenList) {
                    return $instrumenList->tujuan_instrumen;
                })
                ->editColumn('pengguna_instrumen', function ($instrumenList) {
                    return $instrumenList->pengguna_instrumen;
                })
                ->editColumn('tarikh_kuatkuasa', function ($instrumenList) {
                    return $instrumenList->tarikh_kuatkuasa;
                })
                ->editColumn('action', function ($instrumenList) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a onclick="maklumatSpks(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    $button .= '<a onclick="maklumatSpksEdit(' . $instrumenList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('instrumen_update.spks.list');
    }

    public function tambahSpks(Request $request)
    {
        $negeris = MasterState::all();
        $spks = $type = $id = null;
        $disabled = 'disabled';
        return view('instrumen_update.spks.form', compact('negeris', 'spks', 'disabled', 'id'));
    }

    public function saveSpks(Request $request)
    {
        DB::beginTransaction();
        try {

            $input = $request->input();

            if (!isset($input['type'])) {
                $input['type'] = 'SPKS';
            }
            if (array_key_exists('instrumen_id', $input) && $input['instrumen_id'] != 0) {
                $instrumenSkpakSpksIkeps = InstrumenSkpakSpksIkeps::where('id', $input['instrumen_id'])->first();
                unset($input['instrumen_id']);
                $InstrumenSkpakSpksIkeps = $instrumenSkpakSpksIkeps->update($input);
            } else {
                $instrumenSkpakSpksIkeps = new InstrumenSkpakSpksIkeps;
                $instrumenSkpakSpksIkeps = $instrumenSkpakSpksIkeps->create($input);
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();

        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penggunalist'), 'data' => $instrumenSkpakSpksIkeps]);
    }
}
