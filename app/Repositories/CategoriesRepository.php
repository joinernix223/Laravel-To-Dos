<?php

namespace App\Repositories;

use  App\Models\Category;

class CategoriesRepository extends BaseRepository
{

    public function model(): string
    {
        return Category::class;
    }
}
