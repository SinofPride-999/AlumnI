@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endsection

@section('dashboard-content')
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
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Complete Profile</a>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="quick-actions">
        <h2 class="section-title">Quick Actions</h2>
        <div class="action-grid">
            <a href="{{ route('events.index') }}" class="action-card">
                <i class="fas fa-calendar-alt"></i>
                <span>View Events</span>
            </a>
            <a href="{{ route('jobs.index') }}" class="action-card">
                <i class="fas fa-briefcase"></i>
                <span>Job Board</span>
            </a>
            <a href="{{ route('forum.index') }}" class="action-card">
                <i class="fas fa-comments"></i>
                <span>Forum</span>
            </a>
            <a href="{{ route('alumni.index') }}" class="action-card">
                <i class="fas fa-user-plus"></i>
                <span>Find Alumni</span>
            </a>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="upcoming-events">
        <div class="section-header">
            <h2 class="section-title">Upcoming Events</h2>
            <a href="{{ route('events.index') }}" class="view-all">View All</a>
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
                    <i class="fas {{ $event->is_online ? 'fa-video' : 'fa-map-marker-alt' }}"></i> 
                    {{ $event->is_online ? 'Online' : $event->location }}
                    <i class="fas fa-clock"></i> {{ $event->date->format('g:i A') }}
                </p>
                <div class="event-actions">
                    <a href="#" class="btn btn-primary">RSVP</a>
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-text">Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <!-- Recent Job Postings -->
    <section class="job-postings">
        <div class="section-header">
            <h2 class="section-title">Job Opportunities</h2>
            <a href="{{ route('jobs.index') }}" class="view-all">View All</a>
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
                <span class="badge">{{ $job->employment_type }}</span>
                <span class="posted-date">Posted {{ $job->created_at->diffForHumans() }}</span>
            </div>
            <div class="job-actions">
                <a href="#" class="btn btn-primary">Apply</a>
                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-text">Details</a>
            </div>
        </div>
        @endforeach
    </section>
@endsection