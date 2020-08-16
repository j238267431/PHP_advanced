<?php

namespace App\repositories;

use App\entities\Entity;
use App\services\DB;
use App\engine\app;

abstract class Repository
{
    /**
     * @property Container
     */
    protected $container;
    protected $db;

    /**
     * Возвращает название таблицы
     *
     * @return string
     */
    abstract public function getTableName(): string;
    abstract public function getEntityName(): string;

    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return DB
     */
    protected function getDB()
    {
        return App::call()->db;
        return $this->container->db;
    }

    public function getModelByPage($page = 1, $userId)
    {
        $start = ($page - 1) * 10;
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE user_id = {$userId} LIMIT {$start}, 10";
        return $this->getDB()->findObjects($sql, $this->getEntityName());
    }

    public function getModelsByPage($page = 1)
    {
        $start = ($page - 1) * 10;
        $sql = "SELECT * FROM " . $this->getTableName() . " LIMIT {$start}, 10";
        return $this->getDB()->findObjects($sql, $this->getEntityName());
    }


    public function getCountUserOrders($userId)
    {
        $sql = "SELECT count(*) AS `count` FROM " . $this->getTableName() . " WHERE user_id = {$userId}";
        return $this->getDB()->find($sql);
    }

    public function getCountList()
    {
        $sql = "SELECT count(*) AS `count` FROM " . $this->getTableName();
        return $this->getDB()->find($sql);
    }

    public function getOne($id, $column = 'id')
    {
        // $sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE id = :id';
        $sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE ' . $column . '= :id';
        return $this->getDB()->findObject($sql, $this->getEntityName(), [':id' => $id]);
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->getTableName() ;
        return $this->getDB()->findObjects($sql, $this->getEntityName());
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE id = :id';
        return $this->getDB()->execute($sql, [':id' => $this->id]);
    }

    protected function update(Entity $entity)
    {
        $result = $entity->getData($entity);
        $columns = $result['upColumns'];
        $params = $result['params'];
        $sql = sprintf(
            "UPDATE %s SET %s WHERE id=%s",
            $this->getTableName(),
            implode(',', $columns),
            $entity->getId()
        );

        $this->getDB()->execute($sql, $params);
    }

    public function save(Entity $entity)
    {
        if(!$entity->getid()) {
            $this->insert($entity);
            return;
        }
        $this->update($entity);
        return;
    }

    public function insert(Entity $entity, $userId = '')
    {
        $result = $entity->getData($entity);
        $columns = $result['columns'];
        $params = $result['params'];


        if($userId){
            $columns[] = 'user_id';
            $params[':id'] = $userId;
        }

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->getTableName(),
            implode(',', $columns),
            implode(',', array_keys($params))
        );

        $this->getDB()->execute($sql, $params);
        $this->id = $this->getDB()->getInsertId();
    }
}
