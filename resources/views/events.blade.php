@extends('layouts.app')

@section('title', 'Events - Alumni Connect')

@section('content')
<body class="dashboard">
    <!-- Header (consistent with dashboard) -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <i class="fas fa-graduation-cap"></i>
                        <span>AlumnI</span>
                    </a>
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
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

    <!-- Main Events Content -->
    <main class="dashboard-content">
        <div class="container">
            <!-- Page Header with Filter Controls -->
            <section class="page-header">
                <h1>Upcoming Events</h1>
                <div class="controls">
                    <div class="filter-toggle">
                        <button class="{{ request()->has('past') ? '' : 'active' }}">Upcoming</button>
                        <button class="{{ request()->has('past') ? 'active' : '' }}">Past</button>
                    </div>
                    <div class="search-filter">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search events..." value="{{ request()->search }}">
                    </div>
                </div>
            </section>

            <!-- Event Categories -->
            <section class="event-categories">
                <button class="category {{ !request()->category ? 'active' : '' }}">All Events</button>
                @foreach($categories as $category)
                <button class="category {{ request()->category == $category->slug ? 'active' : '' }}">{{ $category->name }}</button>
                @endforeach
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
                        <span class="event-category">{{ $event->category->name }}</span>
                        <h3>{{ $event->title }}</h3>
                        <p class="event-meta">
                            @if($event->is_online)
                            <i class="fas fa-video"></i> Online Event
                            @else
                            <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                            @endif
                            <i class="fas fa-clock"></i> {{ $event->time }}
                        </p>
                        <p class="event-description">
                            {{ Str::limit($event->description, 100) }}
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-calendar-check"></i> RSVP
                            </a>
                            <a href="{{ route('event-detail', $event->id) }}" class="btn btn-text">
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
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/events.js') }}"></script>
@endsection