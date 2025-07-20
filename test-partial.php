<?php 

$title = "Alumni Connect - Alma Mater Connect";

// Page specific styles and scripts
$styles = [
  '',
];

$scripts = [
  '',
];

include __DIR__ . '/../partials/head.php'; 
include __DIR__ . '/../partials/nav.php'; 
include __DIR__ . '/../partials/specific-js.php';

?>

<body>
    <!-- Header with Navigation -->
    <?php include __DIR__ . '/../partials/nav.php'; ?>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Connect With Your <span>Alma Mater</span></h1>
                    <p>Join our alumni network to reconnect with old classmates, discover career opportunities, and stay updated with campus events.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary">Join Now</a>
                        <a href="#features" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://www.marjon.ac.uk/media/2018-website-images-gdpr/alumni/alumni-header-1.jpg" alt="Alumni networking">
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
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Team working together">
                </div>
                <div class="about-text">
                    <h2>About <span>AlumnI</span></h2>
                    <p>AlumnI is a comprehensive portal designed to bridge the gap between former students and their alma mater. Our mission is to foster lifelong connections and provide valuable resources to our alumni community.</p>
                    <p>The portal was developed by Group 12 as part of our final year project, with the goal of creating a vibrant, engaged alumni community that benefits both graduates and current students.</p>
                    <a href="#" class="btn btn-primary">Join Our Community</a>
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
                        <img src="https://media.licdn.com/dms/image/v2/D4E03AQGMvj1LSzkBIQ/profile-displayphoto-shrink_800_800/profile-displayphoto-shrink_800_800/0/1718211425020?e=1755734400&v=beta&t=3VySAP5Bf63qtzULICf-EabIMTquzSMBllZfRpEHJM0" alt="Team Member">
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
                        <img src="https://media.licdn.com/dms/image/v2/D5603AQGsZvuLReSm7w/profile-displayphoto-shrink_800_800/profile-displayphoto-shrink_800_800/0/1719437248943?e=1755734400&v=beta&t=I7ShOERHBeZXCrhOq_udLcGDiYs9oVZpotqVRPb5_Oc" alt="Team Member">
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
                        <img src="https://media.licdn.com/dms/image/v2/D4E35AQHjsg3FiLNCxw/profile-framedphoto-shrink_800_800/B4EZfg93eiHwAg-/0/1751826004415?e=1753480800&v=beta&t=WVGWrC2roBeR6RjP1V9q62-LXPX4-fVBqADtWjIYFyM" alt="Team Member">
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
                        <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Team Member">
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
            <a href="/register" class="btn">Get Started</a>
        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <!-- Scroll to Top Button -->
    <?php include __DIR__ . '/../partials/scroll-to-top.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/index.js"></script>

</body>
</html>