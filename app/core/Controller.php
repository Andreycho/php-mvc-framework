<?php

abstract class Controller
{
    public function render($view, $data = [])
    {
        $filename = BASE_PATH . 'app/views/' . $view . '.view.php';
        if (file_exists($filename)) {
            extract($data);
            require_once $filename;
        } else {
            http_response_code(404);
            require_once BASE_PATH . 'app/views/404.view.php';
        }
    }

    protected function redirect($path) {
        header("Location: $path");
        exit;
    }
}