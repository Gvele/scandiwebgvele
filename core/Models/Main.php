<?php

namespace Models;

class Main {

  protected $id;
  protected $sku;
  protected $name;
  protected $price; 
  protected $properties; 
  protected $productTypeId;
  protected $system;
  protected $productValue;

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }
  
  public function getSku() {
    return $this->sku;
  }

  public function setSku($value) {
    $this->sku = $value;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($value) {
    $this->name = $value;
  } 

  public function getPrice() {
    return $this->price;
  }

  public function setPrice($value) {
    $this->price = $value;
  } 

  public function getProperties() {
    return $this->properties;
  }

  public function setProperties($value) {
    $this->properties = $value;
  } 

  public function getProductTypeId() {
    return $this->productTypeId;
  }

  public function setProductTypeId($value) {
    $this->productTypeId = $value;
  } 

  public function getSystem() {
    return $this->system;
  }

  public function setSystem($value) {
    $this->system = $value;
  } 

  public function getProductValue() {
    return $this->productValue;
  }

  public function setProductValue($value) {
    $this->productValue = $value;
  } 

}