<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiHelpdeskIssues extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'api_helpdesk_issues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'data' => 'array'
    ];

    protected $primaryKey = 'id';

    protected $dates = [
        'date_issued',
        'date_completed',
        'date_response',
    ];

    public $fillable = [
        'id',
        'project_id',
        'api_id',
        'month',
        'year',
        'title',
        'explanation',
        'date_issued',
        'tracking_id',
        'nama_pengguna',
        'issue_group',
        'date_response',
        'date_completed',
        'action',
        'data'
    ];


}
