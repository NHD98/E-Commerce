<?php
class Cart
{
  var $productID;
  var $productName;
  var $price;
  var $image;
  var $quantity;

  function __construct($productID, $productName, $price, $image, $quantity)
  {
    $this->productID = $productID;
    $this->productName = $productName;
    $this->price = $price;
    $this->image = $image;
    $this->quantity = $quantity;
  }
}
