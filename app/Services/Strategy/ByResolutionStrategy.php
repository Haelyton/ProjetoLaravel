<?php

namespace App\Services\Strategy;

use Illuminate\Database\Eloquent\Builder;

class ByResolutionStrategy implements CameraFilterStrategyInterface
{
    public function apply(Builder $query, $value): Builder
    {
        return $query->where('resolucao', 'LIKE', "%{$value}%");
    }
}
