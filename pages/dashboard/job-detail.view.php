<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/job-detail.css">
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
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="job-detail-content">
        <div class="container">
            <!-- Back to Jobs Link -->
            <div class="back-link">
                <a href="jobs.html" class="btn btn-text">
                    <i class="fas fa-arrow-left"></i> Back to Jobs
                </a>
            </div>

            <!-- Job Header Section -->
            <section class="job-header-section">
                <div class="job-header-content">
                    <div class="company-logo">
                        <img src="https://logo.clearbit.com/google.com" alt="Google logo">
                    </div>
                    <div class="job-title-info">
                        <h1>Senior Software Engineer</h1>
                        <p class="company-name">Google Inc.</p>
                        <div class="job-meta">
                            <span class="location"><i class="fas fa-map-marker-alt"></i> Mountain View, CA</span>
                            <span class="type"><i class="fas fa-briefcase"></i> Full-time</span>
                            <span class="remote"><i class="fas fa-globe"></i> Remote options</span>
                        </div>
                        <div class="job-actions">
                            <button class="btn btn-primary apply-btn">Apply Now</button>
                            <button class="btn btn-secondary save-btn">
                                <i class="far fa-bookmark"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="job-stats">
                    <div class="stat-item">
                        <span class="stat-value">$120K - $150K</span>
                        <span class="stat-label">Salary</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">5+ years</span>
                        <span class="stat-label">Experience</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">Jun 30, 2025</span>
                        <span class="stat-label">Apply by</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">25</span>
                        <span class="stat-label">Applicants</span>
                    </div>
                </div>
            </section>

            <!-- Job Details Section -->
            <section class="job-details-section">
                <div class="job-main-content">
                    <!-- Job Description -->
                    <div class="job-description">
                        <h2>Job Description</h2>
                        <p>We're looking for a Senior Software Engineer to join our Cloud Platform team. You'll be responsible for designing and implementing scalable distributed systems that power Google's infrastructure services used by millions of customers worldwide.</p>
                        
                        <h3>Responsibilities</h3>
                        <ul>
                            <li>Design, develop, test, deploy, maintain and improve software</li>
                            <li>Manage individual project priorities, deadlines and deliverables</li>
                            <li>Collaborate with cross-functional teams to define, design, and ship new features</li>
                            <li>Mentor junior engineers and participate in code reviews</li>
                            <li>Identify and solve performance and scalability issues</li>
                        </ul>
                        
                        <h3>Minimum Qualifications</h3>
                        <ul>
                            <li>Bachelor's degree in Computer Science or related technical field</li>
                            <li>5+ years of professional software development experience</li>
                            <li>Experience with Java, Python, or C++</li>
                            <li>Experience with distributed systems and cloud computing</li>
                        </ul>
                        
                        <h3>Preferred Qualifications</h3>
                        <ul>
                            <li>Master's degree or PhD in Computer Science or related field</li>
                            <li>Experience with Google Cloud Platform or AWS</li>
                            <li>Experience with containerization and orchestration technologies</li>
                            <li>Excellent problem-solving and communication skills</li>
                        </ul>
                    </div>
                    
                    <!-- About Company -->
                    <div class="about-company">
                        <h2>About Google</h2>
                        <p>Google's mission is to organize the world's information and make it universally accessible and useful. Through products and platforms like Search, Maps, Gmail, Android, Google Play, Chrome and YouTube, Google plays a meaningful role in the daily lives of billions of people and has become one of the most widely known companies in the world.</p>
                        <p>Google is proud to be an equal opportunity workplace and is an affirmative action employer. We are committed to equal employment opportunity regardless of race, color, ancestry, religion, sex, national origin, sexual orientation, age, citizenship, marital status, disability, gender identity or Veteran status.</p>
                    </div>
                    
                    <!-- Alumni Connection -->
                    <div class="alumni-connection">
                        <h2>Alumni Connection</h2>
                        <div class="alumni-info">
                            <div class="alumni-profile">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Alumni profile">
                                <div>
                                    <h4>Sarah Johnson</h4>
                                    <p>Class of 2018 · Computer Science</p>
                                    <p>Current: Senior Engineer at Google</p>
                                </div>
                            </div>
                            <p class="alumni-message">"I'd be happy to refer qualified candidates from our alma mater. Feel free to reach out with any questions about working at Google!"</p>
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message Sarah
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Job Sidebar -->
                <aside class="job-sidebar">
                    <!-- Quick Facts -->
                    <div class="quick-facts">
                        <h3>Quick Facts</h3>
                        <div class="fact-item">
                            <span class="fact-label">Posted</span>
                            <span class="fact-value">2 days ago</span>
                        </div>
                        <div class="fact-item">
                            <span class="fact-label">Job ID</span>
                            <span class="fact-value">GOOG-78942</span>
                        </div>
                        <div class="fact-item">
                            <span class="fact-label">Department</span>
                            <span class="fact-value">Cloud Engineering</span>
                        </div>
                        <div class="fact-item">
                            <span class="fact-label">Work Type</span>
                            <span class="fact-value">Full-time</span>
                        </div>
                        <div class="fact-item">
                            <span class="fact-label">Location Type</span>
                            <span class="fact-value">Hybrid (3 days office)</span>
                        </div>
                    </div>
                    
                    <!-- Required Skills -->
                    <div class="required-skills">
                        <h3>Required Skills</h3>
                        <div class="skills-list">
                            <span class="skill-tag">Java</span>
                            <span class="skill-tag">Python</span>
                            <span class="skill-tag">Cloud Computing</span>
                            <span class="skill-tag">Distributed Systems</span>
                            <span class="skill-tag">Algorithms</span>
                            <span class="skill-tag">Data Structures</span>
                            <span class="skill-tag">System Design</span>
                        </div>
                    </div>
                    
                    <!-- Similar Jobs -->
                    <div class="similar-jobs">
                        <h3>Similar Jobs</h3>
                        <div class="similar-job">
                            <h4>Software Engineer, Cloud</h4>
                            <p class="company">Microsoft · Redmond, WA</p>
                            <div class="job-meta">
                                <span class="badge full-time">Full-time</span>
                                <span class="badge hybrid">Hybrid</span>
                            </div>
                            <a href="#" class="btn btn-text">View Job</a>
                        </div>
                        <div class="similar-job">
                            <h4>Senior Backend Engineer</h4>
                            <p class="company">Amazon Web Services · Remote</p>
                            <div class="job-meta">
                                <span class="badge full-time">Full-time</span>
                                <span class="badge remote">Remote</span>
                            </div>
                            <a href="#" class="btn btn-text">View Job</a>
                        </div>
                    </div>
                    
                    <!-- Share Job -->
                    <div class="share-job">
                        <h3>Share This Job</h3>
                        <div class="share-buttons">
                            <button class="btn btn-text">
                                <i class="fab fa-linkedin"></i> LinkedIn
                            </button>
                            <button class="btn btn-text">
                                <i class="fab fa-twitter"></i> Twitter
                            </button>
                            <button class="btn btn-text">
                                <i class="fas fa-envelope"></i> Email
                            </button>
                        </div>
                    </div>
                </aside>
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
    <script src="../../assets/js/job-detail.js"></script>
</body>
</html>