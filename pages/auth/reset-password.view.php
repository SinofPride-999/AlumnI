<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Alumni Connect</title>
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
                  <a href="/register" class="btn btn-secondary">Register</a>
              </div>
          </nav>
      </div>
    </header>

    <!-- Auth Container -->
    <main class="auth-container">
        <div class="auth-form-container">
            <div class="auth-form-wrapper">
                <div class="form-header">
                    <h1>Reset Your Password</h1>
                    <p>Enter the code you received and your new password</p>
                </div>
                
                <?php if (isset($_SESSION['reset_success'])): ?>
                    <div class="alert alert-success">
                        Password updated successfully!
                    </div>
                    <?php unset($_SESSION['reset_success']); ?>
                <?php endif; ?>
                
                <form class="auth-form" id="resetPasswordForm" method="POST" action="/reset-password">
                    <?php if (isset($errors['general'])): ?>
                        <div class="alert alert-error">
                            <?php echo htmlspecialchars($errors['general']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group floating">
                        <input type="email" id="resetEmail" name="email" required value="<?= htmlspecialchars($_SESSION['reset_email'] ?? '') ?>">
                        <label for="resetEmail">Your Email</label>
                        <i class="fas fa-envelope icon"></i>
                        <?php if (isset($errors['email'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['email']) ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group floating">
                        <input type="text" id="resetCode" name="code" required>
                        <label for="resetCode">Reset Code</label>
                        <i class="fas fa-key icon"></i>
                        <?php if (isset($errors['code'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['code']) ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group floating password-group">
                        <input type="password" id="newPassword" name="password" required>
                        <label for="newPassword">New Password</label>
                        <i class="fas fa-lock icon"></i>
                        <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                        <?php if (isset($errors['password'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['password']) ?></span>
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
                        <input type="password" id="confirmNewPassword" name="confirmPassword" required>
                        <label for="confirmNewPassword">Confirm Password</label>
                        <i class="fas fa-lock icon"></i>
                        <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                        <?php if (isset($errors['confirmPassword'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['confirmPassword']) ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">
                        <span>Reset Password</span>
                        <i class="fas fa-key"></i>
                    </button>
                    
                    <div class="auth-footer">
                        <p>Remember your password? <a href="/login">Sign in here</a></p>
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