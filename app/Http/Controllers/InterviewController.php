<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
class InterviewController extends Controller
{
 // STORE (Schedule interview)
 public function store(Request $request)
 {
     $request->validate([
         'application_id' => 'required|exists:applications,id',
         'interview_date' => 'required|date',
         'type' => 'required|in:online,onsite,phone',
         'meeting_link' => 'nullable|url',
         'location' => 'nullable|string',
         'interviewers' => 'nullable|string',
     ]);

     Interview::create([
         'application_id' => $request->application_id,
         'recruiter_id' => session('recruiter_id'),
         'scheduled_at' => $request->interview_date,
         'meeting_type' => $request->type,
         'meeting_link' => $request->meeting_link,
         'location' => $request->location,
         'interviewers' => $request->interviewers,
         'status' => 'pending',
     ]);

     return back()->with('success', 'Interview scheduled successfully');
 }

 // LIST (Recruiter interviews)
 public function index()
 {
     $recruiter = auth()->user();

     $interviews = Interview::whereHas('application.job', function ($q) use ($recruiter) {
         $q->where('company_id', $recruiter->company_id);
     })
     ->whereHas('application', function ($q) {
         $q->whereIn('status', [
             'hr-interview',
             'technical-interview',
             'final-interview'
         ]);
     })
     ->with(['application.job', 'application.candidate'])
     ->latest()
     ->get();

     return view('recruiter.profile', compact('interviews'));
 }

 // RESCHEDULE
 public function reschedule(Request $request, Interview $interview)
 {
     $request->validate([
         'interview_date' => 'required|date',
     ]);

     $interview->update([
         'scheduled_at' => $request->interview_date,
         'status' => 'rescheduled',
     ]);

     return back()->with('success', 'Interview rescheduled');
 }

 // CANCEL
 public function cancel(Interview $interview)
 {
     $interview->update([
         'status' => 'cancelled',
     ]);

     return back()->with('success', 'Interview cancelled');
 }

}
