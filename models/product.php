<?php
class product
{
  var $id;
  var $name;
  var $quantity;
  var $price;
  var $detail;
  var $image;
  var $category_id;

  function __construct($id, $name, $quantity, $price, $detail, $image, $category_id)
  {
    $this->id = $id;
    $this->name = $name;
    $this->quantity = $quantity;
    $this->price = $price;
    $this->detail = $detail;
    $this->image = $image;
    $this->category_id = $category_id;
  }

  static function getListProduct($key)
  {
    $con = new mysqli("localhost", "root", "", "e-commerce");
    $con->set_charset("utf8");
    if ($con->connect_error) {
      die("Connect fail " . mysqli_connect_error);
    }

    $query = "";
    if (strcmp($key, "*") == 0) {
      $query = "SELECT * FROM product";
    } else $query = "SELECT * FROM product WHERE category_id = '$key'";

    $result = $con->query($query);
    $rs = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($rs, new product(
          $row["id"],
          $row["name"],
          $row["quantity"],
          $row["price"],
          $row["detail"],
          $row["image"],
          $row["category_id"]
        ));
      }
    }
    $con->close();
    return $rs;
  }

  static function getProductDetail($id)
  {
    $con = new mysqli("localhost", "root", "", "e-commerce");
    $con->set_charset("utf8");
    if ($con->connect_error) {
      die("Connect fail " . mysqli_connect_error);
    }

    $query = "SELECT * FROM product WHERE id = $id";
    $result = $con->query($query);
    $rs = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($rs, new product(
          $row["id"],
          $row["name"],
          $row["quantity"],
          $row["price"],
          $row["detail"],
          $row["image"],
          $row["category_id"]
        ));
      }
    }
    $con->close();
    return $rs;
  }

}
