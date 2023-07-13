<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    public $table = 'uploaded_files';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public $fillable = [
        'id',
        'entity_type',
        'doc_type',
        'path',
        'borang_id',
        'uploaded_by',
        'created_at',
        'updated_at'
    ];
}
