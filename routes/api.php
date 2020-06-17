<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/cursos', 'Api\CursosController@index');
// Route::get('/cursos/{curso}', 'Api\CursosController@show');
// Route::post('/cursos', 'Api\CursosController@store');
// Route::put('/cursos/{curso}', 'Api\CursosController@update');
// Route::delete('/cursos/{curso}', 'Api\CursosController@destroy');

Route::resource('cursos', 'Api\CursosController');
Route::resource('alunos', 'Api\AlunosController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
