<?php

namespace App\CQRS\Queries;

class GetCamerasQuery
{
    public array $filters;
    public int $perPage;

    public function __construct(array $filters = [], int $perPage = 10)
    {
        $this->filters = $filters;
        $this->perPage = $perPage;
    }
}
