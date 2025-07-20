@extends('layouts.app')

@section('title', 'Find Alumni - Alumni Connect')

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
    <main class="find-alumni-content">
        <div class="container">
            <!-- Page Header -->
            <section class="page-header">
                <div class="header-content">
                    <h1>Find Alumni</h1>
                    <p>Connect with fellow graduates based on graduation year, industry, location, and more</p>
                </div>
                <div class="header-actions">
                    <button class="btn btn-primary" id="advancedSearchBtn">
                        <i class="fas fa-sliders-h"></i> Advanced Search
                    </button>
                </div>
            </section>

            <!-- Search Filters -->
            <section class="search-filters">
                <form method="GET" action="{{ route('find-alumni') }}">
                    <div class="search-bar">
                        <input type="text" name="search" placeholder="Search by name, company, or skills" value="{{ request()->search }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </form>
                
                <div class="quick-filters">
                    <a href="{{ route('find-alumni') }}" class="filter-btn {{ !request()->filter ? 'active' : '' }}">All Alumni</a>
                    <a href="{{ route('find-alumni', ['filter' => 'nearby']) }}" class="filter-btn {{ request()->filter == 'nearby' ? 'active' : '' }}">
                        <i class="fas fa-map-marker-alt"></i> Nearby
                    </a>
                    <a href="{{ route('find-alumni', ['filter' => 'industry']) }}" class="filter-btn {{ request()->filter == 'industry' ? 'active' : '' }}">
                        <i class="fas fa-briefcase"></i> My Industry
                    </a>
                    <a href="{{ route('find-alumni', ['filter' => 'class']) }}" class="filter-btn {{ request()->filter == 'class' ? 'active' : '' }}">
                        <i class="fas fa-graduation-cap"></i> My Class
                    </a>
                </div>
            </section>

            <!-- Alumni Results -->
            <section class="alumni-results">
                <div class="results-header">
                    <h2>Showing {{ $alumni->total() }} Alumni</h2>
                    <div class="sort-options">
                        <form method="GET" action="{{ route('find-alumni') }}">
                            <label for="sort-by">Sort by:</label>
                            <select id="sort-by" name="sort" onchange="this.form.submit()">
                                <option value="relevance" {{ request()->sort == 'relevance' ? 'selected' : '' }}>Relevance</option>
                                <option value="recent" {{ request()->sort == 'recent' ? 'selected' : '' }}>Most Recent</option>
                                <option value="name" {{ request()->sort == 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                                <option value="grad-year" {{ request()->sort == 'grad-year' ? 'selected' : '' }}>Graduation Year</option>
                            </select>
                        </form>
                    </div>
                </div>
                
                <div class="alumni-grid">
                    @foreach($alumni as $alumnus)
                    <div class="alumni-card">
                        <div class="alumni-photo">
                            <img src="{{ $alumnus->photo_url }}" alt="Alumni photo">
                            <button class="connect-btn {{ $alumnus->connection_status }}">
                                @if($alumnus->connection_status == 'connected')
                                <i class="fas fa-check"></i>
                                @elseif($alumnus->connection_status == 'pending')
                                <i class="fas fa-clock"></i>
                                @else
                                <i class="fas fa-user-plus"></i>
                                @endif
                            </button>
                        </div>
                        <div class="alumni-info">
                            <h3>{{ $alumnus->name }}</h3>
                            <p class="graduation">Class of {{ $alumnus->graduation_year }} · {{ $alumnus->major }}</p>
                            <p class="current">
                                <i class="fas fa-briefcase"></i> {{ $alumnus->current_position }} at {{ $alumnus->current_company }}
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i> {{ $alumnus->location }}
                            </p>
                            <div class="skills">
                                @foreach($alumnus->skills as $skill)
                                <span class="skill-tag">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="alumni-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                            <a href="{{ route('profile.view', $alumnus->id) }}" class="btn btn-text">
                                View Profile
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    {{ $alumni->links() }}
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

    <!-- Advanced Search Modal -->
    <div class="modal" id="advancedSearchModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Advanced Alumni Search</h2>
                <button class="close-btn" id="closeModalBtn">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="advancedSearchForm" method="GET" action="{{ route('find-alumni') }}">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="search-name">Name</label>
                            <input type="text" id="search-name" name="name" placeholder="Search by name" value="{{ request()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="search-company">Company</label>
                            <input type="text" id="search-company" name="company" placeholder="Search by company" value="{{ request()->company }}">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="search-major">Major/Program</label>
                            <select id="search-major" name="major">
                                <option value="">All Majors</option>
                                @foreach($majors as $major)
                                <option value="{{ $major->slug }}" {{ request()->major == $major->slug ? 'selected' : '' }}>{{ $major->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="search-year">Graduation Year</label>
                            <select id="search-year" name="year">
                                <option value="">All Years</option>
                                @foreach($yearRanges as $range => $label)
                                <option value="{{ $range }}" {{ request()->year == $range ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="search-industry">Industry</label>
                            <select id="search-industry" name="industry">
                                <option value="">All Industries</option>
                                @foreach($industries as $industry)
                                <option value="{{ $industry->slug }}" {{ request()->industry == $industry->slug ? 'selected' : '' }}>{{ $industry->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="search-location">Location</label>
                            <select id="search-location" name="location">
                                <option value="">All Locations</option>
                                @foreach($locations as $location)
                                <option value="{{ $location->slug }}" {{ request()->location == $location->slug ? 'selected' : '' }}>{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="search-skills">Skills/Expertise</label>
                        <input type="text" id="search-skills" name="skills" placeholder="Search by skills (comma separated)" value="{{ request()->skills }}">
                    </div>
                    
                    <div class="form-actions">
                        <a href="{{ route('find-alumni') }}" class="btn btn-text" id="resetSearchBtn">
                            <i class="fas fa-sync-alt"></i> Reset
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/find-alumni.js') }}"></script>
@endsection