<?php

use Core\Model;

class Note extends Model
{
    public $title;
    public $content;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public static function all()
    {
        global $db;

        $db->query('SELECT * FROM notes');
        return $db->get();
    }

    public static function find($id)
    {
        global $db;

        $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $id]);
        return $db->findOrFail();
    }

    public function save()
    {
        global $db;

        if ($this->id) {
            $db->query('UPDATE notes SET title = :title, content = :content WHERE id = :id', [
                'id' => $this->id,
                'title' => $this->title,
                'content' => $this->content
            ]);
        } else {
            $db->query('INSERT INTO notes (title, content) VALUES (:title, :content)', [
                'title' => $this->title,
                'content' => $this->content
            ]);
        }
    }

    public function delete()
    {
        global $db;

        $db->query('DELETE FROM notes WHERE id = :id', ['id' => $this->id]);
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}