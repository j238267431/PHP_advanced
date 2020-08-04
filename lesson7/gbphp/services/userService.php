<?php

namespace App\services;


class UserService extends Service
{
   public function save($id, $data)
   {
       if(!$this->isDataExists($data)){
           return null;
       }

       $user = $this->container->user;

       if (!empty($id)) {
           $user = $this->container->userRepository->getOne($id);
       }
       $user->setFio($data['fio']);
       $user->setLogin($data['login']);
       $user->setPassword(password_hash($data['password'], PASSWORD_DEFAULT));
       $this->container->userRepository->getOne($id);
       $this->container->userRepository->save($user);

       return $user;
   }

   protected function isDataExists($data){
       if(empty($data['fio']) || empty($data['login']) || empty($data['password'])){
           return false;
       }
       return true;
   }
}