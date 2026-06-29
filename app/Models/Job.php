<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'recruiter_id',
        'title',
        'slug',
        'department',
        'location',
        'employment_type',
        'work_type',
        'salary_min',
        'salary_max',
        'experience_level',
        'description',
        'requirements',
        'status',
        'expires_at'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
