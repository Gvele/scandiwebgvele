<?php

namespace Models;

use Config\Db;

class DVD extends Product
{
    public function selectProdTypeId() 
   {
      $sql = 'SELECT pt.id  FROM  product_types AS pt WHERE pt.type = "DVD"';   
      
      $stmt = $this->pdo->prepare($sql); 
      $stmt->execute(); 
      $productTypeId = $stmt->fetch();
  
      return (int)$productTypeId->id; 
   }
}
