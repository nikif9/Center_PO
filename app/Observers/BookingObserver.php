<?php

namespace App\Observers;

use App\Models\Booking;
use Illuminate\Support\Facades\Log;

/**
 * Class BookingObserver
 *
 * Наблюдатель для модели Booking, осуществляет уведомления при создании и удалении бронирования.
 *
 * @package App\Observers
 */
class BookingObserver
{
     /**
     * Обрабатывает событие создания бронирования.
     *
     * @param Booking $booking
     * @return void
     */
    public function created(Booking $booking): void
    {
        Log::info("Бронирование создано: ID {$booking->id}");
    }

    /**
     * Обрабатывает событие удаления (отмены) бронирования.
     *
     * @param Booking $booking
     * @return void
     */
    public function deleted(Booking $booking): void
    {
        Log::info("Бронирование отменено: ID {$booking->id}");
    }
}
