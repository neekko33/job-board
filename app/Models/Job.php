<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    protected $table = 'custom_jobs';

    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = [
      'employer_id',
    ];

    public static array $experienceLevels = ['entry', 'mid', 'senior'];
    public static array $categories = ['IT', 'Finance', 'Marketing', 'Sales'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
            $query->where('salary', '<=', $maxSalary);
        })->when($filters['experience'] ?? null, function ($query, $experience) {
            $query->where('experience', $experience);
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->where('category', $category);
        });
    }
}
