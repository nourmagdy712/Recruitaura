<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\CompanyController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Welcome');
});

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

Route::view('/signin', 'Sign in')->name('signin');

Route::view('/signup', 'Sign up')->name('signup');

Route::get('/candidate/profile', [CandidateController::class, 'profile'])->middleware('candidate.auth');

Route::post('/candidate/profile/update', [CandidateController::class, 'update'])->middleware('candidate.auth');

Route::get('/recruiter/profile',[RecruiterController::class, 'profile'])->middleware('recruiter.auth');

Route::post('/recruiter/profile/update',[RecruiterController::class, 'updateRecruiter'])->name('recruiter.profile.update');

Route::post('/company/profile/update',[RecruiterController::class, 'updateCompany'])->name('company.profile.update');

Route::view('/recruiter/register', 'Recruiter registration');

Route::post('/register/candidate', [AuthController::class, 'registerCandidate'])->name('candidate.register');

Route::post('/register/company', [AuthController::class, 'registerCompany'])->name('company.register');

Route::post('/recruiter/register', [AuthController::class, 'registerRecruiter'])->name('recruiter.register');

Route::post('/candidate/login', [AuthController::class, 'candidateLogin'])->name('candidate.login');

Route::post('/recruiter/login', [AuthController::class, 'recruiterLogin'])->name('recruiter.login');

Route::get('/candidate/logout', [AuthController::class, 'candidateLogout'])->name('candidate.logout');

Route::get('/recruiter/logout', [AuthController::class, 'recruiterLogout'])->name('recruiter.logout');

Route::post('/jobs/store', [JobController::class, 'store'])->name('jobs.store');

Route::post('/jobs/{job}/toggle-status', [JobController::class, 'toggleStatus'])->name('jobs.toggleStatus');

Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::post('/jobs/{job}/save', [JobController::class, 'toggleSave'])->name('jobs.save');

Route::post('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');   

Route::get('/candidate/{candidate}',[CandidateController::class, 'show'])->name('candidate.show');

Route::post('/applications/{application}/status',[ApplicationController::class, 'updateStatus'])->name('applications.status');

Route::post('/applications/{application}/score', [ApplicationController::class, 'saveScore'])->name('applications.score');

Route::post('/interviews', [InterviewController::class, 'store'])->name('interviews.store');

Route::get('/recruiter/interviews', [InterviewController::class, 'index'])->name('interviews.index');

Route::post('/interviews/{interview}/reschedule', [InterviewController::class, 'reschedule'])->name('interviews.reschedule');

Route::post('/interviews/{interview}/cancel', [InterviewController::class, 'cancel'])->name('interviews.cancel');

Route::post('/candidate/interviews/{interview}/accept', [CandidateController::class, 'accept'])->name('candidate.interviews.accept');

Route::post('/candidate/interviews/{interview}/reschedule', [CandidateController::class, 'requestReschedule'])->name('candidate.interviews.requestReschedule');

Route::get('/company/{id}', [CompanyController::class, 'show'])
    ->name('company.show');