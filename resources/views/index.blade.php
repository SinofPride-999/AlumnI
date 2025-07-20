<<<<<<< HEAD:resources/views/index.blade.php
@extends('layouts.app')

@section('title', 'Alumni Connect - Stay Connected With Your Alma Mater')
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Connect - Stay Connected With Your Alma Mater</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <!-- Header with Navigation -->
    <header id="header">
      <div class="container">
          <nav>
              <a href="#" class="logo">
                  <i class="fas fa-graduation-cap"></i>
                  <span>Alumn<span class="the-i">i</span></span>
              </a>
              
              <div class="nav-links">
                  <a href="#home">Home</a>
                  <a href="#features">Features</a>
                  <a href="#about">About</a>
                  <a href="#team">Team</a>
              </div>
              
              <div class="nav-actions">
                  <button class="theme-toggle" id="themeToggle">
                      <i class="fas fa-moon"></i>
                  </button>
                  <a href="/login" class="btn btn-secondary">Login</a>
                  <a href="/register" class="btn btn-primary">Register</a>

                  <button class="mobile-menu-btn" id="mobileMenuBtn">
                      <i class="fas fa-bars hamburger-icon"></i>
                      <i class="fas fa-times close-icon"></i>
                  </button>
              </div>
          </nav>
      </div>

      <!-- Mobile Menu Overlay -->
      <div class="mobile-menu" id="mobileMenu">
          <div class="mobile-menu-content">
              <div class="nav-links">
                  <a href="#home">Home</a>
                  <a href="#features">Features</a>
                  <a href="#about">About</a>
                  <a href="#team">Team</a>
              </div>
              <div class="mobile-menu-actions">
                  <a href="/login" class="btn btn-secondary">Login</a>
                  <a href="/register" class="btn btn-primary">Register</a>
              </div>
          </div>
      </div>
    </header>
>>>>>>> c014d07 (update: fixed custom router and landing page):pages/index.php

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Connect With Your <span>Alma Mater</span></h1>
                    <p>Join our alumni network to reconnect with old classmates, discover career opportunities, and stay updated with campus events.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('register') }}" class="btn btn-primary">Join Now</a>
                        <a href="#features" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('assets/images/hero-alumni.jpg') }}" alt="Alumni networking">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Portal Features</h2>
                <p>Discover what our alumni portal offers to help you stay connected and advance your career</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3>Alumni Profiles</h3>
                    <p>Create and update your profile to stay visible to other alumni and potential employers.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Event Announcements</h3>
                    <p>Stay informed about upcoming reunions, networking events, and campus activities.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Job Board</h3>
                    <p>Discover career opportunities posted by fellow alumni and recruiters.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Discussion Forum</h3>
                    <p>Engage in meaningful conversations with alumni from different graduating classes.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3>Networking</h3>
                    <p>Connect with alumni in your industry or geographic area for mentorship and collaboration.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Career Growth</h3>
                    <p>Access resources and advice to help you advance in your professional journey.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-image">
                    <img src="{{ asset('assets/images/team-working.jpg') }}" alt="Team working together">
                </div>
                <div class="about-text">
                    <h2>About <span>Alumni</span></h2>
                    <p>AlumnI is a comprehensive portal designed to bridge the gap between former students and their alma mater. Our mission is to foster lifelong connections and provide valuable resources to our alumni community.</p>
                    <p>The portal was developed by Group 12 as part of our final year project, with the goal of creating a vibrant, engaged alumni community that benefits both graduates and current students.</p>
<<<<<<< HEAD:resources/views/index.blade.php
                    <a href="{{ route('register') }}" class="btn btn-primary">Join Our Community</a>
=======
                    
                    <a href="/register" class="btn btn-primary">Join Our Community</a>
>>>>>>> c014d07 (update: fixed custom router and landing page):pages/index.php
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section" id="team">
        <div class="container">
            <div class="section-title">
                <h2>Our Team</h2>
                <p>The talented individuals behind the development of AlumniConnect</p>
            </div>
            
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{ asset('assets/images/samuel-tagoe.jpg') }}" alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h3>Samuel Tagoe</h3>
                        <p>ID: 01234792B</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{ asset('assets/images/abdul-alhassan.jpg') }}" alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h3>Abdul-Raheem Alhassan</h3>
                        <p>ID: 01234766B</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{ asset('assets/images/theophilus-ofori.jpg') }}" alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h3>Theophilus Ofori</h3>
                        <p>ID: 01230000B</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{ asset('assets/images/iris-mensah.jpg') }}" alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h3>Iris Mensah</h3>
                        <p>ID: 01234766B</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
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
<<<<<<< HEAD:resources/views/index.blade.php
            <a href="{{ route('register') }}" class="btn">Get Started</a>
        </div>
    </section>
@endsection
=======
            
            <a href="/register" class="btn">Get Started</a>
        </div>
    </section>

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
                
                <div class="footer-column">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 AlumnI. All rights reserved. Developed by Group 12.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- JavaScript -->
    <script src="assets/js/index.js"></script>
</body>
</html>
>>>>>>> c014d07 (update: fixed custom router and landing page):pages/index.php
