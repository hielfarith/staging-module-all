<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModuleStatus;

class FormSubmission extends Model
{
    use HasFactory;

     public function statuses(): BelongsTo
    {
        return $this->belongsTo(ModuleStatus::class, 'status', 'id');
    }
}
