<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButiranInstitusiSkips extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_institusi',
        'nama_pengetua',
        'alamat',
        'negeri',
        'no_telephone',
        'fax',
        'email',
        'laman_web',
        'no_perakuan_pendaftaran',
        'tarikh_tamat_perakuan',
        'no_surat_kelulusan',
        'tarikh_tamat_kelulusan',
        'no_pendaftaran_syarikat',
        'no_lesen_perniagaan',
        'bilangan_enrolmen_pelajar',
        'kapasiti_maksimum_pelajar',
        'bilangan_pelajar_tempatan',
        'pecahan_tempatan_lelaki',
        'pecahan_tempatan_perempuan',
        'bilangan_pelajar_antarabangsa',
        'pecahan_pelajar_lelaki',
        'pecahan_pelajar_perempuan',
        'bilangan_guru_keseluruhan',
        'pecahan_temparan',
        'pecahan_antarabangsa',
        'tarikh_audit',
        'tarikh_lapor',
        'institusi_id',
        'instrumen_skips_id'
    ];

    public function institusiPendidikan()
    {
        return $this->belongsTo('App\Models\SkipsInstitusiPendidikan', 'institusi_id', 'id');
    }

    public function itemStandardKualiti(){
        return $this->hasOne('App\Models\ItemStandardQualitySkips', 'butiran_institusi_id', 'id');
    }

    public static function peratusanBintang($instrumen_id, $butiranInstitusiId = null){
        //$items = ItemStandardQualitySkips::where('butiran_institusi_id', $butiranInstitusiId);
        $items = ButiranInstitusiSkips::with([
            'itemStandardKualiti' => function ($query) {
                $query->whereNotNull('status');
            }
        ])
        ->where('instrumen_skips_id', $instrumen_id)
        ->get()
        ->filter(function ($item) {
            // Check if itemStandardKualiti relationship exists and is not empty
            return optional($item->itemStandardKualiti)->count() > 0;
        });

        $total = $score = 0;

        $tab1 = json_decode($items->penubuhan_pendaftaran);
        $penubuhanPendaftaran = config('staticdata.skips.penubuhan_pendaftaran');

        foreach($penubuhanPendaftaran as $key => $pendaftaran){
            $score = $tab1->$key;
            $total = $total + $score;
        }

        
    }
}
