<?php 
  session_start();  
  // check user if already login in
  if(isset($_SESSION["id"])){ 
    header('location: dashboard.php');
  }
  $page_title = "Home";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'template/meta-info.php'; ?>
  <?php require_once 'template/css.php'; ?>

  <style>
    body {
      background-image: url("assets/img/cat.jpg");
      color: black;
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="mt-5 row justify-content-center">
      <div class="col-md-10 text-center">
        <h1><strong>Catering Service</strong></h1>
      </div>
    </div>
    <div class="mt-5 row justify-content-center">
      <div class="col-md-10 text-center">
        <img src="assets/img/image.jpg">
      </div>
    </div>
    <div class="mt-5 row justify-content-center">
      <div class="col-md-10 text-center">
        <a href="register.php" class="btn btn-warning" >Register</a>
        <a href="login.php" class="btn btn-danger" >Login</a>
      </div>
    </div>  
  </div>
  <?php require_once 'template/js.php'; ?>
</body> 
</html>