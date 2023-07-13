<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportDatabaseDB extends Model
{
    use LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'report_database_db';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'report_database_id',
        'project_database_id',
        'database_name',
        'database_size',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    public function reportDatabase()
    {
        return $this->belongsTo('App\Models\Reports\ReportDatabase', 'report_database_id', 'id');
    }
    
    public function projectDatabase()
    {
        return $this->belongsTo('App\Models\ProjectDatabase', 'project_database_id', 'id');
    }
}
