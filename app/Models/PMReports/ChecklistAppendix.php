<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UploadedFile;

class ChecklistAppendix extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pm_checklist_appendixes';

    protected $fillable = [
        'server_checklist_id',
        'type',
        'explanation',
        'status',
    ];

    protected $primaryKey = 'id';

    public function server_checklist()
    {
        return $this->belongsTo('App\Models\PMReports\ServerChecklist', 'server_checklist_id');
    }

    public function uploadedFiles($docType = null)
    {
        return $this->hasMany(UploadedFile::class, 'borang_id','id')
        ->where('entity_type','ChecklistAppendix')
        ->when($docType != null, function($query) use($docType){ //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
            $query->where('doc_type',$docType);
        });
    }
}
