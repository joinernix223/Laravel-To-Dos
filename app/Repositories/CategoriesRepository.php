<?php

namespace App\Repositories;

use  App\Models\Category;

use  App\Models\Todo;

class CategoriesRepository extends BaseRepository
{

    public function model(): string
    {
        return Category::class;
    }

    public function deleteTodos($categoryId)
    {
        $category = $this->find($categoryId);
        
        $category->todos()->each(function ($to){
            $to->delete();
        });
        $this->delete($categoryId);
        
    }
}
