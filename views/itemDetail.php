<?php
include_once('./layouts/header.php');
?>

<script>
  function addToCart(id) {
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var result = JSON.parse(this.responseText);
      }
    }
    var count = document.getElementById('qty').value;
    console.log(count);

    xhr.open("GET", `../controller/addToCart.php?id=${id}&count=${count}`);
    xhr.send();
  }

  window.onload = function() {
    var url = new URL(window.location.href);
    var productID = url.searchParams.get('id');
    var productName = url.searchParams.get('name');
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var item = JSON.parse(this.responseText);
        if (item != null) {
          document.getElementById('imageArea').innerHTML = `<img width='100%' src='../${item[0]['image']}' alt='${item[0]['name']}'>`;
          document.getElementById('nameArea').innerHTML = `<h2 class='mt-5'>${item[0]['name']}</h2>`;
          document.getElementById('priceArea').innerHTML = `<span style='color:red; font-size: 30px;' class='mt-4'>${item[0]['price']} ₫</span>`;
          document.getElementById('detailArea').innerHTML = `<p class='mt-4'>${item[0]['detail']}</p>`;
          document.getElementById('btnOrder').setAttribute("onclick", `addToCart(${item[0]['id']})`);
        }
      }
    }
    xhr.open("GET", "../controller/getProductDetail.php?id=" + productID, true);
    xhr.send();
  }
</script>

<body>

  <?php include_once('layouts/nav.php') ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-5" id="imageArea">
      </div>
      <div class="col-lg-7">
        <div id="nameArea"></div>
        <div id="priceArea"></div>
        <div id="detailArea"></div>
        <div class="d-flex mt-5">
          <div style="width: 105px;">
            <div class="input-group bootstrap-touchspin">
              <span class="input-group-btn">
                <button class="btn btn-default bootstrap-touchspin-down" type="button">-</button>
              </span>
              <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
              <input id="qty" type="tel" name="qty" value="1" min="1" max="100" class="form-control" style="display: block;">
              <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
              <span class="input-group-btn">
                <button class="btn btn-default bootstrap-touchspin-up" type="button">+</button>
              </span>
            </div>
          </div>
          <div class="ml-5"><button id="btnOrder" class="btn btn-info">Đặt mua</button></div>
        </div>
      </div>

    </div>
  </div>

</body>

</html>
