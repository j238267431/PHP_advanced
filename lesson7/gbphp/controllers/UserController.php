<?php

namespace App\controllers;

use App\entities\User;
use App\services\PaginatorServices;
use App\repositories\UserRepository;

class UserController extends Controller
{
    public function allAction()
    {
        $paginator = $this->app->paginatorServices;
        $user = $this->app->user;
        $paginator->setItems($user, $this->getPage());
        return $this->render(
            'users',
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
            'user',
            [
                'user' => $this->app->userRepository->getOne($id),
                'access' => $this->request->getSession('access'),
                'admin' => $this->request->getSession('admin')
            ]
        );
    }

    public function delAction()
    {
        // $id = $this->getId();
        /** @var User $user */
        $this->app->userRepository->getOne($this->getId());
        $this->app->userRepository->delete();
        header("Location: /");
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $this->request->getGet()['id'];
            $this->app->userService->save(
                $id,
                $this->request->getPost()
            );
            $this->request->setSession('access', true);
            $this->request->toPath('/good/all');
            return;
        }

        return $this->render(
            'addUser',
            [
                'user' => $this->app->user,
                'access' => $this->request->getSession('access'),
                'admin' => $this->request->getSession('admin')
            ]
        );
    }

    public function showOrdersAction()
    {
        $paginator = $this->app->paginatorServices;
        $cart = $this->app->cart;
        $paginator->getUserOrders($cart, $this->getPage(), $this->request->getSession('userId'));
        return $this->render(
            'userOrders',
            [
                'paginator' => $paginator,
                'access' => $this->request->getSession('access'),
                'admin' => $this->request->getSession('admin')
            ]
        );
    }
}