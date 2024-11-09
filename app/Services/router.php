<?php
namespace App\Services;

class router
{
    private static array $list = [];

    public static function page($url, $page_name): void
    {
        self::$list[] = [
            'url' => $url,
            'page' => $page_name
        ];
    }

    public static function post($url, $class, $method): void
    {
        self::$list[] = [
            'url' => $url,
            'class' => $class,
            'method' => $method,
            'post' => true
        ];
    }

    public static function Enable(): void
    {
        $query = isset($_GET['q']) ? $_GET['q'] : null;
        if ($query === null) {
            require_once 'views/pages/main.php';
            die();
        }
        foreach (self::$list as $route) {
            if ($route["url"] === '/' . $query) {
                self::handleRoute($route);
                return;
            }
        }
        self::ErrorBoundary();
    }

    private static function handleRoute(array $route): void
    {
        if (isset($route['class'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $action = new $route['class'];
                $method = $route['method'];
                $action->$method($_POST);
                die();
            }
        } else {
            require_once 'views/pages/' . $route["page"] . '.php';
            die();
        }
    }
    public static function getLastPathSegment($url) {
        $path = parse_url($url, PHP_URL_PATH); // to get the path from a whole URL
        $pathTrimmed = trim($path, '/'); // normalise with no leading or trailing slash
        $pathTokens = explode('/', $pathTrimmed); // get segments delimited by a slash

        if (!str_ends_with($path, '/')) {
            array_pop($pathTokens);
        }
        return end($pathTokens); // get the last segment
    }

    private static function ErrorBoundary(): void
    {
        require_once "views/errors/not_found.php";
    }
}