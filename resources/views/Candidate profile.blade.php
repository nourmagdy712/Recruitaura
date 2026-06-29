<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Candidate profile</title>
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>

<div class="dashboard-container">

  <aside class="sidebar" id="sidebar">
    <span class="sidebar-close">&times;</span>
    <div class="sidebar-header">
<img src="{{ $candidate->image
    ? asset('uploads/profile_images/'.$candidate->image)
    : asset('imgs/profile.jpg') }}"
    alt="Profile Photo"
    class="profile-photo">
    <h2>Welcome, <span id="employeeName">{{ $candidate->full_name }}</span></h2>
    </div>
    <nav>
      <ul>
        <li><a href="#" data-target="profile" class="active">Update profile</a></li>
        <li><a href="#" data-target="savedJobs">Saved Jobs</a></li>
        <li><a href="#" data-target="appliedJobs">Applied Jobs</a></li>
        <li><a href="#" data-target="interviews">Interviews</a></li>
      </ul>
    </nav>
<button class="logout-btn" onclick="window.location.href='{{ route('candidate.logout') }}'">
    Logout
</button>
  </aside>

  <button class="hamburger" id="hamburger">&#9776;</button>

  <main class="main-content">

    <div id="profile" class="content-section active">
      <h2>Update Profile</h2>
      <form class="profile-form" method="POST" action="{{ url('/candidate/profile/update') }}" enctype="multipart/form-data">
    @csrf
        <div class="form-grid">
      
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" value="{{ $candidate->full_name }}">
          </div>
      
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $candidate->email }}">
          </div>
      
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Leave empty to keep old one">
          </div>
      
          <div class="form-group">
            <label>Phone</label>
           <input type="text" name="phone" value="{{ $candidate->phone }}">
          </div>
      
          <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" value="{{ $candidate->location }}">
          </div>
      
          <div class="form-group">
            <label>Expected Salary</label>
            <input type="number" name="expected_salary" value="{{ $candidate->expected_salary }}">
          </div>
      
          <div class="form-group full">
            <label>Summary</label>
            <textarea name="summary">{{ $candidate->summary }}</textarea>
          </div>
      
          <div class="form-group">
            <label>Skills, comma separated</label>
            <input type="text" name="skills" value="{{ $candidate->skills }}">
          </div>
      
          <div class="form-group">
            <label>Years of Experience</label>
            <input type="number" name="experience_years" value="{{ $candidate->experience_years }}">
          </div>

          <div class="form-group">
            <label class="file-upload">
                Upload CV
                <input type="file" id="cvInput" name="cv_file">
              </label>
              <span id="fileName"></span>
          </div>

          <div class="form-group">
            <label class="file-upload">
                Upload picture
                <input type="file" id="picInput" name="profile_image">
              </label>
              <span id="fileNamee"></span>
          </div>
          
      @if($candidate->resume)
    <a href="{{ asset('uploads/cvs/'.$candidate->resume) }}" target="_blank">
        View CV
    </a>
@endif
        </div>
      
        <div class="form-actions">
            <button type="submit" class="btn btn-outline">Save changes</button>
          </div>      
      </form>
    </div>

    <div id="savedJobs" class="content-section">
      <h2>Saved Jobs</h2>
  
      <div class="row">
  
          @forelse($savedJobs as $saved)
  
              <div class="column">
                  <div class="cardd">
  
                      <h3>{{ $saved->job->title }}</h3>
  
                      <span>
                          {{ $saved->job->company->name }}
                          <span class="location">
                              - {{ $saved->job->location }}
                          </span>
                      </span>
  
                      <br>
  
                      <span class="badge neutral">
                          {{ $saved->job->employment_type }}
                      </span>
  
                      <span class="badge neutral">
                          {{ $saved->job->work_type }}
                      </span>
  
                      <br><br>
  
                      <button
                          class="btn btn-primary"
                          onclick="window.location.href='{{ route('jobs.show', $saved->job) }}'">
                          View
                      </button>
  
                      <form
                          action="{{ route('jobs.save', $saved->job) }}"
                          method="POST"
                          style="display:inline;">
  
                          @csrf
  
                          <button
                              type="submit"
                              class="btn btn-secondary-red">
                              Remove
                          </button>
  
                      </form>
  
                  </div>
              </div>
  
          @empty
  
              <div class="column">
                  <div class="cardd">
                      <h3>No Saved Jobs</h3>
                      <p>You haven't saved any jobs yet.</p>
                  </div>
              </div>
  
          @endforelse
  
      </div>
  </div>

  <div id="appliedJobs" class="content-section">

    <h2>Applied Jobs</h2>

    <div class="row">

        @forelse($applications as $application)
            <div class="column">
                <div class="cardd">
                    <h3>{{ $application->job->title }}</h3>

                    <span>
                        {{ $application->job->company->name }}

                        <span class="location">
                            - {{ $application->job->location }}
                        </span>
                    </span>
                    <br><br>
                    <span class="stage {{ Str::slug($application->status) }}">
                        {{ $application->status }}
                    </span>

                    @if($application->aura_score)
                        <br><br>
                        <strong>
                            Aura Score:
                            {{ $application->aura_score }}%
                        </strong>
                    @endif

                    @if($application->recruiter_note)
                        <br><br>
                        <p>
                          Recruiter Notes: "{{ $application->recruiter_note }}"
                        </p>
                    @endif

                </div>
            </div>
            
        @empty
            <div class="column">
                <div class="cardd">
                    <h3>No Applications Yet</h3>
                    <p>
                        You haven't applied to any jobs.
                    </p>
                </div>
            </div>

        @endforelse

    </div>

