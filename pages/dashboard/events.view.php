<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Alumni Connect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/events.css">
</head>
<body class="dashboard">
    <!-- Header (consistent with dashboard) -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="home.html" class="logo">
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

    <!-- Mobile Sidebar (consistent with dashboard) -->
    <aside class="mobile-sidebar" id="mobileSidebar">
        <nav class="sidebar-nav">
            <a href="home.html">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="profile.html">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
            <a href="events.html" class="active">
                <i class="fas fa-calendar-alt"></i>
                <span>Events</span>
            </a>
            <a href="jobs.html">
                <i class="fas fa-briefcase"></i>
                <span>Jobs</span>
            </a>
            <a href="forum.html">
                <i class="fas fa-comments"></i>
                <span>Forum</span>
            </a>
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
                <a href="/index.html" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Events Content -->
    <main class="dashboard-content">
        <div class="container">
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
                <!-- Event Card 1 -->
                <div class="event-card">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" alt="Alumni reunion">
                        <div class="event-date">
                            <span class="day">15</span>
                            <span class="month">Jun</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <span class="event-category">Reunion</span>
                        <h3>Annual Alumni Reunion 2023</h3>
                        <p class="event-meta">
                            <i class="fas fa-map-marker-alt"></i> Campus Auditorium
                            <i class="fas fa-clock"></i> 5:00 PM - 9:00 PM
                        </p>
                        <p class="event-description">
                            Join us for our biggest alumni event of the year! Reconnect with old classmates and meet the newest graduates.
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-calendar-check"></i> RSVP
                            </a>
                            <a href="event-detail.html" class="btn btn-text">
                                Details <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="event-card">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" alt="Career workshop">
                        <div class="event-date">
                            <span class="day">22</span>
                            <span class="month">Jun</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <span class="event-category">Workshop</span>
                        <h3>Career Networking Workshop</h3>
                        <p class="event-meta">
                            <i class="fas fa-video"></i> Online Event
                            <i class="fas fa-clock"></i> 6:00 PM - 8:00 PM
                        </p>
                        <p class="event-description">
                            Learn effective networking strategies from successful alumni and industry leaders in this interactive workshop.
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-calendar-check"></i> Register
                            </a>
                            <a href="event-detail.html" class="btn btn-text">
                                Details <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="event-card">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" alt="Campus tour">
                        <div class="event-date">
                            <span class="day">30</span>
                            <span class="month">Jun</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <span class="event-category">Campus</span>
                        <h3>Campus Tour & Facilities Update</h3>
                        <p class="event-meta">
                            <i class="fas fa-map-marker-alt"></i> Main Campus
                            <i class="fas fa-clock"></i> 10:00 AM - 12:00 PM
                        </p>
                        <p class="event-description">
                            See the exciting new developments on campus and learn about upcoming projects from the university president.
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-calendar-check"></i> RSVP
                            </a>
                            <a href="event-detail.html" class="btn btn-text">
                                Details <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event Card 4 -->
                <div class="event-card">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" alt="Industry panel">
                        <div class="event-date">
                            <span class="day">07</span>
                            <span class="month">Jul</span>
                        </div>
                    </div>
                    <div class="event-details">
                        <span class="event-category">Networking</span>
                        <h3>Tech Industry Panel Discussion</h3>
                        <p class="event-meta">
                            <i class="fas fa-map-marker-alt"></i> Engineering Building
                            <i class="fas fa-clock"></i> 4:00 PM - 6:00 PM
                        </p>
                        <p class="event-description">
                            Hear from alumni working at top tech companies about industry trends and career opportunities.
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-calendar-check"></i> RSVP
                            </a>
                            <a href="event-detail.html" class="btn btn-text">
                                Details <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn disabled">
                    <i class="fas fa-chevron-left"></i> Previous
                </button>
                <div class="page-numbers">
                    <button class="active">1</button>
                    <button>2</button>
                    <button>3</button>
                </div>
                <button class="pagination-btn">
                    Next <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </main>

    <!-- Bottom Navigation (Mobile) -->
    <nav class="bottom-nav">
        <a href="home.html">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        <a href="events.html" class="active">
            <i class="fas fa-calendar-alt"></i>
            <span>Events</span>
        </a>
        <a href="jobs.html">
            <i class="fas fa-briefcase"></i>
            <span>Jobs</span>
        </a>
        <a href="forum.html">
            <i class="fas fa-comments"></i>
            <span>Forum</span>
        </a>
    </nav>

    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/events.js"></script>
</body>
</html>