<?php

define('BASE_PATH', __DIR__ . '/');

$config = require BASE_PATH . 'app/config.php';

$db = new Database($config['db']);

require BASE_PATH . 'app/routes.php';

Router::route();





