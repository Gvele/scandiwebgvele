<?php

namespace Models;

use Config\Db;

class Furniture extends Product
{
    public function selectProdTypeId() 
   {
      $sql = 'SELECT pt.id  FROM  product_types AS pt WHERE pt.type = "Furniture"';   
      
      $stmt = $this->pdo->prepare($sql); 
      $stmt->execute(); 
      $productTypeId = $stmt->fetch();
  
      return  (int)$productTypeId->id; 
   }
}
