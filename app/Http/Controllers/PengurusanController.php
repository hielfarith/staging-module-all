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
use App\Models\AhliJawatankuasaKerja;

class PengurusanController extends Controller
{

	public function viewForm(Request $request)
	{
		$states = MasterState::all();
		return view('pengurusan.form', compact('states'));
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
        	$profilPengguna = new ProfilPengguna;
        	$profilPengguna->create($input);

          DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => true, 'message' => "Berjaya", 'detail' => "berjaya"]);
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
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
	            ->editColumn('action', function ($penggunaList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatPengguna(' . $penggunaList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= "</div>";

	                return $button;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
    	}

        return view('pengurusan.list');	
    }

    public function viewPengguna(Request $request)
    {
    	$pengguna = ProfilPengguna::where('id', $request->id)->first();
    	$states = MasterState::all();
    	return view('pengurusan.view-profile', compact('pengguna', 'states'));
    }

    public function viewFormPenilai(Request $request)
	{	
		$states = MasterState::all();
		return view('pengurusan.penilai.form', compact('states'));
	}

	public function savePenilai(Request $request)
	{
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

          DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => true, 'message' => "Berjaya", 'detail' => "berjaya"]);
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
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

        return view('pengurusan.penilai.list');	
    }

    public function viewPenilai(Request $request)
    {
    	$penilai = PanelPenilai::where('id', $request->id)->first();
    	$states = MasterState::all();
    	return view('pengurusan.penilai.view-profile', compact('penilai', 'states'));
    }

    // ----- Agensi ---- //

    public function viewFormAgensi(Request $request)
	{	
		$states = MasterState::all();
		return view('pengurusan.agensi.form', compact('states'));
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
		return view('pengurusan.ahli-jawatankuasa.form', compact('states'));
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

}

?>