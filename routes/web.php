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

Route::get('/usuarios', function () {
    return 'Usuarios';
});

Route::get('/usuarios/detalles', function () {
    return 'Mostrando detalle del usuario: ' .$_GET['id'];
});

Route::get('/usuarios/{id}', function ($id) {
    //return 'Mostrando detalle del usuario: ' .$id;
    return "Mostrando detalle del usuario: {$id}";
})->where('id','[0-9]+'); // Expresion regular para que solo acepte numeros como id

Route::get('/usuarios/nuevo', function () {
    return "Crear usuario nuevo";
});

// El ? en apodo significa que es opcional
Route::get('/saludo/{name}/{nickname?}', function ($name,$nickname = null) {
    $name = ucfirst($name);

    if ($nickname){
        return "Bienvenido {$name}, tu apodo es {$nickname}";
    }else {
        return "Bienvenido {$name}";
    }
});