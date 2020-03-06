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

// Insert Sales Invoice
if (isset($_POST['customer'])) { 
  $customer = $_POST['customer'];
  $terms    = $_POST['terms'];
  $product  = $_POST['products'];
  $qty      = $_POST['quantity'];
  $unit     = $_POST['unit'];
  $price    = $_POST['price'];
  $sql      = "";
  $sales    = array();
  $login_id = $_SESSION['id'];
  $date     = date('Y-m-d');
  $insert   = "INSERT INTO `sales_invoice` (`customer_id`, `date`, `terms`) VALUES ('$customer','$date', '$terms');";
  // echo $insert;
  
  $res = mysqli_query($db, $insert);
  
  $select = "SELECT sales_number FROM sales_invoice ORDER BY sales_number DESC LIMIT 1";
  $res1   = mysqli_query($db, $select);
  $row    = mysqli_fetch_array($res1);
  
  
  for ($num = 0; $num < count($_POST['products']); $num++){
    $sales[]=$row['sales_number'];
  } 
  // print_r($sales);
  $i = 0;
  while($i < count($_POST['products'])){
    $product1 = mysqli_real_escape_string($db,$product[$i]);
    $qty1     = mysqli_real_escape_string($db,$qty[$i]);
    $unit1    = mysqli_real_escape_string($db,$unit[$i]);
    $price1   = mysqli_real_escape_string($db,$price[$i]);
    $sales1   = mysqli_real_escape_string($db,$sales[$i]); 

    $sql = "INSERT INTO sales_item(sales_item,product_code,quantity,unit,price) VALUES($sales1,$product1,$qty1,'$unit1',$price1)";
    // echo $sql;
    mysqli_query($db,$sql);
    $i++;
  }

    
  if($sql == true){
    echo 1;
  }else{
    echo 12;
  }
}