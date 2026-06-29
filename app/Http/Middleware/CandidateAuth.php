<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CandidateAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('candidate_id')) {
            return redirect('/signin')->withErrors(['auth' => 'Please login as candidate']);
        }

        return $next($request);
    }
}