<?php

namespace App\Contracts;

use App\Models\Camera;
use Illuminate\Contracts\Support\Arrayable;

interface CameraFactoryInterface
{
    /**
     * Cria e retorna uma instância de Camera (não salva).
     *
     * @param array|Arrayable $data
     * @return Camera
     */
    public function make($data): Camera;
}
