@extends('app')

@section('content')

<div class="container w-25 mt-4">
    <h1>Lista de Usuarios</h1>
    
    <div class="container list-group mt-3 border p-4">
    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
        @if (count($users) > 0)
            @foreach ($users as $user )
                <!-- Ejemplo de usuario con enlace -->
                <li class="list-group-item d-flex justify-content-between align-items-center no-ul">
                <a href="{{route ('users.show', ['user' => $user->id]) }}">{{$user ->name}}</a>
                <form action="{{route ('users.destroy', ['user' => $user->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit"  class="btn btn-danger">Eliminar</button>
                </form>
                {{-- <span class="badge bg-primary">Activo</span> --}}
                </li>
            @endforeach
        @else
        <li>No hay usuarios Registrados</li>
        @endif
        <a href="{{route ('users.create')}}" class="btn btn-outline-primary mt-4">Agregar Usuario</a>

        

        <!-- Puedes agregar más elementos de lista según sea necesario -->
        </div>
</div>

@endsection
