<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelPenilai extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
                            'nama_pengguna',
                            'no_kad',
                            'email_peribadi',
                            'email_penyelia',
                            'email_ketua_jabatan',
                            'agensi_kementerian',
                            'no_tel_pejabat',
                            'no_tel_peribadi',
                            'alamat1',
                            'alamat2',
                            'alamat3',
                            'poskod',
                            'daerah',
                            'negeri',
                            'gred',
                            'negeri_skpak',
                            'status'
                            ];
}
