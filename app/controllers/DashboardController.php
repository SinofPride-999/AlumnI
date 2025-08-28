<?php
require_once __DIR__ . '/Controller.php';

class DashboardController extends Controller {
    public function show() {
        requireAuth();
        
        try {
            // Latest 5 active jobs
            $stmt = $this->pdo->prepare("
                SELECT j.*, u.first_name, u.last_name, u.profile_picture 
                FROM jobs j
                JOIN users u ON j.user_id = u.id
                WHERE j.is_active = TRUE
                ORDER BY j.created_at DESC
                LIMIT 3
            ");
            $stmt->execute();
            $latestJobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Upcoming 5 events
            $stmt = $this->pdo->prepare("
                SELECT e.*, u.first_name, u.last_name, u.profile_picture
                FROM events e
                JOIN users u ON e.user_id = u.id
                WHERE e.event_date >= NOW()
                ORDER BY e.event_date ASC
                LIMIT 3
            ");
            $stmt->execute();
            $upcomingEvents = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Latest 5 forum posts with category & reply count
            $stmt = $this->pdo->prepare("
                SELECT f.*, c.name AS category_name, u.first_name, u.last_name, u.profile_picture,
                      (SELECT COUNT(*) FROM forum_posts p WHERE p.topic_id = f.id) AS reply_count
                FROM forum_topics f
                JOIN users u ON f.user_id = u.id
                JOIN forum_categories c ON f.category_id = c.id
                ORDER BY f.created_at DESC
                LIMIT 3
            ");
            $stmt->execute();
            $latestForumPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $this->renderView('pages/dashboard/dashboard.view.php', [
                'latestJobs' => $latestJobs,
                'upcomingEvents' => $upcomingEvents,
                'latestForumPosts' => $latestForumPosts,
                'current_user_id' => $_SESSION['user_id']
            ]);
            
        } catch (PDOException $e) {
            error_log("Dashboard error: " . $e->getMessage());
            $this->renderView('pages/dashboard/dashboard.view.php', [
                'latestJobs' => [],
                'upcomingEvents' => [],
                'latestForumPosts' => [],
                'current_user_id' => $_SESSION['user_id']
            ]);
        }
    }
}
