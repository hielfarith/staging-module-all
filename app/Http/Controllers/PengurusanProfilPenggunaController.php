<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Models\ProfilPengguna;
use App\Models\PanelPenilai;
use App\Models\KetuaAgensi;
use App\Models\Master\MasterState;
use App\Models\MasterDaerah;
use App\Models\AhliJawatankuasaKerja;
use App\Models\AhliJawatankuasaTertinggi;
use App\Models\PengerusiPengetuaGuru;

class PengurusanProfilPenggunaController extends Controller
{

	public function viewForm(Request $request)
	{
		$states = MasterState::all();
		$daerahs = MasterDaerah::all();
		// return view('pengurusan_pengguna.ketua_taska.ketua-taska-baru', compact('states'));
		return view('pengurusan.form', compact('states', 'daerahs'));
	}

	public function savePengguna(Request $request)
	{

        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'email_peribadi' => 'email',
            	'email_taska' => 'email',
            	'email_pejabat_penyelia' => 'email'
            ]);

            $input = $request->input();
            $input['status'] = 1;
            if (array_key_exists('pengguna_id', $input)) {
            	$profilPengguna = ProfilPengguna::where('id', $input['pengguna_id'])->first();
            } else {
            	$profilPengguna = new ProfilPengguna;
            }
            $profilPengguna->create($input);

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penggunalist')]);
	}

	public function listPengguna(Request $request)
	{
		if($request->ajax()) {

	        $penggunaList = ProfilPengguna::get();
	        return Datatables::of($penggunaList)
	            ->editColumn('nama_pengguna', function ($penggunaList) {
	                return $penggunaList->nama_pengguna;
	            })
	            ->editColumn('no_kad', function ($penggunaList) {
	                return $penggunaList->no_kad;
	            })
	            ->editColumn('email_peribadi', function ($penggunaList) {
	                return $penggunaList->email_peribadi;
	            })
	            ->editColumn('jenis', function ($penggunaList) {
	                return $penggunaList->jenis;
	            })
	            ->editColumn('tarikh_penubuhan', function ($penggunaList) {
	                return $penggunaList->tarikh_penubuhan;
	            })
	            ->editColumn('action', function ($penggunaList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatPengguna('.$penggunaList->id.')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
	                $button .= '<a onclick="maklumatPenggunaEdit('.$penggunaList->id.')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

	                $button .= "</div>";

	                return $button;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
    	}

        // return view('pengurusan_pengguna.ketua_taska.senarai-ketua-taska');
        return view('pengurusan.list');
    }

    public function viewPengguna(Request $request)
    {
    	$pengguna = ProfilPengguna::where('id', $request->id)->first();
    	$states = MasterState::all();
    	$daerahs = MasterDaerah::all();
    	if ($request->type == 'view') {
    		$readonly = 'readonly';
    	} else {
    		$readonly = '';
    	}
    	// return view('pengurusan_pengguna.ketua_taska.lihat-ketua-taska', compact('pengguna', 'states'));
    	return view('pengurusan.view-profile', compact('pengguna', 'states', 'daerahs', 'readonly'));
    }

    public function viewFormPenilai(Request $request)
	{
		$states = MasterState::all();
		$dearhs = MasterDaerah::all();
		// return view('pengurusan_pengguna.penilai.penilai-baru', compact('states'));
		return view('pengurusan.penilai.form', compact('states','dearhs'));
	}

	public function savePenilai(Request $request)
	{
        // dd($request->all());
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'email_peribadi' => 'email',
            	'email_penyelia' => 'email',
            	'email_ketua_jabatan' => 'email'
            ]);

            $input = $request->input();
            $input['status'] = 1;
            $input['negeri_skpak'] = json_encode($input['negeri_skpak']);

            $profilPengguna = new PanelPenilai;
            $profilPengguna->create($input);

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penilailist')]);

		// DB::beginTransaction();
        // try {
        //     $validatedData = $request->validate([
        //     	'email_peribadi' => 'email',
        //     	'email_penyelia' => 'email',
        //     	'email_ketua_jabatan' => 'email'
        //     ]);

        //     $input = $request->input();
        //     $input['status'] = 1;
        //     $input['negeri_skpak'] = json_encode($input['negeri_skpak']);

        // 	$profilPengguna = new PanelPenilai;
        // 	$profilPengguna->create($input);

        //   DB::commit();
        //     return response()->json(['title' => 'Berjaya', 'status' => true, 'message' => "Berjaya", 'detail' => "berjaya"]);
        // } catch (\Throwable $e) {

        //     DB::rollback();
        //     return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        // }
	}

	public function listPenilai(Request $request)
	{
		if($request->ajax()) {

	        $penilaiList = PanelPenilai::get();
	        return Datatables::of($penilaiList)
	            ->editColumn('nama_pengguna', function ($penilaiList) {
	                return $penilaiList->nama_pengguna;
	            })
	            ->editColumn('no_kad', function ($penilaiList) {
	                return $penilaiList->no_kad;
	            })
	            ->editColumn('email_peribadi', function ($penilaiList) {
	                return $penilaiList->email_peribadi;
	            })
	            ->editColumn('action', function ($penilaiList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatPenilai(' . $penilaiList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= "</div>";

	                return $button;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
    	}

        // return view('pengurusan_pengguna.penilai.senarai-penilai');
        return view('pengurusan.penilai.list');
    }

    public function viewPenilai(Request $request)
    {
    	$penilai = PanelPenilai::where('id', $request->id)->first();
    	$states = MasterState::all();
    	// return view('pengurusan_pengguna.penilai.lihat-penilai', compact('penilai', 'states'));
    	return view('pengurusan.penilai.view-profile', compact('penilai', 'states'));
    }

    // ----- Agensi ---- //

    public function viewFormAgensi(Request $request)
	{	
		$states = MasterState::all();
		$dearhs = MasterDaerah::all();

		return view('pengurusan.agensi.form', compact('states','dearhs'));
	}

	public function saveAgensi(Request $request)
	{
		DB::beginTransaction();
        try {

            $input = $request->input();
            $input['agensi_kementerian'] = json_encode($input['agensi_kementerian']);
            $input['modul'] = isset($input['modul']) ? 1 : 0;

        	$ketuaAgensi = new KetuaAgensi;
        	$ketuaAgensi->create($input);

          DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => true, 'message' => "Berjaya", 'detail' => "berjaya"]);
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
	}

	public function listAgensi(Request $request)
	{
		if($request->ajax()) {

	        $agensiList = KetuaAgensi::get();
	        return Datatables::of($agensiList)
	            ->editColumn('nama_pengguna', function ($agensiList) {
	                return $agensiList->nama_pengguna;
	            })
	            ->editColumn('no_kad', function ($agensiList) {
	                return $agensiList->no_kad;
	            })
	            ->editColumn('email_peribadi', function ($agensiList) {
	                return $agensiList->email_ketua;
	            })
	            ->editColumn('action', function ($agensiList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatAgensi(' . $agensiList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= "</div>";

	                return $button;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
    	}

        return view('pengurusan.agensi.list');	
    }

    public function viewAgensi(Request $request)
    {
    	$agensi = KetuaAgensi::where('id', $request->id)->first();
    	$states = MasterState::all();
    	return view('pengurusan.agensi.view-profile', compact('agensi', 'states'));
    }

     // ----- Ahli Jawatankuasa ---- //
    public function viewFormJawatankuasa(Request $request)
	{
		$states = MasterState::all();
		$dearhs = MasterDaerah::all();
		return view('pengurusan.ahli-jawatankuasa.form', compact('states', 'dearhs'));
	}

	public function saveJawatankuasa(Request $request)
	{
		DB::beginTransaction();
        try {

            $input = $request->input(); 

        	$ketuaAgensi = new AhliJawatankuasaKerja;
        	$ketuaAgensi->create($input);

          DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => true, 'message' => "Berjaya", 'detail' => "berjaya"]);
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
	}

	public function listJawatankuasa(Request $request)
	{
		if($request->ajax()) {

	        $jawatankuasaList = AhliJawatankuasaKerja::get();
	        return Datatables::of($jawatankuasaList)
	            ->editColumn('nama_pengguna', function ($jawatankuasaList) {
	                return $jawatankuasaList->nama_pengguna;
	            })
	            ->editColumn('no_kad', function ($jawatankuasaList) {
	                return $jawatankuasaList->no_kad;
	            })
	            ->editColumn('email_peribadi', function ($jawatankuasaList) {
	                return $jawatankuasaList->email_peribadi;
	            })
	            ->editColumn('action', function ($jawatankuasaList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatAhli(' . $jawatankuasaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= "</div>";

	                return $button;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
    	}

        return view('pengurusan.ahli-jawatankuasa.list');	
    }

    public function viewJawatankuasa(Request $request)
    {
    	$ahli = AhliJawatankuasaKerja::where('id', $request->id)->first();
    	$states = MasterState::all();
    	return view('pengurusan.ahli-jawatankuasa.view-profile', compact('ahli', 'states'));
    }

    // jawatanketuasa tertinggi

     public function viewFormJawatankuasatertinggi(Request $request)
	{
		$states = MasterState::all();
		$dearhs = MasterDaerah::all();
		return view('pengurusan.ahli-jawatankuasa-tertinggi.form', compact('states','dearhs'));
	}

	public function saveJawatankuasatertinggi(Request $request)
	{
		DB::beginTransaction();
        try {

            $input = $request->input(); 

        	$ketuaAgensi = new AhliJawatankuasaTertinggi;
        	$ketuaAgensi->create($input);

          DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => true, 'message' => "Berjaya", 'detail' => "berjaya"]);
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
	}

	public function listJawatankuasatertinggi(Request $request)
	{
		if($request->ajax()) {

	        $jawatankuasaList = AhliJawatankuasaTertinggi::get();
	        return Datatables::of($jawatankuasaList)
	            ->editColumn('nama_pengguna', function ($jawatankuasaList) {
	                return $jawatankuasaList->nama_pengguna;
	            })
	            ->editColumn('no_kad', function ($jawatankuasaList) {
	                return $jawatankuasaList->no_kad;
	            })
	            ->editColumn('email_peribadi', function ($jawatankuasaList) {
	                return $jawatankuasaList->email_peribadi;
	            })
	            ->editColumn('action', function ($jawatankuasaList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatAhli(' . $jawatankuasaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= "</div>";

	                return $button;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
    	}

        return view('pengurusan.ahli-jawatankuasa-tertinggi.list');	
    }

    public function viewJawatankuasatertinggi(Request $request)
    {
    	$ahli = AhliJawatankuasaTertinggi::where('id', $request->id)->first();
    	$states = MasterState::all();
    	return view('pengurusan.ahli-jawatankuasa-tertinggi.view-profile', compact('ahli', 'states'));
    }

    // PengerusiPengetuaGuru //

       public function viewFormPengetua(Request $request)
	{
		$states = MasterState::all();
		$dearhs = MasterDaerah::all();

		return view('pengurusan.pengetua.form', compact('states','dearhs'));
	}

	public function savePengetua(Request $request)
	{
		DB::beginTransaction();
        try {

            $input = $request->input(); 
			if($input['sebab_pertukaran'] == 'Lain-lain') {
				$input['sebab_pertukaran'] = $input['sebab_pertukaran_lain'];
			}
        	$ketuaAgensi = new PengerusiPengetuaGuru;
        	$ketuaAgensi->create($input);

          DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => true, 'message' => "Berjaya", 'detail' => "berjaya"]);
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
	}

	public function listPengetua(Request $request)
	{
		if($request->ajax()) {

	        $pengetuaList = PengerusiPengetuaGuru::get();
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
	            ->editColumn('action', function ($pengetuaList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatAhli(' . $pengetuaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= "</div>";

	                return $button;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
    	}

        return view('pengurusan.pengetua.list');	
    }

    public function viewPengetua(Request $request)
    {
    	$pengetua = PengerusiPengetuaGuru::where('id', $request->id)->first();
    	$states = MasterState::all();
    	$dearhs = MasterDaerah::all();
    	return view('pengurusan.pengetua.view-profile', compact('pengetua', 'states','dearhs'));
    }

    public function checkDaerah(Request $request)
    {
    	$negeri = $request->negeri;
    	$negeriKod = MasterState::where('name', $negeri)->first();
    	$daerahs = MasterDaerah::where('neg_kod', $negeriKod->code)->pluck('name')->toArray();
    	return ['success' => true, 'daerahs' => $daerahs];
    }
}

?>
