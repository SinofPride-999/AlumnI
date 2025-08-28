<?php
require_once __DIR__ . '/../app/config.php';
require_once __DIR__ . '/../utils/helper.php';
require_once __DIR__ . '/../app/Router.php';

# ==========================
# Auto-load controllers
# ==========================
$controllers = [
    'RegisterController',
    'LoginController',
    'DashboardController',
    'LogoutController',
    'ForgotPasswordController',
    'ResetPasswordController',
    'ProfileController',
    'FindAlumniController',
    'JobsController',
    'ForumController',
    'EventController'
];

foreach ($controllers as $controller) {
    require_once __DIR__ . "/../app/controllers/{$controller}.php";
}

# ==========================
# Initialize controllers
# ==========================
$controllers = [
    'register' => new RegisterController($pdo),
    'login' => new LoginController($pdo),
    'dashboard' => new DashboardController($pdo),
    'logout' => new LogoutController($pdo),
    'forgotPassword' => new ForgotPasswordController($pdo),
    'resetPassword' => new ResetPasswordController($pdo),
    'profile' => new ProfileController($pdo),
    'findAlumni' => new FindAlumniController($pdo),
    'jobs' => new JobsController($pdo),
    'forum' => new ForumController($pdo),
    'events' => new EventController($pdo)
];

# ==========================
# Error handlers
# ==========================
Router::setErrorHandler(404, function() {
    require __DIR__ . '/../404.php';
});

Router::setErrorHandler(500, function() {
    require __DIR__ . '/../500.php';
});

# ==========================
# Index Route
# ==========================
Router::get('/', __DIR__ . '/../pages/landing-page.php');

# ==========================
# Authentication Routes
# ==========================
Router::get('/register', [$controllers['register'], 'show']);
Router::post('/register', [$controllers['register'], 'handle']);

Router::get('/login', [$controllers['login'], 'show']);
Router::post('/login', [$controllers['login'], 'handle']);

Router::post('/logout', [$controllers['logout'], 'handle']);

# ==========================
# Password Reset Route
# ==========================
Router::get('/forgot-password', [$controllers['forgotPassword'], 'show']);
Router::post('/forgot-password', [$controllers['forgotPassword'], 'handle']);

Router::get('/reset-password', [$controllers['resetPassword'], 'show']);
Router::post('/reset-password', [$controllers['resetPassword'], 'handle']);

# ==========================
# 404 Route
# ==========================
Router::get('/404', __DIR__ . '/../404.php');
Router::get('/500', __DIR__ . '/../500.php');

# ==========================
# Protected routes
# ==========================
Router::get('/dashboard', [$controllers['dashboard'], 'show']);

// Profile Routes
Router::get('/profile', [$controllers['profile'], 'show']);
Router::post('/profile/update', [$controllers['profile'], 'update']);

// Find Alumni Routes
Router::get('/find-alumni', [$controllers['findAlumni'], 'show']);
Router::post('/find-alumni', [$controllers['findAlumni'], 'show']);

// Job Routes
Router::get('/jobs', [$controllers['jobs'], 'show']);
Router::get('/jobs/create', [$controllers['jobs'], 'create']);
Router::post('/jobs/create', [$controllers['jobs'], 'create']);
Router::get('/jobs/edit/{id}', [$controllers['jobs'], 'edit']);
Router::post('/jobs/update/{id}', [$controllers['jobs'], 'update']);
Router::post('/jobs/delete/{id}', [$controllers['jobs'], 'delete']);

// Forum Routes
Router::get('/forum', [$controllers['forum'], 'index']);
Router::get('/forum/category/{id}', [$controllers['forum'], 'showCategory']);
Router::get('/forum/topic/{id}', [$controllers['forum'], 'showTopic']);
Router::get('/forum/new-topic', [$controllers['forum'], 'createTopic']);
Router::post('/forum/new-topic', [$controllers['forum'], 'createTopic']);
Router::post('/forum/topic/{id}/reply', [$controllers['forum'], 'createPost']);
Router::post('/forum/post/{id}/vote/{type}', [$controllers['forum'], 'votePost']);
Router::post('/forum/post/{id}/answer', [$controllers['forum'], 'markAsAnswer']);

// Event Routes
Router::get('/events', [$controllers['events'], 'show']);
Router::get('/events/create', [$controllers['events'], 'create']);
Router::post('/events/create', [$controllers['events'], 'create']);
Router::get('/events/{id}', [$controllers['events'], 'showDetail']);
Router::get('/events/{id}/edit', [$controllers['events'], 'edit']);
Router::post('/events/{id}/edit', [$controllers['events'], 'edit']);
Router::post('/events/{id}/delete', [$controllers['events'], 'delete']);

Router::run();

