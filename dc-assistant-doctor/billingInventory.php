<?php
include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Report | Reports</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php 

include "./navbar.php";
include 'include/connection.php';
include 'include/function.php';
?>


  <!-- Page content holder -->
  <div class="page-content p-5" id="main">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->
    <div>
      <h1 style="color: white;"><i class="fas fa-copy mr-3"></i>Report</h1>
    </div><br>

   

    <div class="container pt-3 pb-5 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link " href="assistant-report.php">Appointment</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="billingreports.php">Billing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="billingInventory.php">Inventory</a>
        </li>
      
      </ul><br>

      <!-- CODE REPORT START -->

      <div style="padding-bottom: 10px;">
        <form class="form-inline" method="POST">
          
      <div class="col">
      <button style="margin-right: 5px; float: right; bottom:0; right:10px;" class="btn btn-danger btn-border btn-round " onclick="printDiv('content')" >
												<i class="fa fa-print"></i>
												Print Report
											</button>
          <button style="margin-right: 5px; float: right; bottom:0; right:10px;" type="submit" class="btn btn-warning">Filter</button>
        </div>
        </div>
      <hr>
    <div id = "content">
      <div class="row pt-1">
        <div class="col">
        <h1 style="color: black;"><i class="fas fa-copy mr-3"></i>Inventory Reports</h1>
         
         
        </div>

       
      </div>

      <div class="row pb-3">
        <div class="col">
          <label><b>From:</b></label><br>
          <input type="date" name="from_date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>" class="form-control">
        </div>
        
        <div class="col">
          <label><b>To:</b></label><br>
          <input type="date" name="to_date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>" class="form-control">
    </div>
        
        
      </div>
      
      </form>
     
                      
      <div class="table-responsive">
        <table  class="table table-striped table-bordered">
         <tr>
         <th>Medicine Np.</th>
         <th>Medicine Name</th>
         <th>Quantity</th>
         <th>Price</th>
         <th>Expiration Date</th> 
         <th>Received Date</th> 
         </tr>
          <tbody>
            <tr>
          <?php showReportInventory($conn); ?>
          </tbody>
        </table>
      </div>

      <!-- CODE REPORT END -->

</div>




      <!-- End demo content -->

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="main.js"></script>
</body>

</html>

<script>
   function printDiv(print) {
                var printContents = document.getElementById(print).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
    </script>