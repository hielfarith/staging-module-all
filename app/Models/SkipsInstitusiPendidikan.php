<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkipsInstitusiPendidikan extends Model
{
    use HasFactory;

    protected $table = 'skips_institusi_pendidikan';

    protected $fillable = [
        'jenis',
        'nama',
        'alamat',
        'alamat_2',
        'alamat_3',
        'poskod',
        'daerah',
        'negeri',
        'no_perakuan',
        'no_tel',
        'email',
        'nama_pengerusi_pengurus',
        'no_kp_pengerusi_pengurus',
        'nama_pengetua_gurubesar',
        'no_kp_pengetua_gurubesar',
        'tarikh_daftar',
        'tarikh_tamat_daftar',
        'status',
    ];
}
