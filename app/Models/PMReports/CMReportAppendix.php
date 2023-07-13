<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\UploadedFile;

class CMReportAppendix extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'cm_report_appendixes';

    protected $fillable = [
        'id',
        'cm_report_id',
        'issue_reported',
        'issue_class',
        'action',
        'status',
        'completed',
    ];

    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    // belongs to pm setting
    public function cm_report()
    {
        return $this->belongsTo('App\Models\PMReports\CMReport', 'cm_report_id');
    }

    public function uploadedFiles($docType = null)
    {
        return $this->hasMany(UploadedFile::class, 'borang_id','id')
        ->where('entity_type','CMReportAppendix')
        ->when($docType != null, function($query) use($docType){ //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
            $query->where('doc_type',$docType);
        });
    }
}
