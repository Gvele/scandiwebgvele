<?php

use Models\Service;
use Models\DVD;
use Models\Book;
use Models\Furniture;
use Requests\Request;
use Router\Router; 

$router = new Router(new Request);


$router->get('/', function() {
  $page = 'products';
  $service = new Service;
  $products = $service->getAll();
  include    '../public/pages/layout.php';    
});

$router->get('/create', function() {
  $page = 'product_create';
  include    '../public/pages/layout.php';
});

 
$router->post('/store', function($request) {
   $page = 'products';
   $service = new Service;
 
   $prodInfo = json_decode($_POST['prodInfo']); 
   $calledFunc = json_decode($_POST['calledFunc']); 
  
   $product = '\Models\\'.$calledFunc->type ; 
  
   $service->setSku($prodInfo->sku);
   $service->setName($prodInfo->name);
   $service->setPrice($prodInfo->price);
   $service->setProperties($calledFunc->properties);
   
   $service->productStore(new $product());

   $products = $service->getAll();
    include    '../public/pages/layout.php';  
});


$router->post('/delete', function($request) {
  $page = 'products';
  $service = new Service;
  $service->delete(json_decode($_POST['product_ids']));
  $products = $service->getAll();
  include    '../public/pages/layout.php'; 
});
