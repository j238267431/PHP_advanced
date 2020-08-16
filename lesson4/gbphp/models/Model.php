<?php
namespace App\models;

use App\services\DB;
use App\models\Good;

abstract class Model
{

    /**
     * Возвращает название таблицы
     *
     * @return string
     */
    abstract public static function getTableName(): string;
    abstract public static function getPerPage();

    /**
     * @return DB
     */
    protected static function getDB()
    {
        return DB::getInstance();
    }

    public static function getOne($id)
    {
        $sql = 'SELECT * FROM ' . static::getTableName() . ' WHERE id = :id';
        return static::getDB()->findObject($sql, static::class, [':id' => $id]);
    }

    public static function getCount()
    {
        $sql = 'SELECT COUNT(*) as count FROM goods';
        $test = static::getDB()->execute($sql);
        return $test->fetch();

    }

    protected static function getCurrentPage()
    {
        if(!empty($_GET['page'])){
            return $_GET['page'];
        }
        return 1;

    }


    public static function getAll()
    {
        $currentPage = (int)static::getCurrentPage();
        $perPage = Good::getPerPage();
        $fromGood = $perPage * ($currentPage-1);
        $sql = 'SELECT * FROM ' . static::getTableName() . ' LIMIT ' . $fromGood . ', ' . $perPage;
        return static::getDB()->findObjects($sql, static::class);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::getTableName() . ' WHERE id = :id';
        $params =[':id' => $_GET['id']];
        static::getDB()->execute($sql, $params);
        header('location: ?c=good&a=all');
        $this->setMsg('товар удален');
    }

    protected function insert()
    {
        $columns = [];
        $params = [];

        foreach ($this as $key => $value) {
            if ($key == 'id' || empty($value)) {
                continue;
            }

            $columns[] = $key;
            $params[':' . $key] = $value;
        }

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            static::getTableName(),
            implode(',', $columns),
            implode(',', array_keys($params))
        );

        static::getDB()->execute($sql, $params);
        $this->id = static::getDB()->getInsertId();
        $this->setMsg('товар добавлен');
    }

    protected function update()
    {
        $columns = [];
        $params = [];
        foreach ($this as $key => $value) {
            if ($key == 'id' || empty($value)) {
                continue;
            }

            $columns[] = $key . ' = ' . ':'. $key;
            $params[':' . $key] = $value;
        }
        $sql = sprintf(
            "UPDATE %s SET %s WHERE id=%s",
            static::getTableName(),
            implode(',', $columns),
            $this->id
        );

        static::getDB()->execute($sql, $params);
        $this->setMsg('товар изменен');
    }

    public function save()
    {
        if(empty($this->id)) {
            return $this->insert();
        }
        return $this->update();
    }
    
    protected function setMsg($msg)
    {
           $_SESSION['msg'] = $msg;
    }

    public static function getMsg()
    {
        $msg = '';
        if (!empty($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
    }    
        return $msg;
    }

}