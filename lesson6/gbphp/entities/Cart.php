<?php

namespace App\entities;

class Cart extends Entity
{
   private $id;
   private $userId;
   private $items;
   private $status;


   public function getVars()
   {
      return get_object_vars($this);
   }

   public function getId()
   {
      return $this->id;
   }
   public function setId($id): void
   {
       $this->id = $id;
   }

   public function getUserId()
   {
      return $this->userId;
   }
   public function setUserId($userId): void
   {
       $this->userId = $userId;
   }


   public function getItems()
   {
      return $this->items;
   }
   public function setItems($items): void
   {
       $this->items = $items;
   }


   public function getStatus()
   {
      return $this->status;
   }
   public function setStatus($status): void
   {
       $this->status = $status;
   }
}  


