<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;
    protected $table = 'works'; // Explicitly specify the table name

    protected $fillable = [
        'title',
        'description',
        'company',
        'location',
    ];

    public function applicants(): HasMany
    {
        return $this->hasMany(JobApplicant::class);
    }
}
