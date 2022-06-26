<?php

namespace Models;

use Config\Db;

class Book extends Product
{
    public function selectProdTypeId() 
   {
      $sql = 'SELECT pt.id  FROM  product_types AS pt WHERE pt.type = "Book"';   
      
      $stmt = $this->pdo->prepare($sql); 
      $stmt->execute(); 
      $productTypeId = $stmt->fetch();
       
      return (int)$productTypeId->id; 
   }
}
