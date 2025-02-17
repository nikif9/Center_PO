<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ResourceController;
use App\Http\Controllers\API\BookingController;

Route::post('/resources', [ResourceController::class, 'store']);
Route::get('/resources', [ResourceController::class, 'index']);
Route::get('/resources/{id}/bookings', [ResourceController::class, 'bookings']);

Route::post('/bookings', [BookingController::class, 'store']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
