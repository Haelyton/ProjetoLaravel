<?php

namespace Tests\Unit;

use App\Models\Camera;
use App\Models\MemoryCard;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class CameraRelationsTest extends TestCase
{
    public function test_camera_has_many_to_many_memory_cards_relation()
    {
        $camera = new Camera();
        $relation = $camera->memoryCards();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals((new MemoryCard())->getTable(), $relation->getRelated()->getTable());
    }
}
