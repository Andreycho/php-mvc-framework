<?php

define('BASE_PATH', __DIR__ . '/');
require BASE_PATH . 'app/core/Database.php';
require BASE_PATH . 'app/core/Controller.php';

spl_autoload_register(function ($class) {
    $file = BASE_PATH . 'app/controllers/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

$config = require BASE_PATH . 'app/config.php';
$db = new Database($config);

require BASE_PATH . 'app/routes.php';
Router::route();





