<?php

namespace App\Helpers\Repository\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

interface Repository
{
    /**
     * @param  array  $attributes
     * @return Builder| Model
     */
    public function create(array $attributes);

    /**
     * @param  int  $id
     * @return bool|null
     */
    public function delete(int $id): ?bool;

    /**
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Builder|Builder[]|Collection|Model|null
     */
    public function find(int $id);

    /**
     * @param  int    $id
     * @param  array  $attributes
     * @return mixed
     */
    public function update(int $id, array $attributes);
}