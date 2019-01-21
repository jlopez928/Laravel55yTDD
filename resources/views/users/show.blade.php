@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')

    <h1>Usuario #{{ $user->id }}</h1>

    {{--  Mostrando detalle del usuario: {{ $user->id }}--}}
    
    <p>Nombre del usuario: {{ $user->name }} </p>
    <p>Correo del usuario: {{ $user->email }} </p>
    
    <p>
        {{--  Distintas maneras de enlazar Urls--}}
        
        {{--  Con el Helper url()--}}
        {{--  <a href="{{ url('/usuarios') }}">Regresar</a>--}}
        {{--  <a href="{{ url()->previous() }}">Regresar</a>--}}

        {{--  Con el Helper action()--}}
        <a href="{{ action('UserController@index') }}">Regresar</a>

    </p>
@endsection