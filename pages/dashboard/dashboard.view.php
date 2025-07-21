<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body class="dashboard">
    <!-- Simplified Header -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="home.html" class="logo">
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

                    <!-- Logout Button -->
                    <form action="/logout" method="POST" style="display: inline;">
                        <button type="submit" class="btn btn-secondary logout-btn" style="margin-left: 1rem;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="dashboard-content">
        <div class="container">
            <!-- Welcome Section -->
            <section class="welcome-section">
                <h1>Welcome, <span><?= htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8') ?></span></h1>
                <div class="profile-completion">
                    <div class="completion-message">
                        <p>Your profile is <strong>75% complete</strong></p>
                        <div class="completion-bar">
                            <div class="progress" style="width: 75%"></div>
                        </div>
                    </div>
                    <a href="profile.html" class="btn btn-primary">Complete Profile</a>
                </div>
            </section>

            <!-- Quick Actions -->
            <section class="quick-actions">
                <h2 class="section-title">Quick Actions</h2>
                <div class="action-grid">
                    <a href="events.html" class="action-card">
                        <i class="fas fa-calendar-alt"></i>
                        <span>View Events</span>
                    </a>
                    <a href="jobs.html" class="action-card">
                        <i class="fas fa-briefcase"></i>
                        <span>Job Board</span>
                    </a>
                    <a href="forum.html" class="action-card">
                        <i class="fas fa-comments"></i>
                        <span>Forum</span>
                    </a>
                    <a href="find-alumni.html" class="action-card">
                        <i class="fas fa-user-plus"></i>
                        <span>Find Alumni</span>
                    </a>
                </div>
            </section>

            <!-- Upcoming Events -->
            <section class="upcoming-events">
                <div class="section-header">
                    <h2 class="section-title">Upcoming Events</h2>
                    <a href="events.html" class="view-all">View All</a>
                </div>
                
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">15</span>
                        <span class="month">Jun</span>
                    </div>
                    <div class="event-details">
                        <h3>Annual Alumni Reunion</h3>
                        <p class="event-meta">
                            <i class="fas fa-map-marker-alt"></i> Campus Auditorium
                            <i class="fas fa-clock"></i> 5:00 PM
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">RSVP</a>
                            <a href="#" class="btn btn-text">Details</a>
                        </div>
                    </div>
                </div>
                
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">22</span>
                        <span class="month">Jun</span>
                    </div>
                    <div class="event-details">
                        <h3>Career Networking Workshop</h3>
                        <p class="event-meta">
                            <i class="fas fa-video"></i> Online
                            <i class="fas fa-clock"></i> 6:00 PM
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">Register</a>
                            <a href="#" class="btn btn-text">Details</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Recent Job Postings -->
            <section class="job-postings">
                <div class="section-header">
                    <h2 class="section-title">Job Opportunities</h2>
                    <a href="jobs.html" class="view-all">View All</a>
                </div>
                
                <div class="job-card">
                    <div class="job-header">
                        <img src="https://logo.clearbit.com/google.com" alt="Google logo">
                        <div>
                            <h3>Senior Software Engineer</h3>
                            <p class="company">Google · Mountain View, CA</p>
                        </div>
                    </div>
                    <div class="job-meta">
                        <span class="badge">Full-time</span>
                        <span class="posted-date">Posted 2 days ago</span>
                    </div>
                    <div class="job-actions">
                        <a href="#" class="btn btn-primary">Apply</a>
                        <a href="#" class="btn btn-text">Details</a>
                    </div>
                </div>
                
                <div class="job-card">
                    <div class="job-header">
                        <img src="https://logo.clearbit.com/microsoft.com" alt="Microsoft logo">
                        <div>
                            <h3>Product Manager</h3>
                            <p class="company">Microsoft · Remote</p>
                        </div>
                    </div>
                    <div class="job-meta">
                        <span class="badge">Full-time</span>
                        <span class="posted-date">Posted 1 week ago</span>
                    </div>
                    <div class="job-actions">
                        <a href="#" class="btn btn-primary">Apply</a>
                        <a href="#" class="btn btn-text">Details</a>
                    </div>
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
                <p>&copy; 2025 AlumnI. All rights reserved. Developed by Group 12.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
</body>
</html>