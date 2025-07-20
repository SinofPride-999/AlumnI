@extends('layouts.app')

@section('title', 'Job Details - Alumni Connect')

@section('content')
<body class="dashboard">
    <!-- Simplified Header -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <i class="fas fa-graduation-cap"></i>
                        <span>AlumnI</span>
                    </a>
                </div>
                
                <div class="nav-actions">
                    <button class="theme-toggle" id="themeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                    <div class="user-menu">
                        <button class="user-avatar" id="userMenuBtn">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="job-detail-content">
        <div class="container">
            <!-- Back to Jobs Link -->
            <div class="back-link">
                <a href="{{ route('jobs') }}" class="btn btn-text">
                    <i class="fas fa-arrow-left"></i> Back to Jobs
                </a>
            </div>

            <!-- Job Header Section -->
            <section class="job-header-section">
                <div class="job-header-content">
                    <div class="company-logo">
                        <img src="{{ $job->company_logo }}" alt="{{ $job->company }} logo">
                    </div>
                    <div class="job-title-info">
                        <h1>{{ $job->title }}</h1>
                        <p class="company-name">{{ $job->company }}</p>
                        <div class="job-meta">
                            <span class="location"><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</span>
                            <span class="type"><i class="fas fa-briefcase"></i> {{ $job->type }}</span>
                            @if($job->is_remote)
                            <span class="remote"><i class="fas fa-globe"></i> Remote options</span>
                            @endif
                        </div>
                        <div class="job-actions">
                            <button class="btn btn-primary apply-btn">Apply Now</button>
                            <button class="btn btn-secondary save-btn">
                                <i class="far fa-bookmark"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="job-stats">
                    <div class="stat-item">
                        <span class="stat-value">{{ $job->salary_range }}</span>
                        <span class="stat-label">Salary</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">{{ $job->experience_level }}</span>
                        <span class="stat-label">Experience</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">{{ $job->deadline->format('M d, Y') }}</span>
                        <span class="stat-label">Apply by</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">{{ $job->applicants_count }}</span>
                        <span class="stat-label">Applicants</span>
                    </div>
                </div>
            </section>

            <!-- Job Details Section -->
            <section class="job-details-section">
                <div class="job-main-content">
                    <!-- Job Description -->
                    <div class="job-description">
                        <h2>Job Description</h2>
                        {!! $job->description !!}
                        
                        <h3>Responsibilities</h3>
                        <ul>
                            @foreach($job->responsibilities as $responsibility)
                            <li>{{ $responsibility }}</li>
                            @endforeach
                        </ul>
                        
                        <h3>Minimum Qualifications</h3>
                        <ul>
                            @foreach($job->minimum_qualifications as $qualification)
                            <li>{{ $qualification }}</li>
                            @endforeach
                        </ul>
                        
                        <h3>Preferred Qualifications</h3>
                        <ul>
                            @foreach($job->preferred_qualifications as $qualification)
                            <li>{{ $qualification }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- About Company -->
                    <div class="about-company">
                        <h2>About {{ $job->company }}</h2>
                        {!! $job->about_company !!}
                    </div>
                    
                    <!-- Alumni Connection -->
                    @if($job->alumni_connection)
                    <div class="alumni-connection">
                        <h2>Alumni Connection</h2>
                        <div class="alumni-info">
                            <div class="alumni-profile">
                                <img src="{{ $job->alumni_connection->photo_url }}" alt="Alumni profile">
                                <div>
                                    <h4>{{ $job->alumni_connection->name }}</h4>
                                    <p>Class of {{ $job->alumni_connection->graduation_year }} · {{ $job->alumni_connection->major }}</p>
                                    <p>Current: {{ $job->alumni_connection->current_position }} at {{ $job->alumni_connection->current_company }}</p>
                                </div>
                            </div>
                            <p class="alumni-message">"{{ $job->alumni_connection->message }}"</p>
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message {{ $job->alumni_connection->first_name }}
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Job Sidebar -->
                <aside class="job-sidebar">
                    <!-- Quick Facts -->
                    <div class="quick-facts">
                        <h3>Quick Facts</h3>
                        <div class="fact-item">
                            <span class="fact-label">Posted</span>
                            <span class="fact-value">{{ $job->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="fact-item">
                            <span class="fact-label">Job ID</span>
                            <span class="fact-value">{{ $job->job_id }}</span>
                        </div>
                        <div class="fact-item">
                            <span class="fact-label">Department</span>
                            <span class="fact-value">{{ $job->department }}</span>
                        </div>
                        <div class="fact-item">
                            <span class="fact-label">Work Type</span>
                            <span class="fact-value">{{ $job->type }}</span>
                        </div>
                        <div class="fact-item">
                            <span class="fact-label">Location Type</span>
                            <span class="fact-value">{{ $job->location_type }}</span>
                        </div>
                    </div>
                    
                    <!-- Required Skills -->
                    <div class="required-skills">
                        <h3>Required Skills</h3>
                        <div class="skills-list">
                            @foreach($job->skills as $skill)
                            <span class="skill-tag">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Similar Jobs -->
                    <div class="similar-jobs">
                        <h3>Similar Jobs</h3>
                        @foreach($similarJobs as $similarJob)
                        <div class="similar-job">
                            <h4>{{ $similarJob->title }}</h4>
                            <p class="company">{{ $similarJob->company }} · {{ $similarJob->location }}</p>
                            <div class="job-meta">
                                <span class="badge {{ $similarJob->type_slug }}">{{ $similarJob->type }}</span>
                                <span class="badge {{ $similarJob->location_type_slug }}">{{ $similarJob->location_type }}</span>
                            </div>
                            <a href="{{ route('job-detail', $similarJob->id) }}" class="btn btn-text">View Job</a>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Share Job -->
                    <div class="share-job">
                        <h3>Share This Job</h3>
                        <div class="share-buttons">
                            <button class="btn btn-text">
                                <i class="fab fa-linkedin"></i> LinkedIn
                            </button>
                            <button class="btn btn-text">
                                <i class="fab fa-twitter"></i> Twitter
                            </button>
                            <button class="btn btn-text">
                                <i class="fas fa-envelope"></i> Email
                            </button>
                        </div>
                    </div>
                </aside>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>AlumnI</h3>
                    <p>Bridging the gap between alumni and their alma mater through technology and community.</p>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#team">Team</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} AlumnI. All rights reserved. Developed by Group 12.</p>
            </div>
        </div>
    </footer>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/job-detail.js') }}"></script>
@endsection