<?php

namespace App\repositories;
use App\entities\Cart;

class CartRepository extends Repository
{
   public function getTableName(): string
   {
       return 'cart';
   }

   public function getEntityName(): string
   {
       return Cart::class;
   }
}