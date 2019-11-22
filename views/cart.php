<?php
include_once('../models/product.php');
include_once('layouts/header.php');
include_once('../models/cart.php');
session_start();
?>

<script>
  function edit(operation, pos, id, sumPos) {
    var checkOperation;
    var qty = document.getElementById(pos).value;
    if (operation == '-') {
      checkOperation = 1;
      qty--;
      if (qty < 1) {
        qty = 1;
        checkOperation = 3;
      }
    } else {
      checkOperation = 2;
      qty++;
      if (qty < 1) {
        qty = 1;
        checkOperation = 3;
      }
    }
    document.getElementById(pos).value = qty;

    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var item = JSON.parse(this.responseText);
        document.getElementById(sumPos).innerHTML = item['quantity'] * item['price'];
        var temp = parseInt(document.getElementById('totalSum').textContent, 10);

        if (checkOperation == 1) {
          temp -= item['price'];
        } else if (checkOperation == 2) temp += parseInt(item['price'], 10);
        document.getElementById('totalSum').innerHTML = "";
        document.getElementById('totalSum').innerHTML = temp;

      }
    }
    xhr.open("GET", `../controller/Cart.php?id=${id}&newQuantity=${qty}`, true);
    xhr.send();
  }

  function removeCart(id) {
    var xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(this.responseText);

        var temp = 0;
        var list = JSON.parse(this.responseText);
        if (list != null)
          for (var i = 0; i < list.length; i++) {
            temp += parseInt(list[i]['price'] * list[i]['quantity']);
          }
        document.getElementById('totalSum').innerHTML = temp;
        document.getElementById(id).remove();
      }
    }
    xhr.open("GET", `../controller/Cart.php?id=${id}&op=0`, true);
    xhr.send();
  }
</script>

<body>

  <?php include_once('layouts/nav.php') ?>

  <div class="container mt-5">
    <?php
    if (isset($_SESSION['cart'])) {
      $list = $_SESSION['cart'];
      // var_dump($list);
      ?>
      <table id="productList" class="table table-hover" width="100%">
        <thead class="thead-dark">
          <th>STT</th>
          <th>Hình ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Giá</th>
          <th>Số lượng</th>
          <th>Thành tiền</th>
          <th></th>
          <!-- <th>Thành tiền</th> -->
        </thead>
        <tbody>
          <?php
            $totalSum = 0;
            foreach ($list as $key => $value) {
              $totalSum += $value->quantity * $value->price;
              ?>
            <tr id="<?php echo $value->productID ?>">
              <td><?php echo $key + 1 ?></td>
              <td><img width="110" src="../<?php echo $value->image ?>" alt=""></td>
              <td>
                <span><?php echo $value->productName ?></span>
              </td>
              <td><?php echo $value->price ?></td>
              <td>
                <div style="width: 110px" class="input-group bootstrap-touchspin">
                  <span class="input-group-btn">
                    <button onclick="edit('-', 'qty<?php echo $key ?>', '<?php echo $value->productID ?>', 'sum<?php echo $key ?>')" class="btn btn-default bootstrap-touchspin-down" type="button">-</button>
                  </span>
                  <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                  <input id="qty<?php echo $key ?>" type="tel" name="qty" value="<?php echo $value->quantity ?>" min="1" max="100" class="form-control" style="display: block;">
                  <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
                  <span class="input-group-btn">
                    <button onclick="edit('+', 'qty<?php echo $key ?>', '<?php echo $value->productID ?>', 'sum<?php echo $key ?>')" class="btn btn-default bootstrap-touchspin-up" type="button">+</button>
                  </span>
                </div>
              </td>
              <td id="sum<?php echo $key ?>"><?php echo $value->price * $value->quantity ?></td>
              <td><button onclick="removeCart('<?php echo $value->productID ?>')" class="btn btn-danger">Xóa</button></td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <td style="font-size: 20px;" colspan="4" align="left"><span style="color: red;">Tổng tiền: </span><span id="totalSum"><?php if ($totalSum > 0) echo $totalSum ?></span></td>
          <td align="right" colspan="3"><button class="btn btn-info">Thanh toán</button></td>
        </tfoot>
      <?php } else echo "<h1 align='center'>Bạn chưa đặt mua mặt hàng nào ^^</h1>" ?>
      </table>
</body>
