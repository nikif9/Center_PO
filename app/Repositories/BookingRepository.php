<?php

namespace App\Repositories;

use App\Models\Booking;

/**
 * Class BookingRepository
 *
 * Реализация интерфейса BookingRepositoryInterface.
 *
 * @package App\Repositories
 */
class BookingRepository implements BookingRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data): Booking
    {
        return Booking::create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function getByResource($resourceId)
    {
        return Booking::where('resource_id', $resourceId)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id): bool
    {
        $booking = Booking::find($id);
        if ($booking) {
            return $booking->delete();
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id): ?Booking
    {
        return Booking::find($id);
    }
}
