<?php

require_once BASE_PATH . 'app/models/Note.php';

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
        if ($notes) {
            $this->render('notes/index', ['notes' => $notes]);
        } else {
            $this->render('notes/index', ['message' => 'There are currently no notes']);
        }
    }

    public function show($id)
    {
        $note = $this->noteModel->findById($id);
        if ($note) {
            $this->render('notes/show', ['note' => $note]);
        } else {
            $this->render('404', ['message' => 'Note not found']);
        }
    }

    public function create()
    {
        $this->render('notes/create');
    }

    public function store()
    {
        if (empty($_POST['title']) || empty($_POST['content'])) {
            echo "Both title and content are required!";
            die();
        }

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