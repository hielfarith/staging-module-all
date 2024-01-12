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

	public function __construct()
    {
        $this->middleware('auth');
    }
    
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
            if (array_key_exists('pennguna_id', $input)) {
            	$profilPengguna = ProfilPengguna::where('id', $input['pennguna_id'])->first();
            	unset($input['pennguna_id']);
            	$profilPengguna->update($input);
            } else {
            	$profilPengguna = new ProfilPengguna;
            	$profilPengguna->create($input);
            }

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
	        $penggunaList = ProfilPengguna::where('id', '!=', 0);
	        if ($request->has('nama_pengguna') && !empty($request->input('nama_pengguna'))) {
		        $penggunaList->where('nama_pengguna', $request->input('nama_pengguna'));
		    }
		    if ($request->has('no_kad') && !empty($request->input('no_kad'))) {
		        $penggunaList->where('no_kad', $request->input('no_kad'));
		    }
		    if ($request->has('email_peribadi') && !empty($request->input('email_peribadi'))) {
		        $penggunaList->where('email_peribadi', $request->input('email_peribadi'));
		    }
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
            $input['negeri_skpak'] = isset($input['negeri_skpak']) ? json_encode($input['negeri_skpak']) : null;

            if (array_key_exists('penilai_id', $input)) {
            	$profilPenilai = PanelPenilai::where('id', $input['penilai_id'])->first();
            	unset($input['penilai_id']);
            	$profilPenilai->update($input);
            } else {
            	$profilPenilai = new PanelPenilai;
            	$profilPenilai->create($input);
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya", 'redirectRoute' => route('admin.internal.penilailist')]);
	}

	public function listPenilai(Request $request)
	{
		if($request->ajax()) {

	        $penilaiList = PanelPenilai::where('id', '!=', 0);
	        if ($request->has('nama_pengguna') && !empty($request->input('nama_pengguna'))) {
		        $penilaiList->where('nama_pengguna', $request->input('nama_pengguna'));
		    }
		    if ($request->has('no_kad') && !empty($request->input('no_kad'))) {
		        $penilaiList->where('no_kad', $request->input('no_kad'));
		    }
		    if ($request->has('email_peribadi') && !empty($request->input('email_peribadi'))) {
		        $penilaiList->where('email_peribadi', $request->input('email_peribadi'));
		    }

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
	            ->editColumn('email_penyelia', function ($penilaiList) {
	                return $penilaiList->email_penyelia;
	            })
	            ->editColumn('agensi_kementerian', function ($penilaiList) {
	                return $penilaiList->agensi_kementerian;
	            })
	            ->editColumn('action', function ($penilaiList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatPenilai(' . $penilaiList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	               	$button .= '<a onclick="maklumatPenilaiEdit(' . $penilaiList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

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
    	$daerahs = MasterDaerah::all();
    	if ($request->type == 'view') {
    		$readonly = 'readonly';
    		$disabled = 'disabled';
    	} else {
    		$disabled = '';
    		$readonly = '';
    	}
    	// return view('pengurusan_pengguna.penilai.lihat-penilai', compact('penilai', 'states'));
    	return view('pengurusan.penilai.view-profile', compact('penilai', 'states', 'daerahs', 'readonly', 'disabled'));
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

            if (array_key_exists('agensi_id', $input)) {
            	$ketuaAgensi = KetuaAgensi::where('id', $input['agensi_id'])->first();
            	unset($input['agensi_id']);
            	$ketuaAgensi->update($input);
            } else {
            	$ketuaAgensi = new KetuaAgensi;
        		$ketuaAgensi->create($input);
            }
        	
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
			$agensiList = KetuaAgensi::where('id', '!=', 0);
	        if ($request->has('nama_pengguna') && !empty($request->input('nama_pengguna'))) {
		        $agensiList->where('nama_pengguna', $request->input('nama_pengguna'));
		    }
		    if ($request->has('no_kad') && !empty($request->input('no_kad'))) {
		        $agensiList->where('no_kad', $request->input('no_kad'));
		    }
		    if ($request->has('email_ketua') && !empty($request->input('email_ketua'))) {
		        $agensiList->where('email_ketua', $request->input('email_ketua'));
		    }


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
	             ->editColumn('no_tel_pejabat', function ($agensiList) {
	                return $agensiList->no_tel_pejabat;
	            })
	            ->editColumn('action', function ($agensiList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatAgensi(' . $agensiList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= '<a onclick="maklumatAgensiEdit(' . $agensiList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';

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
    	if ($request->type == 'view') {
    		$readonly = 'readonly';
    		$disabled = 'disabled';
    	} else {
    		$readonly = '';
    		$disabled = '';
    	}
    	return view('pengurusan.agensi.view-profile', compact('agensi', 'states', 'readonly', 'disabled'));
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

             if (array_key_exists('ahli_id', $input)) {
            	$AhliJawatankuasaKerja = AhliJawatankuasaKerja::where('id', $input['ahli_id'])->first();
            	unset($input['ahli_id']);
            	$AhliJawatankuasaKerja->update($input);
            } else {
            	$AhliJawatankuasaKerja = new AhliJawatankuasaKerja;
        		$AhliJawatankuasaKerja->create($input);
            }

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

	        $jawatankuasaList = AhliJawatankuasaKerja::where('id', '!=', 0);
	        if ($request->has('nama_pengguna') && !empty($request->input('nama_pengguna'))) {
		        $jawatankuasaList->where('nama_pengguna', 'like','%'. $request->input('nama_pengguna'). '%');
		    }
		    if ($request->has('no_kad') && !empty($request->input('no_kad'))) {
		        $jawatankuasaList->where('no_kad', $request->input('no_kad'));
		    }
		    if ($request->has('email_peribadi') && !empty($request->input('email_peribadi'))) {
		        $jawatankuasaList->where('email_peribadi', $request->input('email_peribadi'));
		    }

	        return Datatables::of($jawatankuasaList)
	        	->editColumn('panggilan', function ($jawatankuasaList) {
	                return $jawatankuasaList->panggilan;
	            })
	            ->editColumn('nama_pengguna', function ($jawatankuasaList) {
	                return $jawatankuasaList->nama_pengguna;
	            })
	            ->editColumn('no_kad', function ($jawatankuasaList) {
	                return $jawatankuasaList->no_kad;
	            })
	            ->editColumn('email_peribadi', function ($jawatankuasaList) {
	                return $jawatankuasaList->email_peribadi;
	            })
	            ->editColumn('no_tel_peribadi', function ($jawatankuasaList) {
	                return $jawatankuasaList->no_tel_peribadi;
	            })
	            ->editColumn('action', function ($jawatankuasaList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatAhli(' . $jawatankuasaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= '<a onclick="maklumatAhliEdit(' . $jawatankuasaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';


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
    	if ($request->type == 'view') {
    		$readonly = 'readonly';
    		$disabled = 'disabled';
    	} else {
    		$disabled = '';
    		$readonly = '';
    	}

    	return view('pengurusan.ahli-jawatankuasa.view-profile', compact('ahli', 'states', 'readonly', 'disabled'));
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

            if (array_key_exists('tinggi_id', $input)) {
            	$AhliJawatankuasaTertinggi = AhliJawatankuasaTertinggi::where('id', $input['tinggi_id'])->first();
            	unset($input['tinggi_id']);
            	$AhliJawatankuasaTertinggi->update($input);
            } else {
            	$AhliJawatankuasaTertinggi = new AhliJawatankuasaTertinggi;
        		$AhliJawatankuasaTertinggi->create($input);
            }
 
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

	        $jawatankuasaList = AhliJawatankuasaTertinggi::where('id', '!=', 0);
	        if ($request->has('nama_pengguna') && !empty($request->input('nama_pengguna'))) {
		        $jawatankuasaList->where('nama_pengguna', 'like','%'. $request->input('nama_pengguna'). '%');
		    }
		    if ($request->has('no_kad') && !empty($request->input('no_kad'))) {
		        $jawatankuasaList->where('no_kad', $request->input('no_kad'));
		    }
		    if ($request->has('email_peribadi') && !empty($request->input('email_peribadi'))) {
		        $jawatankuasaList->where('email_peribadi', $request->input('email_peribadi'));
		    }

	        return Datatables::of($jawatankuasaList)
	        	->editColumn('panggilan', function ($jawatankuasaList) {
	                return $jawatankuasaList->panggilan;
	            })
	            ->editColumn('nama_pengguna', function ($jawatankuasaList) {
	                return $jawatankuasaList->nama_pengguna;
	            })
	            ->editColumn('no_kad', function ($jawatankuasaList) {
	                return $jawatankuasaList->no_kad;
	            })
	            ->editColumn('email_peribadi', function ($jawatankuasaList) {
	                return $jawatankuasaList->email_peribadi;
	            })
	            ->editColumn('no_tel_pejabat', function ($jawatankuasaList) {
	                return $jawatankuasaList->no_tel_pejabat;
	            })
	            ->editColumn('action', function ($jawatankuasaList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatAhli(' . $jawatankuasaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= '<a onclick="maklumatAhliEdit(' . $jawatankuasaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';


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
    	if ($request->type == 'view') {
    		$readonly = 'readonly';
    		$disabled = 'disabled';
    	} else {
    		$disabled = '';
    		$readonly = '';
    	}
    	return view('pengurusan.ahli-jawatankuasa-tertinggi.view-profile', compact('ahli', 'states', 'readonly', 'disabled'));
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
			// if($input['sebab_pertukaran'] == 'Lain-lain') {
			// 	$input['sebab_pertukaran'] = $input['sebab_pertukaran_lain'];
			// }

			if (array_key_exists('pengetua_id', $input)) {
            	$PengerusiPengetuaGuru = PengerusiPengetuaGuru::where('id', $input['pengetua_id'])->first();
            	unset($input['pengetua_id']);
            	$PengerusiPengetuaGuru->update($input);
            } else {
            	$PengerusiPengetuaGuru = new PengerusiPengetuaGuru;
        		$PengerusiPengetuaGuru->create($input);
            }

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

    public function viewPengetua(Request $request)
    {
    	$pengetua = PengerusiPengetuaGuru::where('id', $request->id)->first();
    	$states = MasterState::all();
    	$dearhs = MasterDaerah::all();
    	if ($request->type == 'view') {
    		$readonly = 'readonly';
    		$disabled = 'disabled';
    	} else {
    		$disabled = '';
    		$readonly = '';
    	}
    	return view('pengurusan.pengetua.view-profile', compact('pengetua', 'states','dearhs', 'disabled', 'readonly'));
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
