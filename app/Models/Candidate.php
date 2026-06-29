<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone',
        'location',
        'headline',
        'summary',
        'skills',
        'resume',
        'image',
        'experience_years',
        'expected_salary'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class);
    }
}
