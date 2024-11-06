<?php

use PDO;

Class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = 'password123')
    {
        $dsn = 'mysql:' . http_build_query([$config['db'], '', ';' ]);

        $this->connection = new PDO($dsn, $username, $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        return $this->statement->execute($params);
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();
        if(!$result) {
            abort();
        }

        return $result;
    }

    public function count()
    {
        return $this->statement->rowCount();
    }

}