<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkepsProgramSekolah extends Model
{
    use HasFactory;

    protected $table = 'ikeps_program_sekolah';

    protected $fillable = [
        'tahun',
        'kod_sekolah',

        'sukan_tahunan', 
        'sukan_tahunan_kekerapan', 
        'sukan_tahunan_perlaksanaan',

        'merentas_desa', 
        'merentas_desa_kekerapan', 
        'merentas_desa_perlaksanaan',

        'sukantara', 
        'sukantara_kekerapan', 
        'sukantara_perlaksanaan',

        'sukan_tahap_1', 
        'sukan_tahap_1_kekerapan', 
        'sukan_tahap_1_perlaksanaan',

        'sukan_pendidikan_khas', 
        'sukan_pendidikan_khas_kekerapan', 
        'sukan_pendidikan_khas_perlaksanaan',

        'program_sukan', 
        'program_sukan_kekerapan', 
        'program_sukan_perlaksanaan',

        'anugerah_sukan', 
        'anugerah_sukan_kekerapan', 
        'anugerah_sukan_perlaksanaan',

        'sukan_antara_rumah', 
        'sukan_antara_rumah_kekerapan',
        'sukan_antara_rumah_perlaksanaan',

        'sukan_antara_kelas', 
        'sukan_antara_kelas_kekerapan', 
        'sukan_antara_kelas_perlaksanaan',

        'sukan_antara_unit', 
        'sukan_antara_unit_kekerapan', 
        'sukan_antara_unit_perlaksanaan',

        'perlawanan_persahabatan', 
        'perlawanan_persahabatan_kekerapan', 
        'perlawanan_persahabatan_perlaksanaan',

        'sukan_mini', 
        'sukan_mini_kekerapan', 
        'sukan_mini_perlaksanaan',

        'sukan_prasekolah', 
        'sukan_prasekolah_kekerapan', 
        'sukan_prasekolah_perlaksanaan',

        'klinik_sukan', 
        'klinik_sukan_kekerapan', 
        'klinik_sukan_perlaksanaan',

        'hari_sukan', 
        'hari_sukan_kekerapan', 
        'hari_sukan_perlaksanaan',

        'lain',
        'lain_butiran', 
        'lain_kekerapan', 
        'lain_perlaksanaan',

        'created_by',
        'updated_by',
    ];

}