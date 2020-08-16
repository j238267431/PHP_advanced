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
       $user->setFio($data->getPost()['fio']);
       $user->setLogin($data->getPost()['login']);
       $user->setPassword(password_hash($data->getPost()['password'], PASSWORD_DEFAULT));
       $this->container->userRepository->getOne($id);
       $this->container->userRepository->save($user);

       return $user;
   }

   public function isDataExists($data){
       if(empty($data['fio']) || empty($data['login']) || empty($data['password'])){
           return false;
       }
       return true;
   }
}