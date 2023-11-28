<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Models
use App\Models\Todo;
use App\Models\Category;
//FormRequest
use App\Http\Requests\StoreTodosFormRequest;
use App\Http\Requests\ShowTodoFormRequest;
use App\Http\Requests\UpdateTodosFormRequest;
//Repositories
use App\Repositories\TodosRepository;
use App\Repositories\CategoriesRepository;

class TodosController extends Controller
{
    /**
     * CRUD
     *
     */

    public function __construct(TodosRepository $todoRepository,CategoriesRepository $categoryRepository) 
    {
        
        $this->todoRepository = $todoRepository; 
        $this->categoryRepository= $categoryRepository;
        
    }
    // public function __construct(CategoriesRespository $categoryRepository)
    // {
        
    // }

     public function store(StoreTodosFormRequest $request) // FormRequest COMPLETED
     {
         $input = $request->validated();
         $todo = new Todo;
         $todo->title = $input['title'];
         $todo->category_id = $input['category_id'];
        // $todo->save();
        $this->todoRepository->create($input);
 
         return redirect()->route('todos.index')->with('success', 'Tarea creada Correctamente');
     }
 

    public function index (){ 
        $todos = $this->todoRepository->all();
        $categories = $this->categoryRepository->all();
        //TODO Semana 2 - Listar los todos con su categoría - Eloquent - MOdels que es el with()
        return view('todos.index', [
            'todos' => $todos,
            'categories' => $categories
            ]);
    }



    public function show (ShowTodoFormRequest $request, $id) 
    {
        //TODO Implementar ShowTodoFormRequest COMPLETED
        $todo = $this->todoRepository->find($id);
        if(!$todo){
            return redirect()->route('todos.index')->with('error', 'La Tarea no existe');
        }
        $categories = $this->categoryRepository->all();
        return view('todos.show', ['todo' => $todo, 'categories' => $categories]);

    }

    
    public function destroy ($id){ //PENDIENTE
        $todo = $this->todoRepository->delete($id);
        
        return redirect()->route('todos.index')->with('success', 'Tarea Borrada Con Exito');

    }
    
    public function update (UpdateTodosFormRequest $request, $id){
        $input = $request->validated();

        $todo = $this->todoRepository->find($id);

        $todo->title = $input['title'];
        $todo->category_id = $input['category_id'];
        //TODO Cambiar método save por update
        $this->todoRepository->update($input, $id);
        
        return redirect()->route('todos.index')->with('success', 'Tarea Actualizada Con Exito!');
    }

}
