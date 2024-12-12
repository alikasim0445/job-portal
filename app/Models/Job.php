<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
