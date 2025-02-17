<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Resource;

class ResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_resource()
    {
        $payload = [
            'name'        => 'Conference Room',
            'type'        => 'room',
            'description' => 'Большая конференц-зала'
        ];

        $response = $this->json('POST', '/api/resources', $payload);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data' => ['id', 'name', 'type', 'description', 'created_at', 'updated_at']
                 ]);

        $this->assertDatabaseHas('resources', ['name' => 'Conference Room']);
    }
}