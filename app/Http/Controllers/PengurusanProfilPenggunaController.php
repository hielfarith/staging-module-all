<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Models\ProfilPengguna;
use App\Models\PanelPenilai;
use App\Models\Master\MasterState;

class PengurusanProfilPenggunaController extends Controller
{

	public function viewForm(Request $request)
	{
		$states = MasterState::all();
		return view('pengurusan_pengguna.ketua_taska.ketua-taska-baru', compact('states'));
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
	            ->editColumn('submission_count', function ($penggunaList) {
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

        return view('pengurusan_pengguna.ketua_taska.senarai-ketua-taska');
    }

    public function viewPengguna(Request $request)
    {
    	$pengguna = ProfilPengguna::where('id', $request->id)->first();
    	$states = MasterState::all();
    	return view('pengurusan_pengguna.ketua_taska.lihat-ketua-taska', compact('pengguna', 'states'));
    }

    public function viewFormPenilai(Request $request)
	{
		$states = MasterState::all();
		return view('pengurusan_pengguna.penilai.penilai-baru', compact('states'));
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
	            ->editColumn('submission_count', function ($penilaiList) {
	                return $penilaiList->email_peribadi;
	            })
	            ->editColumn('action', function ($penilaiList) {
	                $button = "";
	                $button .= '<div class="btn-group " role="group" aria-label="Action">';

	                $button .= '<a onclick="maklumatPengguna(' . $penilaiList->id . ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

	                $button .= "</div>";

	                return $button;
	            })
	            ->rawColumns(['action'])
	            ->make(true);
    	}

        return view('pengurusan_pengguna.penilai.senarai-penilai');
    }

    public function viewPenilai(Request $request)
    {
    	$penilai = PanelPenilai::where('id', $request->id)->first();
    	$states = MasterState::all();
    	return view('pengurusan_pengguna.penilai.lihat-penilai', compact('penilai', 'states'));
    }

}

?>
