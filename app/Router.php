<?php

class Router
{
    private static array $routes = [];

    public static function handle(string $path, string $filePath): void
    {
        self::$routes[$path] = $filePath;
    }

    public static function run(): void
    {
        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '/';

        if (isset(self::$routes[$uri])) {
            $fileToInclude = self::$routes[$uri];
            
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
        echo "<h1>404 Not Found</h1><p>The requested route was not found.</p>";
        exit;
    }
}