<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <style>
      /* Job cards in dashboard */
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
    </style>
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

    <!-- Main Content -->
    <main class="dashboard-content">
        <div class="container">
            <!-- Welcome Section -->
            <section class="welcome-section">
                <h1>Welcome, <span><?= htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8') ?></span></h1>
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
                    <a href="/dashboard" class="action-card">
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
                    <a href="events.html" class="view-all">View All</a>
                </div>
                
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">15</span>
                        <span class="month">Jun</span>
                    </div>
                    <div class="event-details">
                        <h3>Annual Alumni Reunion</h3>
                        <p class="event-meta">
                            <i class="fas fa-map-marker-alt"></i> Campus Auditorium
                            <i class="fas fa-clock"></i> 5:00 PM
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">RSVP</a>
                            <a href="#" class="btn btn-text">Details</a>
                        </div>
                    </div>
                </div>
                
                <div class="event-card">
                    <div class="event-date">
                        <span class="day">22</span>
                        <span class="month">Jun</span>
                    </div>
                    <div class="event-details">
                        <h3>Career Networking Workshop</h3>
                        <p class="event-meta">
                            <i class="fas fa-video"></i> Online
                            <i class="fas fa-clock"></i> 6:00 PM
                        </p>
                        <div class="event-actions">
                            <a href="#" class="btn btn-primary">Register</a>
                            <a href="#" class="btn btn-text">Details</a>
                        </div>
                    </div>
                </div>
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