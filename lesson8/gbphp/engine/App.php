<?php

namespace App\engine;
use App\traits\TSingleton;
/**
 * Class App
 * @package App\engine
 * 
 * @property Request @request
 * @property DB $db
 * @property GoodRepository $goodRepository
 * @property UserRepository $userRepository
 */
class App
{
   use TSingleton;

   protected $config = [];
   protected $container;

   /**
    * @return App
    */
   public static function call()
   {
      return static::getInstance();
   }

   public function run($config)
   {
      $this->config = $config;
      $this->setContainer();
      return $this->runController();
   }
   protected function setContainer()
   {
      $this->container = new Container($this->config['components']);
   }

   protected function runController()
   {
      $request = $this->request;

      $controllerName = $request->getControllerName();
      if (class_exists($controllerName)) {
          /** @var \App\controllers\Controller $realController */
          $realController = new $controllerName(
              $this,
              $request
          );
          return $realController->run($request->getActionName());
  
          }
      return '404';
   }
   public function __get($name)
   {
     return $this->container->$name;
   }
}