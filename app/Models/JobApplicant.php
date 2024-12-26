<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplicant extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'name', 'email', 'resume'];

    // Define the relationship with the Job model
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class)->withDefault("Guest"); // Define the foreign key and local key
    }
}
