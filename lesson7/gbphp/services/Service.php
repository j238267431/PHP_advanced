<?php
namespace App\services;

abstract class Service
{
   protected $container;

   public function setContainer($container)
   {
      $this->container = $container;
   }
}