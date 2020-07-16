<?php

namespace App\controllers;

use App\models\Good;

class GoodController extends Controller
{
   public function getTable($id)
    {
        if ($id){
            return 'good';
        }
        return 'goods';
    }
    public function getCntrlAll()
    {
        return Good::getAll();
    }
    public function getCntrlOne($id)
    {
        return Good::getOne($id);
    }

}