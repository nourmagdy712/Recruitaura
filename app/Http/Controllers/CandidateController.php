<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use App\Models\SavedJob;
use App\Models\Application;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CandidateController extends Controller
{
    public function profile()
    {
        $candidate = Candidate::find(session('candidate_id'));
        $savedJobs = SavedJob::with('job.company')
        ->where('candidate_id', $candidate->id)
        ->latest()
        ->get();

        $applications = Application::with('job.company')
        ->where('candidate_id', $candidate->id)
        ->latest()
        ->get();

        $interviews = Interview::whereHas('application', function ($q) use ($candidate) {
            $q->where('candidate_id', $candidate->id);
        })
        ->with(['application.job.company'])
        ->latest()
        ->get();

        return view('Candidate profile', compact('candidate','savedJobs','applications','interviews'));
    }

   public function update(Request $request)
{
    $candidate = Candidate::find(session('candidate_id'));

    $candidate->full_name = $request->full_name;
    $candidate->email = $request->email;
    $candidate->phone = $request->phone;
    $candidate->location = $request->location;
    $candidate->expected_salary = $request->expected_salary;
    $candidate->summary = $request->summary;
    $candidate->skills = $request->skills;
    $candidate->experience_years = $request->experience_years;

    // Password update
    if (!empty($request->password)) {
        $candidate->password = Hash::make($request->password);
    }

    // Profile image upload
    if ($request->hasFile('profile_image')) {

        $image = $request->file('profile_image');

        $imageName = time().'_'.$image->getClientOriginalName();

        $image->move(public_path('uploads/profile_images'), $imageName);

        $candidate->image = $imageName;
    }

    // CV upload
    if ($request->hasFile('cv_file')) {

        $cv = $request->file('cv_file');

        $cvName = time().'_'.$cv->getClientOriginalName();

        $cv->move(public_path('uploads/cvs'), $cvName);

        $candidate->resume = $cvName;
    }

    $candidate->save();

    return back()->with('success', 'Profile updated successfully');
}

public function show(Candidate $candidate)
{

    return view('Applicant details', compact('candidate'));
}

 // ACCEPT INVITATION
 public function accept(Interview $interview)
 {
     $interview->update([
         'status' => 'accepted'
     ]);

     return back()->with('success', 'Interview accepted successfully.');
 }

 // REQUEST RESCHEDULE
 public function requestReschedule(Request $request, Interview $interview)
 {
     $request->validate([
         'candidate_message' => 'required|string'
     ]);

     $interview->update([
         'status' => 'reschedule_requested',
         'candidate_message' => $request->candidate_message
     ]);

     return back()->with('success', 'Reschedule request sent.');
 }

}

