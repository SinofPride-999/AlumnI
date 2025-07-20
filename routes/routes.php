<?php 

require_once __DIR__ . '/../app/Router.php';

// Register routes
Router::handle('/', __DIR__ . '/../pages/index.php');
Router::handle('/register', __DIR__ . '/../pages/auth/register.view.php');
Router::handle('/login', __DIR__ . '/../pages/auth/login.view.php');

// Run the router
Router::run();