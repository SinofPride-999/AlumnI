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
                
                <form method="POST" action="/reset-password">
                    <div class="form-group floating">
                        <input type="email" name="email" required value="<?= $_SESSION['reset_email'] ?? '' ?>">
                        <label>Your Email</label>
                        <?php if (isset($errors['email'])): ?>
                            <span class="error-message"><?= $errors['email'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group floating">
                        <input type="text" name="code" required placeholder="Enter the 6-digit code">
                        <label>Reset Code</label>
                        <?php if (isset($errors['code'])): ?>
                            <span class="error-message"><?= $errors['code'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group floating">
                        <input type="password" name="password" required>
                        <label>New Password</label>
                        <?php if (isset($errors['password'])): ?>
                            <span class="error-message"><?= $errors['password'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script src="/assets/js/index.js"></script>
    <script src="/assets/js/auth.js"></script>
</body>
</html>