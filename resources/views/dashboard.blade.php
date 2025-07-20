@extends('layouts.app')

@section('title', 'Dashboard - Alumni Connect')

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
    <main class="dashboard-content">
        <div class="container">
            <!-- Welcome Section -->
            <section class="welcome-section">
                <h1>Welcome back, <span>{{ Auth::user()->name }}</span></h1>
                <div class="profile-completion">
                    <div class="completion-message">
                        <p>Your profile is <strong>75% complete</strong></p>
                        <div class="completion-bar">
                            <div class="progress" style="width: 75%"></div>
                        </div>
                    </div>
                    <a href="{{ route('profile') }}" class="btn btn-primary">Complete Profile</a>
                </div>
            </section>

            <!-- Quick Actions -->
            <section class="quick-actions">
                <h2 class="section-title">Quick Actions</h2>
                <div class="action-grid">
                    <a href="{{ route('events') }}" class="action-card">
                        <i class="fas fa-calendar-alt"></i>
                        <span>View Events</span>
                    </a>
                    <a href="{{ route('jobs') }}" class="action-card">
                        <i class="fas fa-briefcase"></i>
                        <span>Job Board</span>
                    </a>
                    <a href="{{ route('forum') }}" class="action-card">
                        <i class="fas fa-comments"></i>
                        <span>Forum</span>
                    </a>
                    <a href="{{ route('find-alumni') }}" class="action-card">
                        <i class="fas fa-user-plus"></i>
                        <span>Find Alumni</span>
                    </a>
                </div>
            </section>

            <!-- Upcoming Events -->
            <section class="upcoming-events">
                <div class="section-header">
                    <h2 class="section-title">Upcoming Events</h2>
                    <a href="{{ route('events') }}" class="view-all">View All</a>
                </div>
                
                @foreach($upcomingEvents as $event)
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">{{ $event->date->format('d') }}</span>
                        <span class="month">{{ $event->date->format('M') }}</span>
                    </div>
                    <div class="event-details">
                        <h3>{{ $event->title }}</h3>
                        <p class="event-meta">
                            <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                            <i class="fas fa-clock"></i> {{ $event->time }}
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">RSVP</a>
                            <a href="{{ route('event-detail', $event->id) }}" class="btn btn-text">Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>

            <!-- Recent Job Postings -->
            <section class="job-postings">
                <div class="section-header">
                    <h2 class="section-title">Job Opportunities</h2>
                    <a href="{{ route('jobs') }}" class="view-all">View All</a>
                </div>
                
                @foreach($recentJobs as $job)
                <div class="job-card">
                    <div class="job-header">
                        <img src="{{ $job->company_logo }}" alt="{{ $job->company }} logo">
                        <div>
                            <h3>{{ $job->title }}</h3>
                            <p class="company">{{ $job->company }} · {{ $job->location }}</p>
                        </div>
                    </div>
                    <div class="job-meta">
                        <span class="badge">{{ $job->type }}</span>
                        <span class="posted-date">Posted {{ $job->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="job-actions">
                        <a href="#" class="btn btn-primary">Apply</a>
                        <a href="{{ route('job-detail', $job->id) }}" class="btn btn-text">Details</a>
                    </div>
                </div>
                @endforeach
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
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endsection