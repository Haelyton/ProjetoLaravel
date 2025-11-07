<?php

namespace App\CQRS\Handlers;

use App\CQRS\Commands\CreateCameraCommand;
use App\Contracts\CameraFactoryInterface;
use App\Models\Camera;

class CreateCameraHandler
{
    private CameraFactoryInterface $factory;

    public function __construct(CameraFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Executa o comando e persiste a câmera.
     *
     * @param CreateCameraCommand $command
     * @return Camera
     */
    public function handle(CreateCameraCommand $command): Camera
    {
        $camera = $this->factory->make($command->data);
        $camera->save();

        // Se existirem cartões a vincular:
        if (!empty($command->data['memory_card_ids'] ?? [])) {
            $camera->memoryCards()->sync($command->data['memory_card_ids']);
        }

        return $camera;
    }
}
