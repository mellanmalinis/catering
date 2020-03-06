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




// Update Product
if (isset($_POST['update'])) { 
  $product_code = $_GET['id']; 
  $description = mysqli_real_escape_string($db, $_POST['description']); 
  $price = mysqli_real_escape_string($db, $_POST['price']); 
  $unit = mysqli_real_escape_string($db, $_POST['unit']); 

  $sql = 'UPDATE product SET description="'.$description.'",price="'.$price.'",unit="'.$unit.'" WHERE product_code = '. $product_code;
  $update = mysqli_query($db, $sql);
  if($update){  
    $_SESSION['error'] = '
      <div class="alert alert-primary" role="alert">
        <strong>New Record Updated!</strong>
      </div>
    '; 
    header('location: ../edit_product.php?id=' . $product_code);
  }else{ 
    $_SESSION['error'] = '
      <div class="alert alert-danger" role="alert">
        <strong>Error.</strong>
      </div>
    ';  
    header('location: ../edit_product.php?id=' . $product_code);
  }  
}

// Delete product 
if (isset($_GET['delete_product'])) { 
  $product_code = $_GET['delete_product'];   
  $sql = 'DELETE FROM product WHERE product_code=' . $product_code;
  $delete = mysqli_query($db, $sql);
  if($delete){  
    $_SESSION['error'] = '
      <div class="alert alert-primary" role="alert">
        <strong>Record Successfully Deleted!</strong>
      </div>
    '; 
    header('location: ../product.php');
  }else{ 
    $_SESSION['error'] = '
      <div class="alert alert-danger" role="alert">
        <strong>Data cannot be deleted, it is used in the other operation.</strong>
      </div>
    ';  
    header('location: ../product.php');
  }  
}