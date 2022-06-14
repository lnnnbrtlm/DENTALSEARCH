<?php
include 'include/connection.php';
include 'include/function.php';
include('session.php');

if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}
$email = $_SESSION['login_admin1'];
$sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
$result = mysqli_query($conn,$sql);
$sql1 = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)==0 && mysqli_num_rows($result1)==0){

header("location: assistant-index.php");
}

if(isset($_POST['submit'])){
  $stocks = $_POST['stocks'];
  $medicine = $_POST['medsname'];
  $soldstock = $_POST['medsquan'];

$stocksupdate = (intval($stocks) - intval($soldstock));

if(minusMedStock($conn,$medicine,$stocksupdate)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-billing-prescription.php");
	exit();
}	
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Prescription | Billing</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--data -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

</head>

<body>

  <?php include "./navbar.php" ?>



  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->



    <div>
      <h1 style="color: white;"><i class="fas fa-money-bill mr-3"></i>Billing</h1>
    </div><br>
      
    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" href="assistant-billing_appointments.php">Payment</a>
        </li>
     
      </ul><br>

      <div style="float: right; padding-bottom: 10px;">
        <form class="form-inline" action="/action_page.php">
       
        </form>
        
      </div>
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#AddItem">Add Item</button>

      <button style="margin-right: 5px; bottom:0; right:10px;" class="btn btn-danger btn-border btn-round " onclick="printDiv('print')" >
												<i class="fa fa-print"></i>
												Print Report
											</button> 
                      <div id="print">
      <div>
      <h1 style="color: black;"><i class="fa fa-cubes" style="font-size: 40px;"></i> Medicine Sales</h1>
    </div>  
      
      

      <div style="padding-top: 2rem;" class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Medicine</th>
              <th>Quantity</th>
              <th>Price</th>
       
            </tr>
          </thead>
          <tbody>
         <?php showSalesTable($conn) ?>
          </tbody>
        </table>
      </div>

      <!-- The Modal -->
      <div class="modal fade" id="ViewBill">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[PT0001] Gerie Mae</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


              <h4>Billing Infromation</h4>
              <hr>
              <div class=row>
                <div class=col>
                  <form action="/action_page.php">
                    <p><b>Patient Name:</b> Mae Nery</p>
                    <p><b>Doctor:</b> Urna</p>
                    <p><b>Appointment ID:</b> APT0001</p>




                  </form>

                </div>
                <div class="col">
                  <p><b>Time and Date:</b> 10:00AM | 12/27/2021</p>
                  <label for="payment" style="padding-top: 10px;"><b>Payemnt Method:</b></label>
                  <select id="payment" class="form-control">
                    <option>GCash</option>
                    <option>Paymaya</option>
                    <option>Debit</option>
                    <option>Cash</option>
                  </select>


                </div>
                </form>
              </div>

              <div class="row" style="padding-left: 15px;">
                <div class="form-group">
                  <label for="comment"><b>Note:</b></label>
                  <textarea style="width: 400px;" class="form-control" rows="5" id="comment"></textarea>
                </div>
              </div>

              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Medicine</th>
                      <th>Qty.</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tylenol</td>
                      <td>3</td>
                      <td>1000</td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <p style="float: right;"><b>Total:</b> PHP1000</p>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">View & Print</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

<!-- The Modal -->
<div class="modal fade" id="AddItem">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Item</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


 <?php 
      if (isset($_SESSION['patientErr'])) {

               if ($_SESSION['patientErr'] == "addSuccess") {
                  echo '
                    <div class="alert alert-primary alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Medicine Added.
                    </div>
                  ';
                  $_SESSION['patientErr'] = "";
                }

      }
      ?>
            <!-- Modal body -->
            <div class="modal-body">
              <form action="include/addPrescriptionBill.inc.php" method="POST">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                
                      <th>Medicine</th>
                      <th>Quantity</th>
                      <th>Stocks</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <form method="post">
                  <tbody>
                    <tr>
                      <td><select name="medsname" id="medi" style="width: 150px; height: 30px;">
                  <option value="select"></option>
                  <?php showMedicineMinuse($conn); ?>

                </select></td>
                
                      <td><input type="text" onkeypress='return restrictAlphabets(event)' onkeyup="getMedicine()" id="quan" name="medsquan" placeholder="" style="width: 100px;" onKeyDown="limitText(this,3);" 
onKeyUp="limitText(this,3)"></td>
                      <td><select name="stocks" id="stocks" style="width: 150px; height: 30px;">
                      <option value=""></option>
                      <?php showStocks($conn); ?>
                    </td>
                      <td><input type="text" onkeypress='return restrictAlphabets(event)' id="price" name="medsprice" placeholder="" style="width: 100px;" ></td>
                    </tr>

                  </tbody>
                </table>
              </div>
              


              <!-- Modal footer -->
              <div class="modal-footer">

                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </form>
              </div>
             
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
      <!-- End demo content -->

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     
      <!--- datatables js -->
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
      
     
      <script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable();

} );
      </script>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}

</script>

<script>
$(function(){
    $('#medi')[0].selectedIndex = 0;
    $('#medi').change(function(){
        var index = $(this)[0].selectedIndex;
        $('#stocks')[0].selectedIndex = index;
    });    
});
</script>
      <script type="text/javascript">
   /*code: 48-57 Numbers*/
   function restrictAlphabets(e){
       var x = e.which || e.keycode;
   	if((x>=48 && x<=57))
   		return true;
   	else
   		return false;
   }
</script>
<script>
function getMedicine(){

var service = document.getElementById('medi').value;
var total = document.getElementById('quan').value;
var price = document.getElementById('price');


 price.value = parseInt(service) * parseInt(total);
       if (!isNaN(result)) {
           document.getElementById('btotal').value = result;
       }

}

     

</script>


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