@extends('layout')

@section('title', "Crear Usuario")

@section('content')

    <h1>Editar Usuario</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <p>Por favor corrige los errores debajo:</p>
                 <ul>
                    @foreach ( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
    {{--  <form action="{{ url('usuarios/crear') }}" method="post">--}}
    <form action="{{ url('usuarios') }}" method="post">

          {{  csrf_field() }}

          <label for="name">Nombre:</label> <br>
          <input type="text" name="name" id="name" placeholder="Pedro Perez" value="{{ old('name', $user->name) }}">
          <br><br>

          <label for="email">Correo Electronico:</label> <br>
          <input type="email" name="email" id="email" placeholder="pedro@example.com" value="{{ old('email', $user->email) }}">
          <br><br>

          <label for="password">Contraseña:</label><br>
          <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres">
          <br><br>

        <button type="submit">Actualizar usuario</button>
    </form>
    
    <p>
        {{--  Distintas maneras de enlazar Urls--}}
        
        {{--  Con el Helper url()--}}
        {{--  <a href="{{ url('/usuarios') }}">Regresar</a>--}}
        {{--  <a href="{{ url()->previous() }}">Regresar</a>--}}

        {{--  Con el Helper action()--}}
        <a href="{{ action('UserController@index') }}">Regresar</a>

    </p>
@endsection