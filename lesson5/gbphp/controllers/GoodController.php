<?php

namespace App\controllers;

use App\models\Good;
use App\models\User;
use App\services\PaginatorServices;

class GoodController  extends Controller
{
    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $good = new Good();
            $id = $this->getId();
            if (!empty($id)) {
                $good = Good::getOne($id);
            }

            $good->name = $_POST['name'];
            $good->info = $_POST['info'];
            $good->price = $_POST['price'];
            $good->save();
            header('Location: ?c=good&a=all');
            return;
        }
        return $this->render(
            'addGood',
            ['good' => new Good() ]
        );
    }

    public function updateAction()
    {
        return $this->render(
            'addGood',
            ['good' => Good::getOne($this->getId()) ]
        );
    }

    public function allAction()
    {
        $paginator = new PaginatorServices();
        $good = new Good();
        $paginator->setItems($good, $this->getPage());
        return $this->render(
            'goods',
            [
                'paginator' => $paginator,
                'goods' => Good::getAll(),
            ]
        );
    }

    public function oneAction()
    {
        $id = $this->getId();
        return $this->render(
            'good',
            [
                'good' => Good::getOne($id),
            ]
        );
    }


    protected function deleteAction()
    {
        $good = new Good;
        $good->id = $this->getId();
        $good->delete();
        return $this->render(
            'goods',
            [
                'goods' => Good::getAll(),
            ]
        );
    }
}
