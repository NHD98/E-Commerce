<?php
include_once('layouts/header.php');
include_once('../models/product.php');
session_start();
// session_destroy();
// var_dump($_SESSION);
?>
<script>
  function addToCart(id) {
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(this.responseText);
        var result = JSON.parse(this.responseText);
        // console.log(result);
        var len = result.length;
        alert("Thêm thành công");
        document.getElementById('cartCount').innerHTML = `Cart (${len})`;
      }
    }
    xhr.open("GET", `../controller/Cart.php?id=${id}`);
    xhr.send();
  }

  function getProductList(category) {
    document.getElementById('productList').innerHTML = "";

    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var list = JSON.parse(this.responseText);
        if (list != null) {
          for (var i = 0; i < list.length; i++) {
            var content = "";
            content += "<div class='col-md-4 product-men mb-5 productItem'>";
            content += "<div class='men-pro-item simpleCart_shelfItem'>";
            content += "<div class='men-thumb-item text-center'>";
            content += "<img width='200' src='../" + list[i]['image'] + "' alt=''>";
            content += "<div class='men-cart-pro'>";
            content += "<div class='inner-men-cart-pro'>";
            content += "<a href='itemDetail.php?name=" + list[i]['name'] + "&id=" + list[i]['id'] + "' class='link-product-add-cart'>Quick View</a>";
            content += "</div></div></div>";
            content += "<div class='item-info-product text-center border-top mt-4'>";
            content += "<h4 class='pt-1'>";
            content += "<a href='' class='text-truncate'>" + list[i]['name'] + "</a>";
            content += "</h4>";
            content += "<div class='info-product-price my-2'>";
            content += "<span class='item_price'>" + list[i]['price'] + " ₫</span>";
            content += "</div>";
            content + "<div class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out'>";
            content += `<button onclick='addToCart(${list[i]['id']})' type='submit' name='submit' class='btn btn-info'>Add to cart</button>`;
            content += "</div>";
            content += "</div>";
            content += "</div>";
            content += "</div>";
            document.getElementById('productList').innerHTML += content;
          }
        }
      }
    };

    xhr.open("GET", "../controller/getProduct.php?category=" + category, true);
    xhr.send();
  }

  function getCategoryList(category) {
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var categoryList = JSON.parse(this.responseText);
        if (categoryList != null) {
          for (var i = 0; i < categoryList.length; i++) {
            var str = `<button onclick='getProductList(${categoryList[i]['id']})' class='list-group-item'>${categoryList[i]['name']}</button>`;
            document.getElementById('categoryList').innerHTML += str;
          }
        }
      }
    }
    xhr.open("GET", "../controller/getCategoryList.php", true);
    xhr.send();
  }

  window.onload = function() {
    var url = new URL(window.location.href);
    var category = url.searchParams.get('category');
    category = category == null ? "*" : category;
    getCategoryList(category);
    getProductList(category);
  }
</script>

<body>

  <?php include_once('layouts/nav.php') ?>

  <!-- Page Content -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-2">
        <div class="list-group" id="categoryList">
          <button onclick="getProductList('*')" class="list-group-item">Tất cả</button>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-10">
        <div class="row" id="productList">
        </div>
      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
  <?php include_once('layouts/footer.php') ?>
