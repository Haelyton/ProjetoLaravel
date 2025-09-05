<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoryCardRequest;
use App\Http\Requests\UpdateMemoryCardRequest;
use App\Models\MemoryCard;
use Illuminate\Http\JsonResponse;

class MemoryCardController extends Controller
{
    public function index(): JsonResponse
    {
        $cards = MemoryCard::with('cameras')->paginate(10);
        return response()->json($cards);
    }

    public function show(MemoryCard $memoryCard): JsonResponse
    {
        $memoryCard->load('cameras');
        return response()->json($memoryCard);
    }

    public function store(StoreMemoryCardRequest $request): JsonResponse
    {
        $card = MemoryCard::create($request->validated());
        return response()->json($card, 201);
    }

    public function update(UpdateMemoryCardRequest $request, MemoryCard $memoryCard): JsonResponse
    {
        $memoryCard->update($request->validated());
        return response()->json($memoryCard);
    }

    public function destroy(MemoryCard $memoryCard): JsonResponse
    {
        $memoryCard->delete();
        return response()->json([], 204);
    }
}
