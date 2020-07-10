<?php
namespace App\services;
class DB
{


    public function find($sql)
    {
        return $sql . ' find';
    }

    public function findAll($sql)
    {
        return $sql . ' findAll';
    }

}