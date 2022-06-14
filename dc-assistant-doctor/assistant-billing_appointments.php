<?php

include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}
$clinic = $_SESSION['clinic'];
if(isset($_POST['submit'])){
  $date = date('Y-m-d');
  $service = $_POST['servicelist'];
  $patientname = $_POST['patientname'];
  $price = $_POST['price'];
  $total = $_POST['total'];
  $doctor = $_POST['doctor'];
  $balance = $_POST['balance'];
  $amount = $_POST['amount'];
  $change = $_POST['change'];
  $email = $_POST['email'];
  $clinic_name = $_POST['clinic_name'];

  if($balance == 0){
  $sql = "INSERT INTO billing (`clinic_id`,`patient_name`,`doctor`,`service`,`price`,`balance`,`amount_paid`,`bill_change`,`date`,`status`,`email`,`clinic_name`)
  VALUES('$clinic','$patientname','$doctor','$service','$total','$balance','$amount','$change','$date','Paid','$email','$clinic_name')";
  $result = mysqli_query($conn, $sql);
  if($result){
   $_SESSION['patientErr'] = "addSuccess";
	header("Location: assistant-billing_appointments.php");
	exit();
  }else{
    echo "<script>alert('FAILED');</script>";
  }
}else{
  $sql = "INSERT INTO billing (`clinic_id`,`patient_name`,`doctor`,`service`,`price`,`balance`,`amount_paid`,`bill_change`,`date`,`status`,`email`,`clinic_name`)
  VALUES('$clinic','$patientname','$doctor','$service','$total','$balance','$amount','$change','$date','w balance','$email','$clinic_name')";
  $result = mysqli_query($conn, $sql);
  if($result){
  $_SESSION['patientErr'] = "addSuccess1";
	header("Location: assistant-billing_appointments.php");
	exit();
  }else{
    echo "<script>alert('FAILED');</script>";
  }
}
}

if(isset($_POST['save'])){
  $amount = $_POST['bill_amount'];
  $balance = $_POST['bill_balance'];
  $bill_id = $_POST['bbill_id'];

  $date = date('Y-m-d');
  if($balance == '0'){
  $sql1 = "UPDATE `billing` SET amount_paid='$amount',balance='$balance',`status`='Paid',`date`='$date' WHERE bill_id='$bill_id'";
  $result = mysqli_query($conn,$sql1);
  }
  else{
    $sql1 = "UPDATE `billing` SET amount_paid='$amount',balance='$balance',`status`='w balance',`date`='$date' WHERE bill_id='$bill_id'";
    $result = mysqli_query($conn,$sql1);
  }
}




?>

<!DOCTYPE html>
<html>

<head>
  <title>Payment | Transactions</title>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <!--data table -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  

  <style>

  </style>

</head>

<body>

  <?php
  include "./navbar.php";
  include 'include/connection.php';
  include 'include/function.php';
  include 'sendemail.php';
  ?>



  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->

    <div>
      <h1 style="color: white;"><i class="fas fa-calendar mr-3"></i>Payment</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">

        <li class="nav-item">
          <a class="nav-link active" href="assistant-billing_appointments.php">Payment List</a>
          <hr>
        </li>
      </ul>
      
<!-- MESSAGE  -->
      <?php
      if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "addSuccess") {
          echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Bill Added.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
      }
      ?>
      <!-- MESSAGE  -->
      <?php
      if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "addSuccess1") {
          echo '
                    <div class="alert alert-primary alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Bill Updated.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
      }
      ?>
      
      <button type="button" class="btn btn-info mt-3 mb-3" data-toggle="modal" data-target="#myModal">
  Add Payment</button>

      <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-paid-tab" data-toggle="tab" href="#nav-paid" role="tab" aria-controls="nav-home" aria-selected="true">Fully Paid</a>
    <a class="nav-item nav-link" id="nav-balance-tab" data-toggle="tab" href="#nav-balance" role="tab" aria-controls="nav-profile" aria-selected="false">Patient with Balance</a>
  </div>
