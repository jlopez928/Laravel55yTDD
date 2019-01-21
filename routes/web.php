<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return 'Hola Mundo!!';
});

/*Route::get('/usuarios', 'UserController@index');*/
//Rutas Con Nombre
Route::get('/usuarios', 'UserController@index')
    ->name('users');

Route::get('/usuarios/detalles', 'UserController@detalle');

//Route::get('/usuarios/detalles/{id}', 'UserController@show')->where('id','[0-9]+'); // Expresion regular para que solo acepte numeros como id
Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user','[0-9]+') // Expresion regular para que solo acepte numeros como id
    ->name('users.show');

//Route::get('/usuarios/nuevo', 'UserController@create');
Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');

// El ? en apodo significa que es opcional
Route::get('/saludo/{name}/{nickname?}', 'WelcomeUserController@index');


//Route::post('/usuarios/crear', 'UserController@store');
Route::post('/usuarios', 'UserController@store');