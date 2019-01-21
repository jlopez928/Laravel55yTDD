@extends('layout')

@section('title', "Crear Usuario")

@section('content')

    <h1>Crear Usuario</h1>

    {{--  <form action="{{ url('usuarios/crear') }}" method="post">--}}
    <form action="{{ url('usuarios') }}" method="post">

          {{  csrf_field() }}

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