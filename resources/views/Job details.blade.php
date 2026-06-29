<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Details</title>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
  "Segoe UI", Roboto, Arial, sans-serif;
}

body {
  background: #f9fafb;
}

/* PAGE WRAPPER */
.page {
  max-width: 900px;
  margin: auto;
  padding: 20px;
  padding-top: 60px; 
}

/* CARD */
.job-card {
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 6px 18px rgba(0,0,0,0.06);
  overflow: hidden;
}

.job-card .btn {
    margin-top: 10px;
}

/* HEADER */
.header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  padding: 20px;
}

.title h1 {
  font-size: 26px;
  margin-bottom: 5px;
}


.badges {
  display: flex;
  gap: 8px;
}

.badge {
  font-size: 12px;
  background: #f3f4f6;
  padding: 5px 10px;
  border-radius: 999px;
  color: #374151;
}

.company {
  color: #4f46e5;
  font-weight: 600;
}

.location {
  color: #6b7280;
  font-size: 13px;
  margin-top: 4px;
}

/* ACTIONS */
.actions {
  display: flex;
  gap: 10px;
}

.btn {
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 13px;
  border: none;
  cursor: pointer;
  font-weight: 600;
  margin-top: 0;
}

.btn-primary {
  background: #4f46e5;
  color: white;
  transition: 0.2s ease;
}

.btn-primary:hover {
  background: #4338ca;
  transform: translateY(-1px);
}

.btn-primary:active {
  transform: scale(0.98);
}

.btn-light {
  background: #f3f4f6;
}


/* THIN LINE (IMPORTANT PART) */
.divider {
  border: none;
  border-top: 1px solid #e5e7eb;
}

/* CONTENT */
.content {
  padding: 10px;
}

.section {
  padding: 14px 0;
}

.section h2 {
  font-size: 1.1rem;
  color: #111827;
  margin-bottom: 5px;
  margin-left: 5px;
}

.section p{
  font-size: .9rem;
  line-height: 1.6;
  margin-left: 10px;
}

.details{
    font-size: 1.2rem;
  }

.icon-btn {
  width: 42px;
  height: 42px;
  border-radius: 10px;
  border: 1px solid #e5e7eb;
  background: white;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 0.2s;
}

.icon-btn svg {
  width: 18px;
  height: 18px;
  fill: white; /* default = white */
  stroke: #9ca3af; /* outline look */
  stroke-width: 2;
  transition: 0.2s;
}

/* SAVED STATE */
.icon-btn.active {
  background: #eef2ff;
  border-color: #4f46e5;
}

.icon-btn.active svg {
  fill: #4f46e5;
  stroke: #4f46e5;
}

.company-info{
  display:flex;
  gap:20px;
  align-items:flex-start;
}

.company-logo{
  width:80px;
  height:80px;
  object-fit:cover;
  border-radius:12px;
  border:1px solid #e5e7eb;
  background:#fff;
}

.nav-actions{
    position: fixed;
    top: 5;
    left: 0;
    right: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 16px;
    z-index: 1000;
    gap: 10px;
}

