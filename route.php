<?php

use Models\Product;
use Requests\Request;
use Router\Router; 

$router = new Router(new Request);


$router->get('/', function() {
  $page = 'products';
  $product = new Product;
  $products = $product->getAll();
  include    '../public/pages/layout.php';    
});

$router->get('/create', function() {
  $page = 'product_create';
  include    '../public/pages/layout.php';
});

 
$router->post('/store', function($request) {
  $page = 'products';
  $product = new Product;

  $prodInfo = json_decode($_POST['prodInfo']); 
  $calledFunc = json_decode($_POST['calledFunc']); 
 
   $product->setSku($prodInfo->sku);
   $product->setName($prodInfo->name);
   $product->setPrice($prodInfo->price);
   $product->setProperties($calledFunc->properties);
   $product->setProductTypeId((int)$product->selectProdTypeId($calledFunc->type)->id);
   $product->store($product->getSku(), $product->getName(), $product->getPrice(), $product->getProperties(), $product->getProductTypeId());

  $products = $product->getAll();
  include    '../public/pages/layout.php';  
});


$router->post('/delete', function($request) {
  $page = 'products';
  $product = new Product;
  $product->delete(json_decode($_POST['product_ids']));
  $products = $product->getAll();
  include    '../public/pages/layout.php'; 
});