</div>

    <div id="interviews" class="content-section">
      <h2>Scheduled interviews</h2>
      <div class="row">

        @forelse($interviews as $interview)
        <div class="column">
            <div class="cardd">
              <h3>{{ $interview->application->job->title }}</h3>
              <span> {{ $interview->application->job->company->name }}<span class="location"> - {{ $interview->application->job->location }}</span></span><br><br>
              <p>
                <strong>Date:</strong>
                {{ $interview->scheduled_at }}
            </p>
            <p>
              <strong>Type:</strong>
              {{ ucfirst($interview->meeting_type) }}
          </p>

          @if($interview->meeting_link)
              <p>
                  <strong>Link:</strong>
                  <a href="{{ $interview->meeting_link }}" target="_blank">
                      Join Meeting
                  </a>
              </p>
          @endif

          @if($interview->location)
              <p>
                  <strong>Location:</strong>
                  {{ $interview->location }}
              </p>
          @endif

          @if($interview->candidate_message)
          <p style="color:#b45309;">
              <strong>Your reschedule request:</strong><br>
              {{ $interview->candidate_message }}
          </p>
      @endif

      <span class="badge {{ $interview->status }}">
        {{ ucfirst(str_replace('_',' ', $interview->status)) }}
    </span>

    <br>
    @if($interview->status === 'pending')
    <form method="POST"
          action="{{ route('candidate.interviews.accept', $interview->id) }}">
        @csrf
        <button class="btn btn-secondary-green">
            Accept Invitation
        </button>
    </form>
@endif
@if($interview->status !== 'cancelled')
                        <button class="btn btn-primary requestRescheduleBtn"
                                data-id="{{ $interview->id }}">
                            Request Reschedule
                        </button>
                    @endif
            </div>
          </div> 
    @empty
    <div class="column">
        <div class="cardd">
            <h3>No Interviews Scheduled</h3>
            <p>You currently have no interview invitations.</p>
        </div>
    </div>
@endforelse
    </div>
  </main>
</div>

<!-- Modals -->
<div id="RescheduleFormModal" class="modal hidden">
  <div class="modal-content">
    <h3>Request Reschedule</h3>
    <form id="rescheduleForm" method="POST">
      @csrf
      <label>Reason</label>
      <textarea name="candidate_message" required></textarea>
  
      <div class="form-actions">
          <button type="submit" class="btn btn-secondary-green">Submit</button>
          <button type="button" class="btn btn-secondary-red"
                  onclick="closeModal('RescheduleFormModal')">
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

// Modals
const RescheduleFormModal = document.getElementById('RescheduleFormModal');

document.querySelectorAll('.requestRescheduleBtn').forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.id;

        const form = document.getElementById('rescheduleForm');
        form.action = `/candidate/interviews/${id}/reschedule`;

        document.getElementById('RescheduleFormModal').classList.add('show');
    });
});
// Close when pressing Cancel
document.querySelectorAll('.modal-content button[type="button"]').forEach(btn => {
    btn.addEventListener('click', () => {
        const modal = btn.closest('.modal');
        modal.classList.remove('show');     
    });
});

// Close modal if click outside content
document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', e => {
        if (e.target === modal) {
            modal.classList.remove('show');
        }
    });
});

// Forms submit without reload
document.getElementById('rescheduleForm').addEventListener('submit', function () {
    showToast('Sending request...');
});

// Filters
document.getElementById('trainingFilter').addEventListener('change', e => {
    const val = e.target.value;
    document.querySelectorAll('#trainingCardTable .card').forEach(card => {
        card.style.display = (val==='all' || card.dataset.status===val) ? 'block':'none';
    });
});
document.getElementById("cvInput").addEventListener("change", function () {
  document.getElementById("fileName").textContent =
    this.files[0]?.name || "";
});
document.getElementById("picInput").addEventListener("change", function () {
  document.getElementById("fileNamee").textContent =
    this.files[0]?.name || "";
});
</script>
</body>
</html>