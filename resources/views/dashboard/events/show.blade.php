@extends('layouts.dashboard')

@section('title', $event->title)

@section('dashboard-styles')
    <link rel="stylesheet" href="{{ asset('assets/css/event-detail.css') }}">
@endsection

@section('dashboard-content')
    <!-- Back Button -->
    <div class="back-button">
        <a href="{{ route('events.index') }}" class="btn btn-text">
            <i class="fas fa-arrow-left"></i> Back to Events
        </a>
    </div>

    <!-- Event Header -->
    <section class="event-header">
        <div class="event-image">
            <img src="{{ $event->image_url }}" alt="{{ $event->title }}">
            <div class="event-date-badge">
                <span class="day">{{ $event->date->format('d') }}</span>
                <span class="month">{{ $event->date->format('M') }}</span>
            </div>
        </div>
        
        <div class="event-title">
            <span class="event-category">{{ $event->category }}</span>
            <h1>{{ $event->title }}</h1>
            <div class="event-meta">
                <div class="meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $event->location }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-calendar-day"></i>
                    <span>{{ $event->date->format('l, F j, Y') }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ $event->date->format('g:i A') }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Actions -->
    <section class="event-actions">
        <button class="btn btn-primary btn-lg">
            <i class="fas fa-calendar-check"></i> RSVP Now
        </button>
        <button class="btn btn-secondary btn-lg">
            <i class="fas fa-share-alt"></i> Share Event
        </button>
        <button class="btn btn-text">
            <i class="fas fa-calendar-plus"></i> Add to Calendar
        </button>
    </section>

    <!-- Event Details -->
    <section class="event-details-section">
        <div class="event-description">
            <h2>About This Event</h2>
            {!! nl2br(e($event->description)) !!}
        </div>

        <div class="event-sidebar">
            <div class="event-map">
                <img src="https://maps.googleapis.com/maps/api/staticmap?center={{ urlencode($event->location) }}&zoom=15&size=600x300&maptype=roadmap&markers=color:red%7C{{ urlencode($event->location) }}&key={{ config('services.google.maps_key') }}" alt="Event location map">
                <div class="map-actions">
                    <a href="#" class="btn btn-text">
                        <i class="fas fa-directions"></i> Get Directions
                    </a>
                </div>
            </div>

            <div class="event-organizer">
                <h3>Organized By</h3>
                <div class="organizer-card">
                    <img src="{{ $event->organizer->avatar }}" alt="Organizer photo">
                    <div>
                        <h4>{{ $event->organizer->name }}</h4>
                        <p>Alumni Relations Director</p>
                        <a href="mailto:{{ $event->organizer->email }}" class="btn btn-text">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </div>
                </div>
            </div>

            <div class="event-attendees">
                <h3>Who's Attending <span>({{ $event->attendees_count }})</span></h3>
                <div class="attendees-grid">
                    @foreach($event->attendees as $attendee)
                    <img src="{{ $attendee->avatar }}" alt="Attendee">
                    @endforeach
                    @if($event->attendees_count > 6)
                    <div class="more-attendees">+{{ $event->attendees_count - 6 }}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Event Schedule -->
    <section class="event-schedule">
        <h2>Event Schedule</h2>
        <div class="schedule-timeline">
            @foreach($event->schedule as $item)
            <div class="timeline-item">
                <div class="timeline-time">{{ $item['time'] }}</div>
                <div class="timeline-content">
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Similar Events -->
    <section class="similar-events">
        <h2>You Might Also Like</h2>
        <div class="events-grid">
            @foreach($similarEvents as $similarEvent)
            <div class="event-card">
                <div class="event-image">
                    <img src="{{ $similarEvent->image_url }}" alt="{{ $similarEvent->title }}">
                    <div class="event-date">
                        <span class="day">{{ $similarEvent->date->format('d') }}</span>
                        <span class="month">{{ $similarEvent->date->format('M') }}</span>
                    </div>
                </div>
                <div class="event-details">
                    <span class="event-category">{{ $similarEvent->category }}</span>
                    <h3>{{ $similarEvent->title }}</h3>
                    <p class="event-meta">
                        <i class="fas {{ $similarEvent->is_online ? 'fa-video' : 'fa-map-marker-alt' }}"></i> 
                        {{ $similarEvent->is_online ? 'Online' : $similarEvent->location }}
                        <i class="fas fa-clock"></i> {{ $similarEvent->date->format('g:i A') }}
                    </p>
                    <div class="event-actions">
                        <a href="#" class="btn btn-primary">RSVP</a>
                        <a href="{{ route('events.show', $similarEvent->id) }}" class="btn btn-text">Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection

@section('dashboard-scripts')
    <script src="{{ asset('assets/js/event-detail.js') }}"></script>
@endsection