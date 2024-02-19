<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpksPengisian extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'aspek1',
            'aspek2',
            'aspek3',
            'aspek4',
            'aspek5',
            'aspek6',
            'status',
            'instrumen_id',
            'jumlah'
    ];
}
