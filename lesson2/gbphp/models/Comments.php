<?php
namespace App\models;
class Comments extends Model
{
   public $id;
   public $id_user;
   public $text;


   public function getTableName(): string
   {
       return 'comments';
   }
}