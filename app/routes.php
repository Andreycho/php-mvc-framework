<?php

require BASE_PATH . 'app/core/Router.php';

Router::get('/', 'HomeController', 'index');
Router::get('/notes', 'NotesController', 'index');
Router::get('/notes/create', 'NotesController', 'create');
Router::post('/notes', 'NotesController', 'store');
Router::get('/notes/{id}/edit', 'NotesController', 'edit');
Router::get('/notes/{id}', 'NotesController', 'show');
Router::put('/notes/{id}', 'NotesController', 'update');
Router::delete('/notes/{id}', 'NotesController', 'destroy');
