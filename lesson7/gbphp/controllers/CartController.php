<?php
namespace App\controllers;
use App\repositories\CartRepository;
use App\entities\Cart;
use App\services\CartService;
use App\services\Request;
class CartController extends Controller
{
   const PATH='/cart/show';
   public function addAction()
   {
      $id = $this->getId();
      $add = $this->app->cartService->fillInSessionCart(
         $this->app->goodRepository,
         $id,  
         $this->request
      );
      $msg = 'товар добавлен';
      if (!$add){
         $msg = 'ошибка при добавлении';
      }
      $this->toPath(static::PATH, $msg);
   }

   public function showAction()
   {
      $data = $this->request->getSession('cart');
      $userId = (int)$this->request->getSession('userId');
      $cartUser = $data[$userId];
      return $this->render(
         'showCart',
         [
            'data' => $cartUser,
            'msg' =>  $this->request->getSession('msg'),
            'access' => $this->request->getSession('access'),
            'admin' => $this->request->getSession('admin'),
         ]
      );

   }
   public function deleteAction()
   {
      $id = $this->getId();
      $this->app->cartService->getOutOfSessionCart(
         $id,
         $this->request
      );
   }
   public function makeOrderAction()
   {
      $order = $this->app->cartService->makeOrder($this->request);

      $msg = 'заказ оформлен';
      if (!$order){
         $msg = 'ошибка при оформлении заказа';
      }
      $this->toPath(static::PATH, $msg);
   }
   public function ordersShowAction()
   {
       $paginator = $this->app->paginatorServices;
       $cart = $this->app->cart;
       $paginator->setItems($cart, $this->getPage());
       return $this->render(
           'usersOrders',
           [
               'paginator' => $paginator,
               'access' => $this->request->getSession('access'),
               'admin' => $this->request->getSession('admin'),
           ]
       );
   }

   public function changeStatusAction()
   {
      $this->app->cartService->changeStatus(
         $this->request->getGet('id'),
         $this->request->getPost('status'),
         $this->toPath('/cart/ordersShow')
      );

   }
}