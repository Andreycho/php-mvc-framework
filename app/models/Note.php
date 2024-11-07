<?php

require_once BASE_PATH . 'app/core/Model.php';

class Note extends Model
{
    public $title;
    public $content;

    public function __construct($title = null, $content = null)
    {
        parent::__construct('notes');

        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function toArray ()
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }

    public function create($data)
    {
        $data = [
            'title' => $data['title'],
            'content' => $data['content']
        ];
        parent::create($data);
    }
    
    public function update($id, $data)
    {
        $data = [
            'title' => $data['title'],
            'content' => $data['content']
        ];
        parent::update($id, $data);
    }

    public function delete($id)
    {
        parent::delete($id);
    }

    public function findById($id)
    {
        return parent::findById($id);
    }

    public function findAll()
    {
        return parent::findAll();
    }

    public function count()
    {
        return parent::count();
    }
}