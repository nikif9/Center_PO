<?php

namespace App\Repositories;

use App\Models\Resource;

/**
 * Interface ResourceRepositoryInterface
 *
 * Интерфейс для работы с ресурсами.
 *
 * @package App\Repositories
 */
interface ResourceRepositoryInterface
{
     /**
     * Создает новый ресурс.
     *
     * @param array $data
     * @return Resource
     */
    public function create(array $data): Resource;

    /**
     * Возвращает коллекцию всех ресурсов.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Ищет ресурс по ID.
     *
     * @param int $id
     * @return Resource|null
     */
    public function find($id): ?Resource;
}
