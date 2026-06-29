<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Company Profile</title>

<style>
body {
    margin: 0;
    font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
    "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;    background: #f9fafb;
    color: #111827;
}

/* PAGE */
.page {
    max-width: 1000px;
    margin: auto;
    padding: 20px;
    padding-top: 60px; 
}

/* CARD */
.card {
    background: white;
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    padding: 20px;
}

/* HEADER */
.company-header {
    display: flex;
    gap: 20px;
    align-items: center;
    flex-wrap: wrap; /* IMPORTANT */
}

.company-logo {
    width: 90px;
    height: 90px;
    border-radius: 12px;
    object-fit: cover;
    border: 1px solid #e5e7eb;
}

/* TEXT */
h1 {
    margin: 0;
    font-size: 26px;
}

.meta {
    color: #6b7280;
    font-size: 14px;
    margin-top: 5px;
}

/* SECTIONS */
.section {
    margin-top: 25px;
}

.section h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

/* JOB GRID */
.jobs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 15px;
}

/* JOB CARD */
.job-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 15px;
    transition: 0.2s;
}

.job-card:hover {
    transform: translateY(-3px);
}

/* BADGES */
.badge {
    font-size: 11px;
    padding: 4px 8px;
    border-radius: 999px;
    background: #f3f4f6;
    color: #374151;
    margin-right: 5px;
}

/* BUTTON */
.btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    border-radius: 8px;
    background: #4f46e5;
    color: white;
    text-decoration: none;
    font-size: 13px;
}

/* INFO GRID */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 10px;
    font-size: 14px;
    color: #374151;
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
    gap: 10px;
}


/* =========================
   RESPONSIVE FIXES
========================= */

@media (max-width: 768px) {

    .company-header {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }

    .company-logo {
        width: 70px;
        height: 70px;
    }

    h1 {
        font-size: 22px;
    }

    .jobs-grid {
        grid-template-columns: 1fr; /* stack cards */
    }
    .nav-actions {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 8px;
    }

    .logo {
        font-size: 1.2rem;
    }

    .profile-icon {
        padding: 6px 10px;
        font-size: 18px;
    }

    .btn {
        padding: 6px 10px;
        font-size: 0.85rem;
    }
}

@media (max-width: 480px) {

    .card {
        padding: 15px;
    }

    .meta {
        font-size: 13px;
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
        font-size: 1rem !important;
    }

    .nav-right {
        gap: 4px;
    }

    .nav-actions .signinbtn,
    .nav-actions .btn-outline {
        padding: 4px 7px;
        font-size: 12px;
    }
}


</style>
</head>

<body>

    <div class="nav-actions">

        <a href="{{ url('/') }}" class="logo">
            Recruitaura
        </a>
    
        <div class="nav-right">
    
            @if(session()->has('candidate_id'))
                <a href="{{ url('/candidate/profile') }}" class="profile-icon">👤</a>
    
            @elseif(session()->has('recruiter_id'))
                <a href="{{ url('/recruiter/profile') }}" class="profile-icon">🧑‍💼</a>
    
            @else
                <button class="btn signinbtn" onclick="window.location.href='{{ route('signin') }}'">
                    Sign In
                </button>
    
                <button class="btn btn-outline" onclick="window.location.href='{{ route('signup') }}'">
                    Register
                </button>
            @endif
    
        </div>
    
    </div>

<div class="page">

    <div class="card">

        {{-- HEADER --}}
        <div class="company-header">

            <img
                src="{{ $company->logo
                    ? asset('uploads/company_logos/'.$company->logo)
                    : asset('imgs/profile.jpeg') }}"
                class="company-logo">

            <div>
                <h1>{{ $company->name }}</h1>

                <span class="meta">
                    {{ $company->industry ?? 'Company' }}
                    • {{ $company->location }}
                </span>

                <span class="meta">
                    {{ $company->company_size ?? 'N/A' }} Employees
                </span>
            </div>

        </div>

        {{-- ABOUT --}}
        <div class="section">
            <h2>About Company</h2>
            <p>{{ $company->description }}</p>
        </div>

        {{-- INFO --}}
        <div class="section">
            <h2>Company Information</h2>

            <div class="info-grid">
                <div><strong>Website:</strong> {{ $company->website ?? '-' }}</div>
                <div><strong>Email:</strong> {{ $company->email ?? '-' }}</div>
                <div><strong>Phone:</strong> {{ $company->phone ?? '-' }}</div>
                <div><strong>Location:</strong> {{ $company->location ?? '-' }}</div>
            </div>
        </div>

        {{-- JOBS --}}
        <div class="section">
            <h2>Open Positions</h2>

            <div class="jobs-grid">

                @forelse($company->jobs as $job)

                    <div class="job-card">

                        <h3>{{ $job->title }}</h3>

                        <div>
                            <span class="badge">{{ $job->employment_type }}</span>
                            <span class="badge">{{ $job->work_type }}</span>
                        </div>

                        <p style="font-size:13px; color:#6b7280;">
                            {{ $job->location }}
                        </p>

                        <a href="{{ route('jobs.show', $job->id) }}" class="btn">
                            View Job
                        </a>

                    </div>

                @empty

                    <p>No open positions available.</p>

                @endforelse

            </div>
        </div>

    </div>

</div>

</body>
</html>