<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\Job;
use App\Models\SavedJob;
use App\Models\Application;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index(Request $request)
{
    $query = Job::with('company')->where('status', 'active');

    if ($request->filled('title')) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    $jobs = $query->latest()->get();
    return view('jobs', compact('jobs'));
}
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required',
            'work_type' => 'required',
            'experience_level' => 'required',
            'description' => 'required',
            'requirements' => 'required',
        ]);
    
        $recruiter = Recruiter::find(session('recruiter_id'));

        Job::create([
            'company_id' => $recruiter->company_id,
            'recruiter_id' => $recruiter->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'department' => $request->department,
            'location' => $request->location,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'employment_type' => $request->employment_type,
            'work_type' => $request->work_type,
            'experience_level' => $request->experience_level,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'status' => 'active'
        ]);
    
        return back()->with('success', 'Job posted successfully.');
    }

public function toggleStatus(Job $job)
{

    $job->status = $job->status === 'active'
        ? 'closed'
        : 'active';

    $job->save();

    return redirect()->back()->with('success', 'Job status updated.');
}

public function show(Job $job)
{
    return view('Job details', compact('job'));
}

public function toggleSave(Job $job)
{
    $candidateId = session('candidate_id');

    if (!$candidateId) {
        return redirect('/signin');
    }

    $saved = SavedJob::where('candidate_id', $candidateId)
        ->where('job_id', $job->id)
        ->first();

    if ($saved) {
        $saved->delete();
    } else {
        SavedJob::create([
            'candidate_id' => $candidateId,
            'job_id' => $job->id,
        ]);
    }

    return back();
}

public function apply(Job $job)
{
    $candidateId = session('candidate_id');

    if (!$candidateId) {
        return redirect('/signin');
    }

    $exists = Application::where('candidate_id', $candidateId)
        ->where('job_id', $job->id)
        ->exists();

    if (!$exists) {
        Application::create([
            'candidate_id' => $candidateId,
            'job_id' => $job->id,
            'status' => 'Applied',
        ]);
    }

    return back()->with('success', 'Application submitted successfully.');
}

}
