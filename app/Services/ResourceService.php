<?php 

namespace App\Services;

use App\Models\Resource;
use App\Repositories\ResourceRepositoryInterface;

/**
 * Class ResourceService
 *
 * Сервис для работы с ресурсами.
 *
 * @package App\Services
 */
class ResourceService
{
    /**
     * @var ResourceRepositoryInterface
     */
    protected $resourceRepository;

    /**
     * ResourceService constructor.
     *
     * @param ResourceRepositoryInterface $resourceRepository
     */
    public function __construct(ResourceRepositoryInterface $resourceRepository)
    {
        $this->resourceRepository = $resourceRepository;
    }

    /**
     * Создает новый ресурс.
     *
     * @param array $data
     * @return Resource
     */
    public function createResource(array $data): Resource
    {
        return $this->resourceRepository->create($data);
    }

    /**
     * Возвращает коллекцию всех ресурсов.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllResources()
    {
        return $this->resourceRepository->all();
    }

    /**
     * Ищет ресурс по ID.
     *
     * @param int $id
     * @return Resource|null
     */
    public function getResourceById($id): ?Resource
    {
        return $this->resourceRepository->find($id);
    }
}
