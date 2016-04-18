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
Route::get('login', [
    'uses'=>'Auth\AuthController@getLogin',
    'as' => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('logout', [
        'uses'=>'Auth\AuthController@logout',
        'as'=>'logout'
    ]);

    Route::get('register', [
        'uses'=>'Auth\AuthController@getRegister',
        'as'=>'register'
    ]);
    Route::post('register', 'Auth\AuthController@postRegister');
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

});
