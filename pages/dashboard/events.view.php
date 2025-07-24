<?php
require_once __DIR__ . '/../../utils/time.php';
require_once dirname(__DIR__, 2) . '/app/config.php';

$title = 'Events - Alumni Connect';

$styles = [
    '/assets/css/index.css',
    '/assets/css/dashboard.css',
    '/assets/css/events.css',
];

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
            <section class="page-header">
                <h1>Event Announcements</h1>
                <a href="/events/create" class="btn btn-primary">Create Announcement</a>
            </section>

            <?php if (!empty($events)): ?>
                <div class="events-list">
                    <?php foreach ($events as $event): ?>
                        <div class="event-card">
                            <h3><?= htmlspecialchars($event['title']) ?></h3>
                            <p><?= htmlspecialchars(substr($event['description'], 0, 100)) ?><?= strlen($event['description']) > 100 ? '...' : '' ?></p>
                            <div class="event-meta">
                                <span>Posted by <?= htmlspecialchars($event['first_name'] . ' ' . $event['last_name']) ?></span>
                                <span>on <?= date('M j, Y', strtotime($event['created_at'])) ?></span>
                            </div>
                            <div class="event-actions">
                                <a href="/events/<?= $event['id'] ?>" class="btn btn-text">View Details</a>
                                <?php if ($event['user_id'] == $current_user_id): ?>
                                    <a href="/events/<?= $event['id'] ?>/edit" class="btn btn-text">Edit</a>
                                    <form action="/events/<?= $event['id'] ?>/delete" method="POST" style="display: inline;">
                                        <button type="submit" class="btn btn-text btn-danger">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No event announcements yet.</p>
            <?php endif; ?>
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
