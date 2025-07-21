<?php
require_once __DIR__ . '/../config.php';

class RegisterController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function show() {
        $errors = $_SESSION['register_errors'] ?? [];
        $formData = $_SESSION['register_data'] ?? [];
        unset($_SESSION['register_errors'], $_SESSION['register_data']);
        
        require __DIR__ . '/../../pages/auth/register.view.php';
    }

    public function handle() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/register');
        }

        // Sanitize and validate input
        $firstName = sanitizeInput($_POST['firstName']);
        $lastName = sanitizeInput($_POST['lastName']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $graduationYear = intval($_POST['graduationYear']);
        $degreeProgram = sanitizeInput($_POST['degree']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $termsAgreement = isset($_POST['termsAgreement']);

        // Validate inputs
        $errors = [];

        if (empty($firstName)) {
            $errors['firstName'] = 'First name is required';
        }

        if (empty($lastName)) {
            $errors['lastName'] = 'Last name is required';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }

        if ($graduationYear < 1900 || $graduationYear > date('Y') + 5) {
            $errors['graduationYear'] = 'Invalid graduation year';
        }

        if (empty($degreeProgram)) {
            $errors['degree'] = 'Degree program is required';
        }

        if (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters';
        }

        if ($password !== $confirmPassword) {
            $errors['confirmPassword'] = 'Passwords do not match';
        }

        if (!$termsAgreement) {
            $errors['general'] = 'You must agree to the terms and conditions';
        }

        // Check if email already exists
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors['email'] = 'Email already registered';
        }

        // If no errors, proceed with registration
        if (empty($errors)) {
            $passwordHash = password_hash($password, PASSWORD_ALGO, PASSWORD_OPTIONS);

            $stmt = $this->pdo->prepare("INSERT INTO users (first_name, last_name, email, graduation_year, degree_program, password_hash) 
                                       VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$firstName, $lastName, $email, $graduationYear, $degreeProgram, $passwordHash]);

            // Get the new user ID
            $userId = $this->pdo->lastInsertId();

            // Set session variables
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $firstName . ' ' . $lastName;

            // Redirect to login
            redirect('/login');
        }

        // If there are errors, pass them back to the view
        $_SESSION['register_errors'] = $errors;
        $_SESSION['register_data'] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'graduationYear' => $graduationYear,
            'degree' => $degreeProgram
        ];
        
        redirect('/register');
    }
}