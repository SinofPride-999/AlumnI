<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Alumni Connect</title>
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
                    <h1>Welcome Back</h1>
                    <p>Sign in to reconnect with your alumni network</p>
                </div>
                
                <form class="auth-form" id="loginForm" method="POST" action="/login">
                    <?php if (isset($errors['login'])): ?>
                        <div class="alert alert-error">
                            <?php echo htmlspecialchars($errors['login']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form-group floating">
                        <input type="email" id="loginEmail" name="email" required>
                        <label for="loginEmail">Email Address</label>
                        <i class="fas fa-envelope icon"></i>
                        <?php if (isset($errors['email'])): ?>
                            <span class="error-message"><?php echo htmlspecialchars($errors['email']); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group floating">
                        <input type="password" id="loginPassword" name="password" required>
                        <label for="loginPassword">Password</label>
                        <i class="fas fa-lock icon"></i>
                        <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    
                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="rememberMe" name="rememberMe">
                            <label for="rememberMe">Remember me</label>
                        </div>
                        <a href="/forgot-password" class="forgot-password">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">
                        <span>Sign In</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                    
                    <div class="auth-footer">
                        <p>Don't have an account? <a href="/register">Register here</a></p>
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