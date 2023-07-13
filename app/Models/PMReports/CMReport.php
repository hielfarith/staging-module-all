<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\UploadedFile;

class CMReport extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'cm_reports';

    protected $fillable = [
        'id',
        'project_id',
        'server_checklist_id',

        'date_reported',
        'time_reported',

        'staff_name',
        'staff_role',
        'staff_phone_no',
        'staff_email',

        'staff2_name',
        'staff2_role',

        'staff_signature',
        'signature_date',
        'staff2_signature',
        'signature2_date',
    ];

    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    // belongs to pm setting
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    // has many server checklist
    public function server_checklist()
    {
        return $this->belongsTo('App\Models\PMReports\ServerChecklist', 'server_checklist_id');
    }

    public function appendix()
    {
        return $this->hasMany('App\Models\PMReports\CMReportAppendix', 'cm_report_id','id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($cm_report) {
            foreach ($cm_report->appendix()->get() as $appendix) {
                $appendix->delete();
            }
        });
    }

    public function uploadedFiles($docType = null)
    {
        return $this->hasMany(UploadedFile::class, 'borang_id','id')
        ->where('entity_type','CMReport')
        ->when($docType != null, function($query) use($docType){ //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
            $query->where('doc_type',$docType);
        });
    }
}
