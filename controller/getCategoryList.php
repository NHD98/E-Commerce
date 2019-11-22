<?php
include_once('../models/category.php');
$list = category::getCategoryList();
echo json_encode($list);
?>
