<?php 
  session_start(); 
  // check user if already login in
  if(!isset($_SESSION["id"])){ 
    header('location: login.php');
  }
  $page_title = "Add Product"; 
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
            <h2>Add Product</h2>
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
              <form method="post" action="application/product.php">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description" required="">
                  </div> 
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="price">Price</label>
                    <input type="number" class="form-control text-right" name="price" placeholder="00.00" required="">
                  </div>
                  <div class="col-sm-6">
                    <label for="unit">Unit</label>
                    <input type="text" class="form-control" name="unit" placeholder="Unit" required="">
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