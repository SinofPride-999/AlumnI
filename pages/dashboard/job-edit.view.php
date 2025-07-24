<?php
require_once dirname(__DIR__, 2) . '/app/config.php';

$title = 'Edit Job - Alumni Connect';

$styles = [
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
    '/assets/css/index.css',
    '/assets/css/jobs.css',
    '/assets/css/dashboard.css',
    '/assets/css/job-create.css',
    '/assets/css/job-edit.css',
];

include BASE_PATH . '/layouts/head.layout.php';
?>

<body class="dashboard">

  <!-- Simplified Header  -->
  <?php
  require_once dirname(__DIR__, 2) . '/app/config.php';
  include BASE_PATH . '/partials/nav.php'; 
  ?>

  <main class="jobs-content">
      <div class="container">
          <section class="page-header">
              <h1>Edit Job Posting</h1>
              <p>Update your job listing details</p>
          </section>

          <?php if (isset($_SESSION['error'])): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
              <?php unset($_SESSION['error']); ?>
          <?php endif; ?>

          <?php if (isset($_SESSION['job_errors'])): ?>
              <div class="alert alert-danger">
                  <ul>
                      <?php foreach ($_SESSION['job_errors'] as $error): ?>
                          <li><?= htmlspecialchars($error) ?></li>
                      <?php endforeach; ?>
                  </ul>
              </div>
              <?php unset($_SESSION['job_errors']); ?>
          <?php endif; ?>

          <form method="post" action="/jobs/update/<?= $job['id'] ?>" class="job-form">
              <div class="form-row">
                  <div class="form-group">
                      <label for="title">Job Title *</label>
                      <input type="text" id="title" name="title" value="<?= htmlspecialchars($job['title']) ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="company">Company *</label>
                      <input type="text" id="company" name="company" value="<?= htmlspecialchars($job['company']) ?>" required>
                  </div>
              </div>

              <div class="form-row">
                  <div class="form-group">
                      <label for="location">Location *</label>
                      <input type="text" id="location" name="location" value="<?= htmlspecialchars($job['location']) ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="job_type">Job Type *</label>
                      <select id="job_type" name="job_type" required>
                          <?php foreach (['Full-time', 'Part-time', 'Contract', 'Internship', 'Freelance'] as $type): ?>
                              <option value="<?= $type ?>" <?= $job['job_type'] === $type ? 'selected' : '' ?>><?= $type ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
              </div>

              <div class="form-row">
                  <div class="form-group">
                      <label for="category">Category *</label>
                      <select id="category" name="category" required>
                          <option value="">Select Category</option>
                          <?php foreach ($categories as $cat): ?>
                              <option value="<?= htmlspecialchars($cat) ?>" <?= $job['category'] === $cat ? 'selected' : '' ?>>
                                  <?= htmlspecialchars($cat) ?>
                              </option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="salary_range">Salary Range</label>
                      <input type="text" id="salary_range" name="salary_range" value="<?= htmlspecialchars($job['salary_range']) ?>" placeholder="e.g., $80,000 - $100,000">
                  </div>
              </div>

              <div class="form-group">
                  <label for="technologies">Technologies</label>
                  <input type="text" id="technologies" name="technologies" value="<?= htmlspecialchars($job['technologies']) ?>" placeholder="e.g., PHP, JavaScript">
              </div>

              <div class="form-group">
                  <label for="description">Job Description *</label>
                  <textarea id="description" name="description" rows="6" required><?= htmlspecialchars($job['description']) ?></textarea>
              </div>

              <div class="form-group">
                  <label for="requirements">Requirements *</label>
                  <textarea id="requirements" name="requirements" rows="6" required><?= htmlspecialchars($job['requirements']) ?></textarea>
              </div>

              <div class="form-row">
                  <div class="form-group">
                      <label for="application_email">Application Email</label>
                      <input type="email" id="application_email" name="application_email" value="<?= htmlspecialchars($job['application_email']) ?>">
                  </div>
                  <div class="form-group">
                      <label for="application_url">Application URL</label>
                      <input type="url" id="application_url" name="application_url" value="<?= htmlspecialchars($job['application_url']) ?>" placeholder="https://">
                  </div>
              </div>

              <div class="form-actions">
                  <button type="submit" class="btn btn-primary">
                      <i class="fas fa-save"></i> Update Job
                  </button>
                  <a href="/jobs" class="btn btn-secondary">
                      <i class="fas fa-times"></i> Cancel
                  </a>
              </div>
          </form>
      </div>
  </main>

  <!-- Footer -->
  <?php 
  include BASE_PATH . '/partials/footer.php'; 
  ?>

  <script src="../../assets/js/index.js"></script>
  <script>
      document.querySelector('.job-form').addEventListener('submit', function(e) {
          let valid = true;
          const requiredFields = this.querySelectorAll('[required]');
          requiredFields.forEach(field => {
              if (!field.value.trim()) {
                  field.style.borderColor = '#e74c3c';
                  valid = false;
                  if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('error-message')) {
                      const error = document.createElement('span');
                      error.className = 'error-message';
                      error.textContent = 'This field is required';
                      field.parentNode.insertBefore(error, field.nextSibling);
                  }
              } else {
                  field.style.borderColor = '';
                  if (field.nextElementSibling && field.nextElementSibling.classList.contains('error-message')) {
                      field.nextElementSibling.remove();
                  }
              }
          });
          if (!valid) {
              e.preventDefault();
              window.scrollTo({ top: 0, behavior: 'smooth' });
          }
      });
  </script>
</body>
</html>
