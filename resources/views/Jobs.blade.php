<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jobs</title>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
  "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;}

/* PAGE LAYOUT */
.jobs-page {
  display: flex;
  min-height: 100vh;
  background: #f9fafb;
}

.filter-header {
  margin-top: 15px;
  margin-bottom: 15px;
  padding-bottom: 10px;
  border-bottom: 1px solid #e5e7eb; 
}

.filter-title {
  font-size: 18px;
  font-weight: 700;
  color: #111;
  margin-bottom: 6px;
}

.filter-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 12px;
}

.filter-meta span {
  color: #6b7280;
}

.filter-meta button {
  background: none;
  border: none;
  color: #4f46e5; 
  font-weight: 600;
  cursor: pointer;
  font-size: 12px;
}

.filter-meta button:hover {
  text-decoration: underline;
}

/* FILTER SIDEBAR */
.jobs-filter {
  position: fixed;
  top: 0;
  left: 0;
  width: 270px;
  height: 100vh;
  background: #fff;
  padding: 20px;
  overflow-y: auto;
  border-right: 1px solid #e5e7eb;
}

.jobs-filter h3 {
  margin-bottom: 15px;
  color: #4338ca;
}

.filter-group {
  padding: 15px 0;
  border-bottom: 1px solid #e5e7eb;
  margin-bottom: 10px;
}

.filter-group h4 {
  margin-bottom: 8px;
  font-size: 14px;
  color: #111827;
}

.filter-group label {
  display: block;
  font-size: 13px;
  margin-bottom: 6px;
  cursor: pointer;
}

/* JOB AREA WRAPPER */
.jobs-wrapper {
  margin-left: 270px;
  padding: 20px;
  width: 100%;
}

/* SEARCH BAR */
.search-bar {
  margin-bottom: 15px;
}

.search-bar input {
  width: 100%;
  max-width: 420px;
  padding: 10px 12px;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  outline: none;
}

.search-bar input:focus {
  border-color: #4f46e5;
  box-shadow: 0 0 0 3px rgba(79,70,229,0.15);
}


/* JOB LIST */
.jobs-list {
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 16px;
  width: 100%;
}

/* JOB HEADER (logo + company info) */
.job-header {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}

.company-logo {
  width: 42px;
  height: 42px;
  border-radius: 8px;
  object-fit: cover;
  border: 1px solid #e5e7eb;
}

/* BADGES ROW */
.badges {
  display: flex;
  gap: 6px;
  margin-bottom: 10px;
  flex-wrap: wrap;
}

/* GREY BADGES */
.badge {
  font-size: 11px;
  padding: 4px 8px;
  border-radius: 999px;
  background: #f3f4f6;
  color: #374151;
}

/* META ROW (department + level) */
.job-meta {
  display: flex;
  flex-direction: column;
  gap: 6px; /* clean small spacing */
  font-size: 12px;
  color: #6b7280;
  margin-top: 8px;
  text-align: left;
}

.job-meta .row {
  display: flex;
  gap: 8px; /* small clean spacing */
  align-items: center;
}

.job-meta p {
  margin: 7px 0px;
  text-align: left;
  line-height: 1.5;
  word-break: break-word;
  overflow-wrap: anywhere;
}

/* JOB CARD */
.job-card {
  background: #fff;
  padding: 15px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.06);
  transition: 0.2s;
  min-height: 300px;
  height: fit-content;
}

.job-card:hover {
  transform: translateY(-3px);
}

.job-card h3 {
  font-size: 1rem;
  color: #4338ca;
  margin-bottom: 5px;
}

.job-card p {
  font-size: .9rem;
  color: #000;
}

.company-info p{
  font-size: .8rem;
}

.results-info {
  margin-bottom: 10px;
  font-size: 13px;
  color: #6b7280;
}

