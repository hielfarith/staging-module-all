<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpakStandardPenilaian extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'penilaian1',
            'penilaian2',
            'penilaian3',
            'penilaian4',
            'penilaian5',
            'penilaian6',
            'status',
            'instrument_id',
            'jumlah'
        ];
}
