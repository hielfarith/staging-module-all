<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengerusiPengetuaGuru extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
                    'nama',
                    'no_kp',
                    'no_tel',
                    'email',
                    'jawatan',
                    'negeri',
                    'institusi',
                    'sebab_pertukaran'
                ];
}
