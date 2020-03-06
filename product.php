<?php 
  session_start(); 
  // check user if already login in
  if(!isset($_SESSION["id"])){ 
    header('location: login.php');
  }
  $page_title = "Product"; 
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
            <h2>Product</h2>
          </div> 
          <div class="ml-auto p-2 bd-highlight">
          <a href="add_product.php" class="btn btn-primary">Add Product</a>
          </div>
        </div>  
         <hr> 
         <div class="row justify-content-center">
            <div class="col-md-12 mt-4"> 
              <?php 
                if(isset($_SESSION["error"])){ 
                    echo $_SESSION['error'];
                }
              ?> 
              <table class="table table-striped table-inverse ">
                <thead class="thead-inverse">
                  <tr>
                    <th>#</th>
                    <th>Product Code</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Unit</th> 
                    <th>Action</th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once 'application/config.php';
                      $count=1;
                      $sql = "SELECT * FROM product";
                      $result = mysqli_query($db, $sql); 
                      while($row = mysqli_fetch_array($result)) {		
                        echo '
                          <tr>
                            <td>'.$count++.'</td>
                            <td>'.$row['product_code'].'</td> 
                            <td>'.$row['description'].'</td> 
                            <td>'.$row['price'].'</td> 
                            <td>'.$row['unit'].'</td>   
                            <td>
                              <a class="text-warning" href="edit_customer.php?id='.$row['product_code'].'"><i class="fas fa-edit"></i></a> | 
                              <a class="text-danger" href="application/customer.php?delete_customer='.$row['product_code'].'" onclick="return confirm(\'Are you sure you want to delete this data?\')"><i class="fas fa-trash"></i></a>
                            </td>
                          </tr>'; 
                      }
                    ?> 
                  </tbody>
              </table>
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