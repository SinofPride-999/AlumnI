<?php
require_once __DIR__ . '/../config.php';

class DashboardController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function show() {
        requireAuth();

        // Get user data
        $stmt = $this->pdo->prepare("SELECT first_name, last_name, email, graduation_year, degree_program FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // User not found (shouldn't happen if session is valid)
            session_destroy();
            redirect('/login');
        }

        // Make user data available to the view
        $GLOBALS['user'] = $user;

        // Load the dashboard view
        require __DIR__ . '/../../pages/dashboard/dashboard.view.php';
    }
}
