<?php

namespace App\repositories;

use App\entities\Entity;
use App\services\DB;

abstract class Repository
{
    /**
     * Возвращает название таблицы
     *
     * @return string
     */
    abstract public function getTableName(): string;
    abstract public function getEntityName(): string;

    /**
     * @return DB
     */
    protected static function getDB()
    {
        return DB::getInstance();
    }

    public function getModelsByPage($page = 1)
    {
        $start = ($page - 1) * 10;
        $sql = "SELECT * FROM " . $this->getTableName() . " LIMIT {$start}, 10";
        return static::getDB()->findObjects($sql, $this->getEntityName());
    }

    public function getCountList()
    {
        $sql = "SELECT count(*) AS `count` FROM " . $this->getTableName();
        return static::getDB()->find($sql);
    }

    public function getOne($id)
    {
        $sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE id = :id';
        return static::getDB()->findObject($sql, $this->getEntityName(), [':id' => $id]);
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->getTableName() ;
        return static::getDB()->findObjects($sql, $this->getEntityName());
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE id = :id';
        return static::getDB()->execute($sql, [':id' => $this->id]);
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
            $entity->id
        );

        static::getDB()->execute($sql, $params);
    }

    public function save(Entity $entity)
    {
        if(empty($entity->id)) {
            $this->insert($entity);
            return;
        }
        $this->update($entity);
        return;
    }

    public function insert(Entity $entity)
    {
        $result = $entity->getData($entity);
        $columns = $result['columns'];
        $params = $result['params'];

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->getTableName(),
            implode(',', $columns),
            implode(',', array_keys($params))
        );

        static::getDB()->execute($sql, $params);
        $this->id = static::getDB()->getInsertId();
    }
}
