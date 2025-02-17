<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreBookingRequest
 *
 * Обрабатывает валидацию данных для создания бронирования.
 *
 * @package App\Http\Requests
 */
class StoreBookingRequest extends FormRequest
{
    /**
     * Определяет, авторизован ли пользователь для выполнения данного запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Возвращает правила валидации для запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'resource_id' => 'required|exists:resources,id',
            'user_id'     => 'required|integer',
            'start_time'  => 'required|date_format:Y-m-d H:i:s',
            'end_time'    => 'required|date_format:Y-m-d H:i:s|after:start_time',
        ];
    }
}
