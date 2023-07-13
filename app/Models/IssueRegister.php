<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueRegister extends Model
{
    use HasFactory;
    protected $table = 'issue_register';
    protected $fillable = ['projects_id','Registered Date','Issues','Action Plan','Class','Team',
                            'Target Solved','Revised Date','Status'];


    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'projects_id');
    }

    
}
