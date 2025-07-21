<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../traits/ProfileCompletionTrait.php';

class Controller {
    use ProfileCompletionTrait;
    
    protected $pdo;
    protected $user;
    protected $viewData = [];

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->loadUserData();
    }

    protected function loadUserData() {
        if (!isset($_SESSION['user_id'])) {
            return;
        }

        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $this->user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$this->user) {
                session_destroy();
                redirect('/login');
            }

            // Calculate profile completion
            $this->viewData['profileCompletion'] = $this->calculateProfileCompletion($this->user);
            $this->viewData['user'] = $this->user;

            // Make it globally available
            $GLOBALS['auth_user'] = $this->user;

        } catch (Exception $e) {
            error_log("Error loading user data: " . $e->getMessage());
            session_destroy();
            redirect('/login');
        }
    }

     protected function renderView($viewPath, $additionalData = []) {
        // Merge additional data with base view data
        $viewData = array_merge($this->viewData, $additionalData);
        
        // Extract variables for the view
        extract($viewData);
        
        // Require the view file
        require __DIR__ . '/../../' . $viewPath;
    }
}