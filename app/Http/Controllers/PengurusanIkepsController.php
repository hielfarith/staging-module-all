<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\IkepsPrasaranaSekolah;

class PengurusanIkepsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangIkepsBaru(Request $request){
        return view ('ikeps.index');
    }

    public function store(Request $request){

    DB::beginTransaction();
    try {

        if($request->tab == 'prasarana_sekolah'){
            IkepsPrasaranaSekolah::create([
                'tahun' => isset($request->tahun) ? $request->tahun : 0,
                'kod_sekolah' => isset($request->kod_sekolah) ? $request->kod_sekolah : 0,
            
                // Pemeriksaan Keselamatan
                'pemeriksaan_keselamatan' => isset($request->pemeriksaan_keselamatan) ? $request->pemeriksaan_keselamatan : null,
                'tarikh_pemeriksaan' => isset($request->tarikh_pemeriksaan) ? $request->tarikh_pemeriksaan : null,
            
                // Padang Sekolah
                'padang_sekolah' => isset($request->padang_sekolah) ? $request->padang_sekolah : null,
                'status_hakmilik_padang_1' => isset($request->status_hakmilik_padang_1) ? $request->status_hakmilik_padang_1 : null,
                'status_hakmilik_padang_2' => isset($request->status_hakmilik_padang_2) ? $request->status_hakmilik_padang_2 : null,
                'ps_gunasama' => isset($request->ps_gunasama) ? $request->ps_gunasama : null,
                'ps_bilangan' => isset($request->ps_bilangan) ? $request->ps_bilangan : null,
            
                // Keluasan Trek 400M
                'kt_400' => isset($request->kt_400) ? $request->kt_400 : null,
                'kt_400_gunasama' => isset($request->kt_400_gunasama) ? $request->kt_400_gunasama : null,
                'kt_400_bilangan' => isset($request->kt_400_bilangan) ? $request->kt_400_bilangan : null,
                'kt_400_masih_digunakan' => isset($request->kt_400_masih_digunakan) ? $request->kt_400_masih_digunakan : null,
                'kt_400_status_fizikal' => isset($request->kt_400_status_fizikal) ? $request->kt_400_status_fizikal : null,
            
                // Keluasan Trek 300M
                'kt_300' => isset($request->kt_300) ? $request->kt_300 : null,
                'kt_300_gunasama' => isset($request->kt_300_gunasama) ? $request->kt_300_gunasama : null,
                'kt_300_bilangan' => isset($request->kt_300_bilangan) ? $request->kt_300_bilangan : null,
                'kt_300_masih_digunakan' => isset($request->kt_300_masih_digunakan) ? $request->kt_300_masih_digunakan : null,
                'kt_300_status_fizikal' => isset($request->kt_300_status_fizikal) ? $request->kt_300_status_fizikal : null,
            
                // Keluasan Trek 200M
                'kt_200' => isset($request->kt_200) ? $request->kt_200 : null,
                'kt_200_gunasama' => isset($request->kt_200_gunasama) ? $request->kt_200_gunasama : null,
                'kt_200_bilangan' => isset($request->kt_200_bilangan) ? $request->kt_200_bilangan : null,
                'kt_200_masih_digunakan' => isset($request->kt_200_masih_digunakan) ? $request->kt_200_masih_digunakan : null,
                'kt_200_status_fizikal' => isset($request->kt_200_status_fizikal) ? $request->kt_200_status_fizikal : null,
            
                // Keluasan Trek Kurang 200M
                'ktk_200' => isset($request->ktk_200) ? $request->ktk_200 : null,
                'ktk_200_gunasama' => isset($request->ktk_200_gunasama) ? $request->ktk_200_gunasama : null,
                'ktk_200_bilangan' => isset($request->ktk_200_bilangan) ? $request->ktk_200_bilangan : null,
                'ktk_200_masih_digunakan' => isset($request->ktk_200_masih_digunakan) ? $request->ktk_200_masih_digunakan : null,
                'ktk_200_status_fizikal' => isset($request->ktk_200_status_fizikal) ? $request->ktk_200_status_fizikal : null,
            
                // Gred Padang
                'gred_padang' => isset($request->gred_padang) ? $request->gred_padang : null,
            
                // Trek Sintetik
                'trek_sintetik' => isset($request->trek_sintetik) ? $request->trek_sintetik : null,
                'ts_bilangan' => isset($request->ts_bilangan) ? $request->ts_bilangan : null,
            
                // Trek 400M
                'trek_400' => isset($request->trek_400) ? $request->trek_400 : null,
                'trek_400_gunasama' => isset($request->trek_400_gunasama) ? $request->trek_400_gunasama : null,
                'trek_400_bilangan' => isset($request->trek_400_bilangan) ? $request->trek_400_bilangan : null,
                'trek_400_masih_digunakan' => isset($request->trek_400_masih_digunakan) ? $request->trek_400_masih_digunakan : null,
                'trek_400_status_fizikal' => isset($request->trek_400_status_fizikal) ? $request->trek_400_status_fizikal : null,
            
                // Trek 200M
                'trek_200' => isset($request->trek_200) ? $request->trek_200 : null,
                'trek_200_gunasama' => isset($request->trek_200_gunasama) ? $request->trek_200_gunasama : null,
                'trek_200_bilangan' => isset($request->trek_200_bilangan) ? $request->trek_200_bilangan : null,
                'trek_200_masih_digunakan' => isset($request->trek_200_masih_digunakan) ? $request->trek_200_masih_digunakan : null,
            ]);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Data Disimpan", 'detail' => "berjaya"]);

    } catch (\Throwable $e) {
        return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
    }
        
    }

    public function RingkasanIkeps(Request $request){
        return view ('ikeps.ringkasan_ikeps');
    }
}
