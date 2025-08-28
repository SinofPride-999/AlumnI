<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Connect - Reconnect With Your Alma Mater</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <link rel="stylesheet" href="../assets/css/index.css">
</head>
<body>
    <!-- Animated background elements -->
    <div class="animated-bg-elements">
        <div class="bg-circle circle-1"></div>
        <div class="bg-circle circle-2"></div>
        <div class="bg-circle circle-3"></div>
        <div class="bg-circle circle-4"></div>
    </div>

    <!-- Header with Navigation -->
    <header id="header">
      <div class="container">
          <nav>
              <a href="#" class="logo">
                  <i class="fas fa-graduation-cap"></i>
                  <span>AlumnI</span>
              </a>
              
              <div class="nav-links">
                  <a href="/dashboard" class="nav-link">Home</a>
                  <a href="#features" class="nav-link">Features</a>
                  <a href="#about" class="nav-link">About</a>
                  <a href="#team" class="nav-link">Team</a>
              </div>
              
              <div class="nav-actions">
                  <button class="theme-toggle" id="themeToggle">
                      <i class="fas fa-moon"></i>
                  </button>
                  <a href="/login" class="btn btn-secondary">Login</a>
                  <a href="/register" class="btn btn-primary">Register</a>

                  <button class="mobile-menu-btn" id="mobileMenuBtn">
                      <span class="hamburger-line"></span>
                      <span class="hamburger-line"></span>
                      <span class="hamburger-line"></span>
                  </button>
              </div>
          </nav>
      </div>

      <!-- Mobile Menu Overlay -->
      <div class="mobile-menu" id="mobileMenu">
          <div class="mobile-menu-content">
              <div class="mobile-menu-actions">
                  <div class="mobile-nav-links">
                    <a href="#home" class="mobile-nav-link">Home</a>
                    <a href="#features" class="mobile-nav-link">Features</a>
                    <a href="#about" class="mobile-nav-link">About</a>
                    <a href="#team" class="mobile-nav-link">Team</a>
                  </div>    

                  <a href="/login" class="btn btn-secondary mobile-btn">Login</a>
                  <a href="/register" class="btn btn-primary mobile-btn">Register</a>
              </div>
          </div>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="animate__animated animate__fadeInUp">Reconnect With <span class="gradient-text">Alumni</span></h1>
                    <!-- <p class="animate__animated animate__fadeInUp animate__delay-1s">Join our exclusive alumni network to reconnect with classmates.</p> -->
                    <div class="hero-buttons animate__animated animate__fadeInUp animate__delay-2s">
                        <a href="/register" class="btn btn-primary btn-hero">Get Started <i class="fas fa-arrow-right"></i></a>
                        <a href="#features" class="btn btn-secondary btn-hero">Explore Features</a>
                    </div>
                    <div class="hero-stats animate__animated animate__fadeInUp animate__delay-3s">
                        <div class="stat">
                            <div class="stat-number" data-count="10000">1203</div>
                            <div class="stat-label">Active Alumni</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number" data-count="500">6000</div>
                            <div class="stat-label">Job Opportunities</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number" data-count="100">48</div>
                            <div class="stat-label">Events Yearly</div>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="floating-card card-1">
                        <i class="fas fa-user-graduate"></i>
                        <p>Alumni Profiles</p>
                    </div>
                    <div class="floating-card card-2">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Events</p>
                    </div>
                    <div class="floating-card card-3">
                        <i class="fas fa-briefcase"></i>
                        <p>Job Board</p>
                    </div>
                    <div class="main-hero-image">
                        <img src="https://www.marjon.ac.uk/media/2018-website-images-gdpr/alumni/alumni-header-1.jpg" alt="Alumni networking" class="hero-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Portal <span class="gradient-text">Features</span></h2>
                <p>Discover what our alumni portal offers to help you stay connected and advance your career</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3>Alumni Profiles</h3>
                    <p>Create and update your profile to stay visible to other alumni and potential employers.</p>
                    <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Event Announcements</h3>
                    <p>Stay informed about upcoming reunions, networking events, and campus activities.</p>
                    <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Job Board</h3>
                    <p>Discover career opportunities posted by fellow alumni and recruiters.</p>
                    <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Discussion Forum</h3>
                    <p>Engage in meaningful conversations with alumni from different graduating classes.</p>
                    <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3>Networking</h3>
                    <p>Connect with alumni in your industry or geographic area for mentorship and collaboration.</p>
                    <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Career Growth</h3>
                    <p>Access resources and advice to help you advance in your professional journey.</p>
                    <a href="#" class="feature-link">Learn more <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-image">
                    <div class="image-container">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Team working together" class="about-img">
                        <div class="image-overlay"></div>
                    </div>
                </div>
                <div class="about-text">
                    <h2>About <span class="gradient-text">AlumnI</span></h2>
                    <p>AlumnI is a comprehensive portal designed to bridge the gap between former students and their alma mater. Our mission is to foster lifelong connections and provide valuable resources to our alumni community.</p>
                    <p>The portal was developed by Group 12 as part of our final year project, with the goal of creating a vibrant, engaged alumni community that benefits both graduates and current students.</p>
                    <div class="about-stats">
                        <div class="about-stat">
                            <div class="about-stat-number">100%</div>
                            <div class="about-stat-label">Secure Platform</div>
                        </div>
                        <div class="about-stat">
                            <div class="about-stat-number">24/7</div>
                            <div class="about-stat-label">Support</div>
                        </div>
                    </div>
                    <a href="/register" class="btn btn-primary">Join Our Community</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section team" id="team">
        <div class="container">
            <div class="section-title">
                <h2>Our <span class="gradient-text">Team</span></h2>
                <p>The talented individuals behind the development of AlumniConnect</p>
            </div>
            
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="/assets/images/Samuel-Tagoe.jpg" alt="Team Member">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3>Samuel Tagoe</h3>
                        <p>ID: 01234792B</p>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="/assets/images/Raheem.jpg" alt="Team Member">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3>Abdul-Raheem Alhassan</h3>
                        <p>ID: 01234766B</p>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="/assets/images/Theo.jpg" alt="Team Member">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3>Theophilus Ofori</h3>
                        <p>ID: 01233785B</p>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="/assets/images/Iris.jpg" alt="Team Member">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3>Iris Mensah</h3>
                        <p>ID: 01234766B</p>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="/assets/images/Sule.jpg" alt="Team Member">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3>Sule Mananu</h3>
                        <p>ID: 01235028B</p>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="/assets/images/Linus.jpg" alt="Team Member">
                        <div class="team-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h3>Linus Ameko</h3>
                        <p>ID: 01234766B</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Alumni <span class="gradient-text">Testimonials</span></h2>
                <p>See what our alumni say about their experience with our platform</p>
            </div>
            
            <div class="testimonials-container">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-text">
                            "This platform helped me reconnect with college friends and even land my current job! Amazing resource for alumni."
                        </div>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Testimonial author">
                            </div>
                            <div class="author-info">
                                <h4>Michael Johnson</h4>
                                <p>Class of 2015</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-text">
                            "The events section keeps me updated on all alumni activities. I've attended three reunions thanks to this platform!"
                        </div>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Testimonial author">
                            </div>
                            <div class="author-info">
                                <h4>Sarah Williams</h4>
                                <p>Class of 2012</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-text">
                            "As a recruiter, I've found incredible talent through this portal. The alumni network here is truly exceptional."
                        </div>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Testimonial author">
                            </div>
                            <div class="author-info">
                                <h4>David Chen</h4>
                                <p>Class of 2008</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Join Our Alumni Network?</h2>
            <p>Register now to reconnect with your classmates, discover career opportunities, and stay engaged with your alma mater.</p>
            <a href="/register" class="btn btn-primary btn-large">Get Started Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>AlumnI</h3>
                    <p>Bridging the gap between alumni and their alma mater through technology and community.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
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
                
                <div class="footer-column">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter for the latest updates and events.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> AlumnI. All rights reserved. Developed by Group 12.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <?php include __DIR__ . '/../partials/scroll-to-top.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/index.js"></script>

</body>
</html>