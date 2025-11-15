<?php

namespace App\Factories;

use App\Contracts\CameraFactoryInterface;
use App\Models\Camera;

class CameraFactory implements CameraFactoryInterface
{
    /**
     * Cria e retorna uma instância de Camera (sem salvar no banco)
     */
    public function make($data): Camera
    {
        // Se for Arrayable, converte
        if ($data instanceof \Illuminate\Contracts\Support\Arrayable) {
            $data = $data->toArray();
        }

        return new Camera($data);
    }
}
