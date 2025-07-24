<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($event['title']) ?> - Alumni Connect</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/events.css">
    <link rel="stylesheet" href="/assets/css/event-detail.css">
</head>
<body class="dashboard">
    <!-- Simplified Header -->
    <header id="dashboard-header">
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="home.html" class="logo">
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
                                <a href="/profile">
                                    <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile picture">
                                </a>
                            <?php else: ?>
                                <a href="/profile">
                                    <img src="https://t3.ftcdn.net/jpg/06/31/16/54/360_F_631165406_6HfMsexCGHstso3udEHJmlFVzdSOevJ5.jpg" alt="Default avatar">
                                </a>
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

    <main class="dashboard-content">
        <div class="container">
            <div class="back-button">
                <a href="/events" class="btn btn-text">
                    <i class="fas fa-arrow-left"></i> Back to Events
                </a>
            </div>

            <article class="event-detail">
                <h1><?= htmlspecialchars($event['title']) ?></h1>
                
                <div class="event-meta">
                    <span>Posted by <?= htmlspecialchars($event['first_name'] . ' ' . $event['last_name']) ?></span>
                    <span>on <?= date('M j, Y', strtotime($event['created_at'])) ?></span>
                </div>

                <?php if ($event['event_date']): ?>
                    <div class="event-date">
                        <strong>When:</strong> <?= date('M j, Y g:i A', strtotime($event['event_date'])) ?>
                    </div>
                <?php endif; ?>

                <?php if ($event['location']): ?>
                    <div class="event-location">
                        <strong>Where:</strong> 
                        <?= $event['is_online'] ? 'Online - ' : '' ?>
                        <?= htmlspecialchars($event['location']) ?>
                    </div>
                <?php endif; ?>

                <div class="event-description">
                    <?= nl2br(htmlspecialchars($event['description'])) ?>
                </div>

                <?php if ($event['user_id'] == $current_user_id): ?>
                    <div class="event-actions">
                        <a href="/events/<?= $event['id'] ?>/edit" class="btn btn-primary">Edit</a>
                        <form action="/events/<?= $event['id'] ?>/delete" method="POST" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                <?php endif; ?>
            </article>
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
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#team">Team</a></li>
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
    <script src="../../assets/js/dashboard.js"></script>
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