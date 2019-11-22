<?php
include_once('./layouts/header.php');
?>

<script>
  function addToCart(id) {
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(this.responseText);
        var result = JSON.parse(this.responseText);
        console.log(result);
        var len = result.length;
        alert("Thêm thành công");
        document.getElementById('cartCount').innerHTML = `Cart (${len})`;
      }
    }
    xhr.open("GET", `../controller/Cart.php?id=${id}&op=1`);
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
          document.getElementById('imageArea').innerHTML = `<img height='350px' width='100%' src='../${item['image']}' alt='${item['name']}'>`;
          document.getElementById('nameArea').innerHTML = `<h2 class='mt-5'>${item['name']}</h2>`;
          document.getElementById('priceArea').innerHTML = `<span style='color:red; font-size: 30px;' class='mt-4'>${item['price']} ₫</span>`;
          document.getElementById('detailArea').innerHTML = `<p class='mt-4'>${item['detail']}</p>`;
          document.getElementById('btnOrder').setAttribute("onclick", `addToCart(${item['id']})`);
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
      <div class="col-lg-4" id="imageArea">
      </div>
      <div class="col-lg-8">
        <div id="nameArea"></div>
        <div id="priceArea"></div>
        <div id="detailArea"></div>
        <div class="mt-4"><button id="btnOrder" class="btn btn-info">Đặt mua</button></div>
      </div>

    </div>
  </div>

</body>

</html>
