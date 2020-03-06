<?php 
  session_start(); 
  // check user if already login in
  if(!isset($_SESSION["id"])){ 
    header('location: login.php');
  }
  $page_title = "Sales Invoce"; 
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
         <h2>Sales Invoce</h2>
         <hr> 
       </div>

     </main>
     <!-- page-content" -->
   </div>
  <?php require_once 'template/js.php'; ?>

 </body>

 </html>