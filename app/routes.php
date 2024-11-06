<?php

Router::get('/', 'HomeController', 'index');
Router::get('/notes', 'NotesController', 'index');
Router::get('/notes/{id}', 'NotesController', 'show');
Router::get('/notes/create', 'NotesController', 'create');
Router::post('/notes', 'NotesController', 'store');
Router::get('/notes/{id}/edit', 'NotesController', 'edit');
Router::put('/notes/{id}', 'NotesController', 'update');
Router::delete('/notes/{id}', 'NotesController', 'destroy');