.nav-actions .btn {
    border: none;
    cursor: pointer;
    border-radius: 0.5rem;
    padding: 0.6rem 1rem;
    font-size: 0.95rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.signinbtn{
    background: transparent;
    color: #374151;
    font-weight: 450 !important;

}

.signinbtn:hover {
    color: #4f46e5;
}

.btn-outline {
    background: transparent;
    border: 1px solid !important;
    border-color: #4f46e5;
    color: #4f46e5;
}

.btn-outline:hover {
    background: #e1ecf7;
}

.nav-actions a {
    font-size: 1rem;
    color: #374151;       
    transition: 0.2s;
}

.nav-actions a:hover {
    color: #4f46e5;
}

.profile-icon {
    font-size: 22px;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 50%;
    background: #f1f5f9;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: 0.2s;
}

.profile-icon:hover {
    background: #e2e8f0;
}

/* LEFT LOGO */
.logo {
    font-size: 1.5rem !important;
    font-weight: 700;
    color: #4f46e5;
    text-decoration: none;
    white-space: nowrap;
}

.logo:hover {
    opacity: 0.8;
}

/* RIGHT GROUP (IMPORTANT FIX) */
.nav-right {
    display: flex;
    align-items: center;
    gap: 8px;
}

@media (max-width: 768px) {
    .header {
        flex-direction: column;
        align-items: stretch;
        gap: 20px;
    }

    .company-info {
        width: 100%;
        min-width: 0;
    }

    .title {
        min-width: 0;
        flex: 1;
    }

    .title h1 {
        font-size: 22px;
        word-break: break-word;
    }

    .company,
    .location {
        word-break: break-word;
    }

    .badges {
        flex-wrap: wrap;
        gap: 6px;
        margin-top: 8px;
    }

    .badge {
        font-size: 11px;
        padding: 4px 8px;
    }

    .actions {
        width: 100%;
        justify-content: space-between;
        align-items: center;
    }

    .btn-primary,
    .btn-light {
        flex: 1;
        text-align: center;
        padding: 10px;
    }
}

@media (max-width: 480px) {
    .company-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .company-logo {
        width: 65px;
        height: 65px;
    }

    .title h1 {
        font-size: 20px;
    }

    .actions {
        flex-wrap: wrap;
        gap: 10px;
    }

    .icon-btn {
        width: 40px;
        height: 40px;
    }


.btn {
    text-align: center;
}
.nav-actions {
    padding: 8px 12px;
}


.profile-icon {
    font-size: 18px;
    padding: 6px 8px;
}

.logo {
    font-size: 1.2rem !important;
}

.nav-right {
    gap: 4px;
}

.nav-actions .signinbtn,
.nav-actions .btn-outline {
    padding: 5px 8px;
    font-size: 12px;
}
}

</style>
</head>

<body>
  @php
  $isSaved = false;
  
  if(session('candidate_id')) {
      $isSaved = \App\Models\SavedJob::where(
          'candidate_id',
          session('candidate_id')
      )->where(
          'job_id',
          $job->id
      )->exists();
  }
  @endphp

<div class="nav-actions">

  <a href="{{ url('/') }}" class="logo">
    Recruitaura
</a>

    @if(session()->has('candidate_id'))
        <a href="{{ url('/candidate/profile') }}" class="profile-icon" title="Profile">
            👤
        </a>

    @elseif(session()->has('recruiter_id'))
        <a href="{{ url('/recruiter/profile') }}" class="profile-icon" title="Profile">
            🧑‍💼
        </a>

    @else
    <div class="nav-right">
        <button class="btn signinbtn" onclick="window.location.href='{{ route('signin') }}'">
            Sign In
        </button>

        <button class="btn btn-outline" onclick="window.location.href='{{ route('signup') }}'">
            Register
        </button>
    </div>
    @endif

</div>
  
<div class="page">

  <div class="job-card">

    <!-- HEADER -->
    <div class="header">

      <div class="company-info">

        <a href="{{ route('company.show', $job->company->id) }}">
          <img
          src="{{ $job->company->logo
              ? asset('uploads/company_logos/'.$job->company->logo)
              : asset('imgs/profile.jpeg') }}"
          alt="Company Logo"
          class="company-logo">
        </a>
        <div class="title">
          <h1>{{ $job->title }}</h1>
          <div class="badges">
            <span class="badge">{{ $job->employment_type }}</span>
            <span class="badge">{{ $job->work_type }}</span>
          </div>
  
          <div class="company"><a href="{{ route('company.show', $job->company->id) }}">
            {{ $job->company->name }}
        </a></div>
          <div class="location">{{ $job->location }} • Posted {{ $job->created_at->diffForHumans() }}</div>
        </div>
    
      </div>

      <div class="actions">
        @php
        $alreadyApplied = false;
        
        if(session('candidate_id')){
            $alreadyApplied = \App\Models\Application::where(
                'candidate_id',
                session('candidate_id')
            )->where(
                'job_id',
                $job->id
            )->exists();
        }
        @endphp
        
        @if($alreadyApplied)
        
        <button class="btn btn-light" disabled>
            Already Applied
        </button>
        
        @else
        
        <form action="{{ route('jobs.apply', $job) }}" method="POST">
            @csrf
        
            <button type="submit" class="btn btn-primary">
                Apply for job
            </button>
        </form>
        
        @endif
        
        <form action="{{ route('jobs.save', $job) }}" method="POST">
          @csrf
      
          <button
              type="submit"
              class="icon-btn save-btn {{ $isSaved ? 'active' : '' }}"
              title="Save Job">
      
              <svg viewBox="0 0 24 24">
                  <path d="M17 3H5a2 2 0 0 0-2 2v16l9-4 9 4V5a2 2 0 0 0-2-2z"/>
              </svg>
      
          </button>
      </form>

      </div>

    </div>

    <hr class="divider">

    <!-- CONTENT -->
    <div class="content">

      <div class="section">
        <h2>Job Details</h2>
        <p class="details">
          <span class="detailshead">Career Level: </span><span>{{ $job->experience_level }}</span><br>
          <span class="detailshead">Job Category: </span><span>{{ $job->department }}</span><br>
            <span class="detailshead">Salary Range: </span><span>@if($job->salary_min && $job->salary_max)
              {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }}
          @else
              Confidential
          @endif</span><br></p>
      </div>

      <hr class="divider">

      <div class="section">
        <h2>Job Description</h2>
        <p>     {{ $job->description }}</p>
      </div>

      <hr class="divider">

      <div class="section">
        <h2>Job Requirements</h2>
        <p>    {!! nl2br(e($job->requirements)) !!}</p>
      </div>

    </div>

  </div>

</div>

<script>
document.querySelectorAll(".save-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      btn.classList.toggle("active");
    });
  });
  </script>
</body>
</html>