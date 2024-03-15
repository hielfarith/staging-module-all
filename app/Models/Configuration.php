<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = [
            'instrumen_name',
            'tarikh_kuatkuasa',
            'tujuan_instrumen',
            'status',
            'pengisian_institut',
            'pengisian_peranan',
            'pengisian_dari',
            'pengisian_hingga',
            'validasi_institut',
            'validasi_peranan',
            'validasi_dari',
            'validasi_hingga',
            'verfikasi_institut',
            'verfikasi_peranan',
            'verfikasi_dari',
            'verfikasi_hingga',
            'type',
            'remarks'
    ];
}
