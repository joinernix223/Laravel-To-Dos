<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO Los métodos que no se usen se pueden borrar
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO Implementar StoreFormRequest
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'color'=> 'required|max:7'
        ]);
        //$input = $request->validated();
        $category = new Category();
        $category-> name = $request -> name;
        $category-> color = $request -> color;
        $category-> save();

        return redirect()->route('categories.index')->with('success', 'Nueva Categoria Agregada!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //TODO Implementar ShowFormRequest
        $category = Category::find($id);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //TODO Los métodos que no se usen se pueden borrar
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Implementar UpdateFormRequest
        $category = Category::find($id);
        $category-> name = $request -> name;
        $category-> color = $request -> color;
        //TODO Cambiar método save por update
        //$category->update($request->validated());
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categoria Actualizada!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
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
