<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpdesk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['id','ticketNum','details','reportedOn','reportedBy','status'];

}
