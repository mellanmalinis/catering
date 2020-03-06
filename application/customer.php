<?php
session_start();
require_once 'config.php'; 

// Add Customer
if (isset($_POST['add'])) {
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']); 
  $mi = mysqli_real_escape_string($db, $_POST['mi']); 
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);  
  $street = mysqli_real_escape_string($db, $_POST['street']); 
  $barangay = mysqli_real_escape_string($db, $_POST['barangay']); 
  $city = mysqli_real_escape_string($db, $_POST['city']); 
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']); 

  // insert to customer 
  $sql = 'INSERT INTO customer (first_name, mi, last_name, street, barangay, city, phone) VALUES("'.$first_name.'", "'.$mi.'", "'.$last_name.'", "'.$street.'", "'.$barangay.'", "'.$city.'", "'.$phone_number.'" )';
  $insert = mysqli_query($db, $sql); 
  if($insert){  
    $_SESSION['error'] = '
      <div class="alert alert-primary" role="alert">
        <strong>New Record Added!</strong>
      </div>
    '; 
    header('location: ../add_customer.php');
  }else{ 
    $_SESSION['error'] = '
      <div class="alert alert-danger" role="alert">
        <strong>Error.</strong>
      </div>
    ';  
    header('location: ../add_customer.php');
  }  
}



// Update Customer
if (isset($_POST['update'])) { 
  $customer_id = $_GET['id']; 
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']); 
  $mi = mysqli_real_escape_string($db, $_POST['mi']); 
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);  
  $street = mysqli_real_escape_string($db, $_POST['street']); 
  $barangay = mysqli_real_escape_string($db, $_POST['barangay']); 
  $city = mysqli_real_escape_string($db, $_POST['city']); 
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']); 
  $sql = 'UPDATE customer SET  first_name="'.$first_name.'",mi="'.$mi.'",last_name="'.$last_name.'",street="'.$street.'",barangay="'.$barangay.'",city="'.$city.'",phone="'.$phone_number.'" WHERE customer_id = ' . $customer_id;
  $update = mysqli_query($db, $sql);
  if($update){  
    $_SESSION['error'] = '
      <div class="alert alert-primary" role="alert">
        <strong>New Record Updated!</strong>
      </div>
    '; 
    header('location: ../edit_customer.php?id=' . $customer_id);
  }else{ 
    $_SESSION['error'] = '
      <div class="alert alert-danger" role="alert">
        <strong>Error.</strong>
      </div>
    ';  
    header('location: ../edit_customer.php?id=' . $customer_id);
  }  
		
}
