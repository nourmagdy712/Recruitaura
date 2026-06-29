<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Recruiter | Recruitaura</title>
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

<div class="auth-container">

    <div class="auth-box">

            <h2 class="auth-highlight">Company created successfully!</h2><br>
            <p class="auth-note">
            Now create your first recruiter account to start posting jobs,
            managing applicants, and scheduling interviews.
        </p>

        <!-- RECRUITER SIGNUP -->
        <form id="company-form" class="auth-form" method="POST" action="{{ route('recruiter.register') }}">
        @csrf
            <input type="text" placeholder="Full Name" name="full_name" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="tel" placeholder="Phone Number" name="Phone" required>
            <input type="text" placeholder="Position" name="position" required>
            <button class="btn-primary full-btn">Create Recruiter Account</button>
        </form>

    </div>
</div>

</body>
</html>