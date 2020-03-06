<?php 
  session_start(); 
  // check user if already login in
  if(!isset($_SESSION["id"])){ 
    header('location: login.php');
  }
  $page_title = "Sales Invoce";  
  require_once 'application/config.php';
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

        <form method="POST" id="sales-invoice">
          <div class="row justify-content-center">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="">Customer</label>
                <select name="customer" required="" class="form-control ">
                  <option value="">Select</option>
                  <?php  
                $sql= "SELECT * FROM customer";
                $result = mysqli_query($db, $sql);
								if(mysqli_num_rows($result)){
									while($row = mysqli_fetch_array($result)){
							?>
                  <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['first_name'].' '.$row['last_name'] ?></option>
                  <?php 
									}
								} 
							?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Term</label>
                <select name="terms" required="" class="form-control ">
                  <option value="">Select</option>
                  <option value="Cash On Delivery">Cash On Delivery</option>
                  <option value="Cash">Cash</option>
                  <option value="Credit">Credit</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Product</label>
                <select name="products" id="products" required="" class="form-control  ">
                  <option value="">Select</option>
                  <?php 
								$query = "SELECT * FROM product";
								$result1 = mysqli_query($db, $query);
								if(mysqli_num_rows($result1)){
									while($row = mysqli_fetch_array($result1)){
							?>
                  <option value="<?php echo $row['product_code']; ?>"><?php echo $row['description'];?></option>
                  <?php 
									}
								} 
							?>
                </select>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-12">
              <div class="table-responsive">
                <table id="invoice-item-table" class="table table-bordered table-sm">
                  <tr>
                    <th>Productcode</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th rowspan="2"><button type="button" name="add_row" id="add_row" class="my-3 btn btn-block btn-success btn-sm btn-xs">ADD </button></th>
                  </tr>
                  <tr>
                    <td><input type="text" name="products[]" id="barcode1" class="form-control form-control-sm input-sm barcode" placeholder="Barcode"/ required></td>
                    <td><input type="number" min="1" name="quantity[]" id="quantity1" data-srno="1" class="form-control form-control-sm input-sm quantity" placeholder="Qty" required=""> </td>
                    <td><input type="number" step="0.01" min="0.00" name="price[]" id="buy_price1" data-srno="1" class="form-control form-control-sm input-sm buy_price" placeholder="Price" required="'"> </td>
                    <td><input type="text" name="unit[]" id="unit1" data-srno="1" class="form-control form-control-sm  input-sm unit" pattern="[A-Za-z0-9]+" placeholder="Unit" required></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-4">
              <button type="submit" name="create_delivery" class="btn btn-primary btn-block">Okay</button>
            </div>
          </div>

        </form>

      </div>

    </main>
    <!-- page-content" -->
  </div>
  <?php require_once 'template/js.php'; ?>

  <script>
    $(document).ready(function () {
      var final_total_amount = $('#final_total_amount').text();
      var count = 1;
      $(document).on('change', '#products', function () {
        load(count);
      });
      $(document).on('click', '#add_row', function () {
        count += 1;

        var html_code = '';
        html_code += '<tr id="row_id_' + count + '">';
        html_code += '<td><input type="text" name="products[]" id="barcode' + count + '" class="form-control form-control-sm input-sm barcode" placeholder="Barcode"/></td>';
        html_code += '<td><input type="number" name="quantity[]" min="1" id="quantity' + count + '" data-srno="' + count + '" placeholder="Qty"  class="form-control form-control-sm nput-sm quantity" /></td>';
        html_code += '<td><input type="number" name="price[]" min="0.00" step="0.00" placeholder="Price" id="buy_price' + count + '" data-srno="' + count + '" class="form-control form-control-sm input-sm buy_price"></td>';
        html_code += '<td><input type="text" name="unit[]" pattern="[A-Za-z]+" title="No number on unit" id="unit' + count + '" placeholder="Kilograms" data-srno="' + count + '" class="form-control form-control-sm input-sm unit"></td>';
        html_code += '<td><button type="button" name="remove_row" id="' + count + '" class="btn btn-sm btn-danger btn-xs remove_row">Remove</button></td></tr>';
        $("#invoice-item-table").append(html_code);
        $(document).on('change', '#products', function () {
          load(count);
        });

      });
      $(document).on('click', '.remove_row', function () {
        var row_id = $(this).attr("id");
        $('#row_id_' + row_id).remove();
        count -= 1;
      });


    });
  </script>

</body>

</html>
<?php
  unset($_SESSION["error"]);
?>