<?php

session_start();
include_once('../models/product.php');

if (isset($_SESSION['cart']) == null) {
  $_SESSION['cart'] = array();
}

$id = $_REQUEST['id'];

$cart = $_SESSION['cart'];
$item = product::getProductDetail($id);

$obj = array(['soluong' => 1, 'item' => $item[0]]);

array_push($cart, $obj);
$_SESSION['cart'] = $cart;
// var_dump($_SESSION);
echo json_encode($_SESSION['cart']);
