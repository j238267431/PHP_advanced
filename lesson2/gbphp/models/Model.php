<?php
namespace App\models;
abstract class Model
{

    protected $db;

    /**
     * Возвращает название таблицы
     *
     * @return string
     */
    abstract public function getTableName(): string;

    /**
     * Model constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getOne($id)
    {
        $sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE id = ' . $id;
        return $this->db->find($sql);
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->getTableName() ;
        return $this->db->findAll($sql);
    }
}