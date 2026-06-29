<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'candidate_id',
        'status',
        'technical_aura',
        'experience_aura',
        'communication_aura',
        'culture_fit_aura',
        'aura_score',
        'recruiter_note',
        'applied_at'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}
