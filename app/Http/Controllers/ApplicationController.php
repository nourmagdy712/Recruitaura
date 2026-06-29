<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{

    public function updateStatus(
        Request $request,
        Application $application
    )
    {
        $application->update([
            'status' => $request->status
        ]);
    
        return back();
    }

    public function saveScore(Request $request, Application $application)
    {
        $request->validate([
            'technical_aura' => 'required|integer|min:0|max:100',
            'experience_aura' => 'required|integer|min:0|max:100',
            'communication_aura' => 'required|integer|min:0|max:100',
            'culture_fit_aura' => 'required|integer|min:0|max:100',
            'aura_score' => 'nullable|integer|min:0|max:100',
            'recruiter_note' => 'nullable|string',
        ]);
    
        $application->update([
            'technical_aura' => $request->technical_aura,
            'experience_aura' => $request->experience_aura,
            'communication_aura' => $request->communication_aura,
            'culture_fit_aura' => $request->culture_fit_aura,
            'aura_score' => $request->aura_score,
            'recruiter_note' => $request->recruiter_note,
        ]);
    
        return back()->with('success', 'Score saved successfully');
    }
}
