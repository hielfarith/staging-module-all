<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AhliJawatankuasaKerja extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
            'nama_pengguna',
            'panggilan',
            'no_kad',
            'jawatan',
            'alamat1',
            'alamat2',
            'alamat3',
            'poskod',
            'daerah',
            'negeri',
            'email_peribadi',
            'nama_majikan',
            'email_majikan',
            'agensi_kementerian',
            'no_tel_pejabat',
            'no_tel_peribadi'
        ];
}
