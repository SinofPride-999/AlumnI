<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Alumni - Alumni Connect</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="../../assets/css/find-alumni.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body class="dashboard">
    <!-- Header -->
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
    <main class="find-alumni-content">
        <div class="container">
          <!-- Page Header -->
          <section class="page-header">
              <div class="header-content">
                  <h1>Find Alumni</h1>
                  <p>Connect with fellow graduates based on graduation year, industry, location, and more</p>
              </div>
          </section>

          <!-- Search Filters -->
          <section class="search-filters">
              <form method="GET" action="/find-alumni" class="search-bar" id="searchForm">
                  <input type="text" name="search" placeholder="Search by name or email" 
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                  <button type="submit" class="btn btn-primary">
                      <i class="fas fa-search"></i> Search
                  </button>
              </form>
          </section>

          <!-- Alumni Results -->
          <section class="alumni-results">
              <div class="results-header">
                  <h2><?= $totalAlumni ?? 0 ?> Alumni Found</h2>
              </div>
              
              <div class="alumni-grid">
                  <?php if (!empty($alumni)): ?>
                      <?php foreach ($alumni as $alumnus): ?>
                          <div class="alumni-card">
                              <div class="alumni-avatar">
                                  <img src="<?= htmlspecialchars($alumnus['profile_picture'] ?? 'default.jpg') ?>">
                              </div>
                              <div class="alumni-info">
                                  <h3><?= htmlspecialchars($alumnus['first_name'] . ' ' . $alumnus['last_name']) ?></h3>
                                  <p><?= htmlspecialchars($alumnus['email']) ?></p>
                              </div>
                          </div>
                      <?php endforeach; ?>
                  <?php else: ?>
                      <div class="no-results">
                          <p>No alumni found <?= !empty($search) ? 'for "' . htmlspecialchars($search) . '"' : '' ?></p>
                      </div>
                  <?php endif; ?>
              </div>
              
              <!-- Loading indicator for infinite scroll -->
              <div id="loadingIndicator" style="text-align: center; display: none; margin: 20px 0;">
                  <i class="fas fa-spinner fa-spin"></i> Loading more alumni...
              </div>
              
              <!-- Regular pagination (hidden if using infinite scroll) -->
              <div class="pagination" id="paginationControls">
                  <?php if (($totalPages ?? 1) > 1): ?>
                      <?php if (($currentPage ?? 1) > 1): ?>
                          <a href="/find-alumni?<?= http_build_query(array_merge($_GET, ['page' => $currentPage - 1])) ?>" class="btn btn-text">
                              <i class="fas fa-chevron-left"></i> Previous
                          </a>
                      <?php else: ?>
                          <button class="btn btn-text" disabled>
                              <i class="fas fa-chevron-left"></i> Previous
                          </button>
                      <?php endif; ?>
                      
                      <div class="page-numbers">
                          <?php for ($i = 1; $i <= ($totalPages ?? 1); $i++): ?>
                              <a href="/find-alumni?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>" class="btn btn-text <?= $i == ($currentPage ?? 1) ? 'active' : '' ?>">
                                  <?= $i ?>
                              </a>
                          <?php endfor; ?>
                      </div>
                      
                      <?php if (($currentPage ?? 1) < ($totalPages ?? 1)): ?>
                          <a href="/find-alumni?<?= http_build_query(array_merge($_GET, ['page' => $currentPage + 1])) ?>" class="btn btn-text">
                              Next <i class="fas fa-chevron-right"></i>
                          </a>
                      <?php else: ?>
                          <button class="btn btn-text" disabled>
                              Next <i class="fas fa-chevron-right"></i>
                          </button>
                      <?php endif; ?>
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
                        <li><a href="/find-alumni">Find Alumni</a></li>
                        <li><a href="/events">Events</a></li>
                        <li><a href="/jobs">Job Board</a></li>
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
    <script src="../../assets/js/find-alumni.js"></script>
    
    <script>
      // Message button functionality
      document.querySelectorAll('.message-btn').forEach(button => {
          button.addEventListener('click', function() {
              const userId = this.getAttribute('data-userid');
              // In a real implementation, this would open a messaging interface
              alert('Messaging feature coming soon! Would message user ID: ' + userId);
          });
      });
    </script>

    <!-- JavaScript for infinite scroll -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alumniGrid = document.getElementById('alumniGrid');
            const loadingIndicator = document.getElementById('loadingIndicator');
            const paginationControls = document.getElementById('paginationControls');
            const searchForm = document.getElementById('searchForm');
            let currentPage = <?= $currentPage ?? 1 ?>;
            let totalPages = <?= $totalPages ?? 1 ?>;
            let isLoading = false;
            
            // Hide regular pagination if we're using infinite scroll
            paginationControls.style.display = 'none';
            
            // Infinite scroll handler
            window.addEventListener('scroll', function() {
                if (isLoading || currentPage >= totalPages) return;
                
                // Check if we've scrolled near the bottom
                if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
                    loadMoreAlumni();
                }
            });
            
            function loadMoreAlumni() {
                isLoading = true;
                currentPage++;
                loadingIndicator.style.display = 'block';
                
                // Get current search parameters
                const formData = new FormData(searchForm);
                const searchParams = new URLSearchParams(formData);
                searchParams.set('page', currentPage);
                
                fetch(`/find-alumni?${searchParams.toString()}`)
                    .then(response => response.text())
                    .then(html => {
                        // Parse the response to extract alumni cards
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newAlumni = doc.querySelectorAll('.alumni-card');
                        
                        if (newAlumni.length > 0) {
                            newAlumni.forEach(card => {
                                alumniGrid.appendChild(card);
                            });
                        }
                        
                        // Update pagination info from the response if available
                        const newPageInfo = doc.querySelector('.pagination');
                        if (newPageInfo) {
                            totalPages = parseInt(newPageInfo.dataset.totalPages) || totalPages;
                        }
                    })
                    .catch(error => {
                        console.error('Error loading more alumni:', error);
                        currentPage--; // Revert page increment on error
                    })
                    .finally(() => {
                        isLoading = false;
                        loadingIndicator.style.display = 'none';
                    });
            }
            
            // Search form submission handler
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                currentPage = 1; // Reset to first page on new search
                
                // Submit form normally (will reload the page with new results)
                this.submit();
            });
        });
    </script>
</body>
</html>