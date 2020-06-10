<?php
Route::get('/', 'HomeController@index')->name('home');

Route::resource('cursos', 'CursosController');
Route::resource('alunos', 'AlunosController');
Route::resource('users', 'UsersController');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/alunos/destroy_foto/{aluno}', 'AlunosController@destroy_foto')->name('alunos.destroy_foto');
