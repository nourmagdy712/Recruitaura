<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recruiter profile</title>
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>

<div class="dashboard-container">

  <aside class="sidebar" id="sidebar">
    <span class="sidebar-close">&times;</span>
    <div class="sidebar-header">
<img src="{{ $recruiter->company->logo
    ? asset('uploads/company_logos/'.$recruiter->company->logo)
    : asset('imgs/profile.jpeg') }}"
    class="profile-photo">

<h2>
    Welcome,
    {{ $recruiter->full_name }}
</h2>    
    </div>
    <nav>
      <ul>
        <li><a href="#" data-target="profile" class="active">Update profile</a></li>
        <li><a href="#" data-target="savedJobs">Job posts</a></li>
        <li><a href="#" data-target="appliedJobs">Job applications</a></li>
        <li><a href="#" data-target="interviews">Interviews</a></li>
      </ul>
    </nav>
<button class="logout-btn" onclick="window.location.href='{{ route('recruiter.logout') }}'">
    Logout
</button>
  </aside>

  <button class="hamburger" id="hamburger">&#9776;</button>

  <main class="main-content">

    <div id="profile" class="content-section active">
        <h2>Update Profile</h2>
      
        <div class="profile-grid">
      
          <!-- COMPANY FORM -->
          <form class="card-form" method="POST"
      action="{{ route('company.profile.update') }}"
      enctype="multipart/form-data">
@csrf
            <h3>Company Information</h3>
      
            <input type="text" placeholder="Company name" name="name" value="{{ $recruiter->company->name }}">
            <input type="email" placeholder="Company email" name="email" value="{{ $recruiter->company->email }}">
            <input type="text" placeholder="Industry" name="industry" value="{{ $recruiter->company->industry }}">
            <input type="text" placeholder="Website" name="website" value="{{ $recruiter->company->website }}">
            <input type="text" placeholder="LinkedIn" name="linkedin" value="{{ $recruiter->company->linkedin }}">
            <select name="company_size">
    <option value="">Company Size</option>
    <option value="1-10" {{ $recruiter->company->company_size == '1-10' ? 'selected' : '' }}>1–10 employees</option>
    <option value="11-50" {{ $recruiter->company->company_size == '11-50' ? 'selected' : '' }}>11–50 employees</option>
    <option value="51-200" {{ $recruiter->company->company_size == '51-200' ? 'selected' : '' }}>51–200 employees</option>
    <option value="201-500" {{ $recruiter->company->company_size == '201-500' ? 'selected' : '' }}>201–500 employees</option>
    <option value="500+" {{ $recruiter->company->company_size == '500+' ? 'selected' : '' }}>500+ employees</option>
            </select>
            <textarea name="company_description" placeholder="Company description">{{ $recruiter->company->description }}</textarea>

             <div class="form-group">
            <label class="file-upload">
                Change logo
                <input type="file" id="logoInput" name="company_logo">
              </label>
              <span id="file_name"></span>
          </div>
      
            <button type="submit" class="btn btn-outline">Save Company</button>
          </form>
      
          <!-- RECRUITER FORM -->
          <form class="card-form" method="POST"
      action="{{ route('recruiter.profile.update') }}"
      enctype="multipart/form-data">
@csrf
            <h3>Recruiter Information</h3>
      
            <input type="text" placeholder="Full name" name="full_name" value="{{ $recruiter->full_name }}">
            <input type="email" placeholder="Email" name="email" value="{{ $recruiter->email }}">
            <input type="text" placeholder="Phone number" name="phone" value="{{ $recruiter->phone }}">
            <input type="password" placeholder="Leave empty to keep old one">
            <input type="text" placeholder="Position" name="position" value="{{ $recruiter->position }}">
            <button type="submit" class="btn btn-primary full-btn">Save Recruiter</button>
          </form>
      
        </div>
      </div>

      <div id="savedJobs" class="content-section">
        <h2>Job Posts</h2>
      
        <div class="top-bar">
          <button class="btn btn-primary" id="openJobModal">🞥 Post Job</button>
      
          <div class="custom-select">
            <select id="jobFilter">
              <option value="all">All</option>
              <option value="active">Active</option>
              <option value="closed">Closed</option>
            </select>
          </div>
        </div>
      
        <div class="row" id="jobCards">
      
          @forelse($jobs as $job)
