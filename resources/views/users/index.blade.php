@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <h1>{{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
            <li>
                {{ $user->name }}, ({{ $user->email }})
                
                {{--  Distintas maneras de enlazar Urls--}}

                {{--  Con el Helper url()--}}
                {{--  <a href="{{ url('/usuarios/'.$user->id) }}">Ver detalles</a>--}}
                {{--<a href="{{ url("/usuarios/{$user->id}") }}">Ver detalles</a>--}}

                {{--  Con el Helper action()--}}
                {{--  <a href="{{ action('UserController@show',['id' => $user->id]) }}">Ver detalles</a>--}}

                {{--  Con el Helper route()--}}
                <a href="{{ route('users.show',['id' => $user->id]) }}">Ver detalles</a>

            </li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
@endsection

@section('sidebar')
    @parent
@endsection