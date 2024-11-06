<?php

class Controller
{
    public function render($view, $data = [])
    {
        $filename = __DIR__ . '/../views/' . $view . '.view.php';
        if (file_exists($filename)) {
            require_once $filename;
        } else {
            require_once __DIR__ . '/../views/404.php';
        }
    }

    protected function redirect($path) {
        header("Location: $path");
        exit;
    }
}