</nav>
<br>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-paid" role="tabpanel" aria-labelledby="nav-paid-tab">




  <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th style="display:none;">bill id</th>
                  <th>Patient Name</th>
                  <th>Service</th>
                  <th>Price</th>
                  <th>Amount Paid</th>
                  <th>Change</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                showAppointmentComplete($conn, $clinic);
                ?>
              </tbody>
            </table>
          </div>




  </div>
  <div class="tab-pane fade" id="nav-balance" role="tabpanel" aria-labelledby="nav-balance-tab">



<!-- Balance TAB -->

  <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                  <th>Patient Name</th>
                  <th>Service</th>
                 
                  <th>Price</th>
                  <th>Amount Paid</th>
                  <th>Balance</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                showAppointmentCompleteBal($conn, $clinic);
                ?>
              </tbody>
            </table>
          </div>



  </div>

</div>

      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">

        </div>
      </nav>
      <!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Payment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post">
      <div class="row">
      <div class="col">
      <label for="label" style="margin-top: 10px;">Patient Name:&nbsp;</label>
        <select class="form-control" id="patientname" name="patientname">
<?php 
      showPatientDDDistinct($conn,$clinic);
?>
      </select>
              <select class="form-control" style="display: none;" id="email" name="email">
<?php 
      showEmailDDDistinct($conn,$clinic);
?>
      </select>
       <input type="text" name="clinic_name" style="display: none;" value="<?php getClinicName($conn,$clinic); ?>">
</div>
</div>
          <div class="row" style="margin-top: 10px;">
            <div class="col">
      <label for="label" style="margin-top: 10px;">Services:&nbsp;</label>
        <select class="form-control" id="servicelist" name="servicelist">
<?php 
      showServiceDDD($conn,$clinic);
      showRestoDDD($conn);
?>
      </select>
      <div style="">
      <label for="label" style="margin-top: 10px;">Quantity:&nbsp;</label><br>
      <input class="form-control" type="text" id="qty" onkeypress="return onlyNumberKey(event)" maxlength="1" onkeypress="return onlyNumberKey(event)" style="width: 60px; margin-top: 3px; border-radius: 3px;" name="qty"/>
      <label for="label" style="margin-top: 10px;">Amount Paid:&nbsp;</label><br>
      <input class="form-control" type="text" onkeypress="return onlyNumberKey(event)" onkeyup="noZero(); changeAmount()" style="margin-top: 3px; border-radius: 3px;" id="amount" name="amount"/>
      <label for="label" style="margin-top: 17px;">Change:&nbsp;</label><br>
      <input class="form-control" type="text" readonly onkeypress="return onlyNumberKey(event)" style="margin-top: 3px; border-radius: 3px;" id="change" name="change"/>
</div>
</div>
<div class="col">
      <label for="label" style="margin-top: 10px;">Price:&nbsp;</label>
      <input class="form-control" type="text" onkeypress="return onlyNumberKey(event)" id="price" name="price"/>
<?php 
      showServicePriceDDD($conn,$clinic);
?>
</select>
<div style="">
      <label for="label" style="margin-top: 10px;">Total Price:&nbsp;</label><br>
      <input class="form-control" type="number" name="total" readonly id="total" style="margin-top: 3px; border-radius: 3px;"/>
      <label for="label" style="margin-top: 10px;">Balance:&nbsp;</label><br>
      <input class="form-control" type="number" onkeypress="return onlyNumberKey(event)" min="0" name="balance" id="balance" value="0" style="margin-top: 3px; border-radius: 3px;"/>
