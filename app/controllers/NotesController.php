<?php

class NotesController extends Controller
{
    private $noteModel;

    public function __construct()
    {
        $this->noteModel = new Note();
    }

    public function index()
    {
        $notes = $this->noteModel->findAll();
        $this->render('notes/index', ['notes' => $notes]);
    }

    public function show($id)
    {
        $note = $this->noteModel->findById($id);
        $this->render('notes/show', ['note' => $note]);
    }

    public function create()
    {
        $this->render('notes/create');
    }

    public function store()
    {
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ];

        $this->noteModel->create($data);
        $this->redirect('/notes');
    }

    public function edit($id)
    {
        $note = $this->noteModel->findById($id);
        $this->render('notes/edit', ['note' => $note]);
    }

    public function update($id)
    {
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ];

        $this->noteModel->update($id, $data);
        $this->redirect('/notes');
    }

    public function destroy($id)
    {
        $this->noteModel->delete($id);
        $this->redirect('/notes');
    }
}