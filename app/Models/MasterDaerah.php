<?php
namespace App\Models;
use App\Http\Controllers\DaerahFetch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDaerah extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_daerahs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    // Define the relationship with MasterState model
    public function state()
    {
        return $this->belongsTo(MasterState::class, 'neg_kod', 'code');
    }
}