<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RecruiterAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('recruiter_id')) {
            return redirect('/signin')->withErrors(['auth' => 'Please login as recruiter']);
        }

        return $next($request);
    }
}