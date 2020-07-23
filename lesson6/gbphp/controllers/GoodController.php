<?php

namespace App\controllers;



use App\entities\Good;
use App\repositories\GoodRepository;
use App\services\GoodService;
use App\services\PaginatorServices;
use App\services\Request;

class GoodController  extends Controller
{
    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = new Request;
            $id = $request->getGet()['id'];
            // $id = $this->getId(); // TODO
            (new GoodService())->save($id);
            header('Location: /good/all');
            return;
        }

        return $this->render(
            'addGood',
            ['good' => new Good() ]
        );
    }

    public function updateAction()
    {
        $request = new Request;
        $id = $request->getGet()['id'];
        return $this->render(
            'addGood',
            ['good' => (new GoodRepository())->getOne($id) ]
        );
    }

    public function allAction()
    {
        $paginator = new PaginatorServices();
        $good = new Good;
        $paginator->setItems($good, $this->getPage());
        return $this->render(
            'goods',
            [
                // 'goods' => (new GoodRepository())->getAll(),
                'paginator' => $paginator,
            ]
        );
    }

    public function oneAction()
    {
        $id = $this->getId();
        return $this->render(
            'good',
            [
                'good' => (new GoodRepository())->getOne($id),
            ]
        );
    }
}
