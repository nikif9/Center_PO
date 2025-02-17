<?php

namespace App\Repositories;

use App\Models\Booking;

/**
 * Interface BookingRepositoryInterface
 *
 * Интерфейс для работы с бронированиями.
 *
 * @package App\Repositories
 */
interface BookingRepositoryInterface
{
    /**
     * Создает новое бронирование.
     *
     * @param array $data
     * @return Booking
     */
    public function create(array $data): Booking;

    /**
     * Возвращает бронирования для заданного ресурса.
     *
     * @param int $resourceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByResource($resourceId);

    /**
     * Удаляет бронирование по ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id): bool;

    /**
     * Ищет бронирование по ID.
     *
     * @param int $id
     * @return Booking|null
     */
    public function find($id): ?Booking;
}
