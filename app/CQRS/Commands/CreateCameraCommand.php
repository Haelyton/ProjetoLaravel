<?php

namespace App\CQRS\Commands;

class CreateCameraCommand
{
    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
