@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <div class="rom mx-auto">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                @if (session('success'))
                  <h6 class="alert alert-success">{{ session('success') }}</h6>
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

                <div class="mb-3">
                  <label for="name" class="form-label">Nombre de la Categoria</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color de la Categoria</label>
                    <input type="color" class="form-control" id="exampleInputEmail1" name="color">
                  </div>

                <button type="submit" class="btn btn-primary">Crear Nueva Categoria</button>
                </form>
                <div>
            </form>
            @foreach ( $categories as $category )
                
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a class="d-flex align-items-center gap-2" href="{{ route ('categories.show', ['category' => $category->id ])}}">
                        <span class="color-container" style="background-color: {{ $category->color }}"></span>
                        {{ $category -> name }}
                        </a>
                    </div>
                    <!--trigger-->
                    <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $category->id }} ">
                            Eliminar
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modal-{{$category -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar {{$category -> name}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <span>¿Estas Seguro de que deseas eliminar la categoria </span> <b>{{ $category -> name }}?</b>
                           <span>Se eliminaran todas las tareas a asignadas a la categoria </span><b>{{ $category -> name }}</b>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <form method="POST" action="{{route('categories.destroy', ['category' => $category->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection