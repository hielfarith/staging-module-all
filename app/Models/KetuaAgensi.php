<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaAgensi extends Model
{
    use HasFactory;

   
protected $fillable = [
                            'nama_pengguna',
                            'panggilan',
                            'no_kad',
                            'jawatan',
                            'gred',
                            'jenis',
                            'modul',
                            'agensi_kementerian',
                            'email_ketua',
                            'no_tel_pejabat',
                            'no_tel_peribadi',
                            'alamat1',
                            'alamat2',
                            'alamat3',
                            'poskod',
                            'daerah',
                            'negeri'
                            ];
}
