<?php
require_once __DIR__ . '/Controller.php';

class DashboardController extends Controller {
    public function show() {
        requireAuth();
        
        try {
            // Get the latest 2 active jobs (existing code)
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
            
            // Get upcoming events (new code)
            $stmt = $this->pdo->prepare("
                SELECT e.*, u.first_name, u.last_name, u.profile_picture
                FROM events e
                JOIN users u ON e.user_id = u.id
                WHERE e.event_date >= NOW()
                ORDER BY e.event_date ASC
                LIMIT 2
            ");
            $stmt->execute();
            $upcomingEvents = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $this->renderView('pages/dashboard/dashboard.view.php', [
                'latestJobs' => $latestJobs,
                'upcomingEvents' => $upcomingEvents,
                'current_user_id' => $_SESSION['user_id']
            ]);
            
        } catch (PDOException $e) {
            error_log("Dashboard error: " . $e->getMessage());
            // Still render the dashboard even if data fails to load
            $this->renderView('pages/dashboard/dashboard.view.php', [
                'latestJobs' => [],
                'upcomingEvents' => []
            ]);
        }
    }
}