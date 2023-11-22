<?php

namespace App\Repositories;
use App\Models\Todo;

class TodosRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Todo();
    }

    public function all()
    {
        return $this->model->all();
    }
}