<?php
include_once('../models/product.php');
include_once('../models/cart.php');
session_start();

if (isset($_REQUEST['id']) && isset($_REQUEST['newQuantity'])) {
  $id = $_REQUEST['id'];
  $newQuantity = $_REQUEST['newQuantity'];
  updateQuantity($id, $newQuantity);
} else
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  if ($_REQUEST['op'] == 1)
    addToCart($id);
  else deleteCart($id);
}

function addToCart($id)
{
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  $cart = $_SESSION['cart'];

  $item = product::getProductDetail($id)[0];

  $check = true;
  foreach ($cart as $key => $value) {
    if ($value->productID == $id) {
      $value->quantity++;
      $check = false;
    }
  }

  if ($check) {
    $obj = new Cart($item->id, $item->name, $item->price, $item->image, 1);
    array_push($cart, $obj);
  }
  $_SESSION['cart'] = $cart;
  echo json_encode($_SESSION['cart']);
}

function updateQuantity($id, $newQuantity)
{
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  $cart = $_SESSION['cart'];

  foreach ($cart as $key => $value) {
    if ($value->productID === $id) {
      $value->quantity = $newQuantity;
      echo json_encode($value);
      break;
    }
  }
}

function deleteCart($id)
{
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  $cart = $_SESSION['cart'];

  foreach ($cart as $key => $value) {
    if ($value->productID == $id) {
      unset($cart[$key]);
      $cart = array_values($cart);
      if (sizeof($cart) <= 0)
        $cart = null;
      $_SESSION['cart'] = $cart;
      echo json_encode($cart);
      break;
    }
  }
}
