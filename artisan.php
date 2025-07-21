<?php

// Ensure script is run from command line
if (php_sapi_name() !== 'cli') {
    exit("This script can only be run from the command line.\n");
}

// Get command line arguments
$argv = $_SERVER['argv'];

if (count($argv) < 3 || $argv[1] !== 'controller') {
    exit("Usage: php make:controller ControllerName\n");
}

$controllerName = $argv[2];
$controllerFile = __DIR__ . "/app/controllers/{$controllerName}.php";

// Check if file already exists
if (file_exists($controllerFile)) {
    exit("❌ Controller '{$controllerName}' already exists.\n");
}

// Ensure Controller.php exists for extending
$baseController = __DIR__ . "/app/controllers/Controller.php";
if (!file_exists($baseController)) {
    exit("❌ Base Controller.php not found in ./app/controllers/.\n");
}

// Create the controller content
$contents = <<<PHP
<?php
require_once __DIR__ . '/Controller.php';

class {$controllerName} extends Controller {
    public function show() {
        requireAuth();
        \$this->renderView('');
    }
}
PHP;

// Write the controller file
file_put_contents($controllerFile, $contents);

echo "Controller '{$controllerName}' created at ./app/controllers/{$controllerName}.php\n";
