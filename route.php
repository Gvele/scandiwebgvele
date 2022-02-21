<?php

use Models\Product;

$page = $_REQUEST['page'] ?? 'products';
 
switch($page)
{
  case 'products':
    $product = new Product;
       
    
    if(($_REQUEST['action'] ?? 0) === 'delete') {
      
      $product->delete(json_decode($_POST['product_ids']));
      }  

    $data['products'] = $product->getAll();

     

    break;

  case 'product_create':
    $product = new Product;
    
 
    if(($_REQUEST['action'] ?? 0) === 'create') {
      
      

      $prodInfo = json_decode($_POST['prodInfo']); 
      $calledFunc = json_decode($_POST['calledFunc']); 
      
      $sku=$prodInfo->sku; 
      $name=$prodInfo->name; 
      $price=$prodInfo->price; 
      $properties=$calledFunc->properties; 
      $productTypeId=(int)$product->selectProdTypeId($calledFunc->type)->id; 


      // $product->store($sku, $name, $price, , $productTypeId);
      $product->store($sku, $name, $price, $properties, $productTypeId);

      $page ='products';
      
    }

    $data['products'] = $product->getAll();
    
    

    break;

  default:
    echo('Page do not exists!');
     
    exit;
}

 include('public/pages/layout.php');