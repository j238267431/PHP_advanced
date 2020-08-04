<?php


namespace App\entities;

class Good extends Entity
{
    public $id;
    public $name;
    public $price;
    public $info;
    protected $baseRoot = '/good/all';
    public function getVars()
    {
       return get_object_vars($this);
    }

    public function getRepoName()
    {
        return 'goodRepository';
    }
    public function getBaseRoot()
    {
        return $this->baseRoot;
    }
    public function getId()
    {
       return $this->id;
    }

}
