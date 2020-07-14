<?php

namespace App\models;

class Good extends Model
{
    public $id;
    public $name;
    public $price;
    public $info;
    public $img ='img';

    public function getTableName(): string
    {
        return 'goods';
    }
    public function getValues(): string
    {
        return 'VALUES(:name, :price, :info, :img)';
    }

    public function getFields(): string{
        return ' (name, price, info, img) ';
    }
    public function getSet(): string
    {
        return 'VALUES(:name, :price, :info, :img)';
    }
}
