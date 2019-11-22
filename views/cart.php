<?php
include_once('../models/product.php');
include_once('layouts/header.php');
include_once('../models/cart.php');
session_start();
?>

<script>
function edit(operation){
  if (operation == '-'){
    alert('-');
  } else alert('+');
}
</script>

<body>

  <?php include_once('layouts/nav.php') ?>

  <div class="container mt-5">
    <div id="productList">
      <?php
      $list = $_SESSION['cart'];
      var_dump($list);
      foreach ($list as $key => $value) { ?>
        <div class="row">
          <div class="col-lg-2"><img width="110" src="../<?php echo $value->image ?>" alt=""></div>
          <div class="col-lg-4"><span><?php echo $value->productName ?></span></div>
          <div class="col-lg-3"><?php echo $value->price ?></div>

          <div style="width: 105px;">
            <div class="input-group bootstrap-touchspin">
              <span class="input-group-btn">
                <button onclick="edit('-')" class="btn btn-default bootstrap-touchspin-down" type="button">-</button>
              </span>
              <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
              <input id="qty" type="tel" name="qty" value="<?php echo $value->quantity ?>" min="1" max="100" class="form-control" style="display: block;">
              <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
              <span class="input-group-btn">
                <button onclick="edit('+')" class="btn btn-default bootstrap-touchspin-up" type="button">+</button>
              </span>
            </div>
          </div>
        </div>
      <?php } ?>



    </div>
</body>
