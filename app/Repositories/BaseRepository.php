<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryContract;
use App\Exceptions\Common\NotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseRepository implements BaseRepositoryContract
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return Model|null
     * @throws NotFoundException
     */
    public function findOrFail(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage): mixed
    {
        return $this->model->paginate($perPage);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
