<?php
require_once __DIR__ . '/Controller.php';

class DashboardController extends Controller {
    public function show() {
        requireAuth();
        
        try {
            // Get the latest 2 active jobs
            $stmt = $this->pdo->prepare("
                SELECT j.*, u.first_name, u.last_name, u.profile_picture 
                FROM jobs j
                JOIN users u ON j.user_id = u.id
                WHERE j.is_active = TRUE
                ORDER BY j.created_at DESC
                LIMIT 2
            ");
            $stmt->execute();
            $latestJobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $this->renderView('pages/dashboard/dashboard.view.php', [
                'latestJobs' => $latestJobs,
                'current_user_id' => $_SESSION['user_id']
            ]);
            
        } catch (PDOException $e) {
            error_log("Dashboard error: " . $e->getMessage());
            // Still render the dashboard even if jobs fail to load
            $this->renderView('pages/dashboard/dashboard.view.php', [
                'latestJobs' => []
            ]);
        }
    }
}