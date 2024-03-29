<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButiranPenilaiKendri extends Model
{
    use HasFactory;
    protected $table = 'butiran_penilai_kendiris';
    protected $fillable = [
        'nama_penilai_kendiri',
        'no_kad_pengenalan',
        'no_telephoe',
        'email',
        'jawatan_penilai',
        'tarikh_penilaian_kendiri',
        'butiran_institusi_id'
    ];
}
