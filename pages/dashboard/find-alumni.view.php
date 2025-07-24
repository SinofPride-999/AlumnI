<?php
require_once dirname(__DIR__, 2) . '/app/config.php';

$title = 'Find Alumni - Alumni Connect';

$styles = [
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
    '/assets/css/index.css',
    '/assets/css/find-alumni.css',
    '/assets/css/dashboard.css',
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
    <?php 
    include BASE_PATH . '/partials/footer.php'; 
    ?>

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