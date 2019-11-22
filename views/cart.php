<?php
session_start();
include_once('../models/product.php');
include_once('layouts/header.php');

$list = $_SESSION['cart'];
var_dump($_SESSION['cart']);
foreach ($list as $key => $value) { }

?>

<body>

  <?php include_once('layouts/nav.php') ?>

  <div class="container">
    <?php foreach ($list as $key => $value) { ?>
      <div class="row">
        <div class="col-lg-3">
          <img src='<?php echo $value[0]['soluong'] ?>' alt="">
        </div>
        <div class="col-5">
          <?php
          $item = unserialize($value[0]['item']);
          echo $item->name ?>
        </div>
      <?php } ?>
      </div>
</body>
