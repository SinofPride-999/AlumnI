<?php
require_once __DIR__ . '/../../utils/time.php';
require_once dirname(__DIR__, 2) . '/app/config.php';

$title = 'Post a Job - Alumni Connect';

$styles = [
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
    '/assets/css/index.css',
    '/assets/css/jobs.css',
    '/assets/css/dashboard.css',
    '/assets/css/job-create.css',
];

include BASE_PATH . '/layouts/head.layout.php';
?>
<body class="dashboard">
    <!-- Simplified Header -->
    <?php
    require_once dirname(__DIR__, 2) . '/app/config.php';
    include BASE_PATH . '/partials/nav.php'; 
    ?>

    <!-- Main Content -->
    <main class="jobs-content">
        <div class="container">
            <!-- Page Header -->
            <section class="page-header">
                <h1>Post a Job Opportunity</h1>
                <p>Share career opportunities with fellow alumni</p>
            </section>

            <!-- Job Creation Form -->
            <section class="job-creation-form">
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

                <form method="post" action="/jobs/create" class="job-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="title">Job Title *</label>
                            <input type="text" id="title" name="title" 
                                   value="<?= htmlspecialchars($_SESSION['job_data']['title'] ?? '') ?>" required>
                            <?php if (isset($_SESSION['job_errors']['title'])): ?>
                                <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['title']) ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="company">Company *</label>
                            <input type="text" id="company" name="company" 
                                   value="<?= htmlspecialchars($_SESSION['job_data']['company'] ?? '') ?>" required>
                            <?php if (isset($_SESSION['job_errors']['company'])): ?>
                                <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['company']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="location">Location *</label>
                            <input type="text" id="location" name="location" 
                                   value="<?= htmlspecialchars($_SESSION['job_data']['location'] ?? '') ?>" required>
                            <?php if (isset($_SESSION['job_errors']['location'])): ?>
                                <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['location']) ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="job_type">Job Type *</label>
                            <select id="job_type" name="job_type" required>
                                <option value="">Select Job Type</option>
                                <option value="Full-time" <?= ($_SESSION['job_data']['job_type'] ?? '') === 'Full-time' ? 'selected' : '' ?>>Full-time</option>
                                <option value="Part-time" <?= ($_SESSION['job_data']['job_type'] ?? '') === 'Part-time' ? 'selected' : '' ?>>Part-time</option>
                                <option value="Contract" <?= ($_SESSION['job_data']['job_type'] ?? '') === 'Contract' ? 'selected' : '' ?>>Contract</option>
                                <option value="Internship" <?= ($_SESSION['job_data']['job_type'] ?? '') === 'Internship' ? 'selected' : '' ?>>Internship</option>
                                <option value="Freelance" <?= ($_SESSION['job_data']['job_type'] ?? '') === 'Freelance' ? 'selected' : '' ?>>Freelance</option>
                            </select>
                            <?php if (isset($_SESSION['job_errors']['job_type'])): ?>
                                <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['job_type']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- <h1><?php echo '<pre>'; print_r($categories); echo '</pre>' ?></h1> -->
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="category">Category *</label>
                            <select id="category" name="category" required>
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= htmlspecialchars($cat) ?>" 
                                        <?= ($_SESSION['job_data']['category'] ?? '') === $cat ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($cat) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($_SESSION['job_errors']['category'])): ?>
                                <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['category']) ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="salary_range">Salary Range</label>
                            <input type="text" id="salary_range" name="salary_range" 
                                   value="<?= htmlspecialchars($_SESSION['job_data']['salary_range'] ?? '') ?>" 
                                   placeholder="e.g., $80,000 - $100,000">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="technologies">Technologies (comma separated)</label>
                        <input type="text" id="technologies" name="technologies" 
                               value="<?= htmlspecialchars($_SESSION['job_data']['technologies'] ?? '') ?>" 
                               placeholder="e.g., PHP, JavaScript, MySQL, React">
                        <small class="form-hint">List the technologies, frameworks, or tools required for this position</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Job Description *</label>
                        <textarea id="description" name="description" rows="6" required><?= 
                            htmlspecialchars($_SESSION['job_data']['description'] ?? '') 
                        ?></textarea>
                        <?php if (isset($_SESSION['job_errors']['description'])): ?>
                            <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['description']) ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="requirements">Requirements *</label>
                        <textarea id="requirements" name="requirements" rows="6" required><?= 
                            htmlspecialchars($_SESSION['job_data']['requirements'] ?? '') 
                        ?></textarea>
                        <?php if (isset($_SESSION['job_errors']['requirements'])): ?>
                            <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['requirements']) ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="application_email">Application Email</label>
                            <input type="email" id="application_email" name="application_email" 
                                   value="<?= htmlspecialchars($_SESSION['job_data']['application_email'] ?? '') ?>">
                            <?php if (isset($_SESSION['job_errors']['application_email'])): ?>
                                <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['application_email']) ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="application_url">Application URL</label>
                            <input type="url" id="application_url" name="application_url" 
                                   value="<?= htmlspecialchars($_SESSION['job_data']['application_url'] ?? '') ?>" 
                                   placeholder="https://">
                            <?php if (isset($_SESSION['job_errors']['application_url'])): ?>
                                <span class="error-message"><?= htmlspecialchars($_SESSION['job_errors']['application_url']) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Post Job
                        </button>
                        <a href="/jobs" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?php 
    include BASE_PATH . '/partials/footer.php'; 
    ?>

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script>
        // Form validation
        document.querySelector('.job-form').addEventListener('submit', function(e) {
            let valid = true;
            const requiredFields = this.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = '#e74c3c';
                    valid = false;
                    
                    // Ensure error message is shown
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
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });
        
        // Clear session data when leaving the page
        window.addEventListener('beforeunload', function() {
            fetch('/clear-job-session', { method: 'POST' });
        });
    </script>
</body>
</html>



