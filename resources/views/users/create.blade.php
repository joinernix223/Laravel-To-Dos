@extends('app')

@section('content')
<h1 class="text-center m-4">Crear Nuevo Usuario</h1>
<div class="container border w-25 p-4 mt-4">
    <form action="{{route ('users.store')}}" method="POST">
      @csrf
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-error">
            {{session()->get('error')}}
        </div>
        @endif
        @if ($errors->any())
                    <div >
                        <ul class="alert alert-danger px-5">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre de Usuario:</label>
            <input name="name_user" type="text" class="form-control" id="exampleInputText">
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Correo Electronico:</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirmar Contraseña:</label>
          <input name="confirm_pasword" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
      </form>
</div>
@endsection

