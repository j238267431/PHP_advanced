<?php
namespace App\controllers;
use App\repositories\CartRepository;
use App\entities\Cart;
use App\services\CartService;
use App\services\Request;
class CartController extends Controller
{
   public function addAction()
   {
      $id = $this->getId();
      (new CartService())->fillInSessionCart($id);
   }

   public function showAction()
   {
      return $this->render(
         'showCart',
         ['data' => (new Request())->getSession()]
      );

   }
   public function deleteAction()
   {
      $id = $this->getId();
      (new CartService())->getOutOfSessionCart($id);
   }
   public function makeOrderAction()
   {
      (new CartService())->makeOrder();
   }
}