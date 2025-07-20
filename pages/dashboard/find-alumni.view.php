<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Alumni - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/find-alumni.css">
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
                <div class="search-bar">
                    <input type="text" placeholder="Search by name, company, or skills">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
                
                <div class="quick-filters">
                    <button class="filter-btn active">All Alumni</button>
                    <button class="filter-btn">
                        <i class="fas fa-map-marker-alt"></i> Nearby
                    </button>
                    <button class="filter-btn">
                        <i class="fas fa-briefcase"></i> My Industry
                    </button>
                    <button class="filter-btn">
                        <i class="fas fa-graduation-cap"></i> My Class
                    </button>
                </div>
            </section>

            <!-- Alumni Results -->
            <section class="alumni-results">
                <div class="results-header">
                    <h2>Showing 124 Alumni</h2>
                    <div class="sort-options">
                        <label for="sort-by">Sort by:</label>
                        <select id="sort-by">
                            <option value="relevance">Relevance</option>
                            <option value="recent">Most Recent</option>
                            <option value="name">Name (A-Z)</option>
                            <option value="grad-year">Graduation Year</option>
                        </select>
                    </div>
                </div>
                
                <div class="alumni-grid">
                    <!-- Alumni Card 1 -->
                    <div class="alumni-card">
                        <div class="alumni-photo">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Alumni photo">
                            <button class="connect-btn">
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </div>
                        <div class="alumni-info">
                            <h3>Dr. Angela Smith</h3>
                            <p class="graduation">Class of 2010 · Computer Science</p>
                            <p class="current">
                                <i class="fas fa-briefcase"></i> Professor at Stanford University
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i> Stanford, CA
                            </p>
                            <div class="skills">
                                <span class="skill-tag">Machine Learning</span>
                                <span class="skill-tag">AI Research</span>
                                <span class="skill-tag">Python</span>
                            </div>
                        </div>
                        <div class="alumni-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                            <button class="btn btn-text">
                                View Profile
                            </button>
                        </div>
                    </div>
                    
                    <!-- Alumni Card 2 -->
                    <div class="alumni-card">
                        <div class="alumni-photo">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Alumni photo">
                            <button class="connect-btn">
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </div>
                        <div class="alumni-info">
                            <h3>Mark Williams</h3>
                            <p class="graduation">Class of 2008 · Business Administration</p>
                            <p class="current">
                                <i class="fas fa-briefcase"></i> CEO at GreenTech Solutions
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i> New York, NY
                            </p>
                            <div class="skills">
                                <span class="skill-tag">Sustainability</span>
                                <span class="skill-tag">Leadership</span>
                                <span class="skill-tag">Startups</span>
                            </div>
                        </div>
                        <div class="alumni-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                            <button class="btn btn-text">
                                View Profile
                            </button>
                        </div>
                    </div>
                    
                    <!-- Alumni Card 3 -->
                    <div class="alumni-card">
                        <div class="alumni-photo">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Alumni photo">
                            <button class="connect-btn">
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </div>
                        <div class="alumni-info">
                            <h3>Priya Patel</h3>
                            <p class="graduation">Class of 2015 · Electrical Engineering</p>
                            <p class="current">
                                <i class="fas fa-briefcase"></i> Senior Engineer at Tesla
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i> Austin, TX
                            </p>
                            <div class="skills">
                                <span class="skill-tag">Embedded Systems</span>
                                <span class="skill-tag">Automotive</span>
                                <span class="skill-tag">C++</span>
                            </div>
                        </div>
                        <div class="alumni-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                            <button class="btn btn-text">
                                View Profile
                            </button>
                        </div>
                    </div>
                    
                    <!-- Alumni Card 4 -->
                    <div class="alumni-card">
                        <div class="alumni-photo">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Alumni photo">
                            <button class="connect-btn connected">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                        <div class="alumni-info">
                            <h3>Michael Rodriguez</h3>
                            <p class="graduation">Class of 2018 · Computer Science</p>
                            <p class="current">
                                <i class="fas fa-briefcase"></i> Software Engineer at Google
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i> Mountain View, CA
                            </p>
                            <div class="skills">
                                <span class="skill-tag">Cloud Computing</span>
                                <span class="skill-tag">Java</span>
                                <span class="skill-tag">Distributed Systems</span>
                            </div>
                        </div>
                        <div class="alumni-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                            <button class="btn btn-text">
                                View Profile
                            </button>
                        </div>
                    </div>
                    
                    <!-- Alumni Card 5 -->
                    <div class="alumni-card">
                        <div class="alumni-photo">
                            <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Alumni photo">
                            <button class="connect-btn">
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </div>
                        <div class="alumni-info">
                            <h3>Jessica Wong</h3>
                            <p class="graduation">Class of 2017 · Mechanical Engineering</p>
                            <p class="current">
                                <i class="fas fa-briefcase"></i> Product Manager at SpaceX
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i> Hawthorne, CA
                            </p>
                            <div class="skills">
                                <span class="skill-tag">Product Management</span>
                                <span class="skill-tag">Aerospace</span>
                                <span class="skill-tag">Agile</span>
                            </div>
                        </div>
                        <div class="alumni-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                            <button class="btn btn-text">
                                View Profile
                            </button>
                        </div>
                    </div>
                    
                    <!-- Alumni Card 6 -->
                    <div class="alumni-card">
                        <div class="alumni-photo">
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Alumni photo">
                            <button class="connect-btn pending">
                                <i class="fas fa-clock"></i>
                            </button>
                        </div>
                        <div class="alumni-info">
                            <h3>David Kim</h3>
                            <p class="graduation">Class of 2015 · Computer Science</p>
                            <p class="current">
                                <i class="fas fa-briefcase"></i> Founder at TechStart
                            </p>
                            <p class="location">
                                <i class="fas fa-map-marker-alt"></i> San Francisco, CA
                            </p>
                            <div class="skills">
                                <span class="skill-tag">Entrepreneurship</span>
                                <span class="skill-tag">JavaScript</span>
                                <span class="skill-tag">Startups</span>
                            </div>
                        </div>
                        <div class="alumni-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                            <button class="btn btn-text">
                                View Profile
                            </button>
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
                <form id="advancedSearchForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="search-name">Name</label>
                            <input type="text" id="search-name" placeholder="Search by name">
                        </div>
                        <div class="form-group">
                            <label for="search-company">Company</label>
                            <input type="text" id="search-company" placeholder="Search by company">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="search-major">Major/Program</label>
                            <select id="search-major">
                                <option value="">All Majors</option>
                                <option value="computer-science">Computer Science</option>
                                <option value="business">Business Administration</option>
                                <option value="engineering">Engineering</option>
                                <option value="arts">Arts & Sciences</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="search-year">Graduation Year</label>
                            <select id="search-year">
                                <option value="">All Years</option>
                                <option value="2020-2025">2020-2025</option>
                                <option value="2015-2019">2015-2019</option>
                                <option value="2010-2014">2010-2014</option>
                                <option value="2000-2009">2000-2009</option>
                                <option value="1990-1999">1990-1999</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="search-industry">Industry</label>
                            <select id="search-industry">
                                <option value="">All Industries</option>
                                <option value="technology">Technology</option>
                                <option value="finance">Finance</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="education">Education</option>
                                <option value="engineering">Engineering</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="search-location">Location</label>
                            <select id="search-location">
                                <option value="">All Locations</option>
                                <option value="north-america">North America</option>
                                <option value="europe">Europe</option>
                                <option value="asia">Asia</option>
                                <option value="africa">Africa</option>
                                <option value="australia">Australia</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="search-skills">Skills/Expertise</label>
                        <input type="text" id="search-skills" placeholder="Search by skills (comma separated)">
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-text" id="resetSearchBtn">
                            <i class="fas fa-sync-alt"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/find-alumni.js"></script>
</body>
</html>