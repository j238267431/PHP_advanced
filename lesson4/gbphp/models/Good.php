<?php

namespace App\models;

class Good extends Model
{
    public $id;
    public $name;
    public $price;
    public $info;
    



    public static function getTableName(): string
    {
        return 'goods';
    }

    public function __toString()
    {
        return '';
    }

    public static function getPerPage()
    {
        return 10;
    }

//    public function getCategory()
//    {
//        $sql = '';
//        static::getDB()->findObject($sql, Category::class);
//    }
}