<div class="column">
    <div class="cardd" data-status="{{ $job->status }}">

        <h3>{{ $job->title }}</h3>

        <span>
            {{ $recruiter->company->name }}
            <span class="location">
                - {{ $job->location }}
            </span>
        </span>

        <br>

        <span class="badge {{ $job->status == 'active' ? 'approved' : 'neutral' }}">
            {{ ucfirst($job->status) }}
        </span>
        <div class="card-actions"> <button class="btn btn-primary" onclick="window.location.href='{{ route('jobs.show', $job->id) }}'">View</button>
          <form action="{{ route('jobs.toggleStatus', $job->id) }}"
            method="POST"
            style="display:inline;">
          @csrf
  
          @if($job->status == 'active')
              <button type="submit" class="btn btn-secondary-red">
                  Close
              </button>
          @else
              <button type="submit" class="btn btn-secondary-green">
                  Reopen
              </button>
          @endif
  
      </form>
   </div>
  </div>
</div>
@empty
<div class="empty-state">
    <h3>No jobs posted yet</h3>
    <p>Click "Post Job" to create your first job opening.</p>
</div>
@endforelse

        </div>
      </div>

      <div id="appliedJobs" class="content-section">
        <h2>Job Applications</h2>
      
        <div class="custom-select">
          <select id="appFilter">
            <option value="all">All Stages</option>
            <option value="applied">Applied</option>
            <option value="screening">Screening</option>
            <option value="hr-interview">HR Interview</option>
            <option value="technical-interview">Technical Interview</option>
            <option value="final-interview">Final Interview</option>
            <option value="hired">Hired</option>
            <option value="rejected">Rejected</option>
          </select>
          </div>
      
        <div class="applications-board" id="appCards">

          @forelse($applications as $application)
          <!-- CARD -->
          <div class="app-card" data-stage="{{ Str::slug($application->status) }}">
      
            <div class="app-left">
              <h3>{{ $application->job->title }}</h3><br>
              <p><strong>Candidate:</strong> {{ $application->candidate->full_name }}</p><br>
              <span class="stage {{ Str::slug($application->status) }}">{{ $application->status }}</span>
              @if($application->aura_score)
              <br><br>
              <strong>
                  Aura Score:
                  {{ $application->aura_score }}%
              </strong>
          @endif
  
            </div>
      
            <div class="app-right">


              <button
              class="btn btn-primary"
              onclick="window.location.href='{{ route('candidate.show',$application->candidate->id) }}'">View Profile</button>
              <button class="btn btn-outline open-score-btn"
              data-id="{{ $application->id }}">
          Give score
      </button>

                <form
                method="POST"
                action="{{ route('applications.status',$application) }}">
    
                @csrf
    
                <div class="custom-select">
    
                  <select name="status" onchange="this.form.submit()">

                    <option value="applied" {{ $application->status == 'applied' ? 'selected' : '' }}>
                        Applied
                    </option>
                
                    <option value="screening" {{ $application->status == 'screening' ? 'selected' : '' }}>
                        Screening
                    </option>
                
                    <option value="hr-interview" {{ $application->status == 'hr-interview' ? 'selected' : '' }}>
                        HR Interview
                    </option>
                
                    <option value="technical-interview" {{ $application->status == 'technical-interview' ? 'selected' : '' }}>
                        Technical Interview
                    </option>
                
                    <option value="final-interview" {{ $application->status == 'final-interview' ? 'selected' : '' }}>
                        Final Interview
                    </option>
                
                    <option value="hired" {{ $application->status == 'hired' ? 'selected' : '' }}>
                        Hired
                    </option>
                
                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>
                        Rejected
                    </option>
                
                </select>
                </div>
            </form>

              </div>      
          </div>

          @empty

          <div class="empty-state">
              <h3>No Applications Yet</h3>
          </div>
          
          @endforelse
        </div>
      </div>
      <div id="interviews" class="content-section">

        <div class="top-bar">
          <h2>Interviews</h2>
      
          <button class="btn btn-primary" id="openInterviewModal">Schedule Interview</button>
      
        <!-- FILTER (optional later) -->
        <div class="custom-select">
          <select id="interviewFilter">
            <option value="all">All</option>
            <option value="pending">Pending</option>
            <option value="accepted">Accepted</option>
            <option value="rescheduled">Rescheduled</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>
      </div>
        <!-- CARDS -->
        <div class="row" id="interviewCards">
      
          @forelse($interviews as $interview)

<div class="column">
    <div class="cardd" data-status="{{ $interview->status }}">

        <h3>{{ $interview->application->job->title }}</h3>

        <p><strong>Candidate:</strong>
            {{ $interview->application->candidate->full_name }}
        </p>

        <p><strong>Date:</strong>
            {{ $interview->scheduled_at }}
        </p>

        <p><strong>Type:</strong> {{ $interview->meeting_type }}</p>

        @if($interview->meeting_link)
            <p><strong>Link:</strong> {{ $interview->meeting_link }}</p>
        @endif

        @if($interview->location)
            <p><strong>Location:</strong> {{ $interview->location }}</p>
        @endif

        @if($interview->candidate_message ?? false)
            <p><strong>Reschedule reason:</strong>
                {{ $interview->candidate_message }}
            </p>
        @endif

        <span class="badge {{($interview->status) }}">{{ $interview->status }}</span>

        <!-- RESCHEDULE -->
        <form method="POST"
              action="{{ route('interviews.reschedule', $interview->id) }}">
            @csrf
            <input type="datetime-local" name="interview_date" required>
            <button class="btn btn-primary">Reschedule</button>
        </form>

        <!-- CANCEL -->
        @if($interview->status !== 'cancelled')

        <form method="POST"
              action="{{ route('interviews.cancel', $interview->id) }}">
            @csrf
            <button class="btn btn-secondary-red">
                Cancel
            </button>
        </form>
