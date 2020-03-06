<?php
  session_start();
  require_once 'config.php'; 
  if(isset($_POST['login'])){
    	$username = mysqli_real_escape_string($db, $_POST['username']);
      $password = md5(mysqli_real_escape_string($db, $_POST['password'])); 
      // check if account is in the record 
      $query = 'SELECT * FROM login WHERE username="'.$username.'" AND password="'.$password.'"'; 
      $result = mysqli_query($db, $query); 
      $row = mysqli_fetch_assoc($result); 
      // get login id
      $login_id = $row['id']; 
      // get information of the user
      $query = 'SELECT * FROM `login`, customer  where customer.customer_id = login.customer_id and login.id = '. $login_id; 
      $result = mysqli_query($db, $query); 
      $row = mysqli_fetch_assoc($result); 
      if(is_array($row) && !empty($row)) {
        // set session of the user
        $_SESSION = $row; 
        header("location: ../dashboard.php"); 
      } else {
        $_SESSION["error"] = ' 
          <div class="alert alert-danger" role="alert">
            <strong>Invalid Username/Password.</strong>
          </div>
        ';
        header("location: ../login.php"); 
      }
  }else{ 
    $_SESSION["error"] = ' 
      <div class="alert alert-danger" role="alert">
        <strong>Invalid Username/Password.</strong>
      </div>
    ';
    header("location: ../login.php");  
  } 