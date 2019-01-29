@extends('layout')

@section('title', "Crear Usuario")

@section('content')

    <div class="card">
        <h4 class="card-header"><strong>Crear Usuario</strong></h4>
        <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    {{--  <p>Hay Errores!!</p> --}}
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
    
            <div class="form-group">
                    <label for="name">Nombre:</label> <br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Pedro Perez" value="{{ old('name') }}">
                    {{--@if($errors->has('name'))
                      <p>{{ $errors->first('name') }}</p>
                    @endif--}}
            </div>
    
            <div class="form-group">
                    <label for="email">Correo Electronico:</label> <br>
                    <input type="email" class="form-control" name="email" id="email" placeholder="pedro@example.com" value="{{ old('email') }}">
                    {{--@if($errors->has('email'))
                      <p>{{ $errors->first('email') }}</p>
                    @endif--}}
            </div>
              
            <div class="form-group">
                    <label for="password">Contraseña:</label><br>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mayor a 6 caracteres">
                    {{--@if($errors->has('password'))
                        <p>{{ $errors->first('password') }}</p>
                    @endif--}}
            </div>
    
            <button type="submit" class="btn btn-primary">Crear usuario</button>
    
            {{--  Distintas maneras de enlazar Urls--}}
            
            {{--  Con el Helper url()--}}
            {{--  <a href="{{ url('/usuarios') }}">Regresar</a>--}}
            {{--  <a href="{{ url()->previous() }}">Regresar</a>--}}
    
            {{--  Con el Helper action()--}}
            <a href="{{ action('UserController@index') }}" class="btn btn-link">Regresar</a>
        </form>
        </div>
    </div>

@endsection