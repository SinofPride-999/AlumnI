<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/jobs.css">
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
    <main class="jobs-content">
        <div class="container">
            <!-- Page Header -->
            <section class="page-header">
                <h1>Alumni Job Board</h1>
                <p>Discover career opportunities posted by fellow alumni and recruiters</p>
            </section>

            <!-- Job Search Filters -->
            <section class="job-filters">
                <div class="search-bar">
                    <input type="text" placeholder="Search for jobs, companies, or keywords">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
                
                <div class="filter-options">
                    <div class="filter-group">
                        <label for="job-type">Job Type:</label>
                        <select id="job-type">
                            <option value="">All Types</option>
                            <option value="full-time">Full-time</option>
                            <option value="part-time">Part-time</option>
                            <option value="contract">Contract</option>
                            <option value="internship">Internship</option>
                            <option value="remote">Remote</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="industry">Industry:</label>
                        <select id="industry">
                            <option value="">All Industries</option>
                            <option value="technology">Technology</option>
                            <option value="finance">Finance</option>
                            <option value="healthcare">Healthcare</option>
                            <option value="education">Education</option>
                            <option value="engineering">Engineering</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="experience">Experience Level:</label>
                        <select id="experience">
                            <option value="">All Levels</option>
                            <option value="entry">Entry Level</option>
                            <option value="mid">Mid Level</option>
                            <option value="senior">Senior Level</option>
                            <option value="executive">Executive</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-secondary" id="resetFilters">
                        <i class="fas fa-sync-alt"></i> Reset
                    </button>
                </div>
            </section>

            <!-- Job Listings -->
            <section class="job-listings">
                <div class="listings-header">
                    <h2 class="section-title">Available Positions</h2>
                    <div class="sort-options">
                        <label for="sort-by">Sort by:</label>
                        <select id="sort-by">
                            <option value="newest">Newest First</option>
                            <option value="relevance">Relevance</option>
                            <option value="deadline">Application Deadline</option>
                        </select>
                    </div>
                </div>
                
                <div class="job-list">
                    <!-- Job Listing 1 -->
                    <div class="job-listing">
                        <div class="job-header">
                            <img src="https://logo.clearbit.com/google.com" alt="Google logo">
                            <div class="job-title">
                                <h3>Senior Software Engineer</h3>
                                <p class="company">Google · Mountain View, CA</p>
                                <div class="job-meta">
                                    <span class="badge full-time">Full-time</span>
                                    <span class="badge remote">Remote</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            <p>We're looking for a senior software engineer to join our team working on cutting-edge cloud technologies. The ideal candidate will have 5+ years of experience with distributed systems and a strong background in algorithms.</p>
                            <div class="skills">
                                <span class="skill-tag">Java</span>
                                <span class="skill-tag">Python</span>
                                <span class="skill-tag">Cloud Computing</span>
                                <span class="skill-tag">Distributed Systems</span>
                            </div>
                        </div>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fas fa-clock"></i> Posted 2 days ago
                                <span class="deadline">Apply by: June 30, 2025</span>
                            </div>
                            <div class="job-actions">
                                <button class="btn btn-primary apply-btn">Apply Now</button>
                                <button class="btn btn-text save-btn">
                                    <i class="far fa-bookmark"></i> Save
                                </button>
                                <a href="job-detail.html" class="btn btn-text">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Job Listing 2 -->
                    <div class="job-listing">
                        <div class="job-header">
                            <img src="https://logo.clearbit.com/microsoft.com" alt="Microsoft logo">
                            <div class="job-title">
                                <h3>Product Manager</h3>
                                <p class="company">Microsoft · Redmond, WA</p>
                                <div class="job-meta">
                                    <span class="badge full-time">Full-time</span>
                                    <span class="badge hybrid">Hybrid</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            <p>Join our Office 365 team as a Product Manager to drive the vision and execution of productivity features used by millions worldwide. Ideal candidates will have experience in SaaS products and strong analytical skills.</p>
                            <div class="skills">
                                <span class="skill-tag">Product Management</span>
                                <span class="skill-tag">SaaS</span>
                                <span class="skill-tag">Agile</span>
                                <span class="skill-tag">User Research</span>
                            </div>
                        </div>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fas fa-clock"></i> Posted 1 week ago
                                <span class="deadline">Apply by: July 15, 2025</span>
                            </div>
                            <div class="job-actions">
                                <button class="btn btn-primary apply-btn">Apply Now</button>
                                <button class="btn btn-text save-btn">
                                    <i class="far fa-bookmark"></i> Save
                                </button>
                                <a href="job-detail.html" class="btn btn-text">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Job Listing 3 -->
                    <div class="job-listing">
                        <div class="job-header">
                            <img src="https://logo.clearbit.com/goldmansachs.com" alt="Goldman Sachs logo">
                            <div class="job-title">
                                <h3>Financial Analyst</h3>
                                <p class="company">Goldman Sachs · New York, NY</p>
                                <div class="job-meta">
                                    <span class="badge full-time">Full-time</span>
                                    <span class="badge onsite">On-site</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            <p>The Investment Banking Division is looking for a Financial Analyst to join our team. You'll work on complex financial transactions, including mergers, acquisitions, and capital raising for our clients.</p>
                            <div class="skills">
                                <span class="skill-tag">Financial Modeling</span>
                                <span class="skill-tag">Valuation</span>
                                <span class="skill-tag">Excel</span>
                                <span class="skill-tag">Investment Banking</span>
                            </div>
                        </div>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fas fa-clock"></i> Posted 3 days ago
                                <span class="deadline">Apply by: July 10, 2025</span>
                            </div>
                            <div class="job-actions">
                                <button class="btn btn-primary apply-btn">Apply Now</button>
                                <button class="btn btn-text save-btn">
                                    <i class="far fa-bookmark"></i> Save
                                </button>
                                <a href="job-detail.html" class="btn btn-text">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Job Listing 4 -->
                    <div class="job-listing">
                        <div class="job-header">
                            <img src="https://logo.clearbit.com/startup.com" alt="Startup Company logo">
                            <div class="job-title">
                                <h3>UX/UI Designer</h3>
                                <p class="company">TechStart Inc. · Remote</p>
                                <div class="job-meta">
                                    <span class="badge contract">Contract</span>
                                    <span class="badge remote">Remote</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            <p>We're a fast-growing startup looking for a talented UX/UI Designer to help shape our product experience. You'll work closely with our product and engineering teams to create intuitive, beautiful interfaces.</p>
                            <div class="skills">
                                <span class="skill-tag">Figma</span>
                                <span class="skill-tag">User Research</span>
                                <span class="skill-tag">Prototyping</span>
                                <span class="skill-tag">UI Design</span>
                            </div>
                        </div>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fas fa-clock"></i> Posted 5 days ago
                                <span class="deadline">Apply by: July 20, 2025</span>
                            </div>
                            <div class="job-actions">
                                <button class="btn btn-primary apply-btn">Apply Now</button>
                                <button class="btn btn-text save-btn">
                                    <i class="far fa-bookmark"></i> Save
                                </button>
                                <a href="job-detail.html" class="btn btn-text">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Job Listing 5 -->
                    <div class="job-listing">
                        <div class="job-header">
                            <img src="https://logo.clearbit.com/ibm.com" alt="IBM logo">
                            <div class="job-title">
                                <h3>Data Scientist</h3>
                                <p class="company">IBM · Austin, TX</p>
                                <div class="job-meta">
                                    <span class="badge full-time">Full-time</span>
                                    <span class="badge hybrid">Hybrid</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="job-description">
                            <p>Join our AI Research team to develop innovative machine learning solutions for enterprise clients. You'll work with large datasets to build predictive models and deliver actionable insights.</p>
                            <div class="skills">
                                <span class="skill-tag">Python</span>
                                <span class="skill-tag">Machine Learning</span>
                                <span class="skill-tag">TensorFlow</span>
                                <span class="skill-tag">Data Visualization</span>
                            </div>
                        </div>
                        
                        <div class="job-footer">
                            <div class="job-posted">
                                <i class="fas fa-clock"></i> Posted 2 weeks ago
                                <span class="deadline">Apply by: July 5, 2025</span>
                            </div>
                            <div class="job-actions">
                                <button class="btn btn-primary apply-btn">Apply Now</button>
                                <button class="btn btn-text save-btn">
                                    <i class="far fa-bookmark"></i> Save
                                </button>
                                <a href="job-detail.html" class="btn btn-text">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    <button class="btn btn-text" disabled>
                        <i class="fas fa-chevron-left"></i> Previous
                    </button>
                    <div class="page-numbers">
                        <button class="btn btn-text active">1</button>
                        <button class="btn btn-text">2</button>
                        <button class="btn btn-text">3</button>
                        <span>...</span>
                        <button class="btn btn-text">5</button>
                    </div>
                    <button class="btn btn-text">
                        Next <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </section>
            
            <!-- Post Job CTA -->
            <section class="post-job-cta">
                <div class="cta-content">
                    <h2>Have a job to post?</h2>
                    <p>Reach thousands of qualified alumni candidates by posting your opportunity on our job board.</p>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i> Post a Job
                    </button>
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
    <script src="../../assets/js/jobs.js"></script>
</body>
</html>