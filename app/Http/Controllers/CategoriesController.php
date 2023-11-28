<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Category;

//FormRequest
use App\Http\Requests\StoreCategoryFormRequest;
use App\Http\Requests\ShowCategoryFormRequest;
use App\Http\Requests\UpdateCategoryFormRequest;
use App\Http\Requests\DeleteCategoryFormRequest;

//Repositories
use App\Repositories\CategoriesRepository;

class CategoriesController extends Controller
{

    public function __construct(CategoriesRepository $categoryRepository)
    {

        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        //
        $categories = $this->categoryRepository->all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function store(StoreCategoryFormRequest $request)
    {
        //TODO Implementar StoreCategoryFormRequest COMPLETED

        $input = $request->validated();

        /*
        $input = new Category();
        $input-> name = $request -> name;
        $input-> color = $request -> color;
        Esta asignación de valores sobra, ya que desde el FormRequest se asignan los valores a $input
        */
        $this->categoryRepository->create($input);


        return redirect()->route('categories.index')->with('success', 'Nueva Categoria Agregada!');

    }

    public function show(ShowCategoryFormRequest $request, string $id)
    {
        $category = $this->categoryRepository->find($id);

        /*
         * Esta validación se hace en el FormRequest
        if(!$category){
            return redirect()->route('categories.index')->with('error', 'Categoria no Encontrada');
        }
        */
        $validatedData = $request->validated();
        return view('categories.show', ['category' => $category]);


    }

    public function update(UpdateCategoryFormRequest $request, string $id)
    {
        $input = $request->validated();
        $category = $this->categoryRepository->update($input, $id);

        return redirect()->route('categories.index')->with('success', 'Categoria Actualizada!');

    }

    public function destroy(DeleteCategoryFormRequest $request, $category)
    {
        //TODO Implementar DeleteFormRequest COMPLETED,

        //validar que se elimine solo categorias que no tenga tareas asociadas PENDIENTE
        //dd($category);
       
        $this->categoryRepository->deleteTodos($category);
        

        // $category->todos()->each(function ($todo) {
        //     $todo->delete();
        // });
        // $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría Eliminada Correctamente!!');

    }
}
