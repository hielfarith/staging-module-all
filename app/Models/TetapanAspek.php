<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TetapanAspek extends Model
{
    use HasFactory;

    protected $fillable = [
            'nama_aspek',
            'tarikh_kuatkuasa_aspek',
            'status_aspek',
            'belum_set',
            'telah_set',
            'wajaran_skala',
            'type'
            ];
}
