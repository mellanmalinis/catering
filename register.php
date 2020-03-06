<?php 
  session_start();  
  // check user if already login in
  if(isset($_SESSION["id"])){ 
    header('location: dashboard.php');
  }
  $page_title = "Register";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'template/meta-info.php'; ?>
  <?php require_once 'template/css.php'; ?>

  <style>
    body {
      background-image: url("assets/img/cat1.jpg");
      color: black;
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="mt-5 row justify-content-center">
      <div class="col-md-12 text-center text-white">
        <h1><strong>Register</strong></h1>
      </div>
    </div>
    <div class="mt-5 row justify-content-center">
      <div class="col-sm-4"> 
        <form method="post" action="application/register.php">
          <div class="form-group">
            <label for="first_name" class="text-white">First Name</label>
            <input type="text" name="first_name" class="form-control" placeholder="Firs Name" required="">
          </div>
          <div class="form-group">
            <label for="mi" class="text-white">M.I.</label>
            <input type="text" name="mi" class="form-control" placeholder="M.I." required="">
          </div>
          <div class="form-group">
            <label for="last_name" class="text-white">Last Name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="">
          </div>
          <div class="form-group">
            <label for="email" class="text-white">Email</label>
            <input type="email"  name="email" class="form-control" placeholder="Email" required="">
          </div>
          <div class="form-group">
            <label for="username" class="text-white">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required="">
          </div>
          <div class="form-group">
            <label for="password" class="text-white">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
          </div>
          <button class="btn mt-5 btn-danger btn-block" type="submit" name="register">Register</button>
        </form>
        <p class="mt-5 text-white">Already have an account?  <a href="login.php"><u>Login here.</u></a></p>
      </div>
    </div>
  </div>
  <?php require_once 'template/js.php'; ?>
</body>

</html> 