<?php

class Router
{
    private static array $routes = [];

    public static function handle(string $path, $handler): void
    {
        self::$routes[$path] = $handler;
    }

    public static function run(): void
    {
        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '/';

        if (isset(self::$routes[$uri])) {
            $handler = self::$routes[$uri];
            
            if (is_callable($handler)) {
                // If it's a callable, execute it
                call_user_func($handler);
            } elseif (is_string($handler)) {
                // If it's a string, treat it as a file path
                $fileToInclude = $handler;
                
                // Convert to absolute path if needed
                if (!file_exists($fileToInclude)) {
                    $fileToInclude = realpath(__DIR__ . '/../' . ltrim($fileToInclude, '/'));
                }

                if (file_exists($fileToInclude)) {
                    require $fileToInclude;
                } else {
                    self::error("File not found: $fileToInclude");
                }
            } else {
                self::error("Invalid handler type for route: $uri");
            }
        } else {
            self::notFound();
        }
    }

    private static function error(string $message): void
    {
        http_response_code(500);
        echo "<h1>Router Error</h1><p>$message</p>";
        exit;
    }

    private static function notFound(): void
    {
        http_response_code(404);
        header("Location: /404");
        exit;
    }
}