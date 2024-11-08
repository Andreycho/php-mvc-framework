<?php

abstract class Model
{
    protected $db;
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->db = new Database(require BASE_PATH . 'app/config.php');
    }

    public function findById($id)
    {
        return $this->db->findById($this->table, $id);
    }

    public function findAll()
    {
        return $this->db->findAll($this->table);
    }

    public function count()
    {
        return $this->db->count($this->table);
    }

    public function create($data)
    {
        $this->db->create($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->update($this->table, $id, $data);
    }

    public function delete($id)
    {
        $this->db->delete($this->table, $id);
    }
}