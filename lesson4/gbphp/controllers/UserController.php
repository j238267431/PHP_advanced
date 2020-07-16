<?php

namespace App\controllers;

use App\models\User;

class UserController extends Controller
{
    public function getTable($id)
    {
        if ($id){
            return 'user';
        }
        return 'users';
    }
    public function getCntrlAll()
    {
        return User::getAll();
    }
    public function getCntrlOne($id)
    {
        return User::getOne($id);
    }
    
}