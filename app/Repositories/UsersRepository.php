<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function all()
    {
        return $this->model->all();
    }
    public function create($user)
    {
        $user->save();
    }
    public function show($id)
    {
        return $this->model::find($id);
    }
    public function update($id)
    {
        return $this->model::find($id);
    }
    public function delete($id)
    {
        return $this->model::find($id);
    }
}