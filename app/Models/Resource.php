<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resource
 *
 * Модель, представляющая ресурс, который можно бронировать.
 *
 * @package App\Models
 *
 * @OA\Schema(
 *     schema="Resource", type="object",
 *     title="Resource", required={"id", "name", "type"},
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1),
 *     @OA\Property(property="name", type="string", example="Conference Room"),
 *     @OA\Property(property="type", type="string", example="room"),
 *     @OA\Property(property="description", type="string", nullable=true, example="Описание конференц-зала"),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true, example="2025-02-17T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true, example="2025-02-17T10:00:00Z")
 * )
 */

class Resource extends Model
{
    /**
     * Атрибуты, которые можно массово назначать.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'description'];

    /**
     * Получает бронирования, связанные с данным ресурсом.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
