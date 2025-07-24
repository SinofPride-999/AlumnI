<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '231046');
define('DB_NAME', 'current_alumni_db');

// Session configuration
define('SESSION_NAME', 'ALUMNI_SESS');
define('SESSION_LIFETIME', 86400); // 1 day in seconds

// Security configuration
define('PASSWORD_ALGO', PASSWORD_BCRYPT);
define('PASSWORD_OPTIONS', ['cost' => 12]);

// Start session
session_name(SESSION_NAME);
session_set_cookie_params(SESSION_LIFETIME, '/');
session_start();

define('DEBUG_MODE', true); // Set to false in production

// Base path for includes
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

// Database connection 
include BASE_PATH . '/database/connection.php';

// Helper functions
include BASE_PATH . '/utils/helper.php'; 

