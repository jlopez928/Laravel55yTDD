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
    public function show(User $user) {
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

        //$user = User::findOrFail($id);

        //dd($user);

        return view('users.show', compact('user'));
    }
    
    //
    public function create() {
        //return "Crear usuario nuevo";

        return view('users.create');
    }

    //
    public function detalle() {
        return 'Mostrando detalle del usuario: ' .$_GET['id'];
    }

    public function store() {

        $data = request()->validate([
            'name' => 'required',
            //'email' => ['required','email'],
            //parametros unique con : , el nombre de la tabla , el campo de la tabla
            'email' => 'required|email|unique:users,email',
            //'email' => '',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'El campo password debe ser mayor a 6 digitos',
        ]);

        //dd($data);
        
        //Validacion con Condicional
        /*$data = request()->all();

        if (empty($data['name'])) {
            return redirect(route('users.create'))->withErrors([
                'name' => 'El campo nombre es obligatorio'
            ]);
        }*/

        //dd($data);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        
        /*User::create([
            'name' => 'Jesus Lopez',
            'email' => 'jesuslopez@gmail.com',
            'password' => bcrypt(123456)
        ]);*/

        //return "Procesando informacion...";
        //return redirect('usuarios');
        return redirect()->route('users');

    }

    public function edit(User $user) {
        
        return view ('users.edit', ['user' => $user]);

    }

    public function update(User $user) {

        //dd('Estoy editando');

       // $user->update($request()->all());

       //$data = request()->all();

       $data = request()->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required',
       ],[
            'name.required' => 'El campo nombre es obligatorio',
       ]);

       $data['password'] = bcrypt($data['password']);

       $user->update($data);
        
        //return redirect("usuarios/{$user->id}");
        return redirect()->route('users.show', ['user' => $user]);

    }

}