@endif
    </div>
</div>

@empty
    <p>No interviews found</p>
@endforelse
      
        </div>
      </div>

<!-- Modals -->
<div id="RescheduleFormModal" class="modal hidden">
  <div class="modal-content">
    <h3>Request Training</h3>
    <form id="rescheduleForm">
      <label>Title</label>
      <input type="text" required>
      <label>Reason</label>
      <textarea required></textarea>
      <div class="form-actions">
        <button type="submit" class="btn btn-secondary-green">Submit</button>
        <button type="button" class="btn btn-secondary-red" onclick="closeModal('RescheduleFormModal')">Cancel</button>
      </div>
      
    </form>
  </div>
</div>

<div id="jobModal" class="modal hidden">
    <div class="modal-content">
      <h3>Post a Job</h3>
      @if(session('success'))
      <div class="alert-success">
          {{ session('success') }}
      </div>
  @endif
      <form id="jobForm"
      method="POST"
      action="{{ route('jobs.store') }}">
    @csrf
        <input type="text" name="title" placeholder="Job Title" required>
        <input type="text" name="department" placeholder="Department" required>
        <input type="text" name="location" placeholder="Location" required>

        <div style="display:flex; gap:10px;">
              <input name="salary_min" type="number" placeholder="Min Salary">
              <input name="salary_max" type="number" placeholder="Max Salary">
            </div>
          
              <select name="employment_type" required>
              <option value="">Employment Type</option>
              <option>Full Time</option>
              <option>Part Time</option>
              <option>Internship</option>
            </select>
          
            <select name="work_type" required>
            <option value="">Work type</option>
              <option>Remote</option>
              <option>On-site</option>
              <option>Hybrid</option>
            </select>
  
        <select name="experience_level" required>
            <option value="">Experience level</option>
            <option value="Entry level">Entry level</option>
            <option value="Experienced">Experienced</option>
            <option value="Managerial">Managerial</option>
            <option value="Executive">Executive</option>
        </select>
  
        <textarea name="description" placeholder="Job Description"></textarea>
        <textarea name="requirements" placeholder="Job requirements"></textarea>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Post</button>
          <button type="button" class="btn btn-secondary-red" onclick="closeModal('jobModal')">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <div id="scoreModal" class="modal hidden">
    <div class="modal-content">
      <h3>Candidate Aura Scoring</h3>
  
      <form id="scoreForm" method="POST">
        @csrf
  
        <label>Technical Aura</label>
        <input name="technical_aura" type="number" min="0" max="100" required>
  
        <label>Experience Aura</label>
        <input name="experience_aura" type="number" min="0" max="100" required>
  
        <label>Communication Aura</label>
        <input name="communication_aura" type="number" min="0" max="100" required>
  
        <label>Culture Fit Aura</label>
        <input name="culture_fit_aura" type="number" min="0" max="100" required>
  
        <label>Overall Aura Score</label>
        <input name="aura_score" type="number" min="0" max="100">
  
        <label>Notes</label>
        <textarea name="recruiter_note" placeholder="Write your feedback..."></textarea>
  
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Save Score</button>
          <button type="button" class="btn btn-secondary-red close-score-modal">Cancel</button>
        </div>
  
      </form>
    </div>
  </div>


  <div id="interviewModal" class="modal hidden">
    <div class="modal-content">
  
      <h3>Schedule Interview</h3>
  
      <form id="interviewForm" method="POST" action="{{ route('interviews.store') }}">
        @csrf  
        <!-- applicant -->
        <select required name="application_id"> 
          <option value="">Select Applicant</option>
          @foreach($applications->whereIn('status', [
            'hr-interview',
            'technical-interview',
            'final-interview'
        ]) as $application)
          <option value="{{ $application->id }}">
              {{ $application->candidate->full_name }}
              - {{ $application->job->title }}
          </option>
      @endforeach
        </select>
  
        <!-- date -->
        <input type="datetime-local" name="interview_date" required>
  
        <!-- type -->
        <select id="meetingType" name="type" required>
          <option value="">Type</option>
          <option value="online">Online</option>
          <option value="onsite">On-site</option>
          <option value="phone">Phone</option>
        </select>
  
        <!-- online -->
        <input id="meetingLink" name="meeting_link" type="url" placeholder="Meeting link" class="hidden">
  
        <!-- onsite -->
        <input id="locationField" name="location" type="text" placeholder="Location" class="hidden">
  
        <!-- interviewers -->
        <input type="text" name="interviewers" placeholder="Interviewers (comma separated)">
  
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Schedule</button>
          <button type="button" class="btn btn-secondary-red" onclick="closeModal('interviewModal')">
            Cancel
          </button>
        </div>
  
      </form>
  
    </div>
  </div>
