<?php

namespace App\controllers;

class AuthController extends Controller
{
   
   public function loginAction()
   {
      $this->app->authService->checkUser();

      if($this->app->authService->hasAccess('access')){
         $paginator = $this->app->paginatorServices;
         $good = $this->app->good;
         $paginator->setItems($good, $this->getPage());
         return $this->render(
             'goods',
             [
                 'paginator' => $paginator,
                 'access' => $this->request->getSession('access'),
                 'admin' => $this->request->getSession('admin')
             ]
         );
      }
      return $this->render(
         'login',
         [
            'access' => $this->request->getSession('access'),
            'msg' =>  $this->request->getSession('msg'),
            'admin' => $this->request->getSession('admin')
         ]
      );
   }

   public function logoutAction()
   {
      $this->app->request->setSession('access', false);
      $this->app->request->toPath('/auth/login');
   }
}