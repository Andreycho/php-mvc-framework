<?php

class App 
{

    // private $controller = 'Home';
    // private $method = 'index';
    // private $params = [];
    
    // private function splitUrl()
    // {
    //     $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    //     $url = trim($url, '/');
    //     return explode('/', $url);
    // }

    // public function run()
    // {
    //     $url = $this->splitUrl();
    //     $controllerName = isset($url[0]) ? $url[0] : '';
    //     $controllerName = ucfirst($controllerName);
    //     $controllerName = $controllerName ? $controllerName : 'Home';
    //     $controllerName = $controllerName . 'Controller';
    //     $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';
    //     if (file_exists($controllerFile)) {
    //         require $controllerFile;
    //         $controller = new $controllerName;
    //         $actionName = isset($url[1]) ? $url[1] : 'index';
    //         $actionName = $actionName ? $actionName : 'index';
    //         if (method_exists($controller, $actionName)) {
    //             $controller->$actionName();
    //         } else {
    //             require __DIR__ . '/../controllers/_404.php';
    //         }
    //     } else {
    //         require __DIR__ . '/../controllers/_404.php';
    //     }
    // }

}