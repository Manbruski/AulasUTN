<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/home', 'HomeController@index');
    Route::resource('/carreras', 'CarrerasController');
    Route::resource('/cursos', 'CursosController');
    Route::resource('/perfiles', 'PerfilesController');
    Route::resource('/horarios', 'HorariosController');
    Route::resource('/sedes','SedesController');
    Route::get('/sedes/{id}/recintos', 'SedesController@RecintosPorSede');
    Route::resource('/periodos','PeriodosController');
    Route::resource('/aulas','AulasController');
    Route::get('/recintos/{id}/aulas', 'RecintosController@AulasPorRecintos');
    Route::resource('/usuarios','UsuariosController');
    Route::resource('/reservaciones', 'ReservacionesController');
    Route::resource('/recintos', 'RecintosController');
    Route::resource('cursos_carreras','CursoCarreraController');
    Route::resource('usuario_curso_carrera','Usuario_Curso_CarreraController');

});
