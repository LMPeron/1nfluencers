<?php

namespace App\Repositories;

use Jenssegers\Mongodb\Eloquent\Model;

class BaseRepository
{

    protected $model;
    protected $connection = 'mongodb';

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all($columns = ['*']): mixed
    {
        return $this->model->all($columns);
    }

    public function paginate($limit = null, $columns = ['*']): mixed
    {
        return $this->model->select($columns)->latest()->paginate($limit);
    }

    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    public function findOrFail(int $id): mixed
    {
        return $this->model->findOrFail($id);
    }

    public function update(Model $entity, array $data): bool
    {
        return $entity->update($data);
    }

    public function delete(Model $entity): bool|null
    {
        return $entity->delete();
    }

    public function updateOrCreate(array $attributes, array $values): mixed
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    public function get(array $condition = [], bool $takeOne = true): mixed
    {
        $result = $this->model->where($condition);

        if ($takeOne) {
            return $result->first();
        }

        return $result->get();
    }
}
