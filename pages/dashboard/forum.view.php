<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Forum - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/forum.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body class="dashboard">
  <!-- Simplified Header -->
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
    <main class="forum-content">
        <div class="container">
            <!-- Forum Header -->
            <section class="forum-categories">
                <?php foreach ($categories as $category): ?>
                    <a href="/forum/category/<?= $category['id'] ?>" class="category-card" data-category="<?= strtolower($category['name']) ?>">
                        <div class="category-icon">
                            <i class="fas fa-<?= htmlspecialchars($category['icon']) ?>"></i>
                        </div>
                        <div class="category-info">
                            <h3><?= htmlspecialchars($category['name']) ?></h3>
                            <p><?= htmlspecialchars($category['description']) ?></p>
                            <div class="stats">
                                <span><?= $category['topic_count'] ?> Topics</span>
                                <span><?= $category['post_count'] ?> Posts</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </section>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <!-- Forum Categories -->
            <section class="forum-categories">
                <?php foreach ($categories as $category): ?>
                    <a href="/forum/category/<?= $category['id'] ?>" class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-<?= htmlspecialchars($category['icon']) ?>"></i>
                        </div>
                        <div class="category-info">
                            <h3><?= htmlspecialchars($category['name']) ?></h3>
                            <p><?= htmlspecialchars($category['description']) ?></p>
                            <div class="stats">
                                <span><?= $category['topic_count'] ?> Topics</span>
                                <span><?= $category['post_count'] ?> Posts</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </section>

            <!-- Recent Discussions -->
            <section class="recent-discussions">
                <div class="section-header">
                    <h2 class="section-title">Recent Discussions</h2>
                    <a href="/forum/new-topic" class="btn btn-primary" style="margin-left: auto;">
                        <i class="fas fa-plus"></i> Create Topic
                    </a>
                    <div class="view-options">
                        <button class="btn btn-text active">Newest</button>
                        <button class="btn btn-text">Popular</button>
                        <button class="btn btn-text">Unanswered</button>
                    </div>
                </div>
                
                <div class="discussion-list">
                    <?php if (empty($discussions)): ?>
                        <div class="alert alert-info">No discussions found</div>
                    <?php else: ?>
                        <?php foreach ($discussions as $discussion): ?>
                            <div class="discussion-card">
                                <div class="discussion-votes">
                                    <button class="vote-btn upvote">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                    <span class="vote-count">0</span>
                                    <button class="vote-btn downvote">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div class="discussion-content">
                                    <div class="discussion-header">
                                        <span class="category-badge <?= strtolower(str_replace(' ', '-', $discussion['category_name'])) ?>">
                                            <?= htmlspecialchars($discussion['category_name']) ?>
                                        </span>
                                        <h3><a href="/forum/topic/<?= $discussion['id'] ?>"><?= htmlspecialchars($discussion['title']) ?></a></h3>
                                    </div>
                                    <p class="discussion-excerpt"><?= htmlspecialchars(substr($discussion['content'], 0, 200)) ?><?= strlen($discussion['content']) > 200 ? '...' : '' ?></p>
                                    <div class="discussion-meta">
                                        <div class="author-info">
                                            <?php if (!empty($discussion['profile_picture'])): ?>
                                                <img src="<?= htmlspecialchars($discussion['profile_picture']) ?>" alt="User avatar">
                                            <?php else: ?>
                                                <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Default avatar">
                                            <?php endif; ?>
                                            <span><?= htmlspecialchars($discussion['first_name'] . ' ' . $discussion['last_name']) ?></span>
                                            <span class="graduation">Class of <?= htmlspecialchars($discussion['graduation_year'] ?? 'N/A') ?></span>
                                        </div>
                                        <div class="post-info">
                                            <span><i class="far fa-comment"></i> <?= $discussion['reply_count'] ?> replies</span>
                                            <span><i class="far fa-eye"></i> <?= $discussion['views'] ?> views</span>
                                            <span class="post-time"><?= time_elapsed_string($discussion['created_at']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                
                <!-- Pagination -->
                <div class="pagination">
                    <a href="/forum" class="btn btn-primary">View All Discussions</a>
                </div>
            </section>
            
            <!-- Popular Alumni -->
            <section class="popular-alumni">
                <h2 class="section-title">Popular Alumni Contributors</h2>
                <div class="alumni-grid">
                    <?php if (empty($popularAlumni)): ?>
                        <div class="alert alert-info">No active contributors yet</div>
                    <?php else: ?>
                        <?php foreach ($popularAlumni as $alumni): ?>
                            <div class="alumni-card">
                                <?php if (!empty($alumni['profile_picture'])): ?>
                                    <img src="<?= htmlspecialchars($alumni['profile_picture']) ?>" alt="Alumni photo">
                                <?php else: ?>
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Default alumni photo">
                                <?php endif; ?>
                                <h3><?= htmlspecialchars($alumni['first_name'] . ' ' . $alumni['last_name']) ?></h3>
                                <p class="graduation">Class of <?= htmlspecialchars($alumni['graduation_year']) ?> · <?= htmlspecialchars($alumni['degree_program']) ?></p>
                                <div class="stats">
                                    <span><?= $alumni['topic_count'] + $alumni['post_count'] ?> Contributions</span>
                                </div>
                                <button class="btn btn-text">
                                    <i class="fas fa-user-plus"></i> Connect
                                </button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>AlumnI</h3>
                    <p>Bridging the gap between alumni and their alma mater through technology and community.</p>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/profile">Profile</a></li>
                        <li><a href="/find-alumni">Find Alumni</a></li>
                        <li><a href="/forum">Forum</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 AlumnI. All rights reserved. Developed by Group 12.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/forum.js"></script>
</body>
</html>

<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $weeks = floor($diff->d / 7);  // Calculate weeks separately
    $diff->d -= $weeks * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    // Inject 'w' into the diff manually
    $diff_array = (array) $diff;
    $diff_array['w'] = $weeks;

    foreach ($string as $k => &$v) {
        if (!empty($diff_array[$k])) {
            $v = $diff_array[$k] . ' ' . $v . ($diff_array[$k] > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>