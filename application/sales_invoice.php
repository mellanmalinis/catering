<?php
session_start();
require_once 'config.php';    

// // Delete product 
if (isset($_POST['product_code'])) { 
  $product_code = $_POST['product_code']; 
  
  $name = mysqli_real_escape_string($db,$product_code);
  $aql 	= "SELECT * FROM product WHERE product_code='$name' ";
  $query 	= mysqli_query($db,$aql);

  $row = json_encode(mysqli_fetch_assoc($query));
  echo $row;
}