<?php

namespace App\services;


use App\entities\Good;
use App\repositories\GoodRepository;

class GoodService
{
    public function save($id)
    {

        $good = new Good();

        if (!empty($id)) {
            $good = (new GoodRepository())->getOne($id);
        }
        $request = new Request;
        $post = $request->getPost();
        $good->name = $post['name'];
        $good->info = $post['info'];
        $good->price = $post['price'];
        (new GoodRepository())->save($good);
    }
}