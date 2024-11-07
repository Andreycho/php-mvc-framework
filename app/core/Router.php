<?php

class Router
{
    private static $routes = [];
    private static $params = [];

    public static function add($method, $uri, $controller, $methodName)
    {
        self::$routes[] = [
            'method' => strtoupper($method),
            'uri' => $uri,
            'controller' => $controller,
            'methodName' => $methodName
        ];
    }

    public static function route()
    {
        $requestUri = trim($_SERVER['REQUEST_URI'], '/');
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method'])) {
            $requestMethod = strtoupper($_POST['_method']);
        }

        foreach (self::$routes as $route) {
            $routeUri = trim($route['uri'], '/');
            if ($requestMethod === $route['method'] && self::matchRoute($routeUri, $requestUri)) {
                $controller = $route['controller'];
                $method = $route['methodName'];

                if (class_exists($controller)) {
                    $controllerInstance = new $controller();
                    if (method_exists($controllerInstance, $method)) {
                        call_user_func_array([$controllerInstance, $method], self::$params);
                        return;
                    }
                }
                break;
            }
        }
        self::handle404();
    }


    private static function matchRoute($routeUri, $requestUri)
    {
        $routeUri = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_-]+)', $routeUri);
        $routePattern = "#^$routeUri$#";

        if (preg_match($routePattern, $requestUri, $matches)) {
            array_shift($matches);
            self::$params = $matches;
            return true;
        }
        return false;
    }

    private static function handle404()
    {
        http_response_code(404);
        include BASE_PATH . 'app/views/404.view.php';
    }

    public static function get($uri, $controller, $method)
    {
        self::add('GET', $uri, $controller, $method);
    }

    public static function post($uri, $controller, $method)
    {
        self::add('POST', $uri, $controller, $method);
    }

    public static function put($uri, $controller, $method)
    {
        self::add('PUT', $uri, $controller, $method);
    }

    public static function delete($uri, $controller, $method)
    {
        self::add('DELETE', $uri, $controller, $method);
    }
}

