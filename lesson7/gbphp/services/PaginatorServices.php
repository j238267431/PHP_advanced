<?php

namespace App\services;

use App\entities\Entity;
use App\repositories\UserRepository;
use App\repositories\GoodRepository;

class PaginatorServices
{
    protected $items = [];
    protected $count = 0;
    protected $root = '';

    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function getUserOrders(Entity $entity, $pageNumber = 1, $userId)
    {
        $countData = $this->container->cartRepository->getCountUserOrders($userId);
        $this->count = $countData['count'];
        $this->items = $this->container->cartRepository->getModelByPage($pageNumber, $userId);
        $this->root = $entity->getBaseRoot();
    }

    public function setItems(Entity $entity, $pageNumber = 1)
    {
        $repo =  $entity->getRepoName();
        $countData = $this->container->$repo->getCountList();
        $this->count = $countData['count'];
        $this->items = $this->container->$repo->getModelsByPage($pageNumber);
        $this->root = $entity->getBaseRoot();
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getUrls()
    {
        $counter = intdiv($this->count, 10);
        if ($this->count % 10) {
            $counter++;
        }

        $urls = [];

        for ($i = 1; $i <= $counter; $i++) {
            $urls[$i] = $this->root . '/?page=' . $i;
        }

        return $urls;
    }
}
