<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details - Alumni Connect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/event-detail.css">
</head>
<body class="dashboard">
    <!-- Header (consistent with other pages) -->
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

    <!-- Mobile Sidebar -->
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
            <a href="events.html">
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

    <!-- Main Content -->
    <main class="dashboard-content">
        <div class="container">
            <!-- Back Button -->
            <div class="back-button">
                <a href="events.html" class="btn btn-text">
                    <i class="fas fa-arrow-left"></i> Back to Events
                </a>
            </div>

            <!-- Event Header -->
            <section class="event-header">
                <div class="event-image">
                    <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" alt="Annual Alumni Reunion">
                    <div class="event-date-badge">
                        <span class="day">15</span>
                        <span class="month">Jun</span>
                    </div>
                </div>
                
                <div class="event-title">
                    <span class="event-category">Reunion</span>
                    <h1>Annual Alumni Reunion 2023</h1>
                    <div class="event-meta">
                        <div class="meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Campus Auditorium, University Main Campus</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar-day"></i>
                            <span>Thursday, June 15, 2023</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span>5:00 PM - 9:00 PM</span>
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
                    <p>Join us for our biggest alumni event of the year! The Annual Alumni Reunion is a wonderful opportunity to reconnect with old classmates, meet new graduates, and celebrate your shared university experience.</p>
                    <p>This year's event will feature:</p>
                    <ul>
                        <li>Campus tours showcasing new developments</li>
                        <li>Keynote address by President Johnson</li>
                        <li>Class-specific meetups</li>
                        <li>Cocktail reception and dinner</li>
                        <li>Live music from student performers</li>
                    </ul>
                    <p>The evening will conclude with our traditional lantern ceremony in the quadrangle. Business casual attire recommended.</p>
                </div>

                <div class="event-sidebar">
                    <div class="event-map">
                        <img src="https://maps.googleapis.com/maps/api/staticmap?center=University+Campus&zoom=15&size=600x300&maptype=roadmap&markers=color:red%7CUniversity+Campus&key=YOUR_API_KEY" alt="Event location map">
                        <div class="map-actions">
                            <a href="#" class="btn btn-text">
                                <i class="fas fa-directions"></i> Get Directions
                            </a>
                        </div>
                    </div>

                    <div class="event-organizer">
                        <h3>Organized By</h3>
                        <div class="organizer-card">
                            <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Organizer photo">
                            <div>
                                <h4>Sarah Johnson</h4>
                                <p>Alumni Relations Director</p>
                                <a href="mailto:s.johnson@alumni.edu" class="btn btn-text">
                                    <i class="fas fa-envelope"></i> Contact
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="event-attendees">
                        <h3>Who's Attending <span>(42)</span></h3>
                        <div class="attendees-grid">
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Attendee">
                            <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Attendee">
                            <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="Attendee">
                            <img src="https://randomuser.me/api/portraits/women/55.jpg" alt="Attendee">
                            <img src="https://randomuser.me/api/portraits/men/66.jpg" alt="Attendee">
                            <div class="more-attendees">+37</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Event Schedule -->
            <section class="event-schedule">
                <h2>Event Schedule</h2>
                <div class="schedule-timeline">
                    <div class="timeline-item">
                        <div class="timeline-time">5:00 PM</div>
                        <div class="timeline-content">
                            <h3>Registration & Welcome Reception</h3>
                            <p>Check in at the main auditorium entrance and enjoy light refreshments</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">5:30 PM</div>
                        <div class="timeline-content">
                            <h3>Campus Tours</h3>
                            <p>Guided tours of the new science building and renovated library</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">6:30 PM</div>
                        <div class="timeline-content">
                            <h3>Keynote Address</h3>
                            <p>President Johnson shares university updates and future plans</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">7:30 PM</div>
                        <div class="timeline-content">
                            <h3>Dinner & Socializing</h3>
                            <p>Buffet dinner with class-specific seating areas</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">8:30 PM</div>
                        <div class="timeline-content">
                            <h3>Lantern Ceremony</h3>
                            <p>Traditional closing ceremony in the main quadrangle</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Similar Events -->
            <section class="similar-events">
                <h2>You Might Also Like</h2>
                <div class="events-grid">
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
                                <i class="fas fa-clock"></i> 6:00 PM
                            </p>
                            <div class="event-actions">
                                <a href="#" class="btn btn-primary">Register</a>
                                <a href="event-detail.html" class="btn btn-text">Details</a>
                            </div>
                        </div>
                    </div>

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
                                <i class="fas fa-clock"></i> 10:00 AM
                            </p>
                            <div class="event-actions">
                                <a href="#" class="btn btn-primary">RSVP</a>
                                <a href="event-detail.html" class="btn btn-text">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
    <script src="../../assets/js/event-detail.js"></script>
</body>
</html>