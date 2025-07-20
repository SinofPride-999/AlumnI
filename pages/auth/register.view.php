<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/auth.css">
</head>
<body>
    <!-- Auth Header -->
    <header id="auth-header">
      <div class="container">
          <nav>
              <a href="/" class="logo">
                  <i class="fas fa-graduation-cap"></i>
                  <span>AlumnI</span>
              </a>
              
              <div class="nav-actions">
                  <button class="theme-toggle" id="themeToggle">
                      <i class="fas fa-moon"></i>
                  </button>
                  <a href="/login" class="btn btn-secondary">Login</a>
              </div>
          </nav>
      </div>
    </header>

    <!-- Auth Container -->
    <main class="auth-container">
        
        <div class="auth-form-container">
            <div class="auth-form-wrapper">
                <div class="form-header">
                    <h1>Join Our Network</h1>
                    <p>Create an account to reconnect with your alma mater</p>
                </div>
                
                <form class="auth-form" id="registerForm" method="POST" action="/register/post">
                    <?php if (isset($errors['general'])): ?>
                        <div class="alert alert-error">
                            <?php echo htmlspecialchars($errors['general']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-row">
                        <div class="form-group floating">
                            <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($formData['firstName'] ?? ''); ?>" required>
                            <label for="firstName">First Name</label>
                            <i class="fas fa-user icon"></i>
                            <?php if (isset($errors['firstName'])): ?>
                                <span class="error-message"><?php echo htmlspecialchars($errors['firstName']); ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group floating">
                            <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($formData['lastName'] ?? ''); ?>" required>
                            <label for="lastName">Last Name</label>
                            <i class="fas fa-user icon"></i>
                            <?php if (isset($errors['lastName'])): ?>
                                <span class="error-message"><?php echo htmlspecialchars($errors['lastName']); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group floating">
                        <input type="email" id="registerEmail" name="email" value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>" required>
                        <label for="registerEmail">Email Address</label>
                        <i class="fas fa-envelope icon"></i>
                        <?php if (isset($errors['email'])): ?>
                            <span class="error-message"><?php echo htmlspecialchars($errors['email']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group floating">
                        <input type="text" id="graduationYear" name="graduationYear" value="<?php echo htmlspecialchars($formData['graduationYear'] ?? ''); ?>" required>
                        <label for="graduationYear">Graduation Year</label>
                        <i class="fas fa-graduation-cap icon"></i>
                        <?php if (isset($errors['graduationYear'])): ?>
                            <span class="error-message"><?php echo htmlspecialchars($errors['graduationYear']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group floating">
                        <input type="text" id="degree" name="degree" value="<?php echo htmlspecialchars($formData['degree'] ?? ''); ?>" required>
                        <label for="degree">Degree Program</label>
                        <i class="fas fa-book icon"></i>
                        <?php if (isset($errors['degree'])): ?>
                            <span class="error-message"><?php echo htmlspecialchars($errors['degree']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group floating password-group">
                        <input type="password" id="registerPassword" name="password" required>
                        <label for="registerPassword">Password</label>
                        <i class="fas fa-lock icon"></i>
                        <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                        <?php if (isset($errors['password'])): ?>
                            <span class="error-message"><?php echo htmlspecialchars($errors['password']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="password-strength">
                        <div class="strength-meter">
                            <span class="strength-bar"></span>
                            <span class="strength-bar"></span>
                            <span class="strength-bar"></span>
                        </div>
                        <span class="strength-text">Password strength</span>
                    </div>
                    
                    <div class="form-group floating">
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                        <label for="confirmPassword">Confirm Password</label>
                        <i class="fas fa-lock icon"></i>
                        <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                        <?php if (isset($errors['confirmPassword'])): ?>
                            <span class="error-message"><?php echo htmlspecialchars($errors['confirmPassword']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-agreement">
                        <input type="checkbox" id="termsAgreement" name="termsAgreement" required>
                        <label for="termsAgreement">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">
                        <span>Create Account</span>
                        <i class="fas fa-user-plus"></i>
                    </button>
                    
                    <div class="auth-footer">
                        <p>Already have an account? <a href="/login">Sign in here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script src="/assets/js/index.js"></script>
    <script src="/assets/js/auth.js"></script>
</body>
</html>