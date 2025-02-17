<?php

namespace App\Services;

use App\Models\Booking;
use App\Repositories\BookingRepositoryInterface;

/**
 * Class BookingService
 *
 * Сервис для работы с бронированиями.
 *
 * @package App\Services
 */
class BookingService
{
    /**
     * @var BookingRepositoryInterface
     */
    protected $bookingRepository;

    /**
     * BookingService constructor.
     *
     * @param BookingRepositoryInterface $bookingRepository
     */
    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Создает новое бронирование.
     *
     * @param array $data
     * @return Booking
     */
    public function createBooking(array $data): Booking
    {
        // Здесь можно добавить проверку доступности ресурса и другую бизнес-логику
        return $this->bookingRepository->create($data);
    }

    /**
     * Возвращает бронирования для заданного ресурса.
     *
     * @param int $resourceId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getBookingsByResource($resourceId)
    {
        return $this->bookingRepository->getByResource($resourceId);
    }

    /**
     * Отменяет бронирование по его ID.
     *
     * @param int $id
     * @return bool
     */
    public function cancelBooking($id): bool
    {
        // Дополнительная логика отмены бронирования (например, проверки) может быть добавлена здесь
        return $this->bookingRepository->delete($id);
    }
    
    /**
     * Ищет бронирование по ID.
     *
     * @param int $id
     * @return Booking|null
     */
    public function find($id): ?Booking
    {
        return $this->bookingRepository->find($id);
    }
}
