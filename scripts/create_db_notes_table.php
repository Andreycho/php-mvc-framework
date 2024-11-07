<?php

$config = include('config.php');

$host = $config['host'];
$port = $config['port'];
$dbname = $config['dbname'];
$username = $config['username'];
$password = $config['password'];
$charset = $config['charset'];

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    echo "Connection successful. Now creating the database and table...\n";

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");

    $pdo->exec("USE `$dbname`");

    $createTableSql = "
    CREATE TABLE IF NOT EXISTS notes (
        id INT PRIMARY KEY AUTO_INCREMENT ,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT NOW(),
        updated_at TIMESTAMP DEFAULT NOW() ON UPDATE NOW()
    )";

    $pdo->exec($createTableSql);

    echo "Database and table 'notes' created successfully.\n";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
