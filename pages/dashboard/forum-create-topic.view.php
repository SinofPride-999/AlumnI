<?php
// Retrieve any form errors or previous input
$errors = $_SESSION['forum_errors'] ?? [];
$formData = $_SESSION['forum_data'] ?? [];
unset($_SESSION['forum_errors']);
unset($_SESSION['forum_data']);
?>

<?php
require_once dirname(__DIR__, 2) . '/app/config.php';

$title = 'Create New Topic - Alumni Connect';

$styles = [
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
    '/assets/css/index.css',
    '/assets/css/forum.css',
    '/assets/css/dashboard.css',
    '/assets/css/forum-create-topic.css',
];

include BASE_PATH . '/layouts/head.layout.php';
?>

<body class="dashboard">
    <!-- Header -->
    <?php
    require_once dirname(__DIR__, 2) . '/app/config.php';
    include BASE_PATH . '/partials/nav.php'; 
    ?>

    <!-- Main Content -->
    <main class="forum-content">
        <div class="container">
            <!-- Page Header -->
            <section class="forum-header">
                <div class="header-content">
                    <h1>Create New Topic</h1>
                    <p>Start a meaningful discussion in our alumni community</p>
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
                        <div class="floating-label-group">
                            <span class="floating-label">Category</span>
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="">Select a category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>" 
                                        <?= ($formData['category_id'] ?? '') == $category['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($category['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php if (isset($errors['category'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['category']) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group <?= isset($errors['title']) ? 'has-error' : '' ?>">
                        <div class="floating-label-group">
                            <span class="floating-label">Title</span>
                            <input type="text" name="title" id="title" class="form-control" 
                                    value="<?= htmlspecialchars($formData['title'] ?? '') ?>" required
                                    placeholder="What's your topic about?">
                        </div>
                        <div class="char-counter" id="title-counter">0/120 characters</div>
                        <?php if (isset($errors['title'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['title']) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group <?= isset($errors['content']) ? 'has-error' : '' ?>">
                        <div class="preview-toggle">
                            <button type="button" id="togglePreview">
                                <i class="far fa-eye"></i> Preview
                            </button>
                        </div>
                        <div class="floating-label-group">
                            <span class="floating-label">Content</span>
                            <textarea name="content" id="content" class="form-control" required
                                      placeholder="Write your post content here..."><?= htmlspecialchars($formData['content'] ?? '') ?></textarea>
                        </div>
                        <div class="char-counter" id="content-counter">0/5000 characters</div>
                        <div class="content-preview" id="content-preview"></div>
                        <?php if (isset($errors['content'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['content']) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-create">
                            <i class="fas fa-paper-plane"></i> Create Topic
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php 
    include BASE_PATH . '/partials/footer.php'; 
    ?>

  <!-- JavaScript -->
  <script src="/assets/js/index.js"></script>
  <script src="/assets/js/dashboard.js"></script>
  <script src="/assets/js/forum.js"></script>
  <script src="/assets/js/forum-create-topic.js"></script>
</body>
</html>