</div>
</div>
</div>
      </div>
    <input type="hidden" name="branch" value="<?php echo getBranch($conn, $_SESSION['login_admin1'])?>">
    <input type="hidden" name="doctor" value="<?php echo getDoctorName($conn, $_SESSION['login_admin1'])?>">
      <hr/>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="submit">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


        </div>
       

        <!-- The Modal -->
        <div class="modal fade" id="ViewBill">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">[<span id="bill_id"></span>]<span id="bill_clinicname"></span></h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body"  id = "print">


                <h4>Payment Infromation (<span id="sbill_clinicname"></span>)</h4>
                <hr>
                <div class=row>
                  <div class=col>
                    <form method="post">
                      <p><b>Patient Name:</b><span id="sbill_patientname"></span> <input readonly type="text" style="border: none; display: none;" id="bill_patientname"/></p>
                      <p><b>Bill Reference no.: </b><span id="sbbill_id"></span> <input readonly type="text" name="bbill_id" id="bbill_id" style="border: none; display: none;"/>
                      <p><b>Date: </b><span id="sbill_datentime"></span> <input type="text" readonly id="bill_datentime" style="border: none; display: none;"/>


                  </div>

                </div>

                <div class="row" style="padding-left: 15px;">
                  <div class="form-group">
                    <label for="comment"><b>Service: </b><span id="sbill_service"></span><input readonly type="text" id="bill_service" style="border: none; display: none;"/></label>
                  </div>
                </div>
                <div class="row" style="padding-left: 15px;">
                  <div class="form-group">
                    <label for="comment"><b>Payment status: </b><span id="sbill_status">></span><input type="text" readonly id="bill_status" style="border: none; display: none;"/></label>
                  </div>
                  </div>
                  <div class="form-group">
                <p><b>Amount Paid: </b>(<span id="sbill_amount"></span>)<br><input disabled type="text" onkeyup="noZero1(); gaya()" name="bill_amount" onkeypress="return onlyNumberKey(event)" id="bill_amount"/></p>
                <br>
                </div>
                
                <hr/>
                <div style="float: right;">
                <p><b>Total:</b><span id="sbill_price"></span> <input type="text" style="display: none;" readonly id="bill_price" style="border: none;"/></p>
                <p><b>Balance:</b><span id="sbill_balance"></span> <input type="text" style="display: none;" readonly id="bill_balance" name="bill_balance" style="border: none;"/></p>
               </div>


              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
              <button type="button" class="btn btn-warning" id="update" onclick="enable()">Update</button>
                <button type="submit" name="save" class="btn btn-primary">Save</button>
                
              <button type="button" class="btn btn-warning" onclick="printDiv('print')">View & Print</button>
                <button type="button" class="btn btn-primary" onclick="disable()" data-dismiss="modal">Close</button>
                </form>
              </div>
              
            </div>
          </div>
        </div>

        <!--  END CONTENT -->

            </div>
          </div>
        </div>

        <!--  END CONTENT -->

        <!-- End demo content -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- data tables -->

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
        <script src="main.js"></script>

        <script>
          function enable(){
            document.getElementById('bill_amount').disabled='';
          }
          function disable(){
            document.getElementById('bill_amount').disabled = true;
          }

        </script>

        <script type="text/javascript">
      

          function isNotEmpty(caller) {
            if (caller.val() == "") {
              caller.css('border', '1px solid red');
              return false;
            } else {
              caller.css('border', '');
              return true;
            }
          }
        </script>
        <script type="text/javascript">
          < script src = "https://code.jquery.com/jquery-3.4.1.min.js"
          integrity = "sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin = "anonymous" >
        </script>
        </script>



        <script type="text/javascript">
          function getService() {

            var service = document.getElementById('addService').value;
            var total = document.getElementById('btotal').value;


            var result = parseInt(service) + parseInt(total);
            if (!isNaN(result)) {
              document.getElementById('btotal').value = result;
            }

          }
        </script>

        <script type="text/javascript">
          function removeService() {

            var reservedService = document.getElementById('bprice');
            var service = document.getElementById('addService');
            var total = document.getElementById('btotal');

            total.value = reservedService.value;
            document.getElementById("addService").selectedIndex = "0";
          }
        </script>
        <script>
            function gaya(){

                    var amount = document.getElementById('bill_amount').value;
                    document.getElementById('sbill_amount').innerHTML = amount;

            }
            </script>


        <!-- Email Script-->
        <script type="text/javascript">
          if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
          }
        </script>

        <script>
          $(#checkin_checkintime).ready(function() {
            $datenow = date('d-m-Y');
            $(this).val($datenow).value;

          });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.min.js"></script>
        <script src="script.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2.min.js"></script>
        <script src="https://oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script>
          $('select').selectpicker();
        </script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        
