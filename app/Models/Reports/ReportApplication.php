<?php

namespace App\Models\Reports;

use App\Models\Reports\ReportApplicationIssues;
use App\Models\Email;
use App\Models\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportApplication extends Model
{
    use LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'report_application';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $dates = [
        'tarikh_disemak',
        'tarikh_disediakan',
    ];

    public $fillable = [
        'id',
        'project_id',
        'title',
        'title_original',
        'month',
        'year',
        'status',
        'nama_penyemak',
        'jawatan_penyemak',
        'tarikh_disemak',
        'nama_penyedia',
        'jawatan_penyedia',
        'tarikh_disediakan',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    public function month_type()
    {
        return $this->belongsTo('App\Models\Master\MasterMonth', 'month', 'id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public function getIssues()
    {
        return $this->hasMany(ReportApplicationIssues::class, 'report_application_id', 'id');
    }

    public function email(){
        return $this->hasMany(Email::class, 'entity_id', 'id')
        ->where('entity_type', 'ReportApplication');
    }

    public function uploadedFiles($docType = null)
    {
        return $this->hasMany(UploadedFile::class, 'borang_id', 'id')
            ->where('entity_type', 'ReportApplication')
            ->when($docType != null, function ($query) use ($docType) { //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
                $query->where('doc_type', $docType);
            });
    }

}
