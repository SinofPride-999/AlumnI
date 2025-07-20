@extends('layouts.app')

@section('title', 'Job Board - Alumni Connect')

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
    <main class="jobs-content">
        <div class="container">
            <!-- Page Header -->
            <section class="page-header">
                <h1>Alumni Job Board</h1>
                <p>Discover career opportunities posted by fellow alumni and recruiters</p>
            </section>

            <!-- Job Search Filters -->
            <section class="job-filters">
                <form method="GET" action="{{ route('jobs') }}">
                    <div class="search-bar">
                        <input type="text" name="search" placeholder="Search for jobs, companies, or keywords" value="{{ request()->search }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                    
                    <div class="filter-options">
                        <div class="filter-group">
                            <label for="job-type">Job Type:</label>
                            <select id="job-type" name="type">
                                <option value="">All Types</option>
                                @foreach($jobTypes as $type)
                                <option value="{{ $type->slug }}" {{ request()->type == $type->slug ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="industry">Industry:</label>
                            <select id="industry" name="industry">
                                <option value="">All Industries</option>
                                @foreach($industries as $industry)
                                <option value="{{ $industry->slug }}" {{ request()->industry == $industry->slug ? 'selected' : '' }}>{{ $industry->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="experience">Experience Level:</label>
                            <select id="experience" name="experience">
                                <option value="">All Levels</option>
                                @foreach($experienceLevels as $level)
                                <option value="{{ $level->slug }}" {{ request()->experience == $level->slug ? 'selected' : '' }}>{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <a href="{{ route('jobs') }}" class="btn btn-secondary" id="resetFilters">
                            <i class="fas fa-sync-alt"></i> Reset
                        </a>
                    </div>
                </form>
            </section>

            <!-- Job Listings -->
            <section class="job-listings">
                <div class="listings-header">
                    <h2 class="section-title">Available Positions</h2>
                    <div class="sort-options">
                        <form method="GET" action="{{ route('jobs') }}">
                            <label for="sort-by">Sort by:</label>
                            <select id="sort-by" name="sort" onchange="this.form.submit()">
                                <option value="newest" {{ request()->sort == 'newest' ? 'selected' : '' }}>Newest First</option>
                                <option value="relevance" {{ request()->sort == 'relevance' ? 'selected' : '' }}>Relevance</option>
                                <option value="deadline" {{ request()->sort == 'deadline' ? 'selected' : '' }}>Application Deadline</option>
                            </select>
                        </form>
                    </div>
                </div>
                
                <div class="job-list">
                    @foreach($jobs as $job)
                    <div class="job-listing">
                        <div class="job-header">
                            <img src="{{ $job->company_logo }}" alt="{{ $job->company }} logo">
                            <div class="job-title">
                                <h3>{{ $job->title }}</h3>
                                <p class="company">{{ $job->company }} · {{ $job->location }}</p>
                                <div class="job-meta">
                                    <span class="badge {{ $job->type_slug }}">{{ $job->type }}</span>
                                    @if($job->is_remote)
                                    <span class="badge remote">Remote</span>
                                    @elseif($job->is_hybrid)
                                    <span class="badge hybrid">Hybrid</span>
                                    @else
                                    <span class="badge onsite">On-site</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            <p>{{ Str::limit($job->description, 200) }}</p>
                            <div class="skills">
                                @foreach($job->skills as $skill)
                                <span class="skill-tag">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fas fa-clock"></i> Posted {{ $job->created_at->diffForHumans() }}
                                <span class="deadline">Apply by: {{ $job->deadline->format('M d, Y') }}</span>
                            </div>
                            <div class="job-actions">
                                <button class="btn btn-primary apply-btn">Apply Now</button>
                                <button class="btn btn-text save-btn">
                                    <i class="far fa-bookmark"></i> Save
                                </button>
                                <a href="{{ route('job-detail', $job->id) }}" class="btn btn-text">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    {{ $jobs->links() }}
                </div>
            </section>
            
            <!-- Post Job CTA -->
            <section class="post-job-cta">
                <div class="cta-content">
                    <h2>Have a job to post?</h2>
                    <p>Reach thousands of qualified alumni candidates by posting your opportunity on our job board.</p>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i> Post a Job
                    </button>
                </div>
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
    <script src="{{ asset('assets/js/jobs.js') }}"></script>
@endsection