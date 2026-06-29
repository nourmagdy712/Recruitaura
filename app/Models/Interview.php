<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id',
        'recruiter_id',
        'scheduled_at',
        'meeting_type',
        'meeting_link',
        'location',
        'interviewers',
        'status',
        'candidate_message',
        'recruiter_feedback'
    ];

    protected $casts = [
        'interviewers' => 'array'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }
}
