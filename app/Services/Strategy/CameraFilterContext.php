<?php

namespace App\Services\Strategy;

use Illuminate\Database\Eloquent\Builder;

class CameraFilterContext
{
    protected array $strategies = [];

    public function register(string $key, CameraFilterStrategyInterface $strategy): void
    {
        $this->strategies[$key] = $strategy;
    }

    public function apply(Builder $query, array $filters): Builder
    {
        foreach ($filters as $key => $value) {
            if (isset($this->strategies[$key]) && $value !== null && $value !== '') {
                $query = $this->strategies[$key]->apply($query, $value);
            }
        }
        return $query;
    }
}
