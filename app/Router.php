<?php

class Router
{
    private static array $routes = [];
    private static array $errorHandlers = [];

    public static function handle(string $path, $handler, string $method = 'GET'): void
    {
        self::$routes[$method][$path] = $handler;
    }

    public static function get(string $path, $handler): void
    {
        self::handle($path, $handler, 'GET');
    }

    public static function post(string $path, $handler): void
    {
        self::handle($path, $handler, 'POST');
    }

    // Renamed this to setErrorHandler to avoid conflict
    public static function setErrorHandler(int $code, callable $handler): void
    {
        self::$errorHandlers[$code] = $handler;
    }

    public static function run(): void
    {
        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '/';
        $method = $_SERVER['REQUEST_METHOD'];

        // Check for direct route match
        if (isset(self::$routes[$method][$uri])) {
            self::executeHandler(self::$routes[$method][$uri]);
            return;
        }

        // Handle 404
        self::notFound();
    }

    private static function executeHandler($handler): void
    {
        try {
            if (is_callable($handler)) {
                call_user_func($handler);
            } elseif (is_string($handler) && file_exists($handler)) {
                require $handler;
            } elseif (is_array($handler) && count($handler) === 2) {
                [$controller, $method] = $handler;
                if (method_exists($controller, $method)) {
                    $controller->$method();
                } else {
                    throw new RuntimeException("Method {$method} not found in controller");
                }
            } else {
                throw new RuntimeException("Invalid route handler");
            }
        } catch (Exception $e) {
            self::handleError(500, $e); // Changed to use the renamed method
        }
    }

    private static function notFound(): void
    {
        if (isset(self::$errorHandlers[404])) {
            self::executeHandler(self::$errorHandlers[404]);
        } else {
            http_response_code(404);
            echo "<h1>404 Not Found</h1>";
        }
        exit;
    }

    // Renamed this from error() to handleError() to avoid conflict
    private static function handleError(int $code, Exception $e): void
    {
        if (isset(self::$errorHandlers[$code])) {
            self::executeHandler(self::$errorHandlers[$code]);
        } else {
            http_response_code($code);
            echo "<h1>{$code} Server Error</h1>";
            if (defined('DEBUG_MODE') && DEBUG_MODE) {
                echo "<pre>{$e->getMessage()}</pre>";
            }
        }
        exit;
    }
}