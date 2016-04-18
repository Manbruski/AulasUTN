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
Route::auth();
Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index');
    Route::get('/sedes/{id}/recintos', 'SedesController@RecintosPorSede');
    Route::get('/recintos/{id}/aulas', 'RecintosController@AulasPorRecintos');
    Route::resource('/reservaciones', 'ReservacionesController');


    Route::group(['middleware' => ['isAdmin']], function () {
      Route::resource('/carreras', 'CarrerasController');
      Route::resource('/cursos', 'CursosController');
      Route::resource('/perfiles', 'PerfilesController');
      Route::resource('/horarios', 'HorariosController');
      Route::resource('/sedes','SedesController');
      Route::resource('/periodos','PeriodosController');
      Route::resource('/aulas','AulasController');
      Route::resource('/usuarios','UsuariosController');
      Route::resource('/recintos', 'RecintosController');
    });

});
