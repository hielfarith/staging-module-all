<?php

namespace App\Models\Reports;

use App\Models\Email;
use App\Models\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportDatabase extends Model
{
    use LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'report_database';

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

    public function masterMonth()
    {
        return $this->belongsTo('App\Models\Master\MasterMonth', 'month', 'id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public function databases($project_database_id = null)
    {
        //able to return only specific database or all
        return $this->hasMany('App\Models\Reports\ReportDatabaseDB', 'report_database_id', 'id')
        ->when($project_database_id != null, function ($query) use ($project_database_id) { //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
            $query->where('project_database_id', $project_database_id);
        });;
    }

    public function databaseUsage()
    {
        return $this->hasMany('App\Models\Reports\ReportDatabaseDBUsage', 'report_database_id', 'id');
    }

    // public function getIssues()
    // {
    //     return $this->hasMany(ReportApplicationIssues::class, 'report_application_id', 'id');
    // }

    public function email(){
        return $this->hasMany(Email::class, 'entity_id', 'id')
        ->where('entity_type', 'ReportDatabase');
    }

    public function uploadedFiles($docType = null)
    {
        return $this->hasMany(UploadedFile::class, 'borang_id', 'id')
            ->where('entity_type', 'ReportDatabase')
            ->when($docType != null, function ($query) use ($docType) { //if ada jenis doctype (panggil secara specifik), baru search for it. if not, cari untuk semua
                $query->where('doc_type', $docType);
            });
    }

}
