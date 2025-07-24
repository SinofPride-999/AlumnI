<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category['name']) ?> - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/forum.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/forum-category.css">
</head>
<body class="dashboard">
    <!-- Header -->
    <?php
    define('BASE_PATH', dirname(__DIR__, 2));
    include BASE_PATH . '/partials/nav.php'; 
    ?>

    <!-- Main Content -->
    <main class="forum-content">
        <div class="container">
            <!-- Category Header -->
            <section class="category-header">
                <div class="header-content">
                    <div class="breadcrumb">
                        <a href="/forum"><i class="fas fa-chevron-left"></i> Back to Forum</a>
                    </div>
                    <div class="category-title">
                        <div class="category-icon">
                            <i class="fas fa-<?= htmlspecialchars($category['icon']) ?>"></i>
                        </div>
                        <h1><?= htmlspecialchars($category['name']) ?></h1>
                        <p><?= htmlspecialchars($category['description']) ?></p>
                    </div>
                </div>
                <a href="/forum/new-topic?category=<?= $category['id'] ?>" class="btn btn-primary" id="newTopicBtn">
                    <i class="fas fa-plus"></i> New Topic
                </a>
            </section>

            <?php if (isset($_SESSION['forum_success'])): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($_SESSION['forum_success']) ?>
                    <?php unset($_SESSION['forum_success']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['forum_error'])): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($_SESSION['forum_error']) ?>
                    <?php unset($_SESSION['forum_error']); ?>
                </div>
            <?php endif; ?>

            <!-- Topics List -->
            <section class="topics-list">
                <div class="section-header">
                    <h2 class="section-title">Topics</h2>
                    <div class="view-options">
                        <button class="btn btn-text active">Newest</button>
                        <button class="btn btn-text">Popular</button>
                        <button class="btn btn-text">Unanswered</button>
                    </div>
                </div>
                
                <?php if (empty($topics)): ?>
                    <div class="empty-state">
                        <i class="fas fa-comments"></i>
                        <h3>No topics yet</h3>
                        <p>Be the first to start a discussion in this category</p>
                        <a href="/forum/new-topic?category=<?= $category['id'] ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Create Topic
                        </a>
                    </div>
                <?php else: ?>
                    <div class="topics-container">
                        <?php foreach ($topics as $topic): ?>
                            <div class="topic-card <?= $topic['is_pinned'] ? 'pinned' : '' ?>">
                                <div class="topic-votes">
                                    <button class="vote-btn upvote">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                    <span class="vote-count">0</span>
                                    <button class="vote-btn downvote">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div class="topic-content">
                                    <div class="topic-header">
                                        <?php if ($topic['is_pinned']): ?>
                                            <span class="badge pinned-badge">
                                                <i class="fas fa-thumbtack"></i> Pinned
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($topic['is_closed']): ?>
                                            <span class="badge closed-badge">
                                                <i class="fas fa-lock"></i> Closed
                                            </span>
                                        <?php endif; ?>
                                        <h3><a href="/forum/topic/<?= $topic['id'] ?>"><?= htmlspecialchars($topic['title']) ?></a></h3>
                                    </div>
                                    <div class="topic-excerpt">
                                        <?= htmlspecialchars(substr($topic['content'], 0, 200)) ?><?= strlen($topic['content']) > 200 ? '...' : '' ?>
                                    </div>
                                    <div class="topic-meta">
                                        <div class="author-info">
                                            <?php if (!empty($topic['profile_picture'])): ?>
                                                <img src="<?= htmlspecialchars($topic['profile_picture']) ?>" alt="User avatar">
                                            <?php else: ?>
                                                <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Default avatar">
                                            <?php endif; ?>
                                            <span><?= htmlspecialchars($topic['first_name'] . ' ' . $topic['last_name']) ?></span>
                                        </div>
                                        <div class="post-info">
                                            <span><i class="far fa-comment"></i> <?= $topic['reply_count'] ?> replies</span>
                                            <span><i class="far fa-eye"></i> <?= $topic['views'] ?> views</span>
                                            <span class="post-time"><?= time_elapsed_string($topic['created_at']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination">
                        <a href="/forum" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Forum
                        </a>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?php 
    include BASE_PATH . '/partials/footer.php'; 
    ?>

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