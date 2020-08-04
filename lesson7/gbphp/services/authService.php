<?php

namespace App\services;

class AuthService extends Service
{

   protected $isAdmin = false;
   protected $hasAccess = false;

   public function isAdmin()
   {
      return $this->isAdmin;
   }

   public function hasAccess($key)
   {
      return $this->container->request->getSession($key);
   }

   public function checkUser()
   {
      // $this->container->request->setSession()
      $login = $this->container->request->getPost('login');
      if (!$login){
         return false;
      }
      $user = $this->container->userRepository->getOne($login, 'login');
      $this->checkPassword($user);
      if($this->checkIsAdmin($user)){
         $this->isAdmin = true;
         $this->container->request->setSession('admin', true);
         return;
      }
      $this->container->request->setSession('admin', false);
   }

   private function checkIsAdmin($user)
   {
      return $user->is_admin;
   }
   

   private function checkPassword($user){
      if(password_verify($this->container->request->getPost('password'), $user->getPassword()))
      {
         $this->container->request->setSession('access', true);
         $this->container->request->setSession('userId', $user->getId());
      }
   }
}