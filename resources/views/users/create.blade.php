@extends('layout')

@section('title', "Crear Usuario")

@section('content')

    <h1>Crear Usuario</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                {{--  <p>Hay Errores!!</p> --}}
                <p>Por favor corrige los errores debajo:</p>
                 {{--  <ul>
                    @foreach ( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>   --}}
            </div>
        @endif
    
    {{--  <form action="{{ url('usuarios/crear') }}" method="post">--}}
    <form action="{{ url('usuarios') }}" method="post">

          {{  csrf_field() }}

          <label for="name">Nombre:</label> <br>
          <input type="text" name="name" id="name" placeholder="Pedro Perez" value="{{ old('name') }}">
          @if($errors->has('name'))
            <p>{{ $errors->first('name') }}</p>
          @endif
          <br><br>

          <label for="email">Correo Electronico:</label> <br>
          <input type="email" name="email" id="email" placeholder="pedro@example.com" value="{{ old('email') }}">
          @if($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
          @endif
          <br><br>

          <label for="password">Contraseña:</label><br>
          <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres">
          @if($errors->has('password'))
            <p>{{ $errors->first('password') }}</p>
          @endif
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