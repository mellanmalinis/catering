<?php 
  session_start(); 
  // check user if already login in
  if(!isset($_SESSION["id"])){ 
    header('location: login.php');
  }
  $page_title = "Add Customer"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'template/meta-info.php'; ?>
  <?php require_once 'template/css.php'; ?>

</head>

<body>
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <?php require_once 'template/sidebar.php'; ?>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
      <div class="container-fluid">

        <div class="d-flex bd-highlight mb-3">
          <div class="p-2 bd-highlight">
            <h2>Add Customer</h2>
          </div>
        </div>
        <hr>
        <div class="row justify-content-center">
          <div class="col-md-12 mt-4">
            <div class="container"> 
            <?php 
              if(isset($_SESSION["error"])){ 
                  echo $_SESSION['error'];
              }
            ?>  
              <form method="post" action="application/customer.php">
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="inputName" placeholder="Last Name" required="">
                  </div>
                  <div class="col-sm-5">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="inputName" placeholder="First Name" required="">
                  </div>
                  <div class="col-sm-2">
                    <label for="mi">M.I.</label>
                    <input type="text" class="form-control" name="mi" id="inputName" placeholder="M.I." >
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="street">Street</label>
                    <input type="text" class="form-control" name="street" id="inputName" placeholder="Street" required="">
                  </div>
                  <div class="col-sm-6">
                    <label for="barangay">Barangay</label>
                    <input type="text" class="form-control" name="barangay" id="inputName" placeholder="Barangay" required="">
                  </div> 
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="inputName" placeholder="City" required="">
                  </div>
                  <div class="col-sm-6">
                    <label for="phone_number">Phone #</label>
                    <input type="text" class="form-control" name="phone_number" id="inputName" placeholder="Phone #" required="">
                  </div> 
                </div>
                <button type="submit" name="add" class="btn btn-primary float-right">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </main>
    <!-- page-content" -->
  </div>
  <?php require_once 'template/js.php'; ?>

</body>

</html>

<?php
  unset($_SESSION["error"]);
?>