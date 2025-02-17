<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 *
 * Модель, представляющая бронирование ресурса.
 *
 * @package App\Models
 *
 * @OA\Schema(
 *     schema="Booking", type="object",
 *     title="Booking", required={"id", "resource_id", "user_id", "start_time", "end_time"},
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1),
 *     @OA\Property(property="resource_id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=2),
 *     @OA\Property(property="start_time", type="string", format="date-time", example="2025-02-17T10:00:00Z"),
 *     @OA\Property(property="end_time", type="string", format="date-time", example="2025-02-17T11:00:00Z"),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true, example="2025-02-17T09:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true, example="2025-02-17T09:00:00Z")
 * )
 */


class Booking extends Model
{
    /**
     * Атрибуты, которые можно массово назначать.
     *
     * @var array
     */
    protected $fillable = ['resource_id', 'user_id', 'start_time', 'end_time'];

    /**
     * Получает ресурс, к которому относится бронирование.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
