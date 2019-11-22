<?php
class category {
  var $id;
  var $name;

  function __construct($id, $name){
    $this->id = $id;
    $this->name = $name;
  }

  static function getCategoryList(){
    $con = new mysqli("localhost", "root", "", "e-commerce");
    $con->set_charset("utf8");
    if ($con->connect_error){
      die("Connect fail " . mysqli_connect_error);
    }

    $query = "SELECT * FROM category";
    $result = $con->query($query);
    $rs = array();
    if ($result->num_rows > 0){
      while ($row = $result -> fetch_assoc()){
        array_push($rs, new category($row['id'], $row['name']));
      }
    }
    $con->close();
    return $rs;
  }

}
?>
