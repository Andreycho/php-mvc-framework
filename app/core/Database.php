<?php

use PDO;

Class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $username = 'root', $password = 'password123')
    {
        $dsn = 'mysql:' . http_build_query([$config['db'], '', ';' ]);

        $this->connection = new PDO($dsn, $username, $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
    }

    private function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        return $this->statement->execute($params);
    }

    public function findById($table, $id)
    {
        $this->query("SELECT * FROM $table WHERE id = :id", ['id' => $id]);

        return $this->statement->fetch();
    }

    public function findAll($table)
    {
        $this->query("SELECT * FROM $table");

        return $this->statement->fetchAll();
    }

    public function count($table)
    {
        $this->query("SELECT COUNT(*) FROM $table");

        return $this->statement->fetchColumn();
    }

    public function create($table, $data)
    {
        $keys = implode(', ', array_keys($data));
        $values = implode(', :', array_keys($data));

        $this->query("INSERT INTO $table ($keys) VALUES (:$values)", $data);
    }

    public function update($table, $id, $data)
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ', ');

        $this->query("UPDATE $table SET $set WHERE id = :id", array_merge($data, ['id' => $id]));
    }

    public function delete($table, $id)
    {
        $this->query("DELETE FROM $table WHERE id = :id", ['id' => $id]);
    }
}