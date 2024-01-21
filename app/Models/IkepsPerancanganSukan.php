<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkepsPerancanganSukan extends Model
{
    use HasFactory;

    protected $table = 'ikeps_perancangan_sukan';

    protected $fillable = [
        'tahun',
        'kod_sekolah',

        'sukan_utama',
        'sukan_utama_butiran',
        'sukan_utama_program',

        'inisiatif_sekolah',
        'inisiatif_sekolah_butiran',
        'inisiatif_sekolah_program',

        'projek_msn',
        'projek_msn_butiran',
        'projek_msn_program',

        'projek_kpm',
        'projek_kpm_butiran',
        'projek_kpm_program',

        'ladap',
        'ladap_butiran',
        'ladap_program',

        'pengurusan_sukan',
        'pengurusan_sukan_butiran',

        'kejurulatihan',
        'kejurulatihan_butiran',

        'kepegawaian',
        'kepegawaian_butiran',

        'sains_sukan',
        'sains_sukan_butiran',

        'created_by',
        'updated_by',
    ];

}