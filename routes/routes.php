<?php
require_once __DIR__ . '/../app/config.php';
require_once __DIR__ . '/../app/Router.php';

// Auto-load controllers
$controllers = [
    'RegisterController',
    'LoginController',
    'DashboardController',
    'LogoutController',
    'ForgotPasswordController',
    'ResetPasswordController'
];

foreach ($controllers as $controller) {
    require_once __DIR__ . "/../app/controllers/{$controller}.php";
}

// Initialize controllers
$controllers = [
    'register' => new RegisterController($pdo),
    'login' => new LoginController($pdo),
    'dashboard' => new DashboardController($pdo),
    'logout' => new LogoutController($pdo),
    'forgotPassword' => new ForgotPasswordController($pdo),
    'resetPassword' => new ResetPasswordController($pdo)
];

// Error handlers - CHANGED FROM error() TO setErrorHandler()
Router::setErrorHandler(404, function() {
    require __DIR__ . '/../404.php';
});

// Router::setErrorHandler(500, function() {
//     require __DIR__ . '/../pages/500.php';
// });

// Index Route
Router::get('/', __DIR__ . '/../pages/landing-page.php');

// Authentication Routes
Router::get('/register', [$controllers['register'], 'show']);
Router::post('/register', [$controllers['register'], 'handle']);

Router::get('/login', [$controllers['login'], 'show']);
Router::post('/login', [$controllers['login'], 'handle']);

Router::get('/logout', [$controllers['logout'], 'handle']);


// Password Reset Route
Router::get('/forgot-password', [$controllers['forgotPassword'], 'show']);
Router::post('/forgot-password', [$controllers['forgotPassword'], 'handle']);

Router::get('/reset-password', [$controllers['resetPassword'], 'show']);
Router::post('/reset-password', [$controllers['resetPassword'], 'handle']);

// 404 Route
Router::get('/404', __DIR__ . '/../pages/404.php');

// Protected routes
Router::get('/dashboard', [$controllers['dashboard'], 'show']);



Router::run();