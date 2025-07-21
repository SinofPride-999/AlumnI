<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Alumni Connect</title>
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
                    <h1>Reset Password</h1>
                    <p>Enter your email to get a reset code</p>
                </div>
                
                <?php if (isset($success) && $success): ?>
                    <div class="alert alert-success">
                        <p>Your reset code: <strong><?= $_SESSION['reset_code_display'] ?></strong></p>
                        <p>Use this code on the <a href="/reset-password">reset page</a> to change your password.</p>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="/forgot-password">
                    <div class="form-group floating">
                        <input type="email" name="email" required>
                        <label>Email Address</label>
                        <?php if (isset($errors['email'])): ?>
                            <span class="error-message"><?= $errors['email'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        Get Reset Code
                    </button>
                    
                    <div class="auth-footer">
                        <p>Remember your password? <a href="/login">Sign in</a></p>
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