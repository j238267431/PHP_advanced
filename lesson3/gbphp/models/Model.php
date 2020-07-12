<?php
namespace App\models;

use App\services\DB;

abstract class Model
{
    /**
     * @var DB
     */
    protected $db;

    /**
     * Возвращает название таблицы
     *
     * @return string
     */
    abstract public function getTableName(): string;
    abstract public function getValues(): string;
    abstract public function getFields(): string;
    abstract public function getSet(): string;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getOne($id)
    {
        $sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE id = :id';
        return $this->db->find($sql, [':id' => $id]);
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->getTableName() ;
        return $this->db->findAll($sql);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE id=:id';
        return $this->db->delete($sql, [':id' => $id]);
    }

    protected function insert()
    {
        $sql = 'INSERT INTO ' . $this->getTableName() . $this->getFields() . $this->getValues();
        $params=[];

        foreach ($this as $key => $value) {
            if($key == 'db' || $key == 'id') continue;
            $params[':'.$key] = $value;
        }

        $this->db->execute($sql, $params);
    }

    protected function update()
    {
        $sql = 'UPDATE ' . $this->getTableName() . 
        ' SET fio=:name, login=:login, password=:password, is_admin=:is_admin WHERE id = :id';
        $params=[];
        
        foreach ($this as $key => $value) {
            if($key == 'db') continue;
            $params[':'.$key] = $value;
        }
        return $this->db->update($sql, $params);
    }

    public function save()
    {
        if(empty($this->id)) {
            return $this->insert();
        }
        return $this->update();
    }
}