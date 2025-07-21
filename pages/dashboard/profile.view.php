<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Profile - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link rel="stylesheet" href="/assets/css/profile.css">
</head>
<body class="dashboard">
    <!-- Header -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="/dashboard" class="logo">
                        <i class="fas fa-graduation-cap"></i>
                        <span>AlumnI</span>
                    </a>
                </div>
                
                <div class="nav-actions">
                    <button class="theme-toggle" id="themeToggle">
                        <i class="fas fa-moon"></i>
                    </button>

                    <div class="user-menu">
                        <?php $user = $GLOBALS['auth_user'] ?? null; ?>
                        
                        <button class="user-avatar" id="userMenuBtn">
                            <?php if (!empty($user['profile_picture'])): ?>
                                <a href="/profile">
                                    <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile picture">
                                </a>
                            <?php else: ?>
                                <a href="/profile">
                                    <img src="https://t3.ftcdn.net/jpg/06/31/16/54/360_F_631165406_6HfMsexCGHstso3udEHJmlFVzdSOevJ5.jpg" alt="Default avatar">
                                </a>
                            <?php endif; ?>
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
            <section class="profile-section">
                <div class="profile-header">
                    <h1>Complete Your Profile</h1>
                    <p>Fill in your details to connect with fellow alumni</p>
                    
                    <div class="profile-completion">
                        <div class="completion-message">
                            <p>Your profile is <strong><?= $profileCompletion ?>% complete</strong></p>
                            <div class="completion-bar">
                                <div class="progress" style="width: <?= $profileCompletion ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="profile-form" method="POST" action="/profile/update" enctype="multipart/form-data">
                    <div class="form-grid">
                        <!-- Basic Info -->
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="first_name" value="<?= htmlspecialchars($user['first_name']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="last_name" value="<?= htmlspecialchars($user['last_name']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required disabled>
                            <small>Contact admin to change your email</small>
                        </div>

                        <div class="form-group">
                            <label for="graduationYear">Graduation Year</label>
                            <input type="number" id="graduationYear" name="graduation_year" value="<?= htmlspecialchars($user['graduation_year']) ?>" required min="1900" max="<?= date('Y') + 5 ?>">
                        </div>

                        <div class="form-group">
                            <label for="degreeProgram">Degree Program</label>
                            <input type="text" id="degreeProgram" name="degree_program" value="<?= htmlspecialchars($user['degree_program']) ?>" required>
                        </div>

                        <!-- Professional Info -->
                        <div class="form-group">
                            <label for="currentJobTitle">Current Job Title</label>
                            <input type="text" id="currentJobTitle" name="current_job_title" value="<?= htmlspecialchars($user['current_job_title'] ?? '') ?>">
                        </div>

                        <div class="form-group">
                            <label for="currentCompany">Current Company</label>
                            <input type="text" id="currentCompany" name="current_company" value="<?= htmlspecialchars($user['current_company'] ?? '') ?>">
                        </div>

                        <!-- Contact Info -->
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <div class="input-with-icon">
                                <i class="fas fa-phone"></i>
                                <input type="tel" id="phoneNumber" name="phone_number" value="<?= htmlspecialchars($user['phone_number'] ?? '') ?>" placeholder="+1234567890">
                            </div>
                        </div>

                        <!-- Bio -->
                        <div class="form-group full-width">
                            <label for="bio">Bio</label>
                            <textarea id="bio" name="bio" rows="4"><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
                            <small>Tell fellow alumni about yourself (max 500 characters)</small>
                        </div>

                        <!-- Social Links -->
                        <div class="form-group">
                            <label for="linkedinUrl">LinkedIn Profile</label>
                            <div class="input-with-icon">
                                <i class="fab fa-linkedin"></i>
                                <input type="url" id="linkedinUrl" name="linkedin_url" value="<?= htmlspecialchars($user['linkedin_url'] ?? '') ?>" placeholder="https://linkedin.com/in/username">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="personalWebsiteUrl">Personal Website</label>
                            <div class="input-with-icon">
                                <i class="fas fa-globe"></i>
                                <input type="url" id="personalWebsiteUrl" name="personal_website_url" value="<?= htmlspecialchars($user['personal_website_url'] ?? '') ?>" placeholder="https://yourwebsite.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="twitterUrl">Twitter Profile</label>
                            <div class="input-with-icon">
                                <i class="fab fa-twitter"></i>
                                <input type="url" id="twitterUrl" name="twitter_url" value="<?= htmlspecialchars($user['twitter_url'] ?? '') ?>" placeholder="https://twitter.com/username">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="instagramUrl">Instagram Profile</label>
                            <div class="input-with-icon">
                                <i class="fab fa-instagram"></i>
                                <input type="url" id="instagramUrl" name="instagram_url" value="<?= htmlspecialchars($user['instagram_url'] ?? '') ?>" placeholder="https://instagram.com/username">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="whatsappUrl">WhatsApp Contact</label>
                            <div class="input-with-icon">
                                <i class="fab fa-whatsapp"></i>
                                <input type="url" id="whatsappUrl" name="whatsapp_url" value="<?= htmlspecialchars($user['whatsapp_url'] ?? '') ?>" placeholder="https://wa.me/1234567890">
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="profilePicture">Profile Picture</label>
                          <input type="file" id="profilePicture" name="profile_picture" accept="image/*">
                          <?php if (!empty($user['profile_picture'])): ?>
                              <div class="current-avatar">
                                  <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Current profile picture" width="100">
                              </div>
                          <?php endif; ?>
                          <?php if (!empty($_SESSION['profile_errors']['profile_picture'])): ?>
                              <div class="error-message"><?= htmlspecialchars($_SESSION['profile_errors']['profile_picture']) ?></div>
                          <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-large">
                            <i class="fas fa-save"></i> Save Profile
                        </button>
                        <a href="/dashboard" class="btn btn-secondary">Back to Dashboard</a>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <!-- JavaScript -->
    <script src="/assets/js/index.js"></script>
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/profile.js"></script>
</body>
</html>