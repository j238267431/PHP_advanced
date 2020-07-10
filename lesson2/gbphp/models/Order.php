<?php
namespace App\models;
class Order extends Model
{
   public $id;
   public $id_user;
   public $content;
   public $totalPrice;

   public function getTableName(): string
   {
       return 'orders';
   }

}