<?php

namespace App\CQRS\Handlers;

use App\CQRS\Queries\GetCamerasQuery;
use App\Models\Camera;
use App\Services\Strategy\CameraFilterContext;

class GetCamerasHandler
{
    private CameraFilterContext $filterContext;

    public function __construct(CameraFilterContext $filterContext)
    {
        $this->filterContext = $filterContext;
    }

    public function handle(GetCamerasQuery $query)
    {
        $qb = Camera::query()->with('memoryCards');
        $qb = $this->filterContext->apply($qb, $query->filters);
        return $qb->paginate($query->perPage);
    }
}
