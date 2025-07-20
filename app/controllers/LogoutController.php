<?php
require_once __DIR__ . '/../config.php';

class LogoutController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function handle() {
      // Clear user data from database if remember me was used
      if (isset($_SESSION['user_id'])) {
          $stmt = $this->pdo->prepare("UPDATE users SET remember_token = NULL, token_expires = NULL WHERE id = ?");
          $stmt->execute([$_SESSION['user_id']]);
      }

      // Unset all session variables
      $_SESSION = array();

      // Delete session cookie
      if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
          );
      }

      // Destroy the session
      session_destroy();

      // Delete remember me cookie if it exists
      if (isset($_COOKIE['remember_token'])) {
          setcookie('remember_token', '', time() - 3600, '/');
      }

      // Redirect to login page
      header("Location: /login");
      exit; // Ensure no further code is executed
    }
}