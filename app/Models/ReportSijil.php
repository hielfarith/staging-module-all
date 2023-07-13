<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSijil extends Model
{
    use HasFactory;

    protected $table = 'report_sijil';


    public $fillable = [
        'sijil_name',
        'descriptions',
        'date',
        'project_id'
    ];

    public function ReportSijilDetails(){
        return $this->hasMany(ReportSijilDetails::class,'report_sijil_id','id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public function uploadedFiles($docType = null)
    {
        return $this->hasMany(UploadedFile::class, 'borang_id', 'id')
            ->where('entity_type', 'ReportSijil')
            ->when($docType != null, function ($query) use ($docType) { //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
                $query->where('doc_type', $docType);
            });
    }
}
