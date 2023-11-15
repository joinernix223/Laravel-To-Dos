<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\ShowFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\DeleteFormRequest;


class CategoriesController extends Controller
{
    public function index()
    {
        //
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function store(StoreFormRequest $request)
    {
        //TODO Implementar StoreFormRequest COMPLETED
        //Duda se debe crear un request para cada metodo?
        /* Ejemplo : 
        StoreFormRequest
        ShowFormRequest
        UpdateFormRequest
        */
        
        $input = $request->validated();

        $category = new Category();
        $category-> name = $request -> name;
        $category-> color = $request -> color;
        $category-> save();

        return redirect()->route('categories.index')->with('success', 'Nueva Categoria Agregada!');

    }

    public function show(ShowFormRequest $request, string $id)
    {
        //TODO Implementar ShowFormRequest
        $category = Category::find($id);
        $validatedData = $request->validated($id);
        
        if(!$category){
            abort(404);
        }
        return view('categories.show', ['category' => $category]);
        
    
    }

    public function update(UpdateFormRequest $request, string $id)
    {
        //Implementar UpdateFormRequest 
        $category = Category::find($id);
        $input = $request->validated();
        $category-> name = $request -> name;
        $category-> color = $request -> color;
        //TODO Cambiar método save por update
        //$category->update($request->validated());
        $category->update();

        return redirect()->route('categories.index')->with('success', 'Categoria Actualizada!');

    }

    public function destroy(DeleteFormRequest $request, $category)
    {
        //TODO Implementar DeleteFormRequest, validar que se elimine solo categorias que no tenga tareas asociadas
        $category = Category::find($category);
        //
        $category->todos()->each(function($todo){
            $todo->delete();
        });
        $category -> delete();

        return redirect()->route('categories.index')->with('success', 'Categoria Eliminada!');

    }
}
