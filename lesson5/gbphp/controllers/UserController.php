<?php

namespace App\controllers;

use App\models\User;
use App\services\PaginatorServices;

class UserController extends Controller
{
    public function allAction()
    {
        $paginator = new PaginatorServices();
        $user = new User();
        $paginator->setItems($user, $this->getPage());
        return $this->render(
            'users',
            [
                'paginator' => $paginator,
                'users' => User::getAll(),
            ]
        );
    }



    public function oneAction()
    {
        $id = $this->getId();
        return $this->render(
            'user',
            [
                'user' => User::getOne($id),
            ]
        );
    }

    public function delAction()
    {
        $id = $this->getId();
        /** @var User $user */
        $user = User::getOne($id);
        $user->delete();
        header("Location: /");
    }

    protected function deleteAction()
    {
        $user = new User;
        $user->id = $this->getId();
        $user->delete();
        return $this->render(
            'users',
            [
                'users' => User::getAll(),
            ]
        );
    }

}