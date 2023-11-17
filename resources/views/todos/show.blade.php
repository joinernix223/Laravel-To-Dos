@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{ route('todos.update', ['todo' => $todo->id]) }}">
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

            <label for="title" class="form-label">Título de la tarea</label>
            <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1" placeholder="Comprar la cena" value="{{ $todo->title }}">


            <label for="category_id" class="form-label">Categoria de la tarea</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $todo->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
                <option value="5">nada-TST</option>
            </select>
            
            
            @method('PATCH')
            <input type="submit" value="Actualizar tarea" class="btn btn-primary my-2" />
        </div>
    </form>

    
    </div>
</div>
@endsection