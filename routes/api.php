<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CameraController;
use App\Http\Controllers\Api\MemoryCardController;

Route::get('/cameras', [CameraController::class, 'index']);
Route::get('/cameras/{camera}', [CameraController::class, 'show']);

Route::get('/memory-cards', [MemoryCardController::class, 'index']);
Route::get('/memory-cards/{memoryCard}', [MemoryCardController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cameras', [CameraController::class, 'store']);
    Route::put('/cameras/{camera}', [CameraController::class, 'update']);
    Route::delete('/cameras/{camera}', [CameraController::class, 'destroy']);

    Route::post('/memory-cards', [MemoryCardController::class, 'store']);
    Route::put('/memory-cards/{memoryCard}', [MemoryCardController::class, 'update']);
    Route::delete('/memory-cards/{memoryCard}', [MemoryCardController::class, 'destroy']);

    Route::post('/cameras/{camera}/attach-card/{memoryCard}', [CameraController::class, 'attachCard']);
    Route::post('/cameras/{camera}/detach-card/{memoryCard}', [CameraController::class, 'detachCard']);
});
