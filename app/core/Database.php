<?php

Class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $username = 'root', $password = 'password123')
    {
        $dsn = 'mysql:host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];

        try {
            $this->connection = new PDO($dsn, 'root', 'password123', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    private function query($query, $params = [])
    {
        try {
            $this->statement = $this->connection->prepare($query);
            $this->statement->execute($params);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
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
        $placeholders = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO $table ($keys) VALUES ($placeholders)";

        return $this->query($query, $data);
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