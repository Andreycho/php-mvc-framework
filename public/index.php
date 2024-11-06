<?php

// session_start();

// require __DIR__ . '/../core/init.php';

// $app = new App();
// $app->run();

require 'Database.php';

$config = require 'config.php';

$db = new Database($config['db'], 'root', 'password123');



