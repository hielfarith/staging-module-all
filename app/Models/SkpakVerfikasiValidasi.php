<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpakVerfikasiValidasi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'itemcq1',
        'itemcq2',
        'itemcq3',
        'itemcq4',
        'itemcq5',
        'senarai_semak',
        'status',
        'skpak_standard_penilaian_id',
        'jumlah'
    ];
}
