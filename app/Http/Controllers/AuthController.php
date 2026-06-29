<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
 public function registerCandidate(Request $request)
    {
        Candidate::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/candidate/profile');
    }

    public function registerCompany(Request $request)
    {
        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'industry' => $request->industry,
            'company_size' => $request->company_size,
        ]);

        session([
        'company_id' => $company->id
    ]);

        return redirect('/recruiter/register');
    }

    public function registerRecruiter(Request $request)
{
    Recruiter::create([
        'company_id' => session('company_id'),
        'full_name' => $request->full_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'position' => $request->position,
    ]);

    session()->forget('company_id');

    return redirect('/recruiter/profile');
}

 public function candidateLogin(Request $request)
    {
        $candidate = Candidate::where('email', $request->email)->first();

        if ($candidate && Hash::check($request->password, $candidate->password)) {
            session(['candidate_id' => $candidate->id]);
        return redirect('/candidate/profile');
        }

        return back()->withErrors(['login' => 'Invalid candidate credentials']);
    }

    public function recruiterLogin(Request $request)
    {
        $recruiter = Recruiter::where('email', $request->email)->first();

        if ($recruiter && Hash::check($request->password, $recruiter->password)) {
            session(['recruiter_id' => $recruiter->id]);
        return redirect('/recruiter/profile');
        }

        return back()->withErrors(['login' => 'Invalid recruiter credentials']);
    }

    public function candidateLogout()
{
    session()->forget('candidate_id');
    return redirect('/signin');
}

public function recruiterLogout()
{
    session()->forget('recruiter_id');
    return redirect('/signin');
}
}
