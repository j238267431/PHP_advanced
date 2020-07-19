<?php
namespace App\models;
/**
 * Class User
 * @package App\models
 *
 * @method User static getOne
 */
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
        return '123123';
    }
}
