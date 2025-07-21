<?php
require_once __DIR__ . '/../config.php';

class ForgotPasswordController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function show() {
        $errors = $_SESSION['forgot_password_errors'] ?? [];
        $success = $_SESSION['forgot_password_success'] ?? false;
        unset($_SESSION['forgot_password_errors'], $_SESSION['forgot_password_success']);
        
        require __DIR__ . '/../../pages/auth/forgot-password.view.php';
    }

    public function handle() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/forgot-password');
        }

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }

        if (empty($errors)) {
            // Generate a simple reset code (6 digits)
            $resetCode = rand(100000, 999999);
            
            // Store in session (for demo purposes)
            $_SESSION['reset_code'] = $resetCode;
            $_SESSION['reset_email'] = $email;
            
            // Show the code to user (instead of emailing it)
            $_SESSION['forgot_password_success'] = true;
            $_SESSION['reset_code_display'] = $resetCode; // For demo display
        }

        $_SESSION['forgot_password_errors'] = $errors;
        redirect('/forgot-password');
    }
}