<?php

namespace Flow\Authenticate;

class Authenticate
{
   public $name;
   public $surName;

   public function getUserName()
   {
      $user = new Authenticate;
      $user->name = 'Vasya';
      $user->surName = 'Vasya';
   }

}



