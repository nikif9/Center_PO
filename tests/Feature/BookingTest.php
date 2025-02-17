<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Resource;
use App\Models\Booking;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_booking()
    {
        // Сначала создаём ресурс
        $resource = Resource::create([
            'name' => 'Car',
            'type' => 'vehicle',
            'description' => 'Аренда автомобиля'
        ]);

        $payload = [
            'resource_id' => $resource->id,
            'user_id'     => 1,
            'start_time'  => now()->addHour()->format('Y-m-d H:i:s'),
            'end_time'    => now()->addHours(2)->format('Y-m-d H:i:s'),
        ];

        $response = $this->json('POST', '/api/bookings', $payload);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'data' => ['id', 'resource_id', 'user_id', 'start_time', 'end_time', 'created_at', 'updated_at']
                 ]);

        $this->assertDatabaseHas('bookings', ['resource_id' => $resource->id, 'user_id' => 1]);
    }

    public function test_can_cancel_booking()
    {
        $resource = Resource::create([
            'name' => 'Meeting Room',
            'type' => 'room',
            'description' => 'Комната для встреч'
        ]);

        $booking = Booking::create([
            'resource_id' => $resource->id,
            'user_id'     => 2,
            'start_time'  => now()->addHour()->format('Y-m-d H:i:s'),
            'end_time'    => now()->addHours(2)->format('Y-m-d H:i:s'),
        ]);

        $response = $this->json('DELETE', "/api/bookings/{$booking->id}");
        $response->assertStatus(204);

        $this->assertDatabaseMissing('bookings', ['id' => $booking->id]);
    }
}
