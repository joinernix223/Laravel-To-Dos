<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Exception;

abstract class BaseRepository
{
    protected $app;

    protected Model $model;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model();

    /**
     * @return Model
     * @throws Exception
     */
    public function makeModel(): Model
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    public function create(array $data): Model
    {
        $record = $this->model->newInstance($data);
        $record->save();
        return $record;
    }

    public function update(array $data, $id): Model
    {
        $record = $this->model::query()->findOrFail($id);
        $record->fill($data);
        $record->save();
        return $record;
    }

    public function delete($id): bool
    {
        $record = $this->model->find($id);
        return $record->delete();
    }

    public function find($id): Model
    {
        return $this->model->find($id);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}
