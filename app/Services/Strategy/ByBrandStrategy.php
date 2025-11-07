<?php

namespace App\Services\Strategy;

use Illuminate\Database\Eloquent\Builder;

class ByBrandStrategy implements CameraFilterStrategyInterface
{
    public function apply(Builder $query, $value): Builder
    {
        return $query->where('marca', 'LIKE', "%{$value}%");
    }
}
