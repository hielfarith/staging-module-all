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
}
