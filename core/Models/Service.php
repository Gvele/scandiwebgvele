<?php

namespace Models;

use Config\Db;

class Service extends Product
{
    public function productStore(Product $product){
       
        $this->store($this->getSku(), $this->getName(), $this->getPrice(), $this->getProperties(),  $product->selectProdTypeId());
    }

    public function selectProdTypeId(){
        return "";
    }
}