<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use App\Http\Requests\StoreTodosFormRequest;
use App\Http\Requests\ShowTodoFormRequest;
use App\Http\Requests\UpdateTodosFormRequest;


class TodosController extends Controller
{
    /**
     * CRUD
     *
     */

     public function store(StoreTodosFormRequest $request) // FormRequest COMPLETED
     {
         $todo = new Todo;
         $todo->title = $request->title;
         $todo->category_id = $request->category_id;
         $todo->save();
 
         return redirect()->route('todos')->with('success', 'Tarea creada Correctamente');
     }
 

    public function index (){ 

        $todos = Todo::all();
        $categories = Category::all();
        //TODO Semana 2 - Listar los todos con su categoría - Eloquent - MOdels que es el with()
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]);
    }



    public function show (ShowTodoFormRequest $request, $id) 
    {
        //TODO Implementar ShowTodoFormRequest COMPLETED
        $todo = Todo::find($id);
        $categories = Category::all();
        return view('todos.show', ['todo' => $todo, 'categories' => $categories]);

    }

    
    public function destroy ($id){ //PENDIENTE
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('todos')->with('success', 'Tarea Borrada Con Exito');

    }
    
    public function update (UpdateTodosFormRequest $request, $id){
        $todo = Todo::find($id);
        $todo ->title = $request->title;
        $todo -> category_id = $request->category_id;
        //TODO Cambiar método save por update
        $todo-> update();

        return redirect()->route('todos')->with('success', 'Tarea Actualizada Con Exito!');
    }

}
