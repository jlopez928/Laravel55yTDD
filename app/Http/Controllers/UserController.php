<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    //
    public function index() {

        // usuarios?empty
        if (request()->has('empty')){
            $users = [];
        }else {
            $users = [
                'Joel',
                'Ellie',
                'Tess',
                'Tommy',
                'Bill',
                '<script>alert("Clicker")</script>'
            ];
        }

        $title = 'Listado de Usuarios';
        
        //Metodo Array Asociativo
        /*return view('users', [
            'users' => $users,
            'title' => 'Lista de Usuarios'
        ]);*/

        //Comprobar el resultado de una funcion
        /*dd(compact('users','title'));*/

        //Otra forma - Metodo Array Asociativo
        return view('users', compact('users','title'));

        //Metodo With
        /*return view('users')->with([
            'users' => $users,
            'title' => 'Lista de Usuarios'
        ]);*/
        
        //Otra forma - Metodo With
        /*return view('users')
                ->with('users',$users)
                ->with('title','Lista de Usuarios');*/

    }

    //
    public function show($id) {
        //return 'Mostrando detalle del usuario: ' .$id;
        return "Mostrando detalle del usuario: {$id}";
    }
    
    //
    public function create() {
        return "Crear usuario nuevo";
    }

    //
    public function detalle() {
        return 'Mostrando detalle del usuario: ' .$_GET['id'];
    }

}