.nav-actions {
    position: fixed;
    top: 0.9rem;
    right: 1rem;
    z-index: 1000;
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

.nav-actions .btn {
    border: none;
    cursor: pointer;
    border-radius: 0.5rem;
    padding: 0.55rem 0.9rem;
    font-size: 0.9rem;
    font-weight: 500;
    transition: 0.2s ease;
    white-space: nowrap;
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
    font-size: 1rem !important;
    font-weight: 450 !important;
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

/* HAMBURGER BUTTON */
.hamburger {
  display: none;
  background: #4f46e5;
  color: white;
  border: none;
  padding: 10px 14px;
  border-radius: 8px;
  font-size: 14px;
  cursor: pointer;
  margin-bottom: 10px;
}

.close-filter {
  display: none;
  position: absolute;
  top: 12px;
  right: 12px;
  width: 36px;
  height: 36px;
  border: none;
  background: #f3f4f6;
  border-radius: 8px;
  font-size: 18px;
  cursor: pointer;
}

.close-filter:hover {
  background: #e5e7eb;
}

/* MOBILE SIDEBAR AS DRAWER */
@media (max-width: 900px) {

  .hamburger {
    display: inline-block;
  }

    .jobs-wrapper {
    margin-left: 0;
    width: 100%;
    padding: 12px;
  }

  .close-filter {
    display: block;
  }

  .jobs-filter {
    position: fixed;
    top: 0;
    left: -100%;
    width: 80%;
    height: 100vh;
    background: white;
    z-index: 2000;
    transition: 0.3s ease;
    box-shadow: 2px 0 20px rgba(0,0,0,0.1);
  }

  .jobs-filter.active {
    left: 0;
  }

  /* optional: dark overlay */
  .overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.4);
    z-index: 1500;
    display: none;
  }

  .overlay.active {
    display: block;
  }
}

@media (max-width: 480px) {

.nav-actions {
    gap: 0.4rem;
    right: 0.5rem;
}

.nav-actions .btn {
    padding: 0.35rem 0.6rem;
    font-size: 0.75rem;
    border-radius: 6px;
}

.profile-icon {
    font-size: 18px;
    padding: 6px 8px;
}
}

@media (max-width: 360px) {
  .jobs-list {
    grid-template-columns: 1fr;
    padding: 10px;
  }

  .job-card {
    padding: 12px;
  }
}

</style>

</head>

<body>
  <div class="overlay" id="overlay"></div>

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


<div class="jobs-page">
  <!-- FILTER PANEL -->
  <aside class="jobs-filter">
    <button class="close-filter" id="closeFilter">✕</button>
    <div class="filter-header">

      <div class="filter-title">Filters</div>
    
      <div class="filter-meta">
        <span id="filterCount">0 filters selected</span>
        <button id="clearFilters">Clear all filters</button>
      </div>
    
    </div>

    <div class="filter-group">
      <h4>Job Category</h4>
      <label><input type="checkbox" value="design" class="filter dept"> Design</label>
      <label><input type="checkbox" value="marketing" class="filter dept"> Marketing</label>
      <label><input type="checkbox" value="commercial" class="filter dept"> Commercial</label>
    </div>

    <div class="filter-group">
      <h4>Employment Type</h4>
      <label><input type="checkbox" value="fulltime" class="filter emp"> Full Time</label>
      <label><input type="checkbox" value="parttime" class="filter emp"> Part Time</label>
      <label><input type="checkbox" value="internship" class="filter emp"> Internship</label>
    </div>

    <div class="filter-group">
      <h4>Work Type</h4>
      <label><input type="checkbox" value="remote" class="filter work"> Remote</label>
      <label><input type="checkbox" value="onsite" class="filter work"> On-site</label>
      <label><input type="checkbox" value="hybrid" class="filter work"> Hybrid</label>
    </div>

    <div class="filter-group">
      <h4>Experience</h4>
      <label><input type="checkbox" value="entry" class="filter exp"> Entry</label>
      <label><input type="checkbox" value="experienced" class="filter exp"> Experienced</label>
      <label><input type="checkbox" value="manager" class="filter exp"> Manager</label>
      <label><input type="checkbox" value="executive" class="filter exp"> Executive</label>
    </div>

  </aside>
  
  <!-- JOB LIST -->
 
  <!-- JOB AREA -->
  <main class="jobs-wrapper">

    <button class="hamburger" id="filterToggle">
      ☰ Filters
    </button>
    <!-- SEARCH BAR -->
    <div class="search-bar">
      <input type="text" id="jobSearch" placeholder="Search jobs..." />
    </div>

    <div class="results-info">
      <span id="resultsCount">0 jobs found</span>
    </div>

    <!-- JOBS -->
    <div class="jobs-list">

      @foreach($jobs as $job)
