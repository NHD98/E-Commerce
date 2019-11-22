<?php
include_once('../models/product.php');
$category = $_REQUEST["category"];
$list = product::getListProduct($category);
echo json_encode($list);
?>
