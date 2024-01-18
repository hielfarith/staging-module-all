<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurulatih extends Model
{
    use HasFactory;

    protected $fillable = [
            'nama_pengguna',
            'no_kad',
            'warganegara',
            'jantina',
            'kaum',
            'tarikh_lahir',
            'telefon_rumah',
            'telefon_bimbit',
            'email',
            'gred_jawatan',
            'tarikh_lantikan',
            'tarikh_mula',
            'majikan',
            'jarak_rumah',
            'penerima_bayaran',
            'jurulaith_sukan',
            'alamat1',
            'alamat2',
            'alamat3',
            'bandar',
            'negeri',
            'poskod',
            'maklumat_kesihatan',
            'maklumat_sekolah',
            'persijilan',
            'tahap_gred',
            'tarikh_pensijilan',
            'sijil_path',
            'sains_sukan_persijilan',
            'sains_sukan_tarikh_pensijilan',
            'sains_sukan_sijil_path',
            'spkk_persijilan',
            'spkk_tarikh_pensijilan',
            'spkk_sijil_path',
            'sukan_permainan',
            'kejohanan',
            'tahun',
            'peringkat',
            'anugerah',
            'anugerah_tahun'
    ];
}
