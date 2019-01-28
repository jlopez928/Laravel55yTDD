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
                {{--<a href="{{ route('users.show',['id' => $user->id]) }}">Ver detalles</a> |
                <a href="{{ route('users.edit',['id' => $user->id]) }}">Editar</a>--}}
                
                {{-- Pasando el modelo de Eloquent del usuario --}}
                <a href="{{ route('users.show', $user) }}">Ver detalles</a> |
                <a href="{{ route('users.edit', $user) }}">Editar</a> |
                <form action="{{ route('users.destroy',$user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">Eliminar</button>
                </form>

            </li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
@endsection

@section('sidebar')
    @parent
@endsection