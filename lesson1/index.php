<?php


class Customer {
   public $name;
   public $age;
   public $favouriteProduct;
   public function buySomeGoods(){
      
   }
   public function fillTheCart(){

   }
}

class VIPCustomer extends Customer
{
   public $discount;
   public function countDiscount(){
      
   }
}
// задание 5
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();
// $a2 = new A();
// $a1->foo();
// $a2->foo();
// $a1->foo();
// $a2->foo();

// выводится 1234 т.к. используется статичное свойство которое при создании нового экземпляра класса сохраняется внутри класса 
// и при создании нового экземпляра класса выполняеися действие в самом классе

// задание 6
// class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo();

// выводит 1122 т.к. создается еще один класс который наследуеи метод класса родителя. Здесь создаются экземпляры из 2-х классов
// и используются 2 разные статичные переменные из разных классов

// задание 7
class A {
   public function foo() {
       static $x = 0;
       echo ++$x;
   }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 

// то же что и в 6-м задании только в этом случае не передаются параметпы в конструктор