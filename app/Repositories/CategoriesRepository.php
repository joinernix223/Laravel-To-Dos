<?php

namespace App\Repositories;

use  App\Models\Category;

class CategoriesRepository
{
 
    private $model;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function all()
    {
        return $this->model->all();
    }
    public function create($category)
    {
        $category->save();
        return $category;
    }
    public function show($id)
    {
        return $this->model::find($id);
        
    }
    public function update($id)
    {
        return $id = $this->model::find($id);
    }
    public function destroy($id)
    {
        return $id = $this->model::find($id);
    }

}