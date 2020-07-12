<?php
namespace App\models;

class User extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;
    public $is_admin = 0;

    public function getTableName(): string
    {
        return 'users';
    }
    public function getValues(): string
    {
        return 'VALUES(:name, :login, :password, :is_admin)';
    }
    public function getFields(): string{
        return ' (fio, login, password, is_admin) ';
    }
    public function getSet(): string
    {
        return ' SET(fio, login, password, is_admin) ';
    }
}
