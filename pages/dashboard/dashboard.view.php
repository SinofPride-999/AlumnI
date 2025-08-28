<?php
require_once __DIR__ . '/../../utils/time.php';
require_once dirname(__DIR__, 2) . '/app/config.php';

$title = "Dashboard - Alumni Connect";

$styles = [
    '/assets/css/dashboard.css',
];

$inlineStyle = <<<STYLE
.job-card {
    background-color: var(--color-card-bg);
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: var(--shadow);
}
.job-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}
.job-header img {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    object-fit: cover;
}
.job-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}
.posted-date {
    font-size: 0.9rem;
    opacity: 0.7;
}
.job-actions {
    display: flex;
    gap: 1rem;
}
STYLE;

include BASE_PATH . '/layouts/head.layout.php';
?>

<body class="dashboard">
    <!-- Simplified Header -->
    <?php
    require_once dirname(__DIR__, 2) . '/app/config.php';
    include BASE_PATH . '/partials/nav.php'; 
    ?>

    <!-- Main Content -->
    <main class="dashboard-content">
        <div class="container">
            <!-- Welcome Section -->
            <section class="welcome-section">
                <h1><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name'], ENT_QUOTES, 'UTF-8') ?></h1>
                <div class="profile-completion">
                    <div class="completion-message">
                        <p>Your profile is <strong><?= $profileCompletion ?>% complete</strong></p>
                        <div class="completion-bar">
                            <div class="progress" style="width: <?= $profileCompletion ?>%"></div>
                        </div>
                    </div>
                    <a href="/profile" class="btn btn-primary">Complete Profile</a>
                </div>
            </section>

            <!-- Quick Actions -->
            <section class="quick-actions">
                <h2 class="section-title">Quick Actions</h2>
                <div class="action-grid">
                    <a href="/events" class="action-card">
                        <i class="fas fa-calendar-alt"></i>
                        <span>View Events</span>
                    </a>
                    <a href="/jobs" class="action-card">
                        <i class="fas fa-briefcase"></i>
                        <span>Job Board</span>
                    </a>
                    <a href="/forum" class="action-card">
                        <i class="fas fa-comments"></i>
                        <span>Forum</span>
                    </a>
                    <a href="/find-alumni" class="action-card">
                        <i class="fas fa-user-plus"></i>
                        <span>Find Alumni</span>
                    </a>
                </div>
            </section>

            <!-- Upcoming Events -->
            <section class="upcoming-events">
                <div class="section-header">
                    <h2 class="section-title">Upcoming Events</h2>
                    <a href="/events" class="view-all">View All</a>
                </div>
                
                <?php if (!empty($upcomingEvents)): ?>
                    <?php foreach ($upcomingEvents as $event): ?>
                        <div class="event-card">
                            <div class="event-date">
                                <span class="day"><?= date('d', strtotime($event['event_date'])) ?></span>
                                <span class="month"><?= date('M', strtotime($event['event_date'])) ?></span>
                            </div>
                            <div class="event-details">
                                <h3><?= htmlspecialchars($event['title'] ?? '') ?></h3>
                                <p class="event-meta">
                                    <?php if ($event['is_online']): ?>
                                        <i class="fas fa-video"></i> Online
                                    <?php else: ?>
                                        <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($event['location'] ?? '') ?>
                                    <?php endif; ?>
                                    <i class="fas fa-clock"></i> <?= date('g:i A', strtotime($event['event_date'])) ?>
                                </p>
                                <div class="event-actions">
                                    <a href="/events/<?= $event['id'] ?>" class="btn btn-primary">Apply</a>
                                    <a href="/events/<?= $event['id'] ?>" class="btn btn-text">Details</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info">No upcoming events scheduled.</div>
                <?php endif; ?>
            </section>

            <!-- Recent Job Postings -->
            <section class="job-postings">
                <div class="section-header">
                    <h2 class="section-title">Job Opportunities</h2>
                    <a href="/jobs" class="view-all">View All</a>
                </div>
                
                <?php if (empty($latestJobs)): ?>
                    <div class="alert alert-info">No recent job postings found.</div>
                <?php else: ?>
                    <?php foreach ($latestJobs as $job): ?>
                        <div class="job-card">
                            <div class="job-header">
                                <?php if (!empty($job['profile_picture'])): ?>
                                    <img src="<?= htmlspecialchars($job['profile_picture']) ?>" alt="Company logo">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/50" alt="Default company logo">
                                <?php endif; ?>
                                <div>
                                    <h3><?= htmlspecialchars($job['title']) ?></h3>
                                    <p class="company"><?= htmlspecialchars($job['company']) ?> · <?= htmlspecialchars($job['location']) ?></p>
                                </div>
                            </div>
                            <div class="job-meta">
                                <span class="badge"><?= htmlspecialchars($job['job_type']) ?></span>
                                <span class="posted-date">Posted <?= time_elapsed_string($job['created_at']) ?></span>
                            </div>
                            <div class="job-actions">
                                <?php if ($job['user_id'] == $current_user_id): ?>
                                    <!-- Show edit/view for job creator -->
                                    <a href="/jobs/edit/<?= $job['id'] ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                <?php else: ?>
                                    <!-- Show apply button for other users -->
                                    <?php if (!empty($job['application_url'])): ?>
                                        <a href="<?= htmlspecialchars($job['application_url']) ?>" class="btn btn-primary" target="_blank">
                                            <i class="fas fa-paper-plane"></i> Apply
                                        </a>
                                    <?php elseif (!empty($job['application_email'])): ?>
                                        <a href="mailto:<?= htmlspecialchars($job['application_email']) ?>" class="btn btn-primary">
                                            <i class="fas fa-envelope"></i> Apply
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <a href="/jobs#job-<?= $job['id'] ?>" class="btn btn-text">Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>

            <!-- Recent Forum Posts -->
            <section class="recent-forum-posts">
                <div class="section-header">
                    <h2 class="section-title">Recent Forum Discussions</h2>
                    <a href="/forum" class="view-all">View All</a>
                </div>
                
                <?php if (empty($latestForumPosts)): ?>
                    <div class="alert alert-info">No recent forum discussions found.</div>
                <?php else: ?>
                    <?php foreach ($latestForumPosts as $post): ?>
                        <div class="forum-post-card">
                            <div class="post-header">
                                <span class="category-badge <?= strtolower(str_replace(' ', '-', $post['category_name'])) ?>">
                                    <?= htmlspecialchars($post['category_name']) ?>
                                </span>
                                <h3><a href="/forum/topic/<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h3>
                            </div>
                            <div class="post-meta">
                                <div class="author-info">
                                    <?php if (!empty($post['profile_picture'])): ?>
                                        <img src="<?= htmlspecialchars($post['profile_picture']) ?>" alt="User avatar">
                                    <?php else: ?>
                                        <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Default avatar">
                                    <?php endif; ?>
                                    <span><?= htmlspecialchars($post['first_name'] . ' ' . $post['last_name']) ?></span>
                                </div>
                                <div class="post-info">
                                    <span><i class="far fa-comment"></i> <?= $post['reply_count'] ?> replies</span>
                                    <span class="post-time"><?= time_elapsed_string($post['created_at']) ?></span>
                                </div>
                            </div>
                            <div class="post-excerpt">
                                <?= htmlspecialchars(substr($post['content'], 0, 150)) ?><?= strlen($post['content']) > 150 ? '...' : '' ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
    <script src="../../assets/js/dashboard.js"></script>
</body>
</html>
