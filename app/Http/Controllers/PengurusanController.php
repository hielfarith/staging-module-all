<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Models\ProfilPengguna;

class PengurusanController extends Controller
{

	public function viewForm(Request $request)
	{
		return view('pengurusan.form');
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
            $input['jumlah_kanak'] = 'test';
            $input['jenisbanugunan'] = 'test';
            
        	$profilPengguna = new ProfilPengguna;
        	$profilPengguna->create($input);

          DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya"]);
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

        return view('pengurusan.list');	
    }

    public function viewPengguna(Request $request)
    {
    	$pengguna = ProfilPengguna::where('id', $request->id)->first();
    	return view('pengurusan.view-profile', compact('pengguna'));
    }

}

?>