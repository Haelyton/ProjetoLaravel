<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Camera;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CameraApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_cameras_public()
    {
        Camera::factory()->create(['marca' => 'Sony', 'modelo' => 'A6100', 'resolucao' => '24MP', 'preco' => 3500]);
        $resp = $this->getJson('/api/cameras');
        $resp->assertOk()->assertJsonFragment(['marca' => 'Sony']);
    }

    public function test_create_camera_requires_auth()
    {
        $resp = $this->postJson('/api/cameras', [
            'marca' => 'Canon', 'modelo' => 'R10', 'resolucao' => '24MP', 'preco' => 5200
        ]);
        $resp->assertStatus(401);
    }

    public function test_create_update_delete_camera_authenticated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $create = $this->postJson('/api/cameras', [
            'marca' => 'Canon', 'modelo' => 'R10', 'resolucao' => '24MP', 'preco' => 5200
        ]);
        $create->assertCreated()->assertJsonFragment(['modelo' => 'R10']);
        $id = $create->json('id');

        $update = $this->putJson("/api/cameras/{$id}", ['preco' => 4999.90]);
        $update->assertOk()->assertJsonFragment(['preco' => 4999.90]);

        $delete = $this->deleteJson("/api/cameras/{$id}");
        $delete->assertNoContent();
    }
}
