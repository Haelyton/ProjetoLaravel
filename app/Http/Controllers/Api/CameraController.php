<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\CQRS\Commands\CreateCameraCommand;
use App\CQRS\Handlers\CreateCameraHandler;
use App\CQRS\Queries\GetCamerasQuery;
use App\CQRS\Handlers\GetCamerasHandler;
use App\Http\Requests\StoreCameraRequest;
use App\Http\Requests\UpdateCameraRequest;
use App\Models\Camera;
use Illuminate\Http\JsonResponse;

class CameraController extends Controller
{
    private CreateCameraHandler $createHandler;
    private GetCamerasHandler $getHandler;

    public function __construct(
        CreateCameraHandler $createHandler,
        GetCamerasHandler $getHandler
    ) {
        $this->createHandler = $createHandler;
        $this->getHandler = $getHandler;
    }

    public function index(): JsonResponse
    {
        // qualquer filtro via query string: ?marca=Canon&resolucao=24MP
        $filters = request()->only(['marca', 'resolucao']);
        $perPage = (int) request()->get('per_page', 10);

        $result = $this->getHandler->handle(new GetCamerasQuery($filters, $perPage));
        return response()->json($result);
    }

    public function show(Camera $camera): JsonResponse
    {
        $camera->load('memoryCards');
        return response()->json($camera);
    }

    public function store(StoreCameraRequest $request): JsonResponse
    {
        $command = new CreateCameraCommand($request->validated());
        $camera = $this->createHandler->handle($command);

        return response()->json($camera, 201);
    }

    public function update(UpdateCameraRequest $request, Camera $camera): JsonResponse
    {
        $camera->update($request->validated());
        return response()->json($camera);
    }

    public function destroy(Camera $camera): JsonResponse
    {
        $camera->delete();
        return response()->json([], 204);
    }

    // attach/detach mantém-se se quiser
}
