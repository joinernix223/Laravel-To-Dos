@extends('app')

@section('content')

<h1 class="text-center mt-4">Actualizar Usuario</h1>
<div class="container w-25 border p-4 mt-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
        @method('PATCH')
        @csrf

        <div class="mb-3 col">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if(session()->has('error'))
                    <div class="alert alert-danger">
                    {{ session()->get('error') }}
                 </div>
                 @endif

            @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de Usuario:</label>
                <input name="name_user" type="text" class="form-control" id="exampleInputText" value="{{ $users->name}}">
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Correo Electronico:</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $users->email }}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
              <input name="pasword" type="text" class="form-control" id="exampleInputPassword1" value="{{$users->password}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Confirmar Contraseña:</label>
              <input name="confirm_pasword" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            
            
            
            @method('PATCH')
            <input type="submit" value="Actualizar Usuario" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection