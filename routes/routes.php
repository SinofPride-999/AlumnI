<?php 
require_once __DIR__ . '/../app/config.php';
require_once __DIR__ . '/../app/Router.php';
require_once __DIR__ . '/../app/controllers/RegisterController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';
require_once __DIR__ . '/../app/controllers/LogoutController.php';

// Initialize controllers
$registerController = new RegisterController($pdo);
$loginController = new LoginController($pdo);
$dashboardController = new DashboardController($pdo);
$logoutController = new LogoutController($pdo);

// Routes
Router::handle('/', __DIR__ . '/../pages/landing-page.php');

Router::handle('/register', function() use ($registerController) {
    $registerController->show();
});
Router::handle('/login', function() use ($loginController) {
    $loginController->show();
});
Router::handle('/login/post', function() use ($loginController) {
    $loginController->handle();
});
Router::handle('/register/post', function() use ($registerController) {
    $registerController->handle();
});
Router::handle('/logout', function() use ($logoutController) {
    $logoutController->handle();
});

Router::handle('/dashboard', function() use ($dashboardController) {
    $dashboardController->show();
});

Router::handle('/404', __DIR__ . '/../404.php');


Router::run();