<?php
require_once __DIR__ . '/Controller.php';

class FindAlumniController extends Controller {
    public function show() {
        requireAuth();
        
        try {
            $query = "SELECT id, first_name, last_name, email, profile_picture 
                      FROM users WHERE id != ?";
            $params = [$_SESSION['user_id']];
            
            if (!empty($_GET['search'])) {
                $query .= " AND (first_name LIKE ? OR last_name LIKE ? OR email LIKE ?)";
                $params = array_merge($params, [
                    "%{$_GET['search']}%",
                    "%{$_GET['search']}%", 
                    "%{$_GET['search']}%"
                ]);
            }
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            $alumni = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Check if this is a real-time AJAX request
            if (!empty($_GET['realtime']) && $_GET['realtime'] === 'true') {
                // For AJAX requests, return only the necessary HTML
                ob_start();
                include BASE_PATH . '/partials/alumni-grid.php';
                $html = ob_get_clean();
                echo $html;
                exit;
            }
            
            // Regular page load
            $this->renderView('pages/dashboard/find-alumni.view.php', [
                'alumni' => $alumni,
                'totalAlumni' => count($alumni),
                'search' => $_GET['search'] ?? ''
            ]);
            
        } catch (PDOException $e) {
            error_log("Search error: " . $e->getMessage());
            
            if (!empty($_GET['realtime']) && $_GET['realtime'] === 'true') {
                echo '<div class="no-results"><p>Search temporarily unavailable</p></div>';
                exit;
            }
            
            $this->renderView('pages/dashboard/find-alumni.view.php', [
                'alumni' => [],
                'totalAlumni' => 0,
                'error' => "Search temporarily unavailable"
            ]);
        }
    }
}