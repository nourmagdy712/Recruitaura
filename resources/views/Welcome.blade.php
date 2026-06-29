<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitaura</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container navbar-content">

        <div class="logo">
            Recruitaura
        </div>

        <div class="nav-actions">

            @if(session()->has('candidate_id'))
                <a href="{{ url('/candidate/profile') }}" class="profile-icon" title="Profile">
                    👤
                </a>
        
            @elseif(session()->has('recruiter_id'))
                <a href="{{ url('/recruiter/profile') }}" class="profile-icon" title="Profile">
                    🧑‍💼
                </a>
        
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
</nav>


<!-- HERO -->
<section class="hero">
    <div class="container hero-content">

        <!-- LEFT -->
        <div>
            <h1>
                Find Your Next<span> Career Opportunity</span>
            </h1>

            <p>
                Connect with top companies, track applications,
                    manage interviews, and land your dream job.
            </p>

            <!-- SEARCH -->
            <div class="search-box">

                <form method="GET" action="{{ route('jobs.index') }}" class="search-grid">

                    <input
                        type="text"
                        name="title"
                        placeholder="Job title">
                
                    <input
                        type="text"
                        name="location"
                        placeholder="Location">
                
                    <button type="submit" class="btn btn-primary">
                        Search Jobs
                    </button>
                
                </form>
            
            </div>
            
            <div class="hero-actions">
            
                <button class="btn btn-primary"
    onclick="window.location.href='{{ route('jobs.index') }}'">
    Browse Jobs
</button>
            
                @if(session()->has('recruiter_id'))
    <a href="{{ url('/recruiter/profile') }}" class="btn btn-secondary">
        Post a Job
    </a>
@else
    <a href="{{ route('signin') }}" class="btn btn-secondary">
        Post a Job
    </a>
@endif
            
            </div>

        </div>

        <!-- RIGHT -->
        <div class="stats-card">

            <div class="stats-grid">

                <div class="stat-box indigo">
                    <h3>Applications</h3>
                    <p>1,240</p>
                </div>
                
                <div class="stat-box green">
                    <h3>Interviews</h3>
                    <p>342</p>
                </div>
                
                <div class="stat-box purple">
                    <h3>Companies</h3>
                    <p>500+</p>
                </div>
                
                <div class="stat-box orange">
                    <h3>Jobs</h3>
                    <p>2,300</p>
                </div>

            </div>

        </div>

    </div>
</section>


<!-- COMPANIES -->
<section class="section">

    <h2 class="section-title">
        Trusted by growing teams
    </h2>

    <div class="container companies-grid">

    <img src="imgs/linearapp_logo.jpg" alt="Linear">
    <img src="imgs/HubSpot.png" alt="HubSpot">
    <img src="imgs/Clerk.png" alt="Clerk">
    <img src="imgs/Figma.png" alt="Figma">
    <img src="imgs/Postman.png" alt="Postman">

    </div>

</section>


<!-- JOBS -->
<section class="section">

    <div class="featured-header">
        <h2 class="section-title">
            Featured opportunities
        </h2>
    
        <a href="{{ route('jobs.index') }}" class="view-all">
            View All
        </a>
    </div>
    <div class="container jobs-grid">

        <!-- JOB CARD -->
        <div class="job-card">
            <div>TechNova</div>

            <div class="job-title">
                Senior Laravel Developer
            </div>

            <div class="tags">
                <span class="tag">Full-Time</span>
                <span class="tag">Remote</span>
            </div>

            <p style="margin-top: 10px;">
                15,000 - 25,000 EGP
            </p>

            <div class="aura-score">
                Aura Match: 92%
            </div>

            <button class="btn btn-primary" style="width:100%; margin-top:15px;">
                View Details
            </button>
        </div>

        <!-- duplicate cards -->
        <div class="job-card">
            <div>SoftTech</div>
            <div class="job-title">Frontend Developer</div>

            <div class="tags">
                <span class="tag">Full-Time</span>
                <span class="tag">Hybrid</span>
            </div>

            <p style="margin-top: 10px;">
                12,000 - 18,000 EGP
            </p>

            <div class="aura-score">
                Aura Match: 88%
            </div>

            <button class="btn btn-primary" style="width:100%; margin-top:15px;">
                View Details
            </button>
        </div>

        <div class="job-card">
            <div>DesignHub</div>
            <div class="job-title">UI/UX Designer</div>

            <div class="tags">
                <span class="tag">Part-Time</span>
                <span class="tag">Remote</span>
            </div>

            <p style="margin-top: 10px;">
                10,000 - 15,000 EGP
            </p>

            <div class="aura-score">
                Aura Match: 85%
            </div>

            <button class="btn btn-primary" style="width:100%; margin-top:15px;">
                View Details
            </button>
        </div>

    </div>
