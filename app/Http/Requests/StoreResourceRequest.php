<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreResourceRequest
 *
 * Обрабатывает валидацию данных для создания ресурса.
 *
 * @package App\Http\Requests
 */
class StoreResourceRequest extends FormRequest
{
    /**
     * Определяет, авторизован ли пользователь для выполнения данного запроса.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Возвращает правила валидации для запроса.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|string|max:255',
            'type'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
