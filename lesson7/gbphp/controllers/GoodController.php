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
            $id = $this->request->getGet()['id'];
            $this->app->goodService->save(
                $id,
                $this->request->getPost()
            );
            header('Location: /good/all');
            return;
        }

        return $this->render(
            'addGood',
            [
                'good' => $this->app->good,
                'access' => $this->request->getSession('access'),
                'admin' => $this->request->getSession('admin')
            ]
        );
    }

    public function updateAction()
    {
        $id = $this->request->getGet()['id'];
        return $this->render(
            'addGood',
            [
                'good' => $this->app->goodRepository->getOne($id),
                'access' => $this->request->getSession('access'),
                'admin' => $this->request->getSession('admin')
            ]
        );
    }

    public function allAction()
    {
        $paginator = $this->app->paginatorServices;
        $good = $this->app->good;
        $paginator->setItems($good, $this->getPage());
        return $this->render(
            'goods',
            [
                'paginator' => $paginator,
                'access' => $this->request->getSession('access'),
                'admin' => $this->request->getSession('admin')
            ]
        );
    }

    public function oneAction()
    {
        $id = $this->getId();
        return $this->render(
            'good',
            [
                'good' => $this->app->goodRepository->getOne($id),
                'access' => $this->request->getSession('access'),
                'admin' => $this->request->getSession('admin')
            ]
        );
    }
}
