<?php

namespace App\controllers;

use App\entities\User;
use App\services\PaginatorServices;
use App\repositories\UserRepository;

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
            ]
        );
    }

    public function oneAction()
    {
        $id = $this->getId();
        return $this->render(
            'user',
            [
                'user' => (new UserRepository())->getOne($id),
            ]
        );
    }

    public function delAction()
    {
        $id = $this->getId();
        /** @var User $user */
        (new UserRepository())->getOne($this->getId());
        (new UserRepository())->delete();
        header("Location: /");
    }
}