<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ikeps;
use App\Models\IkepsKemudahanSukan;
use App\Models\IkepsPrasaranaSukan;
use App\Models\IkepsPerancanganSukan;
use App\Models\IkepsStatusPenyertaan;
use App\Models\IkepsStatusPenyertaanDetails;
use App\Models\IkepsProgramSekolah;
use App\Models\InstrumenSkpakSpksIkeps;
use App\Models\User;
use App\Models\Module;
use App\Models\MasterAction;
use App\Models\ModuleStatus;
use App\Helpers\FMF;
use App\Models\Jurulatih;
use Carbon;
use PDO;
use Yajra\DataTables\DataTables;

class PengurusanIkepsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function BorangIkepsBaru(Request $request)
    {
        if(!isset($request->tahun)){
            $tahun = Carbon::now()->format('Y');
            return to_route('ikeps.ikeps_baru', ['tahun' => $tahun]);
        } else {
            $tahun = $request->tahun;

            $instrumen = InstrumenSkpakSpksIkeps::where('type', 'SEDIA')->where('status', 1)->orderBy('created_at', 'DESC')->first();
            $tarikhKuatKuasa = Carbon::createFromFormat('d/m/Y', $instrumen->tarikh_kuatkuasa);
            if($instrumen->tempoh_pengisian == 'Minggu'){
                $tarikhTamatPengisian = $tarikhKuatKuasa->clone()->addWeeks($instrumen->tempoh_pengisian_lain)->format('Y-m-d');
            } else {
                $tarikhTamatPengisian = $tarikhKuatKuasa->clone()->addMonths($instrumen->tempoh_pengisian_lain)->format('Y-m-d');
            }
            $tarikhKuatKuasa = $tarikhKuatKuasa->format('Y-m-d');

            if(Carbon::now()->format('Y-m-d') < $tarikhKuatKuasa) {
                $request->session()->flash('success', 'Pengisian Belum Dibuka');
                return redirect()->route('ikeps.ringkasan_ikeps', ['tahun' => $tahun]);
            } else if (Carbon::now()->format('Y-m-d') > $tarikhTamatPengisian){
                $request->session()->flash('danger', 'Tempoh Pengisian Telah Tamat');
                return redirect()->route('ikeps.ringkasan_ikeps', ['tahun' => $tahun]);
            } else {
                $canView = $canFill = $canVerify = false;
                $module = Module::where('module_name', $instrumen->id)->first();

                $ikeps = Ikeps::where('kod_sekolah', 0)->where('tahun', $tahun)->first();

                if(!$ikeps){
                    $status = ModuleStatus::where('status_index', 1)->where('module_id', $module->id)->first()->id;
                    $ikeps = Ikeps::create([
                        'kod_sekolah' => 0,
                        'tahun' => $tahun,
                        'status' => $status
                    ]);
                } else {
                    $status = $ikeps->status;
                }

                $prasaranaSukan = IkepsPrasaranaSukan::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
                $kemudahanSukan = IkepsKemudahanSukan::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
                $perancanganSukan = IkepsPerancanganSukan::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
                $statusPenyertaan = IkepsStatusPenyertaan::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
                $programSekolah = IkepsProgramSekolah::where('kod_sekolah', 0)->where('tahun', $tahun)->first();
                
                $canView = FMF::checkPermission($module->id, $status, 'view form');
                $canFill = FMF::checkPermission($module->id, $status, 'fill form');
                $canVerify = FMF::checkPermission($module->id, $status, 'verify form');
                
                $suSukan = User::whereHas('roles', function ($query) {
                    $query->where('name', 'setiausaha_sukan');
                })->get();

                $guruBesar = User::whereHas('roles', function ($query) {
                    $query->where('name', 'pengetua_guru_besar');
                })->get();

                $checkReadOnly = true;
                if($canFill){
                    $checkReadOnly = false;
                }

                $verifyStatus = false;
                if($canVerify) {
                    $verifyStatus = true;
                }
               
                if ($canFill || $canView) {
                    return view('ikeps.index', compact('tahun', 'ikeps', 'checkReadOnly', 'verifyStatus' , 'suSukan', 'guruBesar', 'prasaranaSukan', 'kemudahanSukan', 'perancanganSukan', 'statusPenyertaan', 'programSekolah'));
                } else {
                    $request->session()->flash('danger', 'Permission denied');
                    //return redirect()->route('ikeps.ringkasan_ikeps', ['tahun' => $tahun]);
                    return redirect()->route('home');
                }
            }
        }
    }

    public function getSubDetails(Request $request)
    {
        $tab = $request->tab;
        $type = $request->type;
        $data = config('staticdata.ikeps.'.$tab.'.'.$type.'.sub');

        if($type == 'padang_sekolah'){
            unset($data['status_padang']);
            unset($data['gred_padang']);
        }

        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'detail' => $data]);
    }

    public function getStatusPenyertaan(Request $request)
    {
        $value = $request->value;
        $name = $request->name;
        $type = $request->type;

        $title = ucwords($name.' '.$type);
        $jurulatih = Jurulatih::all();

        return view('ikeps.borang_ikeps.status_penyertaan_details', compact('title', 'value', 'name', 'type', 'jurulatih'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            // get fmf first status
            $staticForm = InstrumenSkpakSpksIkeps::where('type', 'SEDIA')->where('status', 1)->orderBy('created_at', 'DESC')->first();
            $moduleId = Module::where('module_name', $staticForm->id)->where('active', 1)->first();
            if (empty($moduleId)) {
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Flow Not defined"], 404);
            }
            $staticModuleId = $moduleId->id;
            //$moduleStatus = ModuleStatus::where('module_id', $staticModuleId)->where('status_index', 1)->first();
            $ikeps = Ikeps::find($request->ikeps_id);
            $status = FMF::getNextStatus($staticModuleId, $ikeps->status);

            if ($request->tab == 'prasarana_sukan') {
                $dataValidation = [
                    'pemeriksaan_keselamatan' => 'required|boolean',
                    'tarikh_pemeriksaan' => 'required_if:pemeriksaan_keselamatan,true',
                ];
                $msgValidation = [
                    'pemeriksaan_keselamatan.required' => 'Sila Pilih Pemeriksaan Keselamatan',
                    'tarikh_pemeriksaan' => 'Sila Pilih Tarikh Pemeriksaan',
                ];
                $prasarana_sukan = config('staticdata.ikeps.prasarana_sukan');
                $column = [
                    'gunasama',
                    'bilangan',
                    'masih_digunakan',
                    'status_fizikal',
                ];

                foreach($prasarana_sukan as $sukanKey => $sukan){
                    $dataValidation[$sukanKey] = 'required|boolean';
                    $msgValidation[$sukanKey.'.required'] = 'Sila Pilih '.$sukan['main'];

                    if($sukanKey == 'bilik_kecergasan' || $sukanKey == 'makmal_sains' || $sukanKey == 'kolam_renang'){
                        foreach($column as $col){

                            if($col == 'bilangan'){
                                $colValidation = 'required_if:'.$sukanKey.',true|integer';
                                $colMsg = 'Sila Isi ';
                            } 
                            else if($col == 'status_fizikal'){
                                $colValidation = 'required_if:'.$sukanKey.',true|integer|between:1,5';
                                $colMsg = 'Sila Pilih ';
                            }
                            else {
                                $colValidation = 'required_if:'.$sukanKey.',true|boolean';
                                $colMsg = 'Sila Pilih ';
                            }

                            $dataValidation[$sukanKey.'_'.$col] = $colValidation;
                            $msgValidation[$sukanKey.'_'.$col.'.required_if'] = $colMsg.ucwords(str_replace('_', ' ', $col).' '.$sukan['main']);
                        }
                    } else {
                        $dataValidation[$sukanKey.'_bilangan'] = 'required_if:'.$sukanKey.',true|integer';
                        $msgValidation[$sukanKey.'_bilangan.required_if'] = 'Sila Isi Bilangan '.$sukan['main'];

                        if($sukanKey == 'padang_sekolah'){
                            $dataValidation[$sukanKey.'_gunasama'] = 'required_if:'.$sukanKey.',true|boolean';
                            $msgValidation[$sukanKey.'_gunasama.required_if'] = 'Sila Pilih Gunasama '.$sukan['main'];
                        }

                        foreach($sukan['sub'] as $subKey => $sub){
                            if($subKey != 'status_padang' && $subKey != 'gred_padang'){
                                $dataValidation[$subKey] = 'required_if:'.$sukanKey.',true|boolean';
                                $msgValidation[$subKey.'.required_if'] = 'Sila Pilih '.$sub;

                                foreach($column as $col){
                                    if($col == 'bilangan'){
                                        $colValidation = 'required_if:'.$subKey.',true|integer';
                                        $colMsg = 'Sila Isi ';
                                    } 
                                    else if($col == 'status_fizikal'){
                                        $colValidation = 'required_if:'.$subKey.',true|integer|between:1,5';
                                        $colMsg = 'Sila Pilih ';
                                    }
                                    else {
                                        $colValidation = 'required_if:'.$subKey.',true|boolean';
                                        $colMsg = 'Sila Pilih ';
                                    }

                                    $dataValidation[$subKey.'_'.$col] = $colValidation;
                                    $msgValidation[$subKey.'_'.$col.'.required_if'] = $colMsg.ucwords(str_replace('_', ' ', $col).' '.$sub);
                                }
                            }
                        }
                    }
                }

                $request->validate($dataValidation, $msgValidation);

                IkepsPrasaranaSukan::updateOrCreate(
                    [
                        'tahun' => $request->tahun,
                        'kod_sekolah' => isset($request->kod_sekolah) ? $request->kod_sekolah : 0,
                    ],
                    [
                        // Pemeriksaan Keselamatan
                        'pemeriksaan_keselamatan' => isset($request->pemeriksaan_keselamatan) ? $request->pemeriksaan_keselamatan : null,
                        'tarikh_pemeriksaan' => isset($request->tarikh_pemeriksaan) ? $request->tarikh_pemeriksaan : null,

                        // Padang Sekolah
                        'padang_sekolah' => $request->padang_sekolah,
                        'padang_sekolah_gunasama' => isset($request->padang_sekolah_gunasama) ? $request->padang_sekolah_gunasama : null,
                        'padang_sekolah_bilangan' => isset($request->padang_sekolah_bilangan) ? $request->padang_sekolah_bilangan : null,

                        'status_padang' => isset($request->status_padang) ? $request->status_padang : null,
                        'status_padang_butiran' => isset($request->status_padang_butiran) ? $request->status_padang_butiran : null,

                        // Keluasan Trek 400M
                        'kt_400' => isset($request->kt_400) ? $request->kt_400 : false,
                        'kt_400_gunasama' => isset($request->kt_400_gunasama) ? $request->kt_400_gunasama : null,
                        'kt_400_bilangan' => isset($request->kt_400_bilangan) ? $request->kt_400_bilangan : null,
                        'kt_400_masih_digunakan' => isset($request->kt_400_masih_digunakan) ? $request->kt_400_masih_digunakan : null,
                        'kt_400_status_fizikal' => isset($request->kt_400_status_fizikal) ? $request->kt_400_status_fizikal : null,

                        // Keluasan Trek 300M
                        'kt_300' => isset($request->kt_300) ? $request->kt_300 : false,
                        'kt_300_gunasama' => isset($request->kt_300_gunasama) ? $request->kt_300_gunasama : null,
                        'kt_300_bilangan' => isset($request->kt_300_bilangan) ? $request->kt_300_bilangan : null,
                        'kt_300_masih_digunakan' => isset($request->kt_300_masih_digunakan) ? $request->kt_300_masih_digunakan : null,
                        'kt_300_status_fizikal' => isset($request->kt_300_status_fizikal) ? $request->kt_300_status_fizikal : null,

                        // Keluasan Trek 200M
                        'kt_200' => isset($request->kt_200) ? $request->kt_200 : false,
                        'kt_200_gunasama' => isset($request->kt_200_gunasama) ? $request->kt_200_gunasama : null,
                        'kt_200_bilangan' => isset($request->kt_200_bilangan) ? $request->kt_200_bilangan : null,
                        'kt_200_masih_digunakan' => isset($request->kt_200_masih_digunakan) ? $request->kt_200_masih_digunakan : null,
                        'kt_200_status_fizikal' => isset($request->kt_200_status_fizikal) ? $request->kt_200_status_fizikal : null,

                        // Keluasan Trek Kurang 200M
                        'ktk_200' => isset($request->ktk_200) ? $request->ktk_200 : false,
                        'ktk_200_gunasama' => isset($request->ktk_200_gunasama) ? $request->ktk_200_gunasama : null,
                        'ktk_200_bilangan' => isset($request->ktk_200_bilangan) ? $request->ktk_200_bilangan : null,
                        'ktk_200_masih_digunakan' => isset($request->ktk_200_masih_digunakan) ? $request->ktk_200_masih_digunakan : null,
                        'ktk_200_status_fizikal' => isset($request->ktk_200_status_fizikal) ? $request->ktk_200_status_fizikal : null,

                        // Gred Padang
                        'gred_padang' => isset($request->gred_padang) ? $request->gred_padang : null,

                        // Trek Sintetik
                        'trek_sintetik' => $request->trek_sintetik,
                        'trek_sintetik_bilangan' => isset($request->trek_sintetik_bilangan) ? $request->trek_sintetik_bilangan : null,

                        // Trek 400M
                        'trek_400' => isset($request->trek_400) ? $request->trek_400 : false,
                        'trek_400_gunasama' => isset($request->trek_400_gunasama) ? $request->trek_400_gunasama : null,
                        'trek_400_bilangan' => isset($request->trek_400_bilangan) ? $request->trek_400_bilangan : null,
                        'trek_400_masih_digunakan' => isset($request->trek_400_masih_digunakan) ? $request->trek_400_masih_digunakan : null,
                        'trek_400_status_fizikal' => isset($request->trek_400_status_fizikal) ? $request->trek_400_status_fizikal : null,

                        // Trek 200M
                        'trek_200' => isset($request->trek_200) ? $request->trek_200 : false,
                        'trek_200_gunasama' => isset($request->trek_200_gunasama) ? $request->trek_200_gunasama : null,
                        'trek_200_bilangan' => isset($request->trek_200_bilangan) ? $request->trek_200_bilangan : null,
                        'trek_200_masih_digunakan' => isset($request->trek_200_masih_digunakan) ? $request->trek_200_masih_digunakan : null,

                        // Trek Lain
                        'trek_lain' => isset($request->trek_lain) ? $request->trek_lain : false,
                        'trek_lain_butiran' => isset($request->trek_lain_butiran) ? $request->trek_lain_butiran : null,
                        'trek_lain_gunasama' => isset($request->trek_lain_gunasama) ? $request->trek_lain_gunasama : null,
                        'trek_lain_bilangan' => isset($request->trek_lain_bilangan) ? $request->trek_lain_bilangan : null,
                        'trek_lain_masih_digunakan' => isset($request->trek_lain_masih_digunakan) ? $request->trek_lain_masih_digunakan : null,
                        'trek_lain_status_fizikal' => isset($request->trek_lain_status_fizikal) ? $request->trek_lain_status_fizikal : null,

                        'astaka' => $request->astaka,
                        'astaka_bilangan' => isset($request->astaka_bilangan) ? $request->astaka_bilangan : null,

                        'km_500' => isset($request->km_500) ? $request->km_500 : false,
                        'km_500_gunasama' => isset($request->km_500_gunasama) ? $request->km_500_gunasama : null,
                        'km_500_bilangan' => isset($request->km_500_bilangan) ? $request->km_500_bilangan : null,
                        'km_500_masih_digunakan' => isset($request->km_500_masih_digunakan) ? $request->km_500_masih_digunakan : null,
                        'km_500_status_fizikal' => isset($request->km_500_status_fizikal) ? $request->km_500_status_fizikal : null,

                        'kk_500' => isset($request->kk_500) ? $request->kk_500 : false,
                        'kk_500_gunasama' => isset($request->kk_500_gunasama) ? $request->kk_500_gunasama : null,
                        'kk_500_bilangan' => isset($request->kk_500_bilangan) ? $request->kk_500_bilangan : null,
                        'kk_500_masih_digunakan' => isset($request->kk_500_masih_digunakan) ? $request->kk_500_masih_digunakan : null,
                        'kk_500_status_fizikal' => isset($request->kk_500_status_fizikal) ? $request->kk_500_status_fizikal : null,

                        'dewan' => $request->dewan,
                        'dewan_bilangan' => isset($request->dewan_bilangan) ? $request->dewan_bilangan : null,

                        'dewan_besar' => isset($request->dewan_besar) ? $request->dewan_besar : false,
                        'dewan_besar_gunasama' => isset($request->dewan_besar_gunasama) ? $request->dewan_besar_gunasama : null,
                        'dewan_besar_bilangan' => isset($request->dewan_besar_bilangan) ? $request->dewan_besar_bilangan : null,
                        'dewan_besar_masih_digunakan' => isset($request->dewan_besar_masih_digunakan) ? $request->dewan_besar_masih_digunakan : null,
                        'dewan_besar_status_fizikal' => isset($request->dewan_besar_status_fizikal) ? $request->dewan_besar_status_fizikal : null,

                        'dewan_khas' => isset($request->dewan_khas) ? $request->dewan_khas : false,
                        'dewan_khas_gunasama' => isset($request->dewan_khas_gunasama) ? $request->dewan_khas_gunasama : null,
                        'dewan_khas_bilangan' => isset($request->dewan_khas_bilangan) ? $request->dewan_khas_bilangan : null,
                        'dewan_khas_masih_digunakan' => isset($request->dewan_khas_masih_digunakan) ? $request->dewan_khas_masih_digunakan : null,
                        'dewan_khas_status_fizikal' => isset($request->dewan_khas_status_fizikal) ? $request->dewan_khas_status_fizikal : null,

                        'bilik_sukan' => $request->bilik_sukan,
                        'bilik_sukan_bilangan' => isset($request->bilik_sukan_bilangan) ? $request->bilik_sukan_bilangan : null,

                        'stor_1' => isset($request->stor_1) ? $request->stor_1 : false,
                        'stor_1_gunasama' => isset($request->stor_1_gunasama) ? $request->stor_1_gunasama : null,
                        'stor_1_bilangan' => isset($request->stor_1_bilangan) ? $request->stor_1_bilangan : null,
                        'stor_1_masih_digunakan' => isset($request->stor_1_masih_digunakan) ? $request->stor_1_masih_digunakan : null,
                        'stor_1_status_fizikal' => isset($request->stor_1_status_fizikal) ? $request->stor_1_status_fizikal : null,

                        'stor_2' => isset($request->stor_2) ? $request->stor_2 : false,
                        'stor_2_gunasama' => isset($request->stor_2_gunasama) ? $request->stor_2_gunasama : null,
                        'stor_2_bilangan' => isset($request->stor_2_bilangan) ? $request->stor_2_bilangan : null,
                        'stor_2_masih_digunakan' => isset($request->stor_2_masih_digunakan) ? $request->stor_2_masih_digunakan : null,
                        'stor_2_status_fizikal' => isset($request->stor_2_status_fizikal) ? $request->stor_2_status_fizikal : null,

                        'stor_3' => isset($request->stor_3) ? $request->stor_3 : false,
                        'stor_3_gunasama' => isset($request->stor_3_gunasama) ? $request->stor_3_gunasama : null,
                        'stor_3_bilangan' => isset($request->stor_3_bilangan) ? $request->stor_3_bilangan : null,
                        'stor_3_masih_digunakan' => isset($request->stor_3_masih_digunakan) ? $request->stor_3_masih_digunakan : null,
                        'stor_3_status_fizikal' => isset($request->stor_3_status_fizikal) ? $request->stor_3_status_fizikal : null,

                        'bilik_persalinan' => $request->bilik_persalinan,
                        'bilik_persalinan_bilangan' => isset($request->bilik_persalinan_bilangan) ? $request->bilik_persalinan_bilangan : null,

                        'murid_lelaki' => isset($request->murid_lelaki) ? $request->murid_lelaki : false,
                        'murid_lelaki_gunasama' => isset($request->murid_lelaki_gunasama) ? $request->murid_lelaki_gunasama : null,
                        'murid_lelaki_bilangan' => isset($request->murid_lelaki_bilangan) ? $request->murid_lelaki_bilangan : null,
                        'murid_lelaki_masih_digunakan' => isset($request->murid_lelaki_masih_digunakan) ? $request->murid_lelaki_masih_digunakan : null,
                        'murid_lelaki_status_fizikal' => isset($request->murid_lelaki_status_fizikal) ? $request->murid_lelaki_status_fizikal : null,

                        'murid_perempuan' => isset($request->murid_perempuan) ? $request->murid_perempuan : false,
                        'murid_perempuan_gunasama' => isset($request->murid_perempuan_gunasama) ? $request->murid_perempuan_gunasama : null,
                        'murid_perempuan_bilangan' => isset($request->murid_perempuan_bilangan) ? $request->murid_perempuan_bilangan : null,
                        'murid_perempuan_masih_digunakan' => isset($request->murid_perempuan_masih_digunakan) ? $request->murid_perempuan_masih_digunakan : null,
                        'murid_perempuan_status_fizikal' => isset($request->murid_perempuan_status_fizikal) ? $request->murid_perempuan_status_fizikal : null,

                        'gelanggang_serbaguna' => $request->gelanggang_serbaguna,
                        'gelanggang_serbaguna_bilangan' => isset($request->gelanggang_serbaguna_bilangan) ? $request->gelanggang_serbaguna_bilangan : null,

                        'terbuka_berbumbung' => isset($request->terbuka_berbumbung) ? $request->terbuka_berbumbung : false,
                        'terbuka_berbumbung_gunasama' => isset($request->terbuka_berbumbung_gunasama) ? $request->terbuka_berbumbung_gunasama : null,
                        'terbuka_berbumbung_bilangan' => isset($request->terbuka_berbumbung_bilangan) ? $request->terbuka_berbumbung_bilangan : null,
                        'terbuka_berbumbung_masih_digunakan' => isset($request->terbuka_berbumbung_masih_digunakan) ? $request->terbuka_berbumbung_masih_digunakan : null,
                        'terbuka_berbumbung_status_fizikal' => isset($request->terbuka_berbumbung_status_fizikal) ? $request->terbuka_berbumbung_status_fizikal : null,

                        'terbuka' => isset($request->terbuka) ? $request->terbuka : false,
                        'terbuka_gunasama' => isset($request->terbuka_gunasama) ? $request->terbuka_gunasama : null,
                        'terbuka_bilangan' => isset($request->terbuka_bilangan) ? $request->terbuka_bilangan : null,
                        'terbuka_masih_digunakan' => isset($request->terbuka_masih_digunakan) ? $request->terbuka_masih_digunakan : null,
                        'terbuka_status_fizikal' => isset($request->terbuka_status_fizikal) ? $request->terbuka_status_fizikal : null,

                        'bilik_kecergasan' => $request->bilik_kecergasan,
                        'bilik_kecergasan_gunasama' => isset($request->bilik_kecergasan_gunasama) ? $request->bilik_kecergasan_gunasama : null,
                        'bilik_kecergasan_bilangan' => isset($request->bilik_kecergasan_bilangan) ? $request->bilik_kecergasan_bilangan : null,
                        'bilik_kecergasan_masih_digunakan' => isset($request->bilik_kecergasan_masih_digunakan) ? $request->bilik_kecergasan_masih_digunakan : null,
                        'bilik_kecergasan_status_fizikal' => isset($request->bilik_kecergasan_status_fizikal) ? $request->bilik_kecergasan_status_fizikal : null,

                        'makmal_sains' => $request->makmal_sains,
                        'makmal_sains_gunasama' => isset($request->makmal_sains_gunasama) ? $request->makmal_sains_gunasama : null,
                        'makmal_sains_bilangan' => isset($request->makmal_sains_bilangan) ? $request->makmal_sains_bilangan : null,
                        'makmal_sains_masih_digunakan' => isset($request->makmal_sains_masih_digunakan) ? $request->makmal_sains_masih_digunakan : null,
                        'makmal_sains_status_fizikal' => isset($request->makmal_sains_status_fizikal) ? $request->makmal_sains_status_fizikal : null,

                        'kolam_renang' => $request->kolam_renang,
                        'kolam_renang_gunasama' => isset($request->kolam_renang_gunasama) ? $request->kolam_renang_gunasama : null,
                        'kolam_renang_bilangan' => isset($request->kolam_renang_bilangan) ? $request->kolam_renang_bilangan : null,
                        'kolam_renang_masih_digunakan' => isset($request->kolam_renang_masih_digunakan) ? $request->kolam_renang_masih_digunakan : null,
                        'kolam_renang_status_fizikal' => isset($request->kolam_renang_status_fizikal) ? $request->kolam_renang_status_fizikal : null,

                        // 'created_by' => auth()->user()->id,
                        // 'updated_by' => auth()->user()->id,
                        // add fmf status
                        'status' => $status
                    ]
                );
            }

            if ($request->tab == 'kemudahan_sukan') {
                $dataValidation = [];
                $msgValidation = [];
                $kemudahan_sukan = config('staticdata.ikeps.kemudahan_sukan');
                $column = [
                    'gunasama',
                    'bilangan',
                    'masih_digunakan',
                    'status_fizikal',
                ];

                foreach($kemudahan_sukan as $sukanKey => $sukan){
                    $dataValidation[$sukanKey] = 'required|boolean';
                    $msgValidation[$sukanKey.'.required'] = 'Sila Pilih '.$sukan['main'];

                    $dataValidation[$sukanKey.'_bilangan'] = 'required_if:'.$sukanKey.',true|integer';
                    $msgValidation[$sukanKey.'_bilangan.required_if'] = 'Sila Isi Bilangan '.$sukan['main'];

                    foreach($sukan['sub'] as $subKey => $sub){
                        $dataValidation[$subKey] = 'required_if:'.$sukanKey.',true|boolean';
                        $msgValidation[$subKey.'.required_if'] = 'Sila Pilih '.$sub;

                        foreach($column as $col){
                            if($col == 'bilangan'){
                                $colValidation = 'required_if:'.$subKey.',true|integer';
                                $colMsg = 'Sila Isi ';
                            } 
                            else if($col == 'status_fizikal'){
                                $colValidation = 'required_if:'.$subKey.',true|integer|between:1,5';
                                $colMsg = 'Sila Pilih ';
                            }
                            else {
                                $colValidation = 'required_if:'.$subKey.',true|boolean';
                                $colMsg = 'Sila Pilih ';
                            }

                            $dataValidation[$subKey.'_'.$col] = $colValidation;
                            $msgValidation[$subKey.'_'.$col.'.required_if'] = $colMsg.ucwords(str_replace('_', ' ', $col).' '.$sub);
                        }
                        
                    }
                    
                }

                $request->validate($dataValidation, $msgValidation);

                IkepsKemudahanSukan::updateOrCreate(
                    [
                        'tahun' => $request->tahun,
                        'kod_sekolah' => isset($request->kod_sekolah) ? $request->kod_sekolah : 0,
                    ],
                    [
                        // Bola Sepak
                        'bola_sepak' => $request->bola_sepak,
                        'bola_sepak_bilangan' => isset($request->bola_sepak_bilangan) ? $request->bola_sepak_bilangan : null,

                        'bs_saiz_standard' => isset($request->bs_saiz_standard) ? $request->bs_saiz_standard : false,
                        'bs_saiz_standard_gunasama' => isset($request->bs_saiz_standard_gunasama) ? $request->bs_saiz_standard_gunasama : null,
                        'bs_saiz_standard_bilangan' => isset($request->bs_saiz_standard_bilangan) ? $request->bs_saiz_standard_bilangan : null,
                        'bs_saiz_standard_masih_digunakan' => isset($request->bs_saiz_standard_masih_digunakan) ? $request->bs_saiz_standard_masih_digunakan : null,
                        'bs_saiz_standard_status_fizikal' => isset($request->bs_saiz_standard_status_fizikal) ? $request->bs_saiz_standard_status_fizikal : null,

                        'bs_saiz_latihan' => isset($request->bs_saiz_latihan) ? $request->bs_saiz_latihan : false,
                        'bs_saiz_latihan_gunasama' => isset($request->bs_saiz_latihan_gunasama) ? $request->bs_saiz_latihan_gunasama : null,
                        'bs_saiz_latihan_bilangan' => isset($request->bs_saiz_latihan_bilangan) ? $request->bs_saiz_latihan_bilangan : null,
                        'bs_saiz_latihan_masih_digunakan' => isset($request->bs_saiz_latihan_masih_digunakan) ? $request->bs_saiz_latihan_masih_digunakan : null,
                        'bs_saiz_latihan_status_fizikal' => isset($request->bs_saiz_latihan_status_fizikal) ? $request->bs_saiz_latihan_status_fizikal : null,

                        // Padang Hoki
                        'hoki' => $request->hoki,
                        'hoki_bilangan' => isset($request->hoki_bilangan) ? $request->hoki_bilangan : null,

                        'hoki_saiz_standard' => isset($request->hoki_saiz_standard) ? $request->hoki_saiz_standard : false,
                        'hoki_saiz_standard_gunasama' => isset($request->hoki_saiz_standard_gunasama) ? $request->hoki_saiz_standard_gunasama : null,
                        'hoki_saiz_standard_bilangan' => isset($request->hoki_saiz_standard_bilangan) ? $request->hoki_saiz_standard_bilangan : null,
                        'hoki_saiz_standard_masih_digunakan' => isset($request->hoki_saiz_standard_masih_digunakan) ? $request->hoki_saiz_standard_masih_digunakan : null,
                        'hoki_saiz_standard_status_fizikal' => isset($request->hoki_saiz_standard_status_fizikal) ? $request->hoki_saiz_standard_status_fizikal : null,

                        'hoki_saiz_latihan' => isset($request->hoki_saiz_latihan) ? $request->hoki_saiz_latihan : false,
                        'hoki_saiz_latihan_gunasama' => isset($request->hoki_saiz_latihan_gunasama) ? $request->hoki_saiz_latihan_gunasama : null,
                        'hoki_saiz_latihan_bilangan' => isset($request->hoki_saiz_latihan_bilangan) ? $request->hoki_saiz_latihan_bilangan : null,
                        'hoki_saiz_latihan_masih_digunakan' => isset($request->hoki_saiz_latihan_masih_digunakan) ? $request->hoki_saiz_latihan_masih_digunakan : null,
                        'hoki_saiz_latihan_status_fizikal' => isset($request->hoki_saiz_latihan_status_fizikal) ? $request->hoki_saiz_latihan_status_fizikal : null,

                        'hoki_rumput_standard' => isset($request->hoki_rumput_standard) ? $request->hoki_rumput_standard : false,
                        'hoki_rumput_standard_gunasama' => isset($request->hoki_rumput_standard_gunasama) ? $request->hoki_rumput_standard_gunasama : null,
                        'hoki_rumput_standard_bilangan' => isset($request->hoki_rumput_standard_bilangan) ? $request->hoki_rumput_standard_bilangan : null,
                        'hoki_rumput_standard_masih_digunakan' => isset($request->hoki_rumput_standard_masih_digunakan) ? $request->hoki_rumput_standard_masih_digunakan : null,
                        'hoki_rumput_standard_status_fizikal' => isset($request->hoki_rumput_standard_status_fizikal) ? $request->hoki_rumput_standard_status_fizikal : null,

                        'hoki_rumput_latihan' => isset($request->hoki_rumput_latihan) ? $request->hoki_rumput_latihan : false,
                        'hoki_rumput_latihan_gunasama' => isset($request->hoki_rumput_latihan_gunasama) ? $request->hoki_rumput_latihan_gunasama : null,
                        'hoki_rumput_latihan_bilangan' => isset($request->hoki_rumput_latihan_bilangan) ? $request->hoki_rumput_latihan_bilangan : null,
                        'hoki_rumput_latihan_masih_digunakan' => isset($request->hoki_rumput_latihan_masih_digunakan) ? $request->hoki_rumput_latihan_masih_digunakan : null,
                        'hoki_rumput_latihan_status_fizikal' => isset($request->hoki_rumput_latihan_status_fizikal) ? $request->hoki_rumput_latihan_status_fizikal : null,

                        // Bola Jaring
                        'bola_jaring' => $request->bola_jaring,
                        'bola_jaring_bilangan' => isset($request->bola_jaring_bilangan) ? $request->bola_jaring_bilangan : null,

                        'bj_dewan' => isset($request->bj_dewan) ? $request->bj_dewan : false,
                        'bj_dewan_gunasama' => isset($request->bj_dewan_gunasama) ? $request->bj_dewan_gunasama : null,
                        'bj_dewan_bilangan' => isset($request->bj_dewan_bilangan) ? $request->bj_dewan_bilangan : null,
                        'bj_dewan_masih_digunakan' => isset($request->bj_dewan_masih_digunakan) ? $request->bj_dewan_masih_digunakan : null,
                        'bj_dewan_status_fizikal' => isset($request->bj_dewan_status_fizikal) ? $request->bj_dewan_status_fizikal : null,

                        'bj_berbumbung' => isset($request->bj_berbumbung) ? $request->bj_berbumbung : false,
                        'bj_berbumbung_gunasama' => isset($request->bj_berbumbung_gunasama) ? $request->bj_berbumbung_gunasama : null,
                        'bj_berbumbung_bilangan' => isset($request->bj_berbumbung_bilangan) ? $request->bj_berbumbung_bilangan : null,
                        'bj_berbumbung_masih_digunakan' => isset($request->bj_berbumbung_masih_digunakan) ? $request->bj_berbumbung_masih_digunakan : null,
                        'bj_berbumbung_status_fizikal' => isset($request->bj_berbumbung_status_fizikal) ? $request->bj_berbumbung_status_fizikal : null,

                        'bj_hardcourt' => isset($request->bj_hardcourt) ? $request->bj_hardcourt : false,
                        'bj_hardcourt_gunasama' => isset($request->bj_hardcourt_gunasama) ? $request->bj_hardcourt_gunasama : null,
                        'bj_hardcourt_bilangan' => isset($request->bj_hardcourt_bilangan) ? $request->bj_hardcourt_bilangan : null,
                        'bj_hardcourt_masih_digunakan' => isset($request->bj_hardcourt_masih_digunakan) ? $request->bj_hardcourt_masih_digunakan : null,
                        'bj_hardcourt_status_fizikal' => isset($request->bj_hardcourt_status_fizikal) ? $request->bj_hardcourt_status_fizikal : null,

                        'bj_berumput' => isset($request->bj_berumput) ? $request->bj_berumput : false,
                        'bj_berumput_gunasama' => isset($request->bj_berumput_gunasama) ? $request->bj_berumput_gunasama : null,
                        'bj_berumput_bilangan' => isset($request->bj_berumput_bilangan) ? $request->bj_berumput_bilangan : null,
                        'bj_berumput_masih_digunakan' => isset($request->bj_berumput_masih_digunakan) ? $request->bj_berumput_masih_digunakan : null,
                        'bj_berumput_status_fizikal' => isset($request->bj_berumput_status_fizikal) ? $request->bj_berumput_status_fizikal : null,

                        // Sepak Takraw
                        'sepak_takraw' => $request->sepak_takraw,
                        'sepak_takraw_bilangan' => isset($request->sepak_takraw_bilangan) ? $request->sepak_takraw_bilangan : null,

                        'st_dewan' => isset($request->st_dewan) ? $request->st_dewan : false,
                        'st_dewan_gunasama' => isset($request->st_dewan_gunasama) ? $request->st_dewan_gunasama : null,
                        'st_dewan_bilangan' => isset($request->st_dewan_bilangan) ? $request->st_dewan_bilangan : null,
                        'st_dewan_masih_digunakan' => isset($request->st_dewan_masih_digunakan) ? $request->st_dewan_masih_digunakan : null,
                        'st_dewan_status_fizikal' => isset($request->st_dewan_status_fizikal) ? $request->st_dewan_status_fizikal : null,

                        'st_berbumbung' => isset($request->st_berbumbung) ? $request->st_berbumbung : false,
                        'st_berbumbung_gunasama' => isset($request->st_berbumbung_gunasama) ? $request->st_berbumbung_gunasama : null,
                        'st_berbumbung_bilangan' => isset($request->st_berbumbung_bilangan) ? $request->st_berbumbung_bilangan : null,
                        'st_berbumbung_masih_digunakan' => isset($request->st_berbumbung_masih_digunakan) ? $request->st_berbumbung_masih_digunakan : null,
                        'st_berbumbung_status_fizikal' => isset($request->st_berbumbung_status_fizikal) ? $request->st_berbumbung_status_fizikal : null,

                        'st_terbuka' => isset($request->st_terbuka) ? $request->st_terbuka : false,
                        'st_terbuka_gunasama' => isset($request->st_terbuka_gunasama) ? $request->st_terbuka_gunasama : null,
                        'st_terbuka_bilangan' => isset($request->st_terbuka_bilangan) ? $request->st_terbuka_bilangan : null,
                        'st_terbuka_masih_digunakan' => isset($request->st_terbuka_masih_digunakan) ? $request->st_terbuka_masih_digunakan : null,
                        'st_terbuka_status_fizikal' => isset($request->st_terbuka_status_fizikal) ? $request->st_terbuka_status_fizikal : null,

                        // Bola Tampar
                        'bola_tampar' => $request->bola_tampar,
                        'bola_tampar_bilangan' => isset($request->bola_tampar_bilangan) ? $request->bola_tampar_bilangan : null,

                        'bt_dewan' => isset($request->bt_dewan) ? $request->bt_dewan : false,
                        'bt_dewan_gunasama' => isset($request->bt_dewan_gunasama) ? $request->bt_dewan_gunasama : null,
                        'bt_dewan_bilangan' => isset($request->bt_dewan_bilangan) ? $request->bt_dewan_bilangan : null,
                        'bt_dewan_masih_digunakan' => isset($request->bt_dewan_masih_digunakan) ? $request->bt_dewan_masih_digunakan : null,
                        'bt_dewan_status_fizikal' => isset($request->bt_dewan_status_fizikal) ? $request->bt_dewan_status_fizikal : null,

                        'bt_berbumbung' => isset($request->bt_berbumbung) ? $request->bt_berbumbung : false,
                        'bt_berbumbung_gunasama' => isset($request->bt_berbumbung_gunasama) ? $request->bt_berbumbung_gunasama : null,
                        'bt_berbumbung_bilangan' => isset($request->bt_berbumbung_bilangan) ? $request->bt_berbumbung_bilangan : null,
                        'bt_berbumbung_masih_digunakan' => isset($request->bt_berbumbung_masih_digunakan) ? $request->bt_berbumbung_masih_digunakan : null,
                        'bt_berbumbung_status_fizikal' => isset($request->bt_berbumbung_status_fizikal) ? $request->bt_berbumbung_status_fizikal : null,

                        'bt_terbuka' => isset($request->bt_terbuka) ? $request->bt_terbuka : false,
                        'bt_terbuka_gunasama' => isset($request->bt_terbuka_gunasama) ? $request->bt_terbuka_gunasama : null,
                        'bt_terbuka_bilangan' => isset($request->bt_terbuka_bilangan) ? $request->bt_terbuka_bilangan : null,
                        'bt_terbuka_masih_digunakan' => isset($request->bt_terbuka_masih_digunakan) ? $request->bt_terbuka_masih_digunakan : null,
                        'bt_terbuka_status_fizikal' => isset($request->bt_terbuka_status_fizikal) ? $request->bt_terbuka_status_fizikal : null,

                        // Badminton
                        'badminton' => $request->badminton,
                        'badminton_bilangan' => isset($request->badminton_bilangan) ? $request->badminton_bilangan : null,

                        'badminton_dewan' => isset($request->badminton_dewan) ? $request->badminton_dewan : false,
                        'badminton_dewan_gunasama' => isset($request->badminton_dewan_gunasama) ? $request->badminton_dewan_gunasama : null,
                        'badminton_dewan_bilangan' => isset($request->badminton_dewan_bilangan) ? $request->badminton_dewan_bilangan : null,
                        'badminton_dewan_masih_digunakan' => isset($request->badminton_dewan_masih_digunakan) ? $request->badminton_dewan_masih_digunakan : null,
                        'badminton_dewan_status_fizikal' => isset($request->badminton_dewan_status_fizikal) ? $request->badminton_dewan_status_fizikal : null,

                        'badminton_berbumbung' => isset($request->badminton_berbumbung) ? $request->badminton_berbumbung : false,
                        'badminton_berbumbung_gunasama' => isset($request->badminton_berbumbung_gunasama) ? $request->badminton_berbumbung_gunasama : null,
                        'badminton_berbumbung_bilangan' => isset($request->badminton_berbumbung_bilangan) ? $request->badminton_berbumbung_bilangan : null,
                        'badminton_berbumbung_masih_digunakan' => isset($request->badminton_berbumbung_masih_digunakan) ? $request->badminton_berbumbung_masih_digunakan : null,
                        'badminton_berbumbung_status_fizikal' => isset($request->badminton_berbumbung_status_fizikal) ? $request->badminton_berbumbung_status_fizikal : null,

                        'badminton_terbuka' => isset($request->badminton_terbuka) ? $request->badminton_terbuka : false,
                        'badminton_terbuka_gunasama' => isset($request->badminton_terbuka_gunasama) ? $request->badminton_terbuka_gunasama : null,
                        'badminton_terbuka_bilangan' => isset($request->badminton_terbuka_bilangan) ? $request->badminton_terbuka_bilangan : null,
                        'badminton_terbuka_masih_digunakan' => isset($request->badminton_terbuka_masih_digunakan) ? $request->badminton_terbuka_masih_digunakan : null,
                        'badminton_terbuka_status_fizikal' => isset($request->badminton_terbuka_status_fizikal) ? $request->badminton_terbuka_status_fizikal : null,

                        // Kriket
                        'kriket' => $request->kriket,
                        'kriket_bilangan' => isset($request->kriket_bilangan) ? $request->kriket_bilangan : null,

                        'kriket_standard' => isset($request->kriket_standard) ? $request->kriket_standard : false,
                        'kriket_standard_gunasama' => isset($request->kriket_standard_gunasama) ? $request->kriket_standard_gunasama : null,
                        'kriket_standard_bilangan' => isset($request->kriket_standard_bilangan) ? $request->kriket_standard_bilangan : null,
                        'kriket_standard_masih_digunakan' => isset($request->kriket_standard_masih_digunakan) ? $request->kriket_standard_masih_digunakan : null,
                        'kriket_standard_status_fizikal' => isset($request->kriket_standard_status_fizikal) ? $request->kriket_standard_status_fizikal : null,

                        'kriket_latihan' => isset($request->kriket_latihan) ? $request->kriket_latihan : false,
                        'kriket_latihan_gunasama' => isset($request->kriket_latihan_gunasama) ? $request->kriket_latihan_gunasama : null,
                        'kriket_latihan_bilangan' => isset($request->kriket_latihan_bilangan) ? $request->kriket_latihan_bilangan : null,
                        'kriket_latihan_masih_digunakan' => isset($request->kriket_latihan_masih_digunakan) ? $request->kriket_latihan_masih_digunakan : null,
                        'kriket_latihan_status_fizikal' => isset($request->kriket_latihan_status_fizikal) ? $request->kriket_latihan_status_fizikal : null,

                        // Tenis
                        'tenis' => $request->tenis,
                        'tenis_bilangan' => isset($request->tenis_bilangan) ? $request->tenis_bilangan : null,

                        'tenis_terbuka' => isset($request->tenis_terbuka) ? $request->tenis_terbuka : false,
                        'tenis_terbuka_gunasama' => isset($request->tenis_terbuka_gunasama) ? $request->tenis_terbuka_gunasama : null,
                        'tenis_terbuka_bilangan' => isset($request->tenis_terbuka_bilangan) ? $request->tenis_terbuka_bilangan : null,
                        'tenis_terbuka_masih_digunakan' => isset($request->tenis_terbuka_masih_digunakan) ? $request->tenis_terbuka_masih_digunakan : null,
                        'tenis_terbuka_status_fizikal' => isset($request->tenis_terbuka_status_fizikal) ? $request->tenis_terbuka_status_fizikal : null,

                        // Ping Pong
                        'ping_pong' => $request->ping_pong,
                        'ping_pong_bilangan' => isset($request->ping_pong_bilangan) ? $request->ping_pong_bilangan : null,

                        'pp_tertutup' => isset($request->pp_tertutup) ? $request->pp_tertutup : false,
                        'pp_tertutup_gunasama' => isset($request->pp_tertutup_gunasama) ? $request->pp_tertutup_gunasama : null,
                        'pp_tertutup_bilangan' => isset($request->pp_tertutup_bilangan) ? $request->pp_tertutup_bilangan : null,
                        'pp_tertutup_masih_digunakan' => isset($request->pp_tertutup_masih_digunakan) ? $request->pp_tertutup_masih_digunakan : null,
                        'pp_tertutup_status_fizikal' => isset($request->pp_tertutup_status_fizikal) ? $request->pp_tertutup_status_fizikal : null,

                        'pp_terbuka' => isset($request->pp_terbuka) ? $request->pp_terbuka : false,
                        'pp_terbuka_gunasama' => isset($request->pp_terbuka_gunasama) ? $request->pp_terbuka_gunasama : null,
                        'pp_terbuka_bilangan' => isset($request->pp_terbuka_bilangan) ? $request->pp_terbuka_bilangan : null,
                        'pp_terbuka_masih_digunakan' => isset($request->pp_terbuka_masih_digunakan) ? $request->pp_terbuka_masih_digunakan : null,
                        'pp_terbuka_status_fizikal' => isset($request->pp_terbuka_status_fizikal) ? $request->pp_terbuka_status_fizikal : null,

                        // Sofbol
                        'sofbol' => $request->sofbol,
                        'sofbol_bilangan' => isset($request->sofbol_bilangan) ? $request->sofbol_bilangan : false,

                        'sofbol_standard' => isset($request->sofbol_standard) ? $request->sofbol_standard : false,
                        'sofbol_standard_gunasama' => isset($request->sofbol_standard_gunasama) ? $request->sofbol_standard_gunasama : null,
                        'sofbol_standard_bilangan' => isset($request->sofbol_standard_bilangan) ? $request->sofbol_standard_bilangan : null,
                        'sofbol_standard_masih_digunakan' => isset($request->sofbol_standard_masih_digunakan) ? $request->sofbol_standard_masih_digunakan : null,
                        'sofbol_standard_status_fizikal' => isset($request->sofbol_standard_status_fizikal) ? $request->sofbol_standard_status_fizikal : null,

                        'sofbol_latihan' => isset($request->sofbol_latihan) ? $request->sofbol_latihan : false,
                        'sofbol_latihan_gunasama' => isset($request->sofbol_latihan_gunasama) ? $request->sofbol_latihan_gunasama : null,
                        'sofbol_latihan_bilangan' => isset($request->sofbol_latihan_bilangan) ? $request->sofbol_latihan_bilangan : null,
                        'sofbol_latihan_masih_digunakan' => isset($request->sofbol_latihan_masih_digunakan) ? $request->sofbol_latihan_masih_digunakan : null,
                        'sofbol_latihan_status_fizikal' => isset($request->sofbol_latihan_status_fizikal) ? $request->sofbol_latihan_status_fizikal : null,

                        // Memanah
                        'memanah' => $request->memanah,
                        'memanah_bilangan' => isset($request->memanah_bilangan) ? $request->memanah_bilangan : null,

                        'memanah_standard' => isset($request->memanah_standard) ? $request->memanah_standard : false,
                        'memanah_standard_gunasama' => isset($request->memanah_standard_gunasama) ? $request->memanah_standard_gunasama : null,
                        'memanah_standard_bilangan' => isset($request->memanah_standard_bilangan) ? $request->memanah_standard_bilangan : null,
                        'memanah_standard_masih_digunakan' => isset($request->memanah_standard_masih_digunakan) ? $request->memanah_standard_masih_digunakan : null,
                        'memanah_standard_status_fizikal' => isset($request->memanah_standard_status_fizikal) ? $request->memanah_standard_status_fizikal : null,

                        'memanah_latihan' => isset($request->memanah_latihan) ? $request->memanah_latihan : false,
                        'memanah_latihan_gunasama' => isset($request->memanah_latihan_gunasama) ? $request->memanah_latihan_gunasama : null,
                        'memanah_latihan_bilangan' => isset($request->memanah_latihan_bilangan) ? $request->memanah_latihan_bilangan : null,
                        'memanah_latihan_masih_digunakan' => isset($request->memanah_latihan_masih_digunakan) ? $request->memanah_latihan_masih_digunakan : null,
                        'memanah_latihan_status_fizikal' => isset($request->memanah_latihan_status_fizikal) ? $request->memanah_latihan_status_fizikal : null,

                        // Skuasy
                        'skuasy' => $request->skuasy,
                        'skuasy_bilangan' => isset($request->skuasy_bilangan) ? $request->skuasy_bilangan : null,

                        'skuasy_dewan' => isset($request->skuasy_dewan) ? $request->skuasy_dewan : false,
                        'skuasy_dewan_gunasama' => isset($request->skuasy_dewan_gunasama) ? $request->skuasy_dewan_gunasama : null,
                        'skuasy_dewan_bilangan' => isset($request->skuasy_dewan_bilangan) ? $request->skuasy_dewan_bilangan : null,
                        'skuasy_dewan_masih_digunakan' => isset($request->skuasy_dewan_masih_digunakan) ? $request->skuasy_dewan_masih_digunakan : null,
                        'skuasy_dewan_status_fizikal' => isset($request->skuasy_dewan_status_fizikal) ? $request->skuasy_dewan_status_fizikal : null,

                        // Gimnastik Artistik
                        'gimnastik_artistik' => $request->gimnastik_artistik,
                        'gimnastik_artistik_bilangan' => isset($request->gimnastik_artistik_bilangan) ? $request->gimnastik_artistik_bilangan : null,

                        'ga_standard' => isset($request->ga_standard) ? $request->ga_standard : false,
                        'ga_standard_gunasama' => isset($request->ga_standard_gunasama) ? $request->ga_standard_gunasama : null,
                        'ga_standard_bilangan' => isset($request->ga_standard_bilangan) ? $request->ga_standard_bilangan : null,
                        'ga_standard_masih_digunakan' => isset($request->ga_standard_masih_digunakan) ? $request->ga_standard_masih_digunakan : null,
                        'ga_standard_status_fizikal' => isset($request->ga_standard_status_fizikal) ? $request->ga_standard_status_fizikal : null,

                        'ga_latihan' => isset($request->ga_latihan) ? $request->ga_latihan : false,
                        'ga_latihan_gunasama' => isset($request->ga_latihan_gunasama) ? $request->ga_latihan_gunasama : null,
                        'ga_latihan_bilangan' => isset($request->ga_latihan_bilangan) ? $request->ga_latihan_bilangan : null,
                        'ga_latihan_masih_digunakan' => isset($request->ga_latihan_masih_digunakan) ? $request->ga_latihan_masih_digunakan : null,
                        'ga_latihan_status_fizikal' => isset($request->ga_latihan_status_fizikal) ? $request->ga_latihan_status_fizikal : null,

                        // Gimnastik Berirama
                        'gimnastik_berirama' => $request->gimnastik_berirama,
                        'gimnastik_berirama_bilangan' => isset($request->gimnastik_berirama_bilangan) ? $request->gimnastik_berirama_bilangan : null,

                        'gb_standard' => isset($request->gb_standard) ? $request->gb_standard : false,
                        'gb_standard_gunasama' => isset($request->gb_standard_gunasama) ? $request->gb_standard_gunasama : null,
                        'gb_standard_bilangan' => isset($request->gb_standard_bilangan) ? $request->gb_standard_bilangan : null,
                        'gb_standard_masih_digunakan' => isset($request->gb_standard_masih_digunakan) ? $request->gb_standard_masih_digunakan : null,
                        'gb_standard_status_fizikal' => isset($request->gb_standard_status_fizikal) ? $request->gb_standard_status_fizikal : null,

                        'gb_latihan' => isset($request->gb_latihan) ? $request->gb_latihan : false,
                        'gb_latihan_gunasama' => isset($request->gb_latihan_gunasama) ? $request->gb_latihan_gunasama : null,
                        'gb_latihan_bilangan' => isset($request->gb_latihan_bilangan) ? $request->gb_latihan_bilangan : null,
                        'gb_latihan_masih_digunakan' => isset($request->gb_latihan_masih_digunakan) ? $request->gb_latihan_masih_digunakan : null,
                        'gb_latihan_status_fizikal' => isset($request->gb_latihan_status_fizikal) ? $request->gb_latihan_status_fizikal : null,

                        // Bola Baling
                        'bola_baling' => $request->bola_baling,
                        'bola_baling_bilangan' => isset($request->bola_baling_bilangan) ? $request->bola_baling_bilangan : null,

                        'bb_dewan' => isset($request->bb_dewan) ? $request->bb_dewan : false,
                        'bb_dewan_gunasama' => isset($request->bb_dewan_gunasama) ? $request->bb_dewan_gunasama : null,
                        'bb_dewan_bilangan' => isset($request->bb_dewan_bilangan) ? $request->bb_dewan_bilangan : null,
                        'bb_dewan_masih_digunakan' => isset($request->bb_dewan_masih_digunakan) ? $request->bb_dewan_masih_digunakan : null,
                        'bb_dewan_status_fizikal' => isset($request->bb_dewan_status_fizikal) ? $request->bb_dewan_status_fizikal : null,

                        'bb_berbumbung' => isset($request->bb_berbumbung) ? $request->bb_berbumbung : false,
                        'bb_berbumbung_gunasama' => isset($request->bb_berbumbung_gunasama) ? $request->bb_berbumbung_gunasama : null,
                        'bb_berbumbung_bilangan' => isset($request->bb_berbumbung_bilangan) ? $request->bb_berbumbung_bilangan : null,
                        'bb_berbumbung_masih_digunakan' => isset($request->bb_berbumbung_masih_digunakan) ? $request->bb_berbumbung_masih_digunakan : null,
                        'bb_berbumbung_status_fizikal' => isset($request->bb_berbumbung_status_fizikal) ? $request->bb_berbumbung_status_fizikal : null,

                        'bb_hardcourt' => isset($request->bb_hardcourt) ? $request->bb_hardcourt : false,
                        'bb_hardcourt_gunasama' => isset($request->bb_hardcourt_gunasama) ? $request->bb_hardcourt_gunasama : null,
                        'bb_hardcourt_bilangan' => isset($request->bb_hardcourt_bilangan) ? $request->bb_hardcourt_bilangan : null,
                        'bb_hardcourt_masih_digunakan' => isset($request->bb_hardcourt_masih_digunakan) ? $request->bb_hardcourt_masih_digunakan : null,
                        'bb_hardcourt_status_fizikal' => isset($request->bb_hardcourt_status_fizikal) ? $request->bb_hardcourt_status_fizikal : null,

                        'bb_berumput' => isset($request->bb_berumput) ? $request->bb_berumput : false,
                        'bb_berumput_gunasama' => isset($request->bb_berumput_gunasama) ? $request->bb_berumput_gunasama : null,
                        'bb_berumput_bilangan' => isset($request->bb_berumput_bilangan) ? $request->bb_berumput_bilangan : null,
                        'bb_berumput_masih_digunakan' => isset($request->bb_berumput_masih_digunakan) ? $request->bb_berumput_masih_digunakan : null,
                        'bb_berumput_status_fizikal' => isset($request->bb_berumput_status_fizikal) ? $request->bb_berumput_status_fizikal : null,

                        // Bola Keranjang
                        'bola_keranjang' => $request->bola_keranjang,
                        'bola_keranjang_bilangan' => isset($request->bola_keranjang_bilangan) ? $request->bola_keranjang_bilangan : null,

                        'bk_dewan' => isset($request->bk_dewan) ? $request->bk_dewan : false,
                        'bk_dewan_gunasama' => isset($request->bk_dewan_gunasama) ? $request->bk_dewan_gunasama : null,
                        'bk_dewan_bilangan' => isset($request->bk_dewan_bilangan) ? $request->bk_dewan_bilangan : null,
                        'bk_dewan_masih_digunakan' => isset($request->bk_dewan_masih_digunakan) ? $request->bk_dewan_masih_digunakan : null,
                        'bk_dewan_status_fizikal' => isset($request->bk_dewan_status_fizikal) ? $request->bk_dewan_status_fizikal : null,

                        'bk_berbumbung' => isset($request->bk_berbumbung) ? $request->bk_berbumbung : false,
                        'bk_berbumbung_gunasama' => isset($request->bk_berbumbung_gunasama) ? $request->bk_berbumbung_gunasama : null,
                        'bk_berbumbung_bilangan' => isset($request->bk_berbumbung_bilangan) ? $request->bk_berbumbung_bilangan : null,
                        'bk_berbumbung_masih_digunakan' => isset($request->bk_berbumbung_masih_digunakan) ? $request->bk_berbumbung_masih_digunakan : null,
                        'bk_berbumbung_status_fizikal' => isset($request->bk_berbumbung_status_fizikal) ? $request->bk_berbumbung_status_fizikal : null,

                        'bk_terbuka' => isset($request->bk_terbuka) ? $request->bk_terbuka : false,
                        'bk_terbuka_gunasama' => isset($request->bk_terbuka_gunasama) ? $request->bk_terbuka_gunasama : null,
                        'bk_terbuka_bilangan' => isset($request->bk_terbuka_bilangan) ? $request->bk_terbuka_bilangan : null,
                        'bk_terbuka_masih_digunakan' => isset($request->bk_terbuka_masih_digunakan) ? $request->bk_terbuka_masih_digunakan : null,
                        'bk_terbuka_status_fizikal' => isset($request->bk_terbuka_status_fizikal) ? $request->bk_terbuka_status_fizikal : null,

                        // Ragbi
                        'ragbi' => $request->ragbi,
                        'ragbi_bilangan' => isset($request->ragbi_bilangan) ? $request->ragbi_bilangan : null,

                        'ragbi_standard' => isset($request->ragbi_standard) ? $request->ragbi_standard : false,
                        'ragbi_standard_gunasama' => isset($request->ragbi_standard_gunasama) ? $request->ragbi_standard_gunasama : null,
                        'ragbi_standard_bilangan' => isset($request->ragbi_standard_bilangan) ? $request->ragbi_standard_bilangan : null,
                        'ragbi_standard_masih_digunakan' => isset($request->ragbi_standard_masih_digunakan) ? $request->ragbi_standard_masih_digunakan : null,
                        'ragbi_standard_status_fizikal' => isset($request->ragbi_standard_status_fizikal) ? $request->ragbi_standard_status_fizikal : null,

                        'ragbi_latihan' => isset($request->ragbi_latihan) ? $request->ragbi_latihan : false,
                        'ragbi_latihan_gunasama' => isset($request->ragbi_latihan_gunasama) ? $request->ragbi_latihan_gunasama : null,
                        'ragbi_latihan_bilangan' => isset($request->ragbi_latihan_bilangan) ? $request->ragbi_latihan_bilangan : null,
                        'ragbi_latihan_masih_digunakan' => isset($request->ragbi_latihan_masih_digunakan) ? $request->ragbi_latihan_masih_digunakan : null,
                        'ragbi_latihan_status_fizikal' => isset($request->ragbi_latihan_status_fizikal) ? $request->ragbi_latihan_status_fizikal : null,

                        // Futsal
                        'futsal' => $request->futsal,
                        'futsal_bilangan' => isset($request->futsal_bilangan) ? $request->futsal_bilangan : null,

                        'futsal_dewan' => isset($request->futsal_dewan) ? $request->futsal_dewan : false,
                        'futsal_dewan_gunasama' => isset($request->futsal_dewan_gunasama) ? $request->futsal_dewan_gunasama : null,
                        'futsal_dewan_bilangan' => isset($request->futsal_dewan_bilangan) ? $request->futsal_dewan_bilangan : null,
                        'futsal_dewan_masih_digunakan' => isset($request->futsal_dewan_masih_digunakan) ? $request->futsal_dewan_masih_digunakan : null,
                        'futsal_dewan_status_fizikal' => isset($request->futsal_dewan_status_fizikal) ? $request->futsal_dewan_status_fizikal : null,

                        'futsal_berbumbung' => isset($request->futsal_berbumbung) ? $request->futsal_berbumbung : false,
                        'futsal_berbumbung_gunasama' => isset($request->futsal_berbumbung_gunasama) ? $request->futsal_berbumbung_gunasama : null,
                        'futsal_berbumbung_bilangan' => isset($request->futsal_berbumbung_bilangan) ? $request->futsal_berbumbung_bilangan : null,
                        'futsal_berbumbung_masih_digunakan' => isset($request->futsal_berbumbung_masih_digunakan) ? $request->futsal_berbumbung_masih_digunakan : null,
                        'futsal_berbumbung_status_fizikal' => isset($request->futsal_berbumbung_status_fizikal) ? $request->futsal_berbumbung_status_fizikal : null,

                        'futsal_terbuka' => isset($request->futsal_terbuka) ? $request->futsal_terbuka : false,
                        'futsal_terbuka_gunasama' => isset($request->futsal_terbuka_gunasama) ? $request->futsal_terbuka_gunasama : null,
                        'futsal_terbuka_bilangan' => isset($request->futsal_terbuka_bilangan) ? $request->futsal_terbuka_bilangan : null,
                        'futsal_terbuka_masih_digunakan' => isset($request->futsal_terbuka_masih_digunakan) ? $request->futsal_terbuka_masih_digunakan : null,
                        'futsal_terbuka_status_fizikal' => isset($request->futsal_terbuka_status_fizikal) ? $request->futsal_terbuka_status_fizikal : null,

                        // Boling Tenpin
                        'boling_tenpin' => $request->boling_tenpin,
                        'boling_tenpin_bilangan' => isset($request->boling_tenpin_bilangan) ? $request->boling_tenpin_bilangan : null,

                        'bt_8' => isset($request->bt_8) ? $request->bt_8 : false,
                        'bt_8_gunasama' => isset($request->bt_8_gunasama) ? $request->bt_8_gunasama : null,
                        'bt_8_bilangan' => isset($request->bt_8_bilangan) ? $request->bt_8_bilangan : null,
                        'bt_8_masih_digunakan' => isset($request->bt_8_masih_digunakan) ? $request->bt_8_masih_digunakan : null,
                        'bt_8_status_fizikal' => isset($request->bt_8_status_fizikal) ? $request->bt_8_status_fizikal : null,

                        'bt_12' => isset($request->bt_12) ? $request->bt_12 : false,
                        'bt_12_gunasama' => isset($request->bt_12_gunasama) ? $request->bt_12_gunasama : null,
                        'bt_12_bilangan' => isset($request->bt_12_bilangan) ? $request->bt_12_bilangan : null,
                        'bt_12_masih_digunakan' => isset($request->bt_12_masih_digunakan) ? $request->bt_12_masih_digunakan : null,
                        'bt_12_status_fizikal' => isset($request->bt_12_status_fizikal) ? $request->bt_12_status_fizikal : null,

                        'bt_lain' => isset($request->bt_lain) ? $request->bt_lain : false,
                        'bt_lain_butiran' => isset($request->bt_lain_butiran) ? $request->bt_lain_butiran : null,
                        'bt_lain_gunasama' => isset($request->bt_lain_gunasama) ? $request->bt_lain_gunasama : null,
                        'bt_lain_bilangan' => isset($request->bt_lain_bilangan) ? $request->bt_lain_bilangan : null,
                        'bt_lain_masih_digunakan' => isset($request->bt_lain_masih_digunakan) ? $request->bt_lain_masih_digunakan : null,
                        'bt_lain_status_fizikal' => isset($request->bt_lain_status_fizikal) ? $request->bt_lain_status_fizikal : null,

                        // Lain-lain
                        'lain' => $request->lain,
                        'lain_bilangan' => isset($request->lain_bilangan) ? $request->lain_bilangan : null,

                        'lain_kemudahan' => isset($request->lain_kemudahan) ? $request->lain_kemudahan : false,
                        'lain_kemudahan_butiran' => isset($request->lain_kemudahan_butiran) ? $request->lain_kemudahan_butiran : null,
                        'lain_kemudahan_gunasama' => isset($request->lain_kemudahan_gunasama) ? $request->lain_kemudahan_gunasama : null,
                        'lain_kemudahan_bilangan' => isset($request->lain_kemudahan_bilangan) ? $request->lain_kemudahan_bilangan : null,
                        'lain_kemudahan_masih_digunakan' => isset($request->lain_kemudahan_masih_digunakan) ? $request->lain_kemudahan_masih_digunakan : null,
                        'lain_kemudahan_status_fizikal' => isset($request->lain_kemudahan_status_fizikal) ? $request->lain_kemudahan_status_fizikal : null,

                        'created_by' => auth()->user()->id,
                        'updated_by' => auth()->user()->id,
                    ]
                );
            }

            if ($request->tab == 'perancangan_sukan') {
                IkepsPerancanganSukan::create([
                    'tahun' => $request->tahun,
                    'kod_sekolah' => isset($request->kod_sekolah) ? $request->kod_sekolah : 0,

                    'sukan_utama' => $request->sukan_utama,
                    'sukan_utama_butiran' => isset($request->sukan_utama_butiran) ? $request->sukan_utama_butiran : null,
                    'sukan_utama_program' => isset($request->sukan_utama_program) ? $request->sukan_utama_program : null,
                    
                    'inisiatif_sekolah' => $request->inisiatif_sekolah,
                    'inisiatif_sekolah_butiran' => isset($request->inisiatif_sekolah_butiran) ? $request->inisiatif_sekolah_butiran : null,
                    'inisiatif_sekolah_program' => isset($request->inisiatif_sekolah_program) ? $request->inisiatif_sekolah_program : null,
                    
                    'projek_msn' => $request->projek_msn,
                    'projek_msn_butiran' => isset($request->projek_msn_butiran) ? $request->projek_msn_butiran : null,
                    'projek_msn_program' => isset($request->projek_msn_program) ? $request->projek_msn_program : null,
                    
                    'projek_kpm' => $request->projek_kpm,
                    'projek_kpm_butiran' => isset($request->projek_kpm_butiran) ? $request->projek_kpm_butiran : null,
                    'projek_kpm_program' => isset($request->projek_kpm_program) ? $request->projek_kpm_program : null,
                    
                    'ladap' => $request->ladap,
                    'ladap_butiran' => isset($request->ladap_butiran) ? $request->ladap_butiran : null,
                    'ladap_program' => isset($request->ladap_program) ? $request->ladap_program : null,
                    
                    'pengurusan_sukan' => $request->pengurusan_sukan,
                    'pengurusan_sukan_butiran' => isset($request->pengurusan_sukan_butiran) ? $request->pengurusan_sukan_butiran : null,
                    
                    'kejurulatihan' => $request->kejurulatihan,
                    'kejurulatihan_butiran' => isset($request->kejurulatihan_butiran) ? $request->kejurulatihan_butiran : null,
                    
                    'kepegawaian' => $request->kepegawaian,
                    'kepegawaian_butiran' => isset($request->kepegawaian_butiran) ? $request->kepegawaian_butiran : null,

                    'sains_sukan' => $request->sains_sukan,
                    'sains_sukan_butiran' => isset($request->sains_sukan_butiran) ? $request->sains_sukan_butiran : null,

                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }

            if ($request->tab == 'status_penyertaan') {
                IkepsStatusPenyertaan::updateOrCreate([
                    'tahun' => $request->tahun,
                    'kod_sekolah' => isset($request->kod_sekolah) ? $request->kod_sekolah : 0,
                ],
                [
                    'akuatik_zon' => isset($request->akuatik_zon) ? $request->akuatik_zon : null,
                    'akuatik_daerah' => isset($request->akuatik_daerah) ? $request->akuatik_daerah : null,
                    'akuatik_bahagian' => isset($request->akuatik_bahagian) ? $request->akuatik_bahagian : null,
                    'akuatik_negeri' => isset($request->akuatik_negeri) ? $request->akuatik_negeri : null,
                    'akuatik_kebangsaan' => isset($request->akuatik_kebangsaan) ? $request->akuatik_kebangsaan : null,
                    'akuatik_antarabangsa' => isset($request->akuatik_antarabangsa) ? $request->akuatik_antarabangsa : null,

                    'badminton_zon' => isset($request->badminton_zon) ? $request->badminton_zon : null,
                    'badminton_daerah' => isset($request->badminton_daerah) ? $request->badminton_daerah : null,
                    'badminton_bahagian' => isset($request->badminton_bahagian) ? $request->badminton_bahagian : null,
                    'badminton_negeri' => isset($request->badminton_negeri) ? $request->badminton_negeri : null,
                    'badminton_kebangsaan' => isset($request->badminton_kebangsaan) ? $request->badminton_kebangsaan : null,
                    'badminton_antarabangsa' => isset($request->badminton_antarabangsa) ? $request->badminton_antarabangsa : null,

                    'bola_baling_zon' => isset($request->bola_baling_zon) ? $request->bola_baling_zon : null,
                    'bola_baling_daerah' => isset($request->bola_baling_daerah) ? $request->bola_baling_daerah : null,
                    'bola_baling_bahagian' => isset($request->bola_baling_bahagian) ? $request->bola_baling_bahagian : null,
                    'bola_baling_negeri' => isset($request->bola_baling_negeri) ? $request->bola_baling_negeri : null,
                    'bola_baling_kebangsaan' => isset($request->bola_baling_kebangsaan) ? $request->bola_baling_kebangsaan : null,
                    'bola_baling_antarabangsa' => isset($request->bola_baling_antarabangsa) ? $request->bola_baling_antarabangsa : null,

                    'bola_jaring_zon' => isset($request->bola_jaring_zon) ? $request->bola_jaring_zon : null,
                    'bola_jaring_daerah' => isset($request->bola_jaring_daerah) ? $request->bola_jaring_daerah : null,
                    'bola_jaring_bahagian' => isset($request->bola_jaring_bahagian) ? $request->bola_jaring_bahagian : null,
                    'bola_jaring_negeri' => isset($request->bola_jaring_negeri) ? $request->bola_jaring_negeri : null,
                    'bola_jaring_kebangsaan' => isset($request->bola_jaring_kebangsaan) ? $request->bola_jaring_kebangsaan : null,
                    'bola_jaring_antarabangsa' => isset($request->bola_jaring_antarabangsa) ? $request->bola_jaring_antarabangsa : null,

                    'bola_keranjang_zon' => isset($request->bola_keranjang_zon) ? $request->bola_keranjang_zon : null,
                    'bola_keranjang_daerah' => isset($request->bola_keranjang_daerah) ? $request->bola_keranjang_daerah : null,
                    'bola_keranjang_bahagian' => isset($request->bola_keranjang_bahagian) ? $request->bola_keranjang_bahagian : null,
                    'bola_keranjang_negeri' => isset($request->bola_keranjang_negeri) ? $request->bola_keranjang_negeri : null,
                    'bola_keranjang_kebangsaan' => isset($request->bola_keranjang_kebangsaan) ? $request->bola_keranjang_kebangsaan : null,
                    'bola_keranjang_antarabangsa' => isset($request->bola_keranjang_antarabangsa) ? $request->bola_keranjang_antarabangsa : null,

                    'bola_sepak_zon' => isset($request->bola_sepak_zon) ? $request->bola_sepak_zon : null,
                    'bola_sepak_daerah' => isset($request->bola_sepak_daerah) ? $request->bola_sepak_daerah : null,
                    'bola_sepak_bahagian' => isset($request->bola_sepak_bahagian) ? $request->bola_sepak_bahagian : null,
                    'bola_sepak_negeri' => isset($request->bola_sepak_negeri) ? $request->bola_sepak_negeri : null,
                    'bola_sepak_kebangsaan' => isset($request->bola_sepak_kebangsaan) ? $request->bola_sepak_kebangsaan : null,
                    'bola_sepak_antarabangsa' => isset($request->bola_sepak_antarabangsa) ? $request->bola_sepak_antarabangsa : null,

                    'bola_tampar_zon' => isset($request->bola_tampar_zon) ? $request->bola_tampar_zon : null,
                    'bola_tampar_daerah' => isset($request->bola_tampar_daerah) ? $request->bola_tampar_daerah : null,
                    'bola_tampar_bahagian' => isset($request->bola_tampar_bahagian) ? $request->bola_tampar_bahagian : null,
                    'bola_tampar_negeri' => isset($request->bola_tampar_negeri) ? $request->bola_tampar_negeri : null,
                    'bola_tampar_kebangsaan' => isset($request->bola_tampar_kebangsaan) ? $request->bola_tampar_kebangsaan : null,
                    'bola_tampar_antarabangsa' => isset($request->bola_tampar_antarabangsa) ? $request->bola_tampar_antarabangsa : null,

                    'boling_tenpin_zon' => isset($request->boling_tenpin_zon) ? $request->boling_tenpin_zon : null,
                    'boling_tenpin_daerah' => isset($request->boling_tenpin_daerah) ? $request->boling_tenpin_daerah : null,
                    'boling_tenpin_bahagian' => isset($request->boling_tenpin_bahagian) ? $request->boling_tenpin_bahagian : null,
                    'boling_tenpin_negeri' => isset($request->boling_tenpin_negeri) ? $request->boling_tenpin_negeri : null,
                    'boling_tenpin_kebangsaan' => isset($request->boling_tenpin_kebangsaan) ? $request->boling_tenpin_kebangsaan : null,
                    'boling_tenpin_antarabangsa' => isset($request->boling_tenpin_antarabangsa) ? $request->boling_tenpin_antarabangsa : null,

                    'gimnastik_artistik_zon' => isset($request->gimnastik_artistik_zon) ? $request->gimnastik_artistik_zon : null,
                    'gimnastik_artistik_daerah' => isset($request->gimnastik_artistik_daerah) ? $request->gimnastik_artistik_daerah : null,
                    'gimnastik_artistik_bahagian' => isset($request->gimnastik_artistik_bahagian) ? $request->gimnastik_artistik_bahagian : null,
                    'gimnastik_artistik_negeri' => isset($request->gimnastik_artistik_negeri) ? $request->gimnastik_artistik_negeri : null,
                    'gimnastik_artistik_kebangsaan' => isset($request->gimnastik_artistik_kebangsaan) ? $request->gimnastik_artistik_kebangsaan : null,
                    'gimnastik_artistik_antarabangsa' => isset($request->gimnastik_artistik_antarabangsa) ? $request->gimnastik_artistik_antarabangsa : null,

                    'gimnastik_berirama_zon' => isset($request->gimnastik_berirama_zon) ? $request->gimnastik_berirama_zon : null,
                    'gimnastik_berirama_daerah' => isset($request->gimnastik_berirama_daerah) ? $request->gimnastik_berirama_daerah : null,
                    'gimnastik_berirama_bahagian' => isset($request->gimnastik_berirama_bahagian) ? $request->gimnastik_berirama_bahagian : null,
                    'gimnastik_berirama_negeri' => isset($request->gimnastik_berirama_negeri) ? $request->gimnastik_berirama_negeri : null,
                    'gimnastik_berirama_kebangsaan' => isset($request->gimnastik_berirama_kebangsaan) ? $request->gimnastik_berirama_kebangsaan : null,
                    'gimnastik_berirama_antarabangsa' => isset($request->gimnastik_berirama_antarabangsa) ? $request->gimnastik_berirama_antarabangsa : null,

                    'golf_zon' => isset($request->golf_zon) ? $request->golf_zon : null,
                    'golf_daerah' => isset($request->golf_daerah) ? $request->golf_daerah : null,
                    'golf_bahagian' => isset($request->golf_bahagian) ? $request->golf_bahagian : null,
                    'golf_negeri' => isset($request->golf_negeri) ? $request->golf_negeri : null,
                    'golf_kebangsaan' => isset($request->golf_kebangsaan) ? $request->golf_kebangsaan : null,
                    'golf_antarabangsa' => isset($request->golf_antarabangsa) ? $request->golf_antarabangsa : null,

                    'hoki_zon' => isset($request->hoki_zon) ? $request->hoki_zon : null,
                    'hoki_daerah' => isset($request->hoki_daerah) ? $request->hoki_daerah : null,
                    'hoki_bahagian' => isset($request->hoki_bahagian) ? $request->hoki_bahagian : null,
                    'hoki_negeri' => isset($request->hoki_negeri) ? $request->hoki_negeri : null,
                    'hoki_kebangsaan' => isset($request->hoki_kebangsaan) ? $request->hoki_kebangsaan : null,
                    'hoki_antarabangsa' => isset($request->hoki_antarabangsa) ? $request->hoki_antarabangsa : null,

                    'kriket_zon' => isset($request->kriket_zon) ? $request->kriket_zon : null,
                    'kriket_daerah' => isset($request->kriket_daerah) ? $request->kriket_daerah : null,
                    'kriket_bahagian' => isset($request->kriket_bahagian) ? $request->kriket_bahagian : null,
                    'kriket_negeri' => isset($request->kriket_negeri) ? $request->kriket_negeri : null,
                    'kriket_kebangsaan' => isset($request->kriket_kebangsaan) ? $request->kriket_kebangsaan : null,
                    'kriket_antarabangsa' => isset($request->kriket_antarabangsa) ? $request->kriket_antarabangsa : null,

                    'memanah_zon' => isset($request->memanah_zon) ? $request->memanah_zon : null,
                    'memanah_daerah' => isset($request->memanah_daerah) ? $request->memanah_daerah : null,
                    'memanah_bahagian' => isset($request->memanah_bahagian) ? $request->memanah_bahagian : null,
                    'memanah_negeri' => isset($request->memanah_negeri) ? $request->memanah_negeri : null,
                    'memanah_kebangsaan' => isset($request->memanah_kebangsaan) ? $request->memanah_kebangsaan : null,
                    'memanah_antarabangsa' => isset($request->memanah_antarabangsa) ? $request->memanah_antarabangsa : null,

                    'merentas_desa_zon' => isset($request->merentas_desa_zon) ? $request->merentas_desa_zon : null,
                    'merentas_desa_daerah' => isset($request->merentas_desa_daerah) ? $request->merentas_desa_daerah : null,
                    'merentas_desa_bahagian' => isset($request->merentas_desa_bahagian) ? $request->merentas_desa_bahagian : null,
                    'merentas_desa_negeri' => isset($request->merentas_desa_negeri) ? $request->merentas_desa_negeri : null,
                    'merentas_desa_kebangsaan' => isset($request->merentas_desa_kebangsaan) ? $request->merentas_desa_kebangsaan : null,
                    'merentas_desa_antarabangsa' => isset($request->merentas_desa_antarabangsa) ? $request->merentas_desa_antarabangsa : null,

                    'olahraga_zon' => isset($request->olahraga_zon) ? $request->olahraga_zon : null,
                    'olahraga_daerah' => isset($request->olahraga_daerah) ? $request->olahraga_daerah : null,
                    'olahraga_bahagian' => isset($request->olahraga_bahagian) ? $request->olahraga_bahagian : null,
                    'olahraga_negeri' => isset($request->olahraga_negeri) ? $request->olahraga_negeri : null,
                    'olahraga_kebangsaan' => isset($request->olahraga_kebangsaan) ? $request->olahraga_kebangsaan : null,
                    'olahraga_antarabangsa' => isset($request->olahraga_antarabangsa) ? $request->olahraga_antarabangsa : null,

                    'pelayaran_zon' => isset($request->pelayaran_zon) ? $request->pelayaran_zon : null,
                    'pelayaran_daerah' => isset($request->pelayaran_daerah) ? $request->pelayaran_daerah : null,
                    'pelayaran_bahagian' => isset($request->pelayaran_bahagian) ? $request->pelayaran_bahagian : null,
                    'pelayaran_negeri' => isset($request->pelayaran_negeri) ? $request->pelayaran_negeri : null,
                    'pelayaran_kebangsaan' => isset($request->pelayaran_kebangsaan) ? $request->pelayaran_kebangsaan : null,
                    'pelayaran_antarabangsa' => isset($request->pelayaran_antarabangsa) ? $request->pelayaran_antarabangsa : null,

                    'ping_pong_zon' => isset($request->ping_pong_zon) ? $request->ping_pong_zon : null,
                    'ping_pong_daerah' => isset($request->ping_pong_daerah) ? $request->ping_pong_daerah : null,
                    'ping_pong_bahagian' => isset($request->ping_pong_bahagian) ? $request->ping_pong_bahagian : null,
                    'ping_pong_negeri' => isset($request->ping_pong_negeri) ? $request->ping_pong_negeri : null,
                    'ping_pong_kebangsaan' => isset($request->ping_pong_kebangsaan) ? $request->ping_pong_kebangsaan : null,
                    'ping_pong_antarabangsa' => isset($request->ping_pong_antarabangsa) ? $request->ping_pong_antarabangsa : null,

                    'ragbi_zon' => isset($request->ragbi_zon) ? $request->ragbi_zon : null,
                    'ragbi_daerah' => isset($request->ragbi_daerah) ? $request->ragbi_daerah : null,
                    'ragbi_bahagian' => isset($request->ragbi_bahagian) ? $request->ragbi_bahagian : null,
                    'ragbi_negeri' => isset($request->ragbi_negeri) ? $request->ragbi_negeri : null,
                    'ragbi_kebangsaan' => isset($request->ragbi_kebangsaan) ? $request->ragbi_kebangsaan : null,
                    'ragbi_antarabangsa' => isset($request->ragbi_antarabangsa) ? $request->ragbi_antarabangsa : null,

                    'sepak_takraw_zon' => isset($request->sepak_takraw_zon) ? $request->sepak_takraw_zon : null,
                    'sepak_takraw_daerah' => isset($request->sepak_takraw_daerah) ? $request->sepak_takraw_daerah : null,
                    'sepak_takraw_bahagian' => isset($request->sepak_takraw_bahagian) ? $request->sepak_takraw_bahagian : null,
                    'sepak_takraw_negeri' => isset($request->sepak_takraw_negeri) ? $request->sepak_takraw_negeri : null,
                    'sepak_takraw_kebangsaan' => isset($request->sepak_takraw_kebangsaan) ? $request->sepak_takraw_kebangsaan : null,
                    'sepak_takraw_antarabangsa' => isset($request->sepak_takraw_antarabangsa) ? $request->sepak_takraw_antarabangsa : null,

                    'skuasy_zon' => isset($request->skuasy_zon) ? $request->skuasy_zon : null,
                    'skuasy_daerah' => isset($request->skuasy_daerah) ? $request->skuasy_daerah : null,
                    'skuasy_bahagian' => isset($request->skuasy_bahagian) ? $request->skuasy_bahagian : null,
                    'skuasy_negeri' => isset($request->skuasy_negeri) ? $request->skuasy_negeri : null,
                    'skuasy_kebangsaan' => isset($request->skuasy_kebangsaan) ? $request->skuasy_kebangsaan : null,
                    'skuasy_antarabangsa' => isset($request->skuasy_antarabangsa) ? $request->skuasy_antarabangsa : null,

                    'sofbol_zon' => isset($request->sofbol_zon) ? $request->sofbol_zon : null,
                    'sofbol_daerah' => isset($request->sofbol_daerah) ? $request->sofbol_daerah : null,
                    'sofbol_bahagian' => isset($request->sofbol_bahagian) ? $request->sofbol_bahagian : null,
                    'sofbol_negeri' => isset($request->sofbol_negeri) ? $request->sofbol_negeri : null,
                    'sofbol_kebangsaan' => isset($request->sofbol_kebangsaan) ? $request->sofbol_kebangsaan : null,
                    'sofbol_antarabangsa' => isset($request->sofbol_antarabangsa) ? $request->sofbol_antarabangsa : null,

                    'tenis_zon' => isset($request->tenis_zon) ? $request->tenis_zon : null,
                    'tenis_daerah' => isset($request->tenis_daerah) ? $request->tenis_daerah : null,
                    'tenis_bahagian' => isset($request->tenis_bahagian) ? $request->tenis_bahagian : null,
                    'tenis_negeri' => isset($request->tenis_negeri) ? $request->tenis_negeri : null,
                    'tenis_kebangsaan' => isset($request->tenis_kebangsaan) ? $request->tenis_kebangsaan : null,
                    'tenis_antarabangsa' => isset($request->tenis_antarabangsa) ? $request->tenis_antarabangsa : null,

                    'angkat_berat_zon' => isset($request->angkat_berat_zon) ? $request->angkat_berat_zon : null,
                    'angkat_berat_daerah' => isset($request->angkat_berat_daerah) ? $request->angkat_berat_daerah : null,
                    'angkat_berat_bahagian' => isset($request->angkat_berat_bahagian) ? $request->angkat_berat_bahagian : null,
                    'angkat_berat_negeri' => isset($request->angkat_berat_negeri) ? $request->angkat_berat_negeri : null,
                    'angkat_berat_kebangsaan' => isset($request->angkat_berat_kebangsaan) ? $request->angkat_berat_kebangsaan : null,
                    'angkat_berat_antarabangsa' => isset($request->angkat_berat_antarabangsa) ? $request->angkat_berat_antarabangsa : null,

                    'ekuestrian_zon' => isset($request->ekuestrian_zon) ? $request->ekuestrian_zon : null,
                    'ekuestrian_daerah' => isset($request->ekuestrian_daerah) ? $request->ekuestrian_daerah : null,
                    'ekuestrian_bahagian' => isset($request->ekuestrian_bahagian) ? $request->ekuestrian_bahagian : null,
                    'ekuestrian_negeri' => isset($request->ekuestrian_negeri) ? $request->ekuestrian_negeri : null,
                    'ekuestrian_kebangsaan' => isset($request->ekuestrian_kebangsaan) ? $request->ekuestrian_kebangsaan : null,
                    'ekuestrian_antarabangsa' => isset($request->ekuestrian_antarabangsa) ? $request->ekuestrian_antarabangsa : null,

                    'formula_future_zon' => isset($request->formula_future_zon) ? $request->formula_future_zon : null,
                    'formula_future_daerah' => isset($request->formula_future_daerah) ? $request->formula_future_daerah : null,
                    'formula_future_bahagian' => isset($request->formula_future_bahagian) ? $request->formula_future_bahagian : null,
                    'formula_future_negeri' => isset($request->formula_future_negeri) ? $request->formula_future_negeri : null,
                    'formula_future_kebangsaan' => isset($request->formula_future_kebangsaan) ? $request->formula_future_kebangsaan : null,
                    'formula_future_antarabangsa' => isset($request->formula_future_antarabangsa) ? $request->formula_future_antarabangsa : null,

                    'futsal_zon' => isset($request->futsal_zon) ? $request->futsal_zon : null,
                    'futsal_daerah' => isset($request->futsal_daerah) ? $request->futsal_daerah : null,
                    'futsal_bahagian' => isset($request->futsal_bahagian) ? $request->futsal_bahagian : null,
                    'futsal_negeri' => isset($request->futsal_negeri) ? $request->futsal_negeri : null,
                    'futsal_kebangsaan' => isset($request->futsal_kebangsaan) ? $request->futsal_kebangsaan : null,
                    'futsal_antarabangsa' => isset($request->futsal_antarabangsa) ? $request->futsal_antarabangsa : null,

                    'kabaddi_zon' => isset($request->kabaddi_zon) ? $request->kabaddi_zon : null,
                    'kabaddi_daerah' => isset($request->kabaddi_daerah) ? $request->kabaddi_daerah : null,
                    'kabaddi_bahagian' => isset($request->kabaddi_bahagian) ? $request->kabaddi_bahagian : null,
                    'kabaddi_negeri' => isset($request->kabaddi_negeri) ? $request->kabaddi_negeri : null,
                    'kabaddi_kebangsaan' => isset($request->kabaddi_kebangsaan) ? $request->kabaddi_kebangsaan : null,
                    'kabaddi_antarabangsa' => isset($request->kabaddi_antarabangsa) ? $request->kabaddi_antarabangsa : null,

                    'lawn_bowl_zon' => isset($request->lawn_bowl_zon) ? $request->lawn_bowl_zon : null,
                    'lawn_bowl_daerah' => isset($request->lawn_bowl_daerah) ? $request->lawn_bowl_daerah : null,
                    'lawn_bowl_bahagian' => isset($request->lawn_bowl_bahagian) ? $request->lawn_bowl_bahagian : null,
                    'lawn_bowl_negeri' => isset($request->lawn_bowl_negeri) ? $request->lawn_bowl_negeri : null,
                    'lawn_bowl_kebangsaan' => isset($request->lawn_bowl_kebangsaan) ? $request->lawn_bowl_kebangsaan : null,
                    'lawn_bowl_antarabangsa' => isset($request->lawn_bowl_antarabangsa) ? $request->lawn_bowl_antarabangsa : null,

                    'lumba_basikal_zon' => isset($request->lumba_basikal_zon) ? $request->lumba_basikal_zon : null,
                    'lumba_basikal_daerah' => isset($request->lumba_basikal_daerah) ? $request->lumba_basikal_daerah : null,
                    'lumba_basikal_bahagian' => isset($request->lumba_basikal_bahagian) ? $request->lumba_basikal_bahagian : null,
                    'lumba_basikal_negeri' => isset($request->lumba_basikal_negeri) ? $request->lumba_basikal_negeri : null,
                    'lumba_basikal_kebangsaan' => isset($request->lumba_basikal_kebangsaan) ? $request->lumba_basikal_kebangsaan : null,
                    'lumba_basikal_antarabangsa' => isset($request->lumba_basikal_antarabangsa) ? $request->lumba_basikal_antarabangsa : null,

                    'menembak_zon' => isset($request->menembak_zon) ? $request->menembak_zon : null,
                    'menembak_daerah' => isset($request->menembak_daerah) ? $request->menembak_daerah : null,
                    'menembak_bahagian' => isset($request->menembak_bahagian) ? $request->menembak_bahagian : null,
                    'menembak_negeri' => isset($request->menembak_negeri) ? $request->menembak_negeri : null,
                    'menembak_kebangsaan' => isset($request->menembak_kebangsaan) ? $request->menembak_kebangsaan : null,
                    'menembak_antarabangsa' => isset($request->menembak_antarabangsa) ? $request->menembak_antarabangsa : null,

                    'muay_thai_zon' => isset($request->muay_thai_zon) ? $request->muay_thai_zon : null,
                    'muay_thai_daerah' => isset($request->muay_thai_daerah) ? $request->muay_thai_daerah : null,
                    'muay_thai_bahagian' => isset($request->muay_thai_bahagian) ? $request->muay_thai_bahagian : null,
                    'muay_thai_negeri' => isset($request->muay_thai_negeri) ? $request->muay_thai_negeri : null,
                    'muay_thai_kebangsaan' => isset($request->muay_thai_kebangsaan) ? $request->muay_thai_kebangsaan : null,
                    'muay_thai_antarabangsa' => isset($request->muay_thai_antarabangsa) ? $request->muay_thai_antarabangsa : null,

                    'petanque_zon' => isset($request->petanque_zon) ? $request->petanque_zon : null,
                    'petanque_daerah' => isset($request->petanque_daerah) ? $request->petanque_daerah : null,
                    'petanque_bahagian' => isset($request->petanque_bahagian) ? $request->petanque_bahagian : null,
                    'petanque_negeri' => isset($request->petanque_negeri) ? $request->petanque_negeri : null,
                    'petanque_kebangsaan' => isset($request->petanque_kebangsaan) ? $request->petanque_kebangsaan : null,
                    'petanque_antarabangsa' => isset($request->petanque_antarabangsa) ? $request->petanque_antarabangsa : null,

                    'silambam_zon' => isset($request->silambam_zon) ? $request->silambam_zon : null,
                    'silambam_daerah' => isset($request->silambam_daerah) ? $request->silambam_daerah : null,
                    'silambam_bahagian' => isset($request->silambam_bahagian) ? $request->silambam_bahagian : null,
                    'silambam_negeri' => isset($request->silambam_negeri) ? $request->silambam_negeri : null,
                    'silambam_kebangsaan' => isset($request->silambam_kebangsaan) ? $request->silambam_kebangsaan : null,
                    'silambam_antarabangsa' => isset($request->silambam_antarabangsa) ? $request->silambam_antarabangsa : null,

                    'silat_olahraga_zon' => isset($request->silat_olahraga_zon) ? $request->silat_olahraga_zon : null,
                    'silat_olahraga_daerah' => isset($request->silat_olahraga_daerah) ? $request->silat_olahraga_daerah : null,
                    'silat_olahraga_bahagian' => isset($request->silat_olahraga_bahagian) ? $request->silat_olahraga_bahagian : null,
                    'silat_olahraga_negeri' => isset($request->silat_olahraga_negeri) ? $request->silat_olahraga_negeri : null,
                    'silat_olahraga_kebangsaan' => isset($request->silat_olahraga_kebangsaan) ? $request->silat_olahraga_kebangsaan : null,
                    'silat_olahraga_antarabangsa' => isset($request->silat_olahraga_antarabangsa) ? $request->silat_olahraga_antarabangsa : null,

                    'taekwondo_zon' => isset($request->taekwondo_zon) ? $request->taekwondo_zon : null,
                    'taekwondo_daerah' => isset($request->taekwondo_daerah) ? $request->taekwondo_daerah : null,
                    'taekwondo_bahagian' => isset($request->taekwondo_bahagian) ? $request->taekwondo_bahagian : null,
                    'taekwondo_negeri' => isset($request->taekwondo_negeri) ? $request->taekwondo_negeri : null,
                    'taekwondo_kebangsaan' => isset($request->taekwondo_kebangsaan) ? $request->taekwondo_kebangsaan : null,
                    'taekwondo_antarabangsa' => isset($request->taekwondo_antarabangsa) ? $request->taekwondo_antarabangsa : null,

                    'tinju_zon' => isset($request->tinju_zon) ? $request->tinju_zon : null,
                    'tinju_daerah' => isset($request->tinju_daerah) ? $request->tinju_daerah : null,
                    'tinju_bahagian' => isset($request->tinju_bahagian) ? $request->tinju_bahagian : null,
                    'tinju_negeri' => isset($request->tinju_negeri) ? $request->tinju_negeri : null,
                    'tinju_kebangsaan' => isset($request->tinju_kebangsaan) ? $request->tinju_kebangsaan : null,
                    'tinju_antarabangsa' => isset($request->tinju_antarabangsa) ? $request->tinju_antarabangsa : null,

                    'wushu_zon' => isset($request->wushu_zon) ? $request->wushu_zon : null,
                    'wushu_daerah' => isset($request->wushu_daerah) ? $request->wushu_daerah : null,
                    'wushu_bahagian' => isset($request->wushu_bahagian) ? $request->wushu_bahagian : null,
                    'wushu_negeri' => isset($request->wushu_negeri) ? $request->wushu_negeri : null,
                    'wushu_kebangsaan' => isset($request->wushu_kebangsaan) ? $request->wushu_kebangsaan : null,
                    'wushu_antarabangsa' => isset($request->wushu_antarabangsa) ? $request->wushu_antarabangsa : null,

                    'lain_1_butiran' => isset($request->lain_1_butiran) ? $request->lain_1_butiran : null,
                    'lain_1_zon' => isset($request->lain_1_zon) ? $request->lain_1_zon : null,
                    'lain_1_daerah' => isset($request->lain_1_daerah) ? $request->lain_1_daerah : null,
                    'lain_1_bahagian' => isset($request->lain_1_bahagian) ? $request->lain_1_bahagian : null,
                    'lain_1_negeri' => isset($request->lain_1_negeri) ? $request->lain_1_negeri : null,
                    'lain_1_kebangsaan' => isset($request->lain_1_kebangsaan) ? $request->lain_1_kebangsaan : null,
                    'lain_1_antarabangsa' => isset($request->lain_1_antarabangsa) ? $request->lain_1_antarabangsa : null,

                    'lain_2_butiran' => isset($request->lain_2_butiran) ? $request->lain_2_butiran : null,
                    'lain_2_zon' => isset($request->lain_2_zon) ? $request->lain_2_zon : null,
                    'lain_2_daerah' => isset($request->lain_2_daerah) ? $request->lain_2_daerah : null,
                    'lain_2_bahagian' => isset($request->lain_2_bahagian) ? $request->lain_2_bahagian : null,
                    'lain_2_negeri' => isset($request->lain_2_negeri) ? $request->lain_2_negeri : null,
                    'lain_2_kebangsaan' => isset($request->lain_2_kebangsaan) ? $request->lain_2_kebangsaan : null,
                    'lain_2_antarabangsa' => isset($request->lain_2_antarabangsa) ? $request->lain_2_antarabangsa : null,

                    'lain_3_butiran' => isset($request->lain_3_butiran) ? $request->lain_3_butiran : null,
                    'lain_3_zon' => isset($request->lain_3_zon) ? $request->lain_3_zon : null,
                    'lain_3_daerah' => isset($request->lain_3_daerah) ? $request->lain_3_daerah : null,
                    'lain_3_bahagian' => isset($request->lain_3_bahagian) ? $request->lain_3_bahagian : null,
                    'lain_3_negeri' => isset($request->lain_3_negeri) ? $request->lain_3_negeri : null,
                    'lain_3_kebangsaan' => isset($request->lain_3_kebangsaan) ? $request->lain_3_kebangsaan : null,
                    'lain_3_antarabangsa' => isset($request->lain_3_antarabangsa) ? $request->lain_3_antarabangsa : null,

                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);

                $status_penyertaan = config('staticdata.ikeps.status_penyertaan');
                unset($status_penyertaan['jenis_penyertaan']);

                $types = [
                    'kebangsaan',
                    'antarabangsa',
                ];

                foreach($status_penyertaan as $sukans){
                    foreach($sukans as $sukanKey => $sukan){
                        foreach($types as $type){
                            $inputName = $sukanKey.'_'.$type;
                            $ic = [];
                            $data = [];
                            $request->$inputName;
                            if(isset($request->$inputName) && ($request->$inputName > 0)){
                                $acara = 'acara_'.$sukanKey.'_'.$type;
                                $jurulatih = 'jurulatih_.'.$sukanKey.'_'.$type;

                                $value = $request->$inputName;
                                for($i=1;$i<=$value;$i++){
                                    $inputIC = 'ic_'.$sukanKey.'_'.$type.'_'.$i;
                                    $ic[] = $request->$inputIC;
                                }

                                $data = [
                                    'acara' => $request->$acara,
                                    'jurulatih' => $request->$jurulatih,
                                    'ic' => $ic,
                                ];

                                IkepsStatusPenyertaanDetails::updateOrCreate(
                                    [
                                        'ikeps_id' => $request->ikeps_id,
                                        'name' => $sukanKey,
                                        'type' => $type,
                                    ],
                                    [
                                        'details' => json_encode($data),
                                    ]
                                );
                            }
                        }
                    }
                }
            }

            if ($request->tab == 'program_sekolah') {
                IkepsProgramSekolah::create([
                    'tahun' => $request->tahun,
                    'kod_sekolah' => isset($request->kod_sekolah) ? $request->kod_sekolah : 0,

                    'sukan_tahunan' => isset($request->sukan_tahunan) ? $request->sukan_tahunan : null,
                    'sukan_tahunan_kekerapan' => isset($request->sukan_tahunan_kekerapan) ? $request->sukan_tahunan_kekerapan : null,
                    'sukan_tahunan_perlaksanaan' => isset($request->sukan_tahunan_perlaksanaan) ? $request->sukan_tahunan_perlaksanaan : null,

                    'merentas_desa' => isset($request->merentas_desa) ? $request->merentas_desa : null,
                    'merentas_desa_kekerapan' => isset($request->merentas_desa_kekerapan) ? $request->merentas_desa_kekerapan : null,
                    'merentas_desa_perlaksanaan' => isset($request->merentas_desa_perlaksanaan) ? $request->merentas_desa_perlaksanaan : null,

                    'sukantara' => isset($request->sukantara) ? $request->sukantara : null,
                    'sukantara_kekerapan' => isset($request->sukantara_kekerapan) ? $request->sukantara_kekerapan : null,
                    'sukantara_perlaksanaan' => isset($request->sukantara_perlaksanaan) ? $request->sukantara_perlaksanaan : null,

                    'sukan_tahap_1' => isset($request->sukan_tahap_1) ? $request->sukan_tahap_1 : null,
                    'sukan_tahap_1_kekerapan' => isset($request->sukan_tahap_1_kekerapan) ? $request->sukan_tahap_1_kekerapan : null,
                    'sukan_tahap_1_perlaksanaan' => isset($request->sukan_tahap_1_perlaksanaan) ? $request->sukan_tahap_1_perlaksanaan : null,

                    'sukan_pendidikan_khas' => isset($request->sukan_pendidikan_khas) ? $request->sukan_pendidikan_khas : null,
                    'sukan_pendidikan_khas_kekerapan' => isset($request->sukan_pendidikan_khas_kekerapan) ? $request->sukan_pendidikan_khas_kekerapan : null,
                    'sukan_pendidikan_khas_perlaksanaan' => isset($request->sukan_pendidikan_khas_perlaksanaan) ? $request->sukan_pendidikan_khas_perlaksanaan : null,

                    'program_sukan' => isset($request->program_sukan) ? $request->program_sukan : null,
                    'program_sukan_kekerapan' => isset($request->program_sukan_kekerapan) ? $request->program_sukan_kekerapan : null,
                    'program_sukan_perlaksanaan' => isset($request->program_sukan_perlaksanaan) ? $request->program_sukan_perlaksanaan : null,

                    'anugerah_sukan' => isset($request->anugerah_sukan) ? $request->anugerah_sukan : null,
                    'anugerah_sukan_kekerapan' => isset($request->anugerah_sukan_kekerapan) ? $request->anugerah_sukan_kekerapan : null,
                    'anugerah_sukan_perlaksanaan' => isset($request->anugerah_sukan_perlaksanaan) ? $request->anugerah_sukan_perlaksanaan : null,

                    'sukan_antara_rumah' => isset($request->sukan_antara_rumah) ? $request->sukan_antara_rumah : null,
                    'sukan_antara_rumah_kekerapan' => isset($request->sukan_antara_rumah_kekerapan) ? $request->sukan_antara_rumah_kekerapan : null,
                    'sukan_antara_rumah_perlaksanaan' => isset($request->sukan_antara_rumah_perlaksanaan) ? $request->sukan_antara_rumah_perlaksanaan : null,

                    'sukan_antara_kelas' => isset($request->sukan_antara_kelas) ? $request->sukan_antara_kelas : null,
                    'sukan_antara_kelas_kekerapan' => isset($request->sukan_antara_kelas_kekerapan) ? $request->sukan_antara_kelas_kekerapan : null,
                    'sukan_antara_kelas_perlaksanaan' => isset($request->sukan_antara_kelas_perlaksanaan) ? $request->sukan_antara_kelas_perlaksanaan : null,

                    'sukan_antara_unit' => isset($request->sukan_antara_unit) ? $request->sukan_antara_unit : null,
                    'sukan_antara_unit_kekerapan' => isset($request->sukan_antara_unit_kekerapan) ? $request->sukan_antara_unit_kekerapan : null,
                    'sukan_antara_unit_perlaksanaan' => isset($request->sukan_antara_unit_perlaksanaan) ? $request->sukan_antara_unit_perlaksanaan : null,

                    'perlawanan_persahabatan' => isset($request->perlawanan_persahabatan) ? $request->perlawanan_persahabatan : null,
                    'perlawanan_persahabatan_kekerapan' => isset($request->perlawanan_persahabatan_kekerapan) ? $request->perlawanan_persahabatan_kekerapan : null,
                    'perlawanan_persahabatan_perlaksanaan' => isset($request->perlawanan_persahabatan_perlaksanaan) ? $request->perlawanan_persahabatan_perlaksanaan : null,

                    'sukan_mini' => isset($request->sukan_mini) ? $request->sukan_mini : null,
                    'sukan_mini_kekerapan' => isset($request->sukan_mini_kekerapan) ? $request->sukan_mini_kekerapan : null,
                    'sukan_mini_perlaksanaan' => isset($request->sukan_mini_perlaksanaan) ? $request->sukan_mini_perlaksanaan : null,

                    'sukan_prasekolah' => isset($request->sukan_prasekolah) ? $request->sukan_prasekolah : null,
                    'sukan_prasekolah_kekerapan' => isset($request->sukan_prasekolah_kekerapan) ? $request->sukan_prasekolah_kekerapan : null,
                    'sukan_prasekolah_perlaksanaan' => isset($request->sukan_prasekolah_perlaksanaan) ? $request->sukan_prasekolah_perlaksanaan : null,

                    'klinik_sukan' => isset($request->klinik_sukan) ? $request->klinik_sukan : null,
                    'klinik_sukan_kekerapan' => isset($request->klinik_sukan_kekerapan) ? $request->klinik_sukan_kekerapan : null,
                    'klinik_sukan_perlaksanaan' => isset($request->klinik_sukan_perlaksanaan) ? $request->klinik_sukan_perlaksanaan : null,

                    'hari_sukan' => isset($request->hari_sukan) ? $request->hari_sukan : null,
                    'hari_sukan_kekerapan' => isset($request->hari_sukan_kekerapan) ? $request->hari_sukan_kekerapan : null,
                    'hari_sukan_perlaksanaan' => isset($request->hari_sukan_perlaksanaan) ? $request->hari_sukan_perlaksanaan : null,

                    'lain' => isset($request->lain) ? $request->lain : null,
                    'lain_butiran' => isset($request->lain_butiran) ? $request->lain_butiran : null,
                    'lain_kekerapan' => isset($request->lain_kekerapan) ? $request->lain_kekerapan : null,
                    'lain_perlaksanaan' => isset($request->lain_perlaksanaan) ? $request->lain_perlaksanaan : null,

                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }

            if ($request->tab == 'disediakan_oleh'){
                //$ikeps = Ikeps::find($request->ikeps_id);

                //$nextStatus = FMF::getNextStatus($staticModuleId, $ikeps->status);

                $ikeps->update([
                    'disediakan_oleh' => isset($request->disediakan_oleh) ? $request->disediakan_oleh : auth()->user()->id,
                    'tarikh_disediakan' => Carbon::now()->format('Y-m-d'),
                    'status' => $status,
                ]);
            }

            if ($request->tab == 'disahkan_oleh'){
                //$ikeps = Ikeps::find($request->ikeps_id);

                //$nextStatus = FMF::getNextStatus($staticModuleId, $ikeps->status);

                $ikeps->update([
                    'disahkan_oleh' => isset($request->disahkan_oleh) ? $request->disahkan_oleh : auth()->user()->id,
                    'tarikh_disahkan' => Carbon::now()->format('Y-m-d'),
                    'status' => $status,
                ]);
            }

            DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Data Disimpan", 'detail' => "berjaya"]);

        } catch (\Throwable $e) {
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

    }

    public function listRingkasan(Request $request){
        if($request->ajax()) {

            $instrumen = InstrumenSkpakSpksIkeps::where('type', 'SEDIA')->where('status', 1)->orderBy('created_at', 'DESC')->first();
            $module = Module::where('module_name', $instrumen->id)->where('active', 1)->first();
            $moduleStatus = ModuleStatus::where('module_id', $module->id)->where('status_index', 3)->first();
            $ikeps = Ikeps::where('status', $moduleStatus->id);

            return Datatables::of($ikeps)
                ->addColumn('DT_RowIndex', function ($institutions) {
                    static $index = 1;
                    return $index++;
                })
                ->editColumn('kod_sekolah', function ($ikeps) {
                    return $ikeps->kod_sekolah;
                })
                ->editColumn('nama_sekolah', function ($ikeps) {
                    return '';
                })
                ->editColumn('tahun', function ($ikeps) {
                    return $ikeps->tahun;
                })
                ->editColumn('status', function ($ikeps) use ($moduleStatus) {
                    return $moduleStatus->status_name;
                })
                ->editColumn('action', function ($ikeps) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a href="'.route('ikeps.ringkasan_ikeps', ['kod_sekolah' => $ikeps->kod_sekolah, 'tahun' => $ikeps->tahun]).'" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';

                    $button .= "</div>";

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view ('ikeps.list_ringkasan');
    }

    public function RingkasanIkeps(Request $request)
    {
        if(!isset($request->kod_sekolah)){
            return to_route('ikeps.list_ringkasan');
        } else {
            $kod_sekolah = $request->kod_sekolah;
        }
        if (!isset($request->tahun)) {
            $tahun = Carbon::now()->format('Y');
            return to_route('ikeps.ringkasan_ikeps', ['tahun' => $tahun]);
        } else {
            $tahun = $request->tahun;
        }

        $ikeps = Ikeps::where('kod_sekolah', $request->kod_sekolah)->where('tahun', $request->tahun)->first();

        $prasaranaSukan = IkepsPrasaranaSukan::where('tahun', $tahun)->first();
        $kemudahanSukan = IkepsKemudahanSukan::where('tahun', $tahun)->first();
        $perancanganSukan = IkepsPerancanganSukan::where('tahun', $tahun)->first();
        $statusPenyertaan = IkepsStatusPenyertaan::where('tahun', $tahun)->first();
        $programSekolah = IkepsProgramSekolah::where('tahun', $tahun)->first();

        $instrumen = InstrumenSkpakSpksIkeps::where('type', 'SEDIA')->where('status', 1)->orderBy('created_at', 'DESC')->first();

        $module = Module::where('module_name',$instrumen->id)->first();

        if ($module) {
            $canView = FMF::checkPermission($module->id, $ikeps->status, 'view form');
            $canApprove = FMF::checkPermission($module->id, $ikeps->status, 'approve form');
            $staticModuleId = $module->id;
        } else {
            $canView = $canApprove = false;
            $staticModuleId = null;
        }

        $statusOfRecord = $ikeps?->statuses->status_description;

        return view('ikeps.ringkasan_ikeps', compact('tahun', 'prasaranaSukan', 'kemudahanSukan', 'perancanganSukan', 'statusPenyertaan', 'programSekolah', 'statusOfRecord', 'staticModuleId', 'canApprove', 'ikeps'));
    }

    public function LaporanRingkasanIkeps(Request $request){
        return view ('ikeps.laporan_ikeps.ringkasan_pengisian');
    }

    public function PemantauanPengisianIkeps(Request $request){
        return view ('ikeps.laporan_ikeps.pemantauan_pengisian');
    }

    public function DashboardIkeps(Request $request){
        return view ('dashboard.dashboard_bpsukan');
    }

    public function RingkasanIkepsFmf(Request $request)
    {
        if (!isset($request->tahun)) {
            $tahun = Carbon::now()->format('Y');
            return to_route('ikeps.ringkasan_ikeps_fmf', ['tahun' => $tahun]);
        } else {
            $tahun = $request->tahun;
        }

        $prasaranaSukan = IkepsPrasaranaSukan::where('tahun', $tahun)->first();
        $kemudahanSukan = IkepsKemudahanSukan::where('tahun', $tahun)->first();
        $perancanganSukan = IkepsPerancanganSukan::where('tahun', $tahun)->first();
        $statusPenyertaan = IkepsStatusPenyertaan::where('tahun', $tahun)->first();
        $programSekolah = IkepsProgramSekolah::where('tahun', $tahun)->first();

        $canUpdate = false;
        $staticForm = InstrumenSkpakSpksIkeps::where('type', 'SEDIA')->first();

        $moduleId = Module::where('module_name',$staticForm->id)->first();
        $staticModuleId = $moduleId->id;

        if ($moduleId) {
            $canView = FMF::checkPermission($staticModuleId, $prasaranaSukan->status, 'view form');
            $canVerify = FMF::checkPermission($staticModuleId, $prasaranaSukan->status, 'verify form');
            $canApprove = FMF::checkPermission($staticModuleId, $prasaranaSukan->status, 'approve form');
            $canQuery = FMF::checkPermission($staticModuleId, $prasaranaSukan->status, 'query');
            $canReject = FMF::checkPermission($staticModuleId, $prasaranaSukan->status, 'reject');
        } else {
            $canView = $canVerify = $canApprove = $canQuery = $canReject = false;
            $staticModuleId = null;
        }

        if (!empty($prasaranaSukan) && !empty($kemudahanSukan) && !empty($perancanganSukan) && !empty($statusPenyertaan) && !empty($programSekolah)) {
            $canUpdate = true;
        }
        $statusOfRecord = $prasaranaSukan?->statuses->status_description;
        return view('ikeps.ringkasan_ikeps_fmf', compact('tahun', 'prasaranaSukan', 'kemudahanSukan', 'perancanganSukan', 'statusPenyertaan', 'programSekolah','canView','canVerify','canApprove','canQuery', 'canReject', 'staticModuleId', 'statusOfRecord'));
    }

    public function verify(Request $request)
    {
        $formStatus = $request->status;
        $id = $request->formid;
        $data = Ikeps::find($id);
        $data->status = $formStatus;
        
        return ['success' => $data->save()];
    }
}
