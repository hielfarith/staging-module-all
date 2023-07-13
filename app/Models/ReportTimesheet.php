<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TimesheetUserModel;

class ReportTimesheet extends Model
{
    use HasFactory;

    protected $connection = 'mysql_second';

    protected $table = 'timesheets';

    protected $fillable = [
        'user_id',
        'category_id',
        'project_id',
        'percentage',
        'description',
        'week',
        'year',
        'timesheet_date',
        'submitted_at',
        'staffRates',
        'staffPercentage'
    ];

    protected $casts = [
        'timesheet_date' => 'date',
        'submitted_at' => 'datetime',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\TimesheetUserModel', 'user_id', 'id');
    }
}
