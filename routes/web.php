<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\TodosController;
use App\Http\controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tareas', [TodosController::class, 'index'])->name('todos'); //Crear

Route::post('/tareas', [TodosController::class, 'store'])->name('todos');

Route::get('/tareas/{id}', [TodosController::class, 'show'])->name('todos-show'); //Obtener Tareas

Route::patch('/tareas/{id}', [TodosController::class, 'update'])->name('todos-update'); //Update

Route::delete('/tareas/{id}', [TodosController::class, 'destroy'])->name('todos-destroy'); //Eliminar

Route::resource('categories', CategoriesController::class);