<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/jobs.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
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
                <h1>Alumni Job Board</h1>
                <p>Discover career opportunities posted by fellow alumni and recruiters</p>
            </section>

            <!-- Job Search Filters -->
            <section class="job-filters">
                <form method="get" action="/jobs" class="search-bar">
                    <input type="text" name="search" placeholder="Search for jobs, companies, or keywords" 
                           value="<?= htmlspecialchars($search ?? '') ?>">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                </form>
                
                <form method="get" action="/jobs" class="filter-options">
                    <div class="filter-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat) ?>" 
                                    <?= ($category ?? '') === $cat ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="technology">Technology:</label>
                        <select id="technology" name="technology">
                            <option value="">All Technologies</option>
                            <?php foreach ($technologies as $tech): ?>
                                <option value="<?= htmlspecialchars($tech) ?>" 
                                    <?= ($technology ?? '') === $tech ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($tech) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <a href="/jobs" class="btn btn-secondary" id="resetFilters">
                        <i class="fas fa-sync-alt"></i> Reset
                    </a>
                </form>
            </section>

            <!-- Job Listings -->
            <section class="job-listings">
                <div class="listings-header">
                    <h2 class="section-title">Available Positions</h2>
                    <div class="sort-options">
                        <a href="/jobs/create" class="btn btn-success">
                            <i class="fas fa-plus"></i> Post a Job
                        </a>
                    </div>
                </div>
                
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php elseif (empty($jobs)): ?>
                    <div class="alert alert-info">No jobs found matching your criteria.</div>
                <?php else: ?>
                    <div class="job-list">
                        <?php foreach ($jobs as $job): ?>
                            <div class="job-listing">
                                <div class="job-header">
                                    <?php if (!empty($job['profile_picture'])): ?>
                                        <img src="<?= htmlspecialchars($job['profile_picture']) ?>" alt="User profile picture">
                                    <?php else: ?>
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Default profile picture">
                                    <?php endif; ?>
                                    <div class="job-title">
                                        <h3><?= htmlspecialchars($job['title']) ?></h3>
                                        <p class="company"><?= htmlspecialchars($job['company']) ?> · <?= htmlspecialchars($job['location']) ?></p>
                                        <div class="job-meta">
                                            <span class="badge <?= strtolower(str_replace(' ', '-', $job['job_type'])) ?>">
                                                <?= htmlspecialchars($job['job_type']) ?>
                                            </span>
                                            <span class="badge <?= strtolower($job['category']) ?>">
                                                <?= htmlspecialchars($job['category']) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="job-description">
                                    <p><?= nl2br(htmlspecialchars($job['description'])) ?></p>
                                    <?php if (!empty($job['requirements'])): ?>
                                        <h5>Requirements:</h5>
                                        <p><?= nl2br(htmlspecialchars($job['requirements'])) ?></p>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($job['technologies'])): ?>
                                        <div class="skills">
                                            <?php 
                                            $techs = explode(',', $job['technologies']);
                                            foreach ($techs as $tech): 
                                                $tech = trim($tech);
                                                if (!empty($tech)):
                                            ?>
                                                <span class="skill-tag"><?= htmlspecialchars($tech) ?></span>
                                            <?php 
                                                endif;
                                            endforeach; 
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="job-footer">
                                    <div class="job-posted">
                                        <i class="fas fa-clock"></i> 
                                        Posted <?= time_elapsed_string($job['created_at']) ?> by 
                                        <?= htmlspecialchars($job['first_name'] . ' ' . $job['last_name']) ?>
                                        <?php if (!empty($job['salary_range'])): ?>
                                            <span class="salary"> | Salary: <?= htmlspecialchars($job['salary_range']) ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="job-actions">
                                      <?php if ($job['user_id'] == $current_user_id): ?>
                                          <!-- Show edit and delete for job creator -->
                                          <a href="/jobs/edit/<?= $job['id'] ?>" class="btn btn-primary">
                                              <i class="fas fa-edit"></i> Edit
                                          </a>
                                          <form action="/jobs/delete/<?= $job['id'] ?>" method="POST" style="display: inline;">
                                              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this job posting?')">
                                                  <i class="fas fa-trash"></i> Delete
                                              </button>
                                          </form>
                                      <?php else: ?>
                                          <!-- Show apply button for other users -->
                                          <?php if (!empty($job['application_url'])): ?>
                                              <a href="<?= htmlspecialchars($job['application_url']) ?>" class="btn btn-primary" target="_blank">
                                                  <i class="fas fa-paper-plane"></i> Apply Now
                                              </a>
                                          <?php elseif (!empty($job['application_email'])): ?>
                                              <a href="mailto:<?= htmlspecialchars($job['application_email']) ?>" class="btn btn-primary">
                                                  <i class="fas fa-envelope"></i> Apply via Email
                                              </a>
                                          <?php endif; ?>
                                      <?php endif; ?>
                                  </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
    <script src="../../assets/js/jobs.js"></script>
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
