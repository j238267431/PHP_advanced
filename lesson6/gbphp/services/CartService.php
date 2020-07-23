<?php

namespace App\services;
use App\entities\Cart;
use App\repositories\GoodRepository;
use App\repositories\CartRepository;
Use App\services\Request;

class CartService
{

   public function fillInSessionCart($id)
   {
      
      $good = (new GoodRepository())->getOne($id);
      if ($_SESSION['cart'][$id]['qty']){
         $_SESSION['cart'][$id]['qty']++;
         header('location: /cart/show');
         return;
      }
         $_SESSION['cart'][$id] = 
         [
            'id' => $id,
            'name' => $good->name,
            'price' => $good->price,
            'info' => $good->info,
            'qty' => 1
         ];
         header('location: /cart/show');

   }

   public function getOutOfSessionCart($id)
   {
      
      if($_SESSION['cart'][$id]['qty']>1){
         $_SESSION['cart'][$id]['qty']--;
         header('location: /cart/show');
         return;
      }
      unset($_SESSION['cart'][$id]);
         header('location: /cart/show');
      
   }

   public function makeOrder()
   {
      $cart = new Cart();
      $json = json_encode($_SESSION['cart'], JSON_UNESCAPED_UNICODE);
      unset($_SESSION['cart']);
      $cart->setItems($json);
      (new CartRepository())->insert($cart);
      header('location: /cart/show');
   }
}