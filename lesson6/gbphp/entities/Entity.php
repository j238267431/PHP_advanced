<?php


namespace App\entities;

/**
 * Class Entity
 * @package App\entities
 *
 * @property $id
 */
abstract  class Entity

{
   public function getData($entity): array
   {

      $data = $entity->getVars();
      
      $result = [
         'columns' => [],
         'params' => [],
         'upColumns' => []
      ];
       foreach ($data as $key => $value) {


           if ($key == 'baseRoot' || $key == 'id' || empty($value)) {
               continue;
           }
           $result['upColumns'][] = $key . ' = ' . ':'. $key;
           $result['columns'][] = $key;
           $result['params'][":{$key}"] = $value;
       }
       return $result;
   }  
}
