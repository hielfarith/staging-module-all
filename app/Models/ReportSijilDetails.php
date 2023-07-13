<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSijilDetails extends Model
{
    use HasFactory;
    protected $table = 'report_sijil_details';
    protected $primarykey = 'id';

    public $fillable = ['report_sijil_id','Firstname','Secondname'];

    public function ReportSijil(){
        return $this->belongsTo(ReportSijil::class,'report_sijil_id','id');
    }
}
