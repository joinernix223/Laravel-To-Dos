<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodosController extends Controller
{
    /**
     * CRUD
     * 
     */

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'category_id'
        ]);
        
        
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada Correctamente');
    }

    public function index (){

        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]);
    }
    public function show ($id){

        $todos = Todo::find($id);
        $categories = Category::all();
        return view('todos.show', ['todo' => $todos, 'categories' => $categories]);

    }
    public function destroy ($id){
        $todo = Category::find($id);
        $todo->delete();

        return redirect()->route('todos')->with('success', 'Tarea Borrada Perfecto');

    }
    public function update (Request $request, $id){
        $todo = Todo::find($id);
        $todo ->title = $request->title;
        $todo-> save();
        
        return redirect()->route('todos')->with('success', 'Tarea Actualizada Perfecto');
    }
    
}
