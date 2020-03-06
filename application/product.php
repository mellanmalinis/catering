<?php
session_start();
require_once 'config.php'; 

// Add Proudct
if (isset($_POST['add'])) { 
  $description = mysqli_real_escape_string($db, $_POST['description']); 
  $price = mysqli_real_escape_string($db, $_POST['price']); 
  $unit = mysqli_real_escape_string($db, $_POST['unit']);   

  // insert to produt  
  $sql = 'INSERT INTO product (description, price, unit) VALUES ("'.$description.'", "'.$price.'", "'.$unit.'")';
  $insert = mysqli_query($db, $sql); 
  if($insert){  
    $_SESSION['error'] = '
      <div class="alert alert-primary" role="alert">
        <strong>New Record Added!</strong>
      </div>
    '; 
    header('location: ../add_product.php');
  }else{ 
    $_SESSION['error'] = '
      <div class="alert alert-danger" role="alert">
        <strong>Error.</strong>
      </div>
    ';  
    header('location: ../add_product.php');
  }  
}


