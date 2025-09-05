<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCameraRequest;
use App\Http\Requests\UpdateCameraRequest;
use App\Models\Camera;
use App\Models\MemoryCard;
use Illuminate\Http\JsonResponse;

class CameraController extends Controller
{
    public function index(): JsonResponse
    {
        $cameras = Camera::with('memoryCards')->paginate(10);
        return response()->json($cameras);
    }

    public function show(Camera $camera): JsonResponse
    {
        $camera->load('memoryCards');
        return response()->json($camera);
    }

    public function store(StoreCameraRequest $request): JsonResponse
    {
        $camera = Camera::create($request->validated());
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

    public function attachCard(Camera $camera, MemoryCard $memoryCard): JsonResponse
    {
        $camera->memoryCards()->syncWithoutDetaching([$memoryCard->id]);
        return response()->json(['message' => 'Cartão vinculado com sucesso.']);
    }

    public function detachCard(Camera $camera, MemoryCard $memoryCard): JsonResponse
    {
        $camera->memoryCards()->detach($memoryCard->id);
        return response()->json(['message' => 'Cartão desvinculado com sucesso.']);
    }
}
