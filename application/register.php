<?php
session_start();
require_once 'config.php';
  

if (isset($_POST['register'])) {
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']); 
  $mi = mysqli_real_escape_string($db, $_POST['mi']); 
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']); 
  $email = mysqli_real_escape_string($db, $_POST['email']); 
  $username = mysqli_real_escape_string($db, $_POST['username']); 
  $password = md5(mysqli_real_escape_string($db, $_POST['password'])); 

  // insert to customer
  $sql = 'INSERT INTO customer (first_name, mi,last_name) VALUES("'.$first_name.'", "'.$mi.'", "'.$last_name.'" )';
  mysqli_query($db, $sql);
  $customer_id =  mysqli_insert_id($db);

  // insert to login
  $sql = 'INSERT INTO login (email,username,password,customer_id) VALUES ("'.$email.'", "'.$username.'", "'.$password.'", '.$customer_id.');';
  $insert = mysqli_query($db, $sql); 
  if($insert){  
    $_SESSION['error'] = '
      <div class="alert alert-primary" role="alert">
        <strong>Register Completed!</strong>
      </div>
    '; 
    header('location: ../register.php');
  }else{ 
    $_SESSION['error'] = '
      <div class="alert alert-danger" role="alert">
        <strong>Error.</strong>
      </div>
    ';  
    header('location: ../register.php');
  }  
}