<!-- Toast -->
<div id="toast" class="toast hidden"></div>

<script>
// Sidebar toggle
const sidebar = document.getElementById('sidebar');
const hamburger = document.getElementById('hamburger');
const closeBtn = sidebar.querySelector('.sidebar-close');

hamburger.addEventListener('click', () => sidebar.classList.add('active'));
closeBtn.addEventListener('click', () => sidebar.classList.remove('active'));

// Click outside sidebar closes it
document.addEventListener('click', e => {
    if(window.innerWidth <= 768 && !sidebar.contains(e.target) && !hamburger.contains(e.target)) {
        sidebar.classList.remove('active');
    }
});

// Sidebar section switching
const links = document.querySelectorAll('.sidebar nav ul li a');
const sections = document.querySelectorAll('.content-section');

links.forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
         // Switch section
         sections.forEach(s => s.classList.remove('active'));
        document.getElementById(link.dataset.target).classList.add('active');

        // Active link styling
        links.forEach(l => l.classList.remove('active'));
        link.classList.add('active');

        // CLOSE SIDEBAR AFTER CLICK (mobile only)
        if (window.innerWidth <= 768) {
            sidebar.classList.remove('active');
        }
    });
});

// Toast notification
function showToast(msg){
    const toast = document.getElementById('toast');
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(()=>toast.classList.remove('show'),3000);
}

const jobModal = document.getElementById("jobModal");

document.getElementById("openJobModal").addEventListener("click", () => {
  jobModal.classList.add("show");
});

document.querySelectorAll(".modal").forEach(modal => {
  modal.addEventListener("click", e => {
    if(e.target === modal) modal.classList.remove("show");
  });
});

// Close when pressing Cancel
document.querySelectorAll('.modal-content button[type="button"]').forEach(btn => {
    btn.addEventListener('click', () => {
        const modal = btn.closest('.modal');
        modal.classList.remove('show');     
    });
});

const scoreModal = document.getElementById("scoreModal");

// open modal when clicking any "Give score" button
document.querySelectorAll(".open-score-btn").forEach(btn => {
  btn.addEventListener("click", () => {
    const id = btn.dataset.id;

    const form = document.getElementById("scoreForm");
    form.action = `/applications/${id}/score`;

    scoreModal.classList.add("show");
  });
});

// close modal (X or cancel)
document.querySelectorAll(".close-score-modal").forEach(btn => {
  btn.addEventListener("click", () => {
    scoreModal.classList.remove("show");
  });
});

// close when clicking outside modal
scoreModal.addEventListener("click", e => {
  if (e.target === scoreModal) {
    scoreModal.classList.remove("show");
  }
});



const interviewModal = document.getElementById("interviewModal");

document.getElementById("openInterviewModal").addEventListener("click", () => {
  interviewModal.classList.add("show");
});

document.querySelectorAll(".modal").forEach(modal => {
  modal.addEventListener("click", e => {
    if(e.target === modal) modal.classList.remove("show");
  });
});

// job filter
document.getElementById("jobFilter").addEventListener("change", e => {
  const val = e.target.value;

  document.querySelectorAll("#jobCards .cardd").forEach(card => {
    card.parentElement.style.display =
      (val === "all" || card.dataset.status === val) ? "block" : "none";
  });
});
// application filter
document.getElementById("appFilter").addEventListener("change", e => {
  const val = e.target.value.toLowerCase();

  document.querySelectorAll("#appCards .app-card").forEach(card => {
    const stage = (card.dataset.stage || "").toLowerCase();

    const match = val === "all" || stage === val;

    card.style.display = match ? "flex" : "none";
  });
});
// interview filter
document.getElementById("interviewFilter").addEventListener("change", e => {
  const val = e.target.value;

  document.querySelectorAll("#interviewCards .cardd").forEach(card => {
    card.parentElement.style.display =
      (val === "all" || card.dataset.status === val) ? "block" : "none";
  });
});

//file upload
document.getElementById("logoInput").addEventListener("change", function () {
  document.getElementById("file_name").textContent =
    this.files[0]?.name || "";
});
</script>
</body>
</html>