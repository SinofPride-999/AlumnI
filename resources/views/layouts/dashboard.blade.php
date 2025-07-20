@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    @stack('dashboard-styles')
@endsection

@section('content')
<body class="dashboard">
    <!-- Simplified Header -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="{{ route('dashboard') }}" class="logo">
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
                            <img src="{{ Auth::user()->avatar ?? 'https://randomuser.me/api/portraits/men/32.jpg' }}" alt="User avatar">
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Mobile Sidebar -->
    <aside class="mobile-sidebar" id="mobileSidebar">
        <nav class="sidebar-nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="{{ request()->is('dashboard/profile*') ? 'active' : '' }}">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="{{ route('events.index') }}" class="{{ request()->is('dashboard/events*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Events</span>
            </a>
            <a href="{{ route('jobs.index') }}" class="{{ request()->is('dashboard/jobs*') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i>
                <span>Jobs</span>
            </a>
            <a href="{{ route('forum.index') }}" class="{{ request()->is('dashboard/forum*') ? 'active' : '' }}">
                <i class="fas fa-comments"></i>
                <span>Forum</span>
            </a>
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
                <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-content">
        <div class="container">
            @yield('dashboard-content')
        </div>
    </main>

    <!-- Bottom Navigation (Mobile) -->
    <nav class="bottom-nav">
        <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        <a href="{{ route('events.index') }}" class="{{ request()->is('dashboard/events*') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i>
            <span>Events</span>
        </a>
        <a href="{{ route('jobs.index') }}" class="{{ request()->is('dashboard/jobs*') ? 'active' : '' }}">
            <i class="fas fa-briefcase"></i>
            <span>Jobs</span>
        </a>
        <a href="{{ route('forum.index') }}" class="{{ request()->is('dashboard/forum*') ? 'active' : '' }}">
            <i class="fas fa-comments"></i>
            <span>Forum</span>
        </a>
    </nav>

    @stack('dashboard-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
@endsection