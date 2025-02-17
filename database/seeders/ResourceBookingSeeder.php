<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resource;
use App\Models\Booking;
use Carbon\Carbon;

class ResourceBookingSeeder extends Seeder
{
    /**
     * Запуск сидера.
     *
     * @return void
     */
    public function run()
    {
        // Создаем тестовые ресурсы
        $resource1 = Resource::create([
            'name'        => 'Conference Room A',
            'type'        => 'room',
            'description' => 'Большая конференц-зала с проектором',
        ]);

        $resource2 = Resource::create([
            'name'        => 'Sedan Car',
            'type'        => 'vehicle',
            'description' => 'Комфортный седан для деловых поездок',
        ]);

        $resource3 = Resource::create([
            'name'        => 'Meeting Room B',
            'type'        => 'room',
            'description' => 'Небольшая переговорная комната для собраний',
        ]);

        // Создаем бронирования для первого ресурса
        Booking::create([
            'resource_id' => $resource1->id,
            'user_id'     => 1,
            'start_time'  => Carbon::now()->addDays(1)->format('Y-m-d H:i:s'),
            'end_time'    => Carbon::now()->addDays(1)->addHours(2)->format('Y-m-d H:i:s'),
        ]);

        Booking::create([
            'resource_id' => $resource1->id,
            'user_id'     => 2,
            'start_time'  => Carbon::now()->addDays(3)->format('Y-m-d H:i:s'),
            'end_time'    => Carbon::now()->addDays(3)->addHours(1)->format('Y-m-d H:i:s'),
        ]);

        // Создаем бронирование для второго ресурса
        Booking::create([
            'resource_id' => $resource2->id,
            'user_id'     => 3,
            'start_time'  => Carbon::now()->addDays(2)->format('Y-m-d H:i:s'),
            'end_time'    => Carbon::now()->addDays(2)->addHours(3)->format('Y-m-d H:i:s'),
        ]);

        // Создаем бронирование для третьего ресурса
        Booking::create([
            'resource_id' => $resource3->id,
            'user_id'     => 4,
            'start_time'  => Carbon::now()->addDays(4)->format('Y-m-d H:i:s'),
            'end_time'    => Carbon::now()->addDays(4)->addHours(2)->format('Y-m-d H:i:s'),
        ]);
    }
}
