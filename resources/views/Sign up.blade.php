<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Recruitaura</title>
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

<div class="auth-container">

    <div class="auth-box">

        <!-- HEADER -->
        <div class="auth-header">
            <h1 class="logo-text">Join Recruitaura</h1>
        </div>

        <!-- SWITCH -->
        <div class="role-switch">
            <button class="role-btn active" data-role="candidate">Candidate</button>
            <button class="role-btn" data-role="company">Company</button>
        </div>

        <!-- CANDIDATE SIGNUP -->
        <form id="candidate-form" class="auth-form" method="POST" action="{{ route('candidate.register') }}">
       @csrf
            <input type="text" placeholder="Full Name" name="full_name" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="tel" placeholder="Phone Number" name="phone" required>
            <button class="btn-primary full-btn">Create Candidate Account</button>
        </form>

        <!-- COMPANY SIGNUP -->
        <form id="company-form" class="auth-form hidden" method="POST" action="{{ route('company.register') }}">
        @csrf
            <input type="text" placeholder="Company Name" name="name" required>
            <input type="email" placeholder="Company Email" name="email" required>
            <input type="text" name="industry" placeholder="Industry">
            <select name="company_size" required>
                <option value="">Company Size</option>
                <option value="1-10">1–10 employees</option>
                <option value="11-50">11–50 employees</option>
                <option value="51-200">51–200 employees</option>
                <option value="201-500">201–500 employees</option>
                <option value="500+">500+ employees</option>
            </select>
            <button class="btn-primary full-btn">Create Company Account</button>
        </form>

        <!-- FOOTER LINK -->
        <div class="auth-footer">
            <p>
                Already have an account?
                <a href="{{ route('signin') }}" class="auth-link">Sign in</a>
            </p>
        </div>

    </div>

</div>

<script src="{{ asset('js/auth.js') }}"></script>

</body>
</html>