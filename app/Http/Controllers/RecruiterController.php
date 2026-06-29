<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Recruiter;
use App\Models\Job;
use App\Models\Application;
use App\Models\Interview;

class RecruiterController extends Controller
{
   public function profile()
{
    $recruiter = Recruiter::with('company')
        ->find(session('recruiter_id'));
    $jobs = Job::where('company_id', $recruiter->company_id)->latest()->get();

    $applications = Application::with([
        'candidate',
        'job'
    ])
    ->whereHas('job', function ($q) use ($recruiter) {
        $q->where('company_id', $recruiter->company_id);
    })
    ->latest()
    ->get();

    $interviews = Interview::whereHas('application.job', function ($q) use ($recruiter) {
        $q->where('company_id', $recruiter->company_id);
    })
    ->with(['application.job', 'application.candidate'])
    ->latest()
    ->get();

    return view('Recruiter profile', compact('recruiter','jobs','applications','interviews'));
}

public function updateRecruiter(Request $request)
{
    $recruiter = Recruiter::with('company')
        ->find(session('recruiter_id'));

    // Recruiter data
    $recruiter->full_name = $request->full_name;
    $recruiter->email = $request->email;
    $recruiter->phone = $request->phone;
    $recruiter->position = $request->position;

    if ($request->filled('password')) {
        $recruiter->password = Hash::make($request->password);
    }

    $recruiter->save();

    return back()->with('success', 'Profile updated successfully');
}

public function updateCompany(Request $request)
{
$recruiter = Recruiter::with('company')
        ->find(session('recruiter_id'));

    // Company data
    $company = $recruiter->company;

    $company->name = $request->name;
    $company->email = $request->email;
    $company->industry = $request->industry;
    $company->website = $request->website;
    $company->linkedin = $request->linkedin;
    $company->company_size = $request->company_size;
    $company->description = $request->company_description;

    if ($request->hasFile('company_logo')) {

        $logo = $request->file('company_logo');

        $logoName = time().'_'.$logo->getClientOriginalName();

        $logo->move(
            public_path('uploads/company_logos'),
            $logoName
        );

        $company->logo = $logoName;
    }

    $company->save();

    return back()->with('success', 'company updated successfully');
}

}
