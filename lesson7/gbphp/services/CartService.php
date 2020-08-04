<?php

namespace App\services;
use App\entities\Cart;
use App\repositories\GoodRepository;
use App\repositories\CartRepository;
Use App\services\Service;

class CartService extends Service
{

   public function fillInSessionCart($goodRepository, $id, $request)
   {
      $userId = (int)$request->getSession('userId');
      $good = $goodRepository->getOne($id);
      if (empty($good)){
         return false;
      }
      $cart = $request->getSession('cart', array());
      if (empty($cart[$userId][$id])){
         $cart[$userId][$id] = [
            'id' => $good->id,
            'name' => $good->name,
            'price' => $good->price,
            'info' => $good->info,
            'qty' => 1
         ];
      } else {
         $cart[$userId][$id]['qty']++;
      }
      $request->setSession('cart', $cart);
      // header('location: /cart/show');
      return true;
   }

   public function getOutOfSessionCart($id, $request)
   {
      if (empty($id)){
         return false;
      }
      $cart = $request->getSession('cart', array());

      if($cart[$id]['qty']>1){
         $cart[$id]['qty']--;

      }else{
         unset($cart[$id]);
      }
      $request->setSession('cart', $cart);
      header('location: /cart/show');
   }

   public function makeOrder($request)
   {
      $userId = (int)$request->getSession('userId');
      $order = $this->container->cart;
      $cart = $request->getSession('cart', array());
      $json = json_encode($cart, JSON_UNESCAPED_UNICODE);
      unset($cart);
      $request->setSession('cart', $cart);
      $order->setItems($json);
      $this->container->cartRepository->insert($order, $userId);
      
      return true;
   }

   public function changeStatus($id, $data)
   {
      $cart = $this->container->cart;
      $cart = $this->container->cartRepository->getOne($id);
      $cart->setStatus($this->container->request->getPost('status'));
      $this->container->cartRepository->getOne($id);
      $this->container->cartRepository->save($cart);

   }
}