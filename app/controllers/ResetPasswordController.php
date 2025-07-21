<?php
require_once __DIR__ . '/../config.php';

class ResetPasswordController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function show() {
        $errors = $_SESSION['reset_errors'] ?? [];
        unset($_SESSION['reset_errors']);
        
        require __DIR__ . '/../../pages/auth/reset-password.view.php';
    }

    public function handle() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/forgot-password');
        }

        $code = $_POST['code'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = [];

        // Simple validation
        if ($code != ($_SESSION['reset_code'] ?? '')) {
            $errors['code'] = 'Invalid reset code';
        }

        if ($email != ($_SESSION['reset_email'] ?? '')) {
            $errors['email'] = 'Email mismatch';
        }

        if (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters';
        }

        if (empty($errors)) {
            // Update password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("UPDATE users SET password_hash = ? WHERE email = ?");
            $stmt->execute([$passwordHash, $email]);
            
            // Clear reset data
            unset($_SESSION['reset_code'], $_SESSION['reset_email']);
            
            $_SESSION['reset_success'] = true;
            redirect('/login');
        }

        $_SESSION['reset_errors'] = $errors;
        redirect('/reset-password');
    }
}