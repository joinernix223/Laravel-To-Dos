@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <div class="rom mx-auto">
            <form action="{{ route('categories.update' , ['category' =>  $category]) }}" method="POST">
              @method('PATCH')
                @csrf
                @if (session('success'))
                  <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif
        
                @error('name')
                <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                  <label for="name" class="form-label">Nombre de la Categoria</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $category -> name }}">
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color de la Categoria</label>
                    <input type="color" class="form-control" id="exampleInputEmail1" name="color" value="{{$category -> color}}">
                  </div>

                <button type="submit" class="btn btn-primary">Actualizar la Categoria</button>
                </form>
                <div>
            <div>
              @if ($category->todos->count() > 0)
              <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{route ('todos-edit',  ['id' => $todo->id]) }}">{{$todo->title}}</a>
                </div>
                <!--trigger-->
                <div class="col-md-3 d-flex justify-content-end">
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $category->id }} ">
                        Eliminar
                    </button>
                </div>
            </div>
            @else
            <br>
              <span>No hay tareas para esta categoria</span>
              @endif
            </div>
            
        </div>

    </div>
@endsection