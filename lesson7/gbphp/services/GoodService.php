<?php

namespace App\services;


use App\entities\Good;
use App\repositories\GoodRepository;

class GoodService extends Service
{
    public function save($id, $data)
    {
        if(!$this->isDataExists($data)){
            return null;
        }

        $good = $this->container->good;

        if (!empty($id)) {
            $good = $this->container->goodRepository->getOne($id);
        }
        $good->name = $data['name'];
        $good->info = $data['info'];
        $good->price = $data['price'];
        $this->container->goodRepository->getOne($id);
        $this->container->goodRepository->save($good);

        return $good;
    }

    protected function isDataExists($data){
        if(empty($data['name']) || empty($data['info']) || empty($data['price'])){
            return false;
        }
        return true;
    }
}