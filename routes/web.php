<?php
Route::get('/', 'HomeController@index')->name('home');

Route::resource('cursos', 'CursosController');
Route::resource('alunos', 'AlunosController');
