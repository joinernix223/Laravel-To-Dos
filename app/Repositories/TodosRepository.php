<?php

namespace App\Repositories;
use App\Models\Todo;

class TodosRepository extends BaseRepository
{

    public function model(): string
    {
        return Todo::class;
    }

}