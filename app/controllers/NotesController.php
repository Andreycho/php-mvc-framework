<?php

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        $this->render('notes/index', ['notes' => $notes]);
    }

    public function show($id)
    {
        $note = Note::find($id);
        $this->render('notes/show', ['note' => $note]);
    }

    public function create()
    {
        $this->render('notes/create');
    }

    public function store()
    {
        $note = new Note($_POST['title'], $_POST['content']);
        $note->save();
        $this->redirect('/notes');
    }

    public function edit($id)
    {
        $note = Note::find($id);
        $this->render('notes/edit', ['note' => $note]);
    }

    public function update($id)
    {
        $note = Note::find($id);
        $note->title = $_POST['title'];
        $note->content = $_POST['content'];
        $note->save();
        $this->redirect('/notes');
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        $this->redirect('/notes');
    }
}