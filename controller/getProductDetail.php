<?php
include_once('../models/product.php');
$id = $_REQUEST["id"];
$item = product::getProductDetail($id);
echo json_encode($item[0]);
?>
