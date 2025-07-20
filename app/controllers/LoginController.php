<?php
require_once __DIR__ . '/../config.php';

class LoginController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function show() {
        // Display any errors from previous attempts
        $errors = $_SESSION['login_errors'] ?? [];
        $formData = $_SESSION['login_data'] ?? [];
        unset($_SESSION['login_errors'], $_SESSION['login_data']);

        // Include the view file
        require __DIR__ . '/../../pages/auth/login.view.php';
    }

    public function handle() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/login');
        }

        // Sanitize and validate input
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $rememberMe = isset($_POST['rememberMe']);

        // Validate inputs
        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required';
        }

        // If no validation errors, check credentials
        if (empty($errors)) {
            $stmt = $this->pdo->prepare("SELECT id, first_name, last_name, password_hash FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_hash'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];

                // Remember me functionality
                if ($rememberMe) {
                    $this->setRememberMe($user['id']);
                }

                // Redirect to dashboard
                redirect('/dashboard');
            } else {
                $errors['login'] = 'Invalid email or password';
            }
        }

        // If there are errors, pass them back to the view
        $_SESSION['login_errors'] = $errors;
        $_SESSION['login_data'] = ['email' => $email];
        
        redirect('/login');
    }

    private function setRememberMe($userId) {
        $newToken = bin2hex(random_bytes(32));
        $expires = time() + 60 * 60 * 24 * 30; // 30 days
        
        $stmt = $this->pdo->prepare("UPDATE users SET remember_token = ?, token_expires = ? WHERE id = ?");
        $stmt->execute([$newToken, date('Y-m-d H:i:s', $expires), $userId]);
        
        setcookie('remember_token', $newToken, $expires, '/');
    }
}