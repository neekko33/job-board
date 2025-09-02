<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'custom_jobs';

    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public static array $experienceLevels = ['entry', 'mid', 'senior'];
    public static array $categories = ['IT', 'Finance', 'Marketing', 'Sales'];
}