<div class="job-card"
     data-dept="{{ strtolower($job->department) }}"
     data-emp="{{ strtolower(str_replace(' ', '', $job->employment_type)) }}"
     data-work="{{ strtolower($job->work_type) }}"
     data-exp="{{ strtolower($job->experience_level) }}">

  <div class="job-header">
    <img src="{{ $job->company->logo
        ? asset('uploads/company_logos/'.$job->company->logo)
        : asset('imgs/profile.jpeg') }}"
        class="company-logo">

    <div class="company-info">
      <h3>
        <a href="{{ route('jobs.show', $job->id) }}" style="text-decoration:none; color:#4338ca;">
          {{ $job->title }}
        </a>
      </h3>
      <p>{{ $job->company->name }} • {{ $job->location }}</p>
    </div>
  </div>

  <div class="badges">
    <span class="badge">{{ $job->employment_type }}</span>
    <span class="badge">{{ $job->work_type }}</span>
  </div>

  <div class="job-meta">
    <div class="row">
      <span>{{ $job->department }}</span>
      <span>•</span>
      <span>{{ $job->experience_level }}</span>
    </div>

    <p>
      <span style="font-weight: 600;">Job Description:</span><br>
      {!! nl2br(e($job->description)) !!}</p>
     <p> <span style="font-weight: 600;">Job requirements:</span><br>
      {!! nl2br(e($job->requirements)) !!}</p>
  </div>

</div>
@endforeach

    </div>
    </div>
  </main>

</div>

<script>
const filters = document.querySelectorAll(".filter");
const checkboxes = document.querySelectorAll(".filter");
const countText = document.getElementById("filterCount");
const clearBtn = document.getElementById("clearFilters");
const searchInput = document.getElementById("jobSearch");
const cards = document.querySelectorAll(".job-card");

function getChecked(cls) {
  return [...document.querySelectorAll("." + cls + ":checked")]
    .map(el => el.value);
}

function updateFilterCount() {
  const count = document.querySelectorAll(".filter:checked").length;
  countText.textContent = `${count} filters selected`;
}

// ONE MASTER FILTER FUNCTION (FIX)
function applyAllFilters() {
  const dept = getChecked("dept");
  const emp = getChecked("emp");
  const work = getChecked("work");
  const exp = getChecked("exp");

  const searchValue = searchInput.value.toLowerCase();

  let visibleCount = 0;

  cards.forEach(card => {

    const matchDept = dept.length === 0 || dept.includes(card.dataset.dept);
    const matchEmp = emp.length === 0 || emp.includes(card.dataset.emp);
    const matchWork = work.length === 0 || work.includes(card.dataset.work);
    const matchExp = exp.length === 0 || exp.includes(card.dataset.exp);

    const matchesFilters = matchDept && matchEmp && matchWork && matchExp;

    const matchesSearch =
      card.innerText.toLowerCase().includes(searchValue);

    const show = matchesFilters && matchesSearch;

    card.style.display = show ? "block" : "none";

    if (show) visibleCount++;
  });

  // X jobs found
  updateResultsCount(visibleCount);
}

function updateResultsCount(count) {
  let el = document.getElementById("resultsCount");

  if (!el) {
    el = document.createElement("div");
    el.id = "resultsCount";
    el.style.margin = "10px 0";
    el.style.color = "#6b7280";
    el.style.fontSize = "13px";
    searchInput.parentElement.appendChild(el);
  }

  el.textContent = `${count} jobs found`;
}

// EVENTS
filters.forEach(f => {
  f.addEventListener("change", () => {
    updateFilterCount();
    applyAllFilters();
  });
});

searchInput.addEventListener("input", () => {
  applyAllFilters();
});

clearBtn.addEventListener("click", () => {
  checkboxes.forEach(cb => cb.checked = false);
  searchInput.value = "";
  updateFilterCount();
  applyAllFilters();
});

// INIT
updateFilterCount();
applyAllFilters();

const filterToggle = document.getElementById("filterToggle");
const closeFilter = document.getElementById("closeFilter");
const sidebar = document.querySelector(".jobs-filter");
const overlay = document.getElementById("overlay");

function openFilters() {
  sidebar.classList.add("active");
  overlay.classList.add("active");
}

function closeFilters() {
  sidebar.classList.remove("active");
  overlay.classList.remove("active");
}

filterToggle?.addEventListener("click", openFilters);
closeFilter?.addEventListener("click", closeFilters);
overlay?.addEventListener("click", closeFilters);

</script>

</body>
</html>