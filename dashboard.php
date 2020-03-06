 <?php 
$page_title = "Dashboard";
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
         <h2>Dashboard</h2>
         <hr>
         <div class="row mt-5 justify-content-center"> 
            <img src="assets/img/image.jpg" alt="">
         </div>  
       </div>

     </main>
     <!-- page-content" -->
   </div>
  <?php require_once 'template/js.php'; ?>

 </body>

 </html>