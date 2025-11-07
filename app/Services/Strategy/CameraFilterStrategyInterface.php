<?php

namespace App\Services\Strategy;

use Illuminate\Database\Eloquent\Builder;

interface CameraFilterStrategyInterface
{
    /**
     * Aplica filtro ao query builder de Camera.
     *
     * @param Builder $query
     * @param mixed $value
     * @return Builder
     */
    public function apply(Builder $query, $value): Builder;
}