</section>


<!-- HOW IT WORKS -->
<section class="section">

    <h2 class="section-title">
        How It Works
    </h2>

    <div class="container steps-grid">

        <div class="step-card">
            <div class="step-icon">👤</div>
            <h3>Create Profile</h3>
            <p>Upload CV and complete your profile.</p>
        </div>

        <div class="step-card">
            <div class="step-icon">💼</div>
            <h3>Apply Jobs</h3>
            <p>Find and apply to relevant opportunities.</p>
        </div>

        <div class="step-card">
            <div class="step-icon">🚀</div>
            <h3>Track Progress</h3>
            <p>Follow your application status easily.</p>
        </div>

    </div>
</section>


<!-- FEATURES -->
<section class="section">

    <div class="container features-layout">

        <div>

            <h2 class="section-title" style="text-align:left;">
                Why Recruitaura?
            </h2>

            <div class="feature-card">
                <h3>Aura Score Matching</h3>
                <p>Automatically rank candidates based on job requirements.</p>
            </div>

            <div class="feature-card">
                <h3>Application Tracking</h3>
                <p>Follow every hiring stage in one place.</p>
            </div>

            <div class="feature-card">
                <h3>Interview Management</h3>
                <p>Schedule and manage interviews easily.</p>
            </div>

        </div>

        <div class="feature-block">
        
            <div class="flow">
        
                <div class="flow-step">
                    <div class="flow-icon">📝</div>
                    <p>Post Job</p>
                </div>
                
                <div class="flow-step">
                    <div class="flow-icon">📑</div>
                    <p>CV Analysis</p>
                </div>
                
                <div class="flow-step">
                    <div class="flow-icon">📊</div>
                    <p>Shortlist</p>
                </div>
                
                <div class="flow-step">
                    <div class="flow-icon">🎤</div>
                    <p>Interview</p>
                </div>
        
                <div class="flow-step">
                    <div class="flow-icon">🎯</div>
                    <p>Aura score</p>
                </div>
                
                <div class="flow-step">
                    <div class="flow-icon">🚀</div>
                    <p>Hire</p>
                </div>
        
            </div>
        
        </div>

    </div>

</section>


<!-- CTA -->
<section class="cta">

    <h2>Ready to Start Your Journey?</h2>

    <p>Join Recruitaura today and connect with top employers</p>

    <button onclick="window.location.href='{{ route('signup') }}'" class="btn getstarted" style="margin-top:20px;">
        Get Started
    </button>

</section>


<!-- FOOTER -->
<footer class="footer">

    <div class="container footer-grid">

        <div>
            <h2>Recruitaura</h2>
            <p>Smart Recruitment & Applicant Tracking Platform.</p>
        </div>

        <div>
            <h4>Product</h4>
            <ul>
                <li>Jobs</li>
                <li>Companies</li>
                <li>Features</li>
            </ul>
        </div>

        <div>
            <h4>Company</h4>
            <ul>
                <li>About</li>
                <li>Contact</li>
                <li>Privacy</li>
            </ul>
        </div>

        <div>
            <h4>Social</h4>
            <ul>
                <li>LinkedIn</li>
                <li>Twitter</li>
                <li>Facebook</li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 Recruitaura. All rights reserved.
    </div>

</footer>

</body>
</html>