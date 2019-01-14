<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de usuarios - Proyecto</title>
</head>
<body>

    <h1>{{ $title }}</h1>

    <hr>
    {{-- Metodo Condicional If --}}
    @if(!empty($users))
        <ul>
            @foreach ($users as $user) 
                <li>{{ $user->name }}, ({{ $user->email }})</li>
            @endforeach
        </ul>
    @else
        <p>No hay usuarios Registrados</p>
    @endif 
    
    {{-- Metodo Condicional Empty 
    @empty($users)
        <p>No hay usuarios Registrados</p>    
    @else
        <ul>
            @foreach ($users as $user) 
                <li>{{ $user }}</li>
            @endforeach
        </ul>    
    @endempty --}}
    
    {{-- Metodo Condicional Unless 
    @unless(empty($users))
        <ul>
            @foreach ($users as $user) 
                <li>{{ $user }}</li>
            @endforeach
        </ul> 
    @else
        <p>No hay usuarios Registrados</p>       
    @endunless --}}

</body>
</html>