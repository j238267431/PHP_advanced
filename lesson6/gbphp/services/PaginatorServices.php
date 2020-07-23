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


    public function setItems(Entity $entity, $pageNumber = 1)
    {
        $repo =  $entity->getRepoName();
        $countData = (new $repo())->getCountList();
        // $countData = (new UserRepository())->getCountList();
        $this->count = $countData['count'];
        $this->items = (new $repo())->getModelsByPage($pageNumber);
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