<!-- data tables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>   


        <script type="text/javascript">
          $('.viewConfirmAppointmentBtn').on('click', function() {
            $('#ViewBill').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();


            $.ajax({
              type: 'POST',
              url: 'include/modalShowBilling.php',
              data: {
                'id': data[0]
              },
              dataType: "json",
              success: function(response) {
                console.log(response);
                $('#bill_id').html(response[0]);
                $('#bbill_id').val(response[0]);
                $('#bill_patientname').val(response[2]);
                $('#bill_clinicname').html(response[10]);
                $('#bill_service').val(response[3]);
                $('#bill_datentime').val(response[4]);
                $('#bill_status').val(response[5]);
                $('#bill_amount').val(response[6]);
                $('#bill_price').val(response[7]);
                $('#bill_balance').val(response[8]);
                $('#bill_change').val(response[9]);

                $('#sbbill_id').html(response[0]);
                $('#sbill_patientname').html(response[2]);
                $('#sbill_datentime').html(response[4]);
                $('#sbill_service').html(response[3]);
                $('#sbill_status').html(response[5]);
                $('#sbill_amount').html(response[6]);
                $('#sbill_price').html(response[7]);
                $('#sbill_balance').html(response[8]);
                $('#sbill_change').html(response[9]);
                $('#sbill_clinicname').html(response[10]);
                
                

              }

            });

          });


          function mop(e) {

            document.getElementById('mopinput').value = e.value;
          }
        </script>
        <script>
          $('#servicelist').change(function(){
            var x = $('option:selected',this).index()
            $('#price').prop('selectedIndex',x);

          });
          $(document).ready(function() {
    $('#example').DataTable();

} );    
          </script>
          
          <script>
    $('#qty').on('keyup', function(){
    $('#total').val(parseInt($('#qty').val()) * parseInt($('#price').val()));
    if($('#total').val() == 'NaN'){
   var x = '';
   $('#total').val() = x;
    }
});

    $('#price').on('keyup', function(){
    $('#total').val(parseInt($('#qty').val()) * parseInt($('#price').val()));
    if($('#total').val() == 'NaN'){
   var x = '';
   $('#total').val() = x;
    }
});
/*
$('#amount').on('keyup', function(){

    $('#balance').val($('#total').val() - $('#amount').val());

});*/

          </script>
                  <script>
          $('#patientname').change(function(){
            var x = $('option:selected',this).index()
            $('#email').prop('selectedIndex',x);

          });
  
          </script>
<script>

        function noZero(){

            var am = document.getElementById('amount');
            var total = document.getElementById('total');
            
            var amval = am.value;
            var store = total.value - am.value;
            if(store > 0){
                document.getElementById('balance').value = store;
            }else{
                document.getElementById('balance').value = '0';
            }
            if(amval == ''){
                document.getElementById('balance').value = '0';
            }
            
        }
        
        function noZero1(){

var am = document.getElementById('bill_amount');
var total = document.getElementById('bill_price');

var amval = am.value;
var store = total.value - am.value;
if(store > 0){
    document.getElementById('bill_balance').value = store;
    document.getElementById('sbill_balance').innerHTML = store;
}else{
    document.getElementById('bill_balance').value = '0';
    document.getElementById('sbill_balance').innerHTML = '0';
}
if(amval == ''){
    document.getElementById('bill_balance').value = '0';
    document.getElementById('sbill_balance').innerHTML = '0';
}

}

        function changeAmount(){

            var am = document.getElementById('amount');
            var total = document.getElementById('total');
            
            var change = am.value - total.value;
            if(change > 0){
                document.getElementById('change').value = change;
            }else{
                document.getElementById('change').value = '0';
            }
            
            
        }

    </script>

<script>
function onlyNumberKey(evt){
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if(ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
  return false;
  return true;
}
</script>
<script>
   function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
               

                
                newWin= window.open("");
                
                newWin.document.body.innerHTML = printContents;
                newWin.print();
            }
    </script>
</body>

</html>