<?php

namespace App\Repositories;

use App\Models\Resource;

/**
 * Class ResourceRepository
 *
 * Реализация интерфейса ResourceRepositoryInterface.
 *
 * @package App\Repositories
 */
class ResourceRepository implements ResourceRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data): Resource
    {
        return Resource::create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Resource::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id): ?Resource
    {
        return Resource::find($id);
    }
}
