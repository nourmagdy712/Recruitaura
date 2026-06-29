<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Recruitaura</title>
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

    <div class="auth-container">

        <div class="auth-box">
            <h2>Welcome back</h2>
            <p class="auth-subtitle">Sign in to continue</p>
    @if ($errors->any())
    <div class="error-box">
        {{ $errors->first() }}
    </div>
@endif
            <!-- SWITCH -->
            <div class="role-switch">
                <button class="role-btn active" data-role="candidate">Candidate</button>
                <button class="role-btn" data-role="company">Recruiter</button>
            </div>
    
            <!-- CANDIDATE FORM -->
            <form id="candidate-form" class="auth-form" method="POST" action="{{ route('candidate.login') }}">
        @csrf
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
    
                <button class="btn-primary full-btn">Sign In as Candidate</button>
            </form>
    
            <!-- COMPANY FORM -->
            <form id="company-form" class="auth-form hidden" method="POST" action="{{ route('recruiter.login') }}">
        @csrf

                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
    
                <button class="btn-primary full-btn">Sign In as recruiter</button>
            </form>
            <div class="auth-footer">
                <p>
                    Don’t have an account?
                    <a href="{{ route('signup') }}" class="auth-link">Sign up</a>
                </p>
            </div>
        </div>
    
    </div>

<script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>