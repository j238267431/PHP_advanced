<?php
namespace App\models;

class User extends Model
{
    public $id;
    public $fio;
    public $login;
    public $password;

    public static function getTableName(): string
    {
        return 'users';
    }

    public function __toString()
    {
        return '';
    }
    public static function getPerPage()
    {
        return 200;
    }

}
