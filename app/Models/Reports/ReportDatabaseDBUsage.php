<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReportDatabaseDBUsage extends Model
{
    use LogsActivity;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'report_database_db_usage';

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
        'tableName',
        'tableRow',
        'tableSize',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*'])->logOnlyDirty();
    }

    public function reportDatabase()
    {
        return $this->belongsTo('App\Models\Reports\ReportDatabase', 'report_database_id', 'id');
    }
}
