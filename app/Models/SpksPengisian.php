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
            'jumlah',
            'aspek1_sectionb',
            'aspek1_sectionc',
            'aspek1_sectiond',
            'aspek1_sectione'
    ];
}
