<?php 
$page_title = "Login";
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
        <h1><strong>Login</strong></h1>
      </div>
    </div>
    <div class="mt-5 row justify-content-center">
      <div class="col-sm-4">
        <form ethod="post" action="">
          <div class="form-group">
            <label for="username" class="text-white">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required="">
          </div>
          <div class="form-group">
            <label for="password" class="text-white">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
          </div>
          <button class="btn btn-danger btn-block" type="submit" name="submit" value="Submit">Login</button>
        </form>
        <p class="mt-5 text-white">No Account?  <a href="register.php"><u>register here.</u></a></p>
      </div>
    </div>
  </div>
  <?php require_once 'template/js.php'; ?>
</body>

</html>