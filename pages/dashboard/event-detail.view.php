<?php
require_once __DIR__ . '/../../utils/time.php';
require_once dirname(__DIR__, 2) . '/app/config.php';

$title = htmlspecialchars($event['title']) . ' - Alumni Connect';

$styles = [
    '/assets/css/index.css',
    '/assets/css/dashboard.css',
    '/assets/css/events.css',
    '/assets/css/event-detail.css',
];

$inlineStyle = '';

include BASE_PATH . '/layouts/head.layout.php';
?>

<body class="dashboard">
    <!-- Simplified Header -->
    <?php
    require_once dirname(__DIR__, 2) . '/app/config.php';
    include BASE_PATH . '/partials/nav.php'; 
    ?>

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

                <?php if ($event['location']): ?>
                    <div class="event-location">
                        <strong>Where:</strong> 
                        <?= $event['is_online'] ? 'Online - ' : '' ?>
                        <?= htmlspecialchars($event['location']) ?>
                    </div>
                <?php endif; ?>

                <?php if ($event['event_date']): ?>
                    <div class="event-location">
                        <strong>When:</strong> <?= date('M j, Y g:i A', strtotime($event['event_date'])) ?>
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
    <?php 
    include BASE_PATH . '/partials/footer.php'; 
    ?>

    <!-- JavaScript -->
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
</body>
</html>
