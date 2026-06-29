<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Applicant Profile</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:ui-sans-serif, system-ui, -apple-system,
    BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
}

body{
    background:#f9fafb;
}

.page{
    max-width:55vw;
    margin:auto;
    padding:30px;
}

.profile-card{
    background:#fff;
    border-radius:14px;
    box-shadow:0 6px 18px rgba(0,0,0,.06);
    overflow:hidden;
    min-height: 85vh;
}

/* HEADER */

.profile-header{
    display:flex;
    align-items:flex-start;
    gap:24px;
    padding:25px;
}

.profile-image{
    width:130px;
    height:130px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid #e5e7eb;
}

.profile-info{
    flex:1;
}

.profile-info h1{
    font-size:28px;
    color:#111827;
    margin-bottom:6px;
}

.location{
    color:#6b7280;
    margin-bottom:18px;
    font-size:14px;
}

.info-grid{
    display:grid;
    grid-template-columns:repeat(2, minmax(200px, 1fr));
    gap:12px;
}

.info-item{
    font-size:14px;
    color:#374151;
}

.info-item strong{
    color:#111827;
}

.cv-btn{
    background:#4f46e5;
    color:white;
    border:none;
    border-radius:10px;
    padding:12px 18px;
    cursor:pointer;
    font-weight:600;
    white-space:nowrap;
}

.cv-btn:hover{
    opacity:.9;
}

/* DIVIDER */

.divider{
    border:none;
    border-top:1px solid #e5e7eb;
}

/* SECTIONS */

.section{
    padding:20px 25px;
}

.section h2{
    font-size:18px;
    color:#111827;
    margin-bottom:12px;
}

.section p{
    color:#374151;
    line-height:1.7;
    font-size:14px;
}

/* SKILLS */

.skills{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
}

.skill{
    background:#f3f4f6;
    color:#374151;
    padding:6px 12px;
    border-radius:999px;
    font-size:13px;
}

/* CV FILE */

.cv-file{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:14px 16px;
    border:1px solid #e5e7eb;
    border-radius:12px;
}

.cv-name{
    font-size:14px;
    color:#111827;
    font-weight:500;
}

.download-btn{
    background:#4f46e5;
    color:white;
    border:none;
    padding:10px 16px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
}

.download-btn:hover{
    opacity:.9;
}

@media(max-width:768px){

    .profile-header{
        flex-direction:column;
    }

    .info-grid{
        grid-template-columns:1fr;
    }

    .cv-file{
        flex-direction:column;
        gap:12px;
        align-items:flex-start;
    }
}
</style>
</head>

<body>

<div class="page">

    <div class="profile-card">

        <!-- HEADER -->

        <div class="profile-header">

            <img src="{{ $candidate->image 
            ? asset('uploads/profile_images/'.$candidate->image) 
            : asset('imgs/profile.jpeg') }}" 
            class="profile-image">
        
        <div class="profile-info">
        
            <h1>{{ $candidate->full_name }}</h1>
        
            <div class="location">
                {{ $candidate->location ?? 'Not provided' }}
            </div>
        
            <div class="info-grid">
        
                <div class="info-item">
                    <strong>Email:</strong>
                    {{ $candidate->email }}
                </div>
        
                <div class="info-item">
                    <strong>Phone:</strong>
                    {{ $candidate->phone ?? 'Not provided' }}
                </div>
        
                <div class="info-item">
                    <strong>Expected Salary:</strong>
                    {{ $candidate->expected_salary ?? 'N/A' }}
                </div>
        
                <div class="info-item">
                    <strong>Years of Experience:</strong>
                    {{ $candidate->experience_years ?? 'N/A' }}
                </div>
        
            </div>
        
        </div>

        </div>

        <hr class="divider">

        <!-- SUMMARY -->

        <div class="section">

            <h2>Professional Summary</h2>

            <p>
                {{ $candidate->summary ?? 'No professional summary provided.' }}
            </p>

        </div>

        <hr class="divider">

        <!-- SKILLS -->

        <div class="section">

            <h2>Skills</h2>

            <div class="skills">

                @foreach(explode(',', $candidate->skills ?? '') as $skill)
    @if(trim($skill))
        <span class="skill">{{ trim($skill) }}</span>
    @endif
@endforeach

            </div>

        </div>

        <hr class="divider">

        <!-- CV -->

        <div class="section">

            <h2>Curriculum Vitae</h2>

            <div class="cv-file">

                <div class="cv-name">
                    {{ $candidate->resume ?? 'No CV uploaded' }}
                </div>

                @if($candidate->resume)
                <a href="{{ asset('uploads/cvs/'.$candidate->resume) }}" download>
                    <button class="download-btn">
                        Download CV
                    </button>
                </a>
            @endif

            </div>

        </div>

    </div>

</div>

</body>
</html>
