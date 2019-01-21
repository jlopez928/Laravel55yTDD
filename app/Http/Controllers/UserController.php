<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class UserController extends Controller
{

    //
    public function index() {

        // usuarios?empty
        /*if (request()->has('empty')){
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
        }*/

        //*************Constructor de Consultas SQL de Laravel
        //$users = DB::table('users')->get();

        //***************Con Modelo Eloquent de Laravel
        $users = User::all();



        //dd($users);

        $title = 'Listado de Usuarios';
        
        //Metodo Array Asociativo
        /*return view('users', [
            'users' => $users,
            'title' => 'Lista de Usuarios'
        ]);*/

        //Comprobar el resultado de una funcion
        /*dd(compact('users','title'));*/

        //Otra forma - Metodo Array Asociativo
        return view('users.index', compact('users','title'));

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
        //return "Mostrando detalle del usuario: {$id}";

        //Para validar si existe usuario con el metodo Find
        /*$user = User::find($id);

        //dd($user);

        if($user == null) {
            
            //return view('errors.404');
            
            // Para poder enviar el status 404
            return response()->view('errors.404',[],404);
        }*/

        //Para validar si existe usuario con el metodo FindOrFail
        //Automaticamente busca la vista 404 definida

        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
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
