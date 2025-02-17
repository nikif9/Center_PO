<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BookingResource;
use App\Services\BookingService;

/**
 * Class BookingController
 *
 * Контроллер для управления бронированиями.
 *
 * @package App\Http\Controllers\API
 */
class BookingController extends Controller
{
    /**
     * @var BookingService
     */
    protected $bookingService;

    /**
     * BookingController constructor.
     *
     * @param BookingService $bookingService
     */
    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * Создает новое бронирование.
     * 
     * @OA\Post(
     *     path="/api/bookings", operationId="createBooking", tags={"Bookings"},
     *     summary="Создание бронирования", description="Создает новое бронирование для ресурса",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"resource_id", "user_id", "start_time", "end_time"},
     *             @OA\Property(property="resource_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=2),
     *             @OA\Property(property="start_time", type="string", format="date-time", example="2025-02-17T10:00:00Z"),
     *             @OA\Property(property="end_time", type="string", format="date-time", example="2025-02-17T11:00:00Z")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Бронирование создано успешно", @OA\JsonContent(ref="#/components/schemas/Booking")),
     *     @OA\Response( response=422,description="Ошибка валидации")
     * )
     * @param StoreBookingRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = $this->bookingService->createBooking($request->validated());
        return new BookingResource($booking);
    }

    /**
     * Отменяет бронирование по его ID.
     * 
     * @OA\Delete(
     *     path="/api/bookings/{id}", operationId="deleteBooking", tags={"Bookings"},
     *     summary="Отмена бронирования", description="Отменяет бронирование по его ID",
     *     @OA\Parameter(name="id", in="path", description="ID бронирования", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Бронирование успешно отменено"),
     *     @OA\Response(response=404, description="Бронирование не найдено")
     * )
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $booking = $this->bookingService->find($id);
        if (!$booking) {
            return response()->json(['error' => 'Бронирование не найдено'], 404);
        }
        $this->bookingService->cancelBooking($id);
        return response()->json(null, 204);
    }
}
