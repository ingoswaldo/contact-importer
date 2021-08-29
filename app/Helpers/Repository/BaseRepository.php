<?php

namespace App\Helpers\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements Contracts\Repository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        return $this->query()
            ->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): ?bool
    {
        return $this->find($id)
            ->delete();
    }

    /**
     * @inheritDoc
     */
    public function find(int $id)
    {
        return $this->query()
            ->find($id);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $attributes)
    {
        return $this->find($id)
            ->update($attributes);
    }

    protected function query(): Builder
    {
        return $this->model->query();
    }
}