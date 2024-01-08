<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPengguna extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profil_pengguna';
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = ['nama_pengguna',
                            'no_kad',
                            'email_peribadi',
                            'email_taska',
                            'email_pejabat_penyelia',
                            'agensi_kementerian',
                            'jenis',
                            'jawatan',
                            'gred',
                            'status',
                            'alamat1',
                            'alamat2',
                            'alamat3',
                            'poskod',
                            'daerah',
                            'negeri',
                            'tarikh_penubuhan',
                            'jenis_taska',
                            'jumla_pendidik',
                            'jumlah_kanak',
                            'jumla_staf_sokogan',
                            'jenisbanugunan',
                            'no_tel_pejabat',
                            'no_tel_peribadi'
                        ];
}
