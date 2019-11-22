<?php
include_once('../models/product.php');
include_once('../models/cart.php');
session_start();
$id = $_REQUEST['id'];
if ($id != null) {
  addToCart($id);
}

function addToCart($id)
{
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  $cart = $_SESSION['cart'];

  $item = product::getProductDetail($id)[0];

  $obj = new Cart($item->id, $item->name, $item->price, $item->image, 1);
  array_push($cart, $obj);
  $_SESSION['cart'] = $cart;
  echo json_encode($_SESSION['cart']);
}
