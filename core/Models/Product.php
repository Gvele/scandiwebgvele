<?php

namespace Models;

use Config\Db;

 abstract class Product   
{
    use Db,Main;


    public function getAll()
    {
        $sql = 'SELECT p.id, p.sku, p.name, p.price, pt.type, pt.system,
        case when pt.system = "Size"       then concat(json_extract(properties, "$.MB")," ", "MB") 
            when pt.system = "Dimensions" then concat(json_extract(properties, "$.H"),"x",json_extract(properties, "$.L"),"x",json_extract(properties, "$.W"))
            when pt.system = "Weight"     then concat(json_extract(properties, "$.KG")," ", "KG") 
        END AS value
        FROM products AS p LEFT JOIN  product_types AS pt ON p.product_type_id = pt.id ORDER BY p.id ASC';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll();

        return $products;
    }

    public function store($sku, $name, $price, $properties, $productTypeId)
    {
        $sql = "INSERT INTO products (sku, name, price, properties, product_type_id) 
                    VALUES (:sku, :name, :price , :properties, :product_type_id)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ 'sku' => $sku, 'name' => $name, 'price' => $price, 'properties' => $properties, 'product_type_id' => $productTypeId, ]);
    }

    public function delete($array)
   {
      $in = str_repeat('?,', count($array) - 1) . '?';
      $sql =  "DELETE FROM  products   WHERE  id IN ($in)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($array);
   }

   abstract public function selectProdTypeId();
    
}
