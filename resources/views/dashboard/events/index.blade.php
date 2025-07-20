@extends('layouts.dashboard')

@section('title', 'Events')

@section('dashboard-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/events.css') }}">
@endsection

@section('dashboard-content')
    <!-- Page Header with Filter Controls -->
    <section class="page-header">
        <h1>Upcoming Events</h1>
        <div class="controls">
            <div class="filter-toggle">
                <button class="active">Upcoming</button>
                <button>Past</button>
            </div>
            <div class="search-filter">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search events...">
            </div>
        </div>
    </section>

    <!-- Event Categories -->
    <section class="event-categories">
        <button class="category active">All Events</button>
        <button class="category">Reunions</button>
        <button class="category">Networking</button>
        <button class="category">Workshops</button>
        <button class="category">Campus</button>
    </section>

    <!-- Events Grid -->
    <section class="events-grid">
        @foreach($events as $event)
        <div class="event-card">
            <div class="event-image">
                <img src="{{ $event->image_url }}" alt="{{ $event->title }}">
                <div class="event-date">
                    <span class="day">{{ $event->date->format('d') }}</span>
                    <span class="month">{{ $event->date->format('M') }}</span>
                </div>
            </div>
            <div class="event-details">
                <span class="event-category">{{ $event->category }}</span>
                <h3>{{ $event->title }}</h3>
                <p class="event-meta">
                    <i class="fas {{ $event->is_online ? 'fa-video' : 'fa-map-marker-alt' }}"></i> 
                    {{ $event->is_online ? 'Online' : $event->location }}
                    <i class="fas fa-clock"></i> {{ $event->date->format('g:i A') }}
                </p>
                <p class="event-description">
                    {{ Str::limit($event->description, 120) }}
                </p>
                <div class="event-actions">
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-calendar-check"></i> RSVP
                    </a>
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-text">
                        Details <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <!-- Pagination -->
    <div class="pagination">
        {{ $events->links() }}
    </div>
@endsection

@section('dashboard-scripts')
    <script src="{{ asset('assets/js/events.js') }}"></script>
@endsection