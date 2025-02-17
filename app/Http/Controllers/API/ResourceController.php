<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResourceRequest;
use App\Http\Resources\ResourceResource;
use App\Http\Resources\BookingResource;
use App\Services\ResourceService;
use App\Services\BookingService;

/**
 * 
 * Class ResourceController
 *
 * Контроллер для управления ресурсами.
 *
 * @package App\Http\Controllers\API
 * 
 * @OA\Info(
 *     title="Resource Booking API",
 *     version="1.0.0",
 *     description="API documentation for Resource Booking System",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 */
class ResourceController extends Controller
{
    /**
     * @var ResourceService
     */
    protected $resourceService;

    /**
     * @var BookingService
     */
    protected $bookingService;


    /**
     * ResourceController constructor.
     *
     * @param ResourceService $resourceService
     * @param BookingService  $bookingService
     */
    public function __construct(ResourceService $resourceService, BookingService $bookingService)
    {
        $this->resourceService = $resourceService;
        $this->bookingService  = $bookingService;
    }

     /**
     * Создает новый ресурс.
     * 
     * @OA\Post(
     *     path="/api/resources",
     *     operationId="createResource",
     *     tags={"Resources"},
     *     summary="Создание ресурса",
     *     description="Создает новый ресурс",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "type"},
     *             @OA\Property(property="name", type="string", example="Conference Room"),
     *             @OA\Property(property="type", type="string", example="room"),
     *             @OA\Property(property="description", type="string", example="Описание конференц-зала")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ресурс создан успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Resource")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации"
     *     )
     * )
     * @param StoreResourceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreResourceRequest $request)
    {
        $resource = $this->resourceService->createResource($request->validated());
        return new ResourceResource($resource);
    }

    /**
     * Возвращает список всех ресурсов.
     * 
     * @OA\Get(
     *     path="/api/resources",
     *     operationId="getResourcesList",
     *     tags={"Resources"},
     *     summary="Получение списка ресурсов",
     *     description="Возвращает список всех ресурсов",
     *     @OA\Response(
     *         response=200,
     *         description="Успешная операция",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Resource")
     *         )
     *     )
     * )
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $resources = $this->resourceService->getAllResources();
        return ResourceResource::collection($resources);
    }

    /**
     * Возвращает список бронирований для указанного ресурса.
     * 
     * @OA\Get(
     *     path="/api/resources/{id}/bookings",
     *     operationId="getResourceBookings",
     *     tags={"Resources"},
     *     summary="Получение бронирований для ресурса",
     *     description="Возвращает список бронирований для указанного ресурса",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID ресурса",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешная операция",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Booking")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ресурс не найден"
     *     )
     * )
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function bookings($id)
    {
        $resource = $this->resourceService->getResourceById($id);
        if (!$resource) {
            return response()->json(['error' => 'Ресурс не найден'], 404);
        }
        $bookings = $this->bookingService->getBookingsByResource($id);
        return BookingResource::collection($bookings);
    }
}