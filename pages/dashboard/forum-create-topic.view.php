<?php
// Retrieve any form errors or previous input
$errors = $_SESSION['forum_errors'] ?? [];
$formData = $_SESSION['forum_data'] ?? [];
unset($_SESSION['forum_errors']);
unset($_SESSION['forum_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Topic - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/forum.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link rel="stylesheet" href="/assets/css/forum-create-topic.css">
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
                              <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="User avatar">
                          <?php else: ?>
                              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User avatar">
                          <?php endif; ?>
                      </button>
                  </div>
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
  <main class="forum-content">
      <div class="container">
          <!-- Page Header -->
          <section class="forum-header">
              <div class="header-content">
                  <h1>Create New Topic</h1>
                  <p>Start a discussion in our alumni community</p>
              </div>
              <a href="/forum" class="btn btn-secondary">
                  <i class="fas fa-arrow-left"></i> Back to Forum
              </a>
          </section>

          <!-- Error Display -->
          <?php if (isset($_SESSION['forum_error'])): ?>
              <div class="alert alert-danger">
                  <?= htmlspecialchars($_SESSION['forum_error']) ?>
                  <?php unset($_SESSION['forum_error']); ?>
              </div>
          <?php endif; ?>

          <!-- Create Topic Form -->
          <div class="forum-form-container">
              <form action="/forum/new-topic" method="POST" class="forum-form">
                  <div class="form-group <?= isset($errors['category']) ? 'has-error' : '' ?>">
                      <label for="category">Category</label>
                      <select name="category_id" id="category" class="form-control" required>
                          <option value="">Select a category</option>
                          <?php foreach ($categories as $category): ?>
                              <option value="<?= $category['id'] ?>" 
                                  <?= ($formData['category_id'] ?? '') == $category['id'] ? 'selected' : '' ?>>
                                  <?= htmlspecialchars($category['name']) ?>
                              </option>
                          <?php endforeach; ?>
                      </select>
                      <?php if (isset($errors['category'])): ?>
                          <span class="error-message"><?= htmlspecialchars($errors['category']) ?></span>
                      <?php endif; ?>
                  </div>

                  <div class="form-group <?= isset($errors['title']) ? 'has-error' : '' ?>">
                      <label for="title">Topic Title</label>
                      <input type="text" name="title" id="title" class="form-control" 
                              value="<?= htmlspecialchars($formData['title'] ?? '') ?>" required>
                      <?php if (isset($errors['title'])): ?>
                          <span class="error-message"><?= htmlspecialchars($errors['title']) ?></span>
                      <?php endif; ?>
                  </div>

                  <div class="form-group <?= isset($errors['content']) ? 'has-error' : '' ?>">
                      <label for="content">Content</label>
                      <textarea name="content" id="content" class="form-control" rows="10" required><?= htmlspecialchars($formData['content'] ?? '') ?></textarea>
                      <?php if (isset($errors['content'])): ?>
                          <span class="error-message"><?= htmlspecialchars($errors['content']) ?></span>
                      <?php endif; ?>
                  </div>

                  <div class="form-actions">
                      <button type="submit" class="btn btn-primary">
                          <i class="fas fa-paper-plane"></i> Create Topic
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </main>

  <!-- Footer -->
  <footer>
      <div class="container">
          <div class="footer-content">
              <div class="footer-column">
                  <h3>AlumnI</h3>
                  <p>Bridging the gap between alumni and their alma mater</p>
              </div>
              <div class="footer-column">
                  <h3>Quick Links</h3>
                  <ul>
                      <li><a href="/dashboard">Dashboard</a></li>
                      <li><a href="/forum">Forum</a></li>
                      <li><a href="/profile">Profile</a></li>
                  </ul>
              </div>
          </div>
          <div class="footer-bottom">
              <p>&copy; <?= date('Y') ?> AlumnI. All rights reserved.</p>
          </div>
      </div>
  </footer>

  <!-- JavaScript -->
  <script src="/assets/js/index.js"></script>
  <script src="/assets/js/dashboard.js"></script>
  <script src="/assets/js/forum.js"></script>
  <script>
      // Initialize rich text editor (example using simple textarea)
      document.addEventListener('DOMContentLoaded', function() {
          // You could integrate a rich text editor here like TinyMCE or CKEditor
          console.log('Topic creation form ready');
      });
  </script>
</body>
</html>