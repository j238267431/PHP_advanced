<?php

return [
   'name' => 'итернет магазин',
   'defaultController' => 'auth',

   'components' => 
   [
      'db' => 
      [
         'class' => App\services\DB::class,
         'config' => 
         [
            'driver' =>  'mysql',
            'host' =>  'localhost',
            'dbname' =>  'gbphp',
            'charset' =>  'UTF8',
            'user' => 'root',
            'password' => 'root'
         ]
      ],
      'request' => 
      [
         'class' => App\services\Request::class,
      ],
      'renderer' =>
      [
         'class' => App\services\TwigRendererServices::class
      ],
      'goodRepository' =>
      [
         'class' => App\repositories\GoodRepository::class
      ],
      'userRepository' =>
      [
         'class' => App\repositories\UserRepository::class
      ],
      'cartRepository' =>
      [
         'class' => App\repositories\CartRepository::class
      ],
      'paginatorServices' =>
      [
         'class' => App\services\PaginatorServices::class
      ],
      'goodService' =>
      [
         'class' => App\services\GoodService::class
      ],
      'userService' =>
      [
         'class' => App\services\UserService::class
      ],
      'cartService' =>
      [
         'class' => App\services\CartService::class
      ],
      'good' =>
      [
         'class' => App\entities\Good::class
      ],
      'cart' =>
      [
         'class' => App\entities\Cart::class
      ],
      'user' =>
      [
         'class' => App\entities\User::class
      ],
      'authService' =>
      [
         'class' => App\services\AuthService::class
      ],
      'goodController' =>
      [
         'class' => App\controllers\GoodController::class
      ]
   ],
];