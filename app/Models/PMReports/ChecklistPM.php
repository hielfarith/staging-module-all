<?php

namespace App\Models\PMReports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\UploadedFile;

class ChecklistPM extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'pm_checklist';

    protected $fillable = [
        'id',
        'title',
        'gen_no',
        'project_id',
        'pm_setting_id',
        'start_date',
        'end_date',
        'intro',
        'objective',
        'prepared_by_name',
        'confirmed_by_name',
        'prepared_by_role',
        'confirmed_by_role',
        'prepared_sign_id',
        'confirmed_sign_id',
        'prepared_date',
        'confirmed_date'
    ];

    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    // has many server checklist
    public function serverChecklist()
    {
        return $this->hasMany('App\Models\PMReports\ServerChecklist', 'checklist_id', 'id');
    }

    // belongs to pm setting
    public function pm_setting()
    {
        return $this->belongsTo('App\Models\PMReports\PMSetting', 'pm_setting_id');
    }

    // belongs to pm setting
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function getAll($id = null)
    {
        return $this->with([
            'serverChecklist' => function($checklist) use($id){
                $checklist->whereIn('checklist_id',[$id]);
            },
            'serverChecklist.hardware',
            'serverChecklist.admin_tool',
            'serverChecklist.resources',
            'serverChecklist.appendix',
            'serverChecklist.appendix.uploadedFiles'
        ])
        ->first();
    }

    public function uploadedFiles($docType = null)
    {
        return $this->hasMany(UploadedFile::class, 'borang_id','id')
        ->where('entity_type','ChecklistPM')
        ->when($docType != null, function($query) use($docType){ //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
            $query->where('doc_type',$docType);
        });
    }

}
