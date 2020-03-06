<?php 
  session_start(); 
  // check user if already login in
  if(!isset($_SESSION["id"])){ 
    header('location: login.php');
  }
  $page_title = "Customer"; 
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
            <h2>Customer</h2>
          </div> 
          <div class="ml-auto p-2 bd-highlight">
          <a href="add_customer.php" class="btn btn-primary">Add Customer</a>
          </div>
        </div>  
         <hr> 
         <div class="row justify-content-center">
            <div class="col-md-12 mt-4"> 
              <table class="table table-striped table-inverse ">
                <thead class="thead-inverse">
                  <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>M.I.</th>
                    <th>Last Name</th>
                    <th>Street</th>
                    <th>Barangay</th>
                    <th>City</th>
                    <th>Phone #</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once 'application/config.php';
                      $count=1;
                      $result = mysqli_query($db, "SELECT * FROM customer"); 
                      while($row = mysqli_fetch_array($result)) {		
                        echo '
                          <tr>
                            <td>'.$count++.'</td>
                            <td>'.$row['first_name'].'</td> 
                            <td>'.$row['mi'].'</td> 
                            <td>'.$row['last_name'].'</td> 
                            <td>'.$row['street'].'</td> 
                            <td>'.$row['barangay'].'</td> 
                            <td>'.$row['city'].'</td> 
                            <td>'.$row['phone'].'</td> 
                            <td>
                              <a class="text-warning" href="edit_customer.php?id='.$row['customer_id'].'"><i class="fas fa-edit"></i></a> | 
                              <a class="text-danger" href="application/customer.php?delete_customer='.$row['customer_id'].'"><i class="fas fa-trash"></i></a>
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