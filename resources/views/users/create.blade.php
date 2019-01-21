@extends('layout')

@section('title', "Crear Usuario")

@section('content')

    <h1>Crear Usuario</h1>

    {{--  <form action="{{ url('usuarios/crear') }}" method="post">--}}
    <form action="{{ url('usuarios') }}" method="post">

          {{  csrf_field() }}

          <label for="name">Nombre:</label> <br>
          <input type="text" name="name" id="name" placeholder="Pedro Perez">
          <br><br>

          <label for="email">Correo Electronico:</label> <br>
          <input type="email" name="email" id="email" placeholder="pedro@example.com">
          <br><br>

          <label for="password">Contraseña:</label><br>
          <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres">
          <br><br>

        <button type="submit">Crear usuario</button>
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