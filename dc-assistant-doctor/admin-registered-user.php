<?php

include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}
$clinic = $_SESSION['clinic'];
if(isset($_POST['submit'])){
  $date = date('Y-m-d');
  $status = 'Paid';
  $service = $_POST['servicelist'];
  $patientname = $_POST['patientname'];
  $price = $_POST['price'];
  $total = $_POST['total'];
  $doctor = $_POST['doctor'];
  $balance = $_POST['balance'];
  $amount = $_POST['amount'];

  $sql = "INSERT INTO billing (clinic_id,patient_name,doctor,service,price,balance,amount_paid,date,status)
  VALUES('$clinic','$patientname','$doctor','$service','$total','$balance','$amount','$date','$status')";
  $result = mysqli_query($conn, $sql);
  if($result){
    header('location: assistant-billing_appointments.php');
  }else{
    echo "<script>alert('FAILED');</script>";
  }
}



?>

<!DOCTYPE html>
<html>

<head>
  <title>Users List | Dental Track</title>
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
      <h1 style="color: white;"><i class="fas fa-calendar mr-3"></i>Registered Users</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">

        <li class="nav-item">
          <a class="nav-link active" href="admin-clinic.php">Registered User List</a>
        </li>



      </ul><br>


      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                  <th>User Fullname</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Contact No.</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                showAllUser($conn);
                ?>
              </tbody>
            </table>
          </div>
        </div>
        


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
              url: 'include/showPatientConfirmAppoint.inc.php',
              data: {
                'id': data[0]
              },
              dataType: "json",
              success: function(response) {
                console.log(response);
                $('#bill_id').html(response[0]);
                $('#bbill_id').html(response[0]);
                $('#bill_patientname').html(response[1]);
                $('#bill_patientname1').html(response[1]);
                $('#bill_doctor').html(response[3]);
                $('#bill_service').html(response[4]);
                $('#bill_branch').html(response[5]);
                $('#bill_datentime').html(response[7]);
                $('#bill_total').html(response[9]);
                $('#bill_status').html(response[10]);

                $('#fbill_id').val(response[0]);
                $('#fbill_patientname').val(response[0]);
                $('#fbill_service').val(response[4]);
                $('#bill_doctor').html(response[3]);
                $('#fbill_branch').val(response[5]);
                $('#fbill_datentime').val(response[8]);
                $('#fbill_total').val(response[9]);
                $('#fbill_status').val(response[10]);


                $("#mop").on("change", function() {
                  $('#mopinput').val((this).val());


                  $('#msg_body').val('Hi ' + response[1]);
                  $('#email_body').val('Hi ' + response[1] + ', we would like to inform you that your appointment request in Branch ' + response[5] +
                    ' has been confirmed. Your schedule has been set on ' + response[7] + ' at ' + time);
                });
              }

            });

          });


          $('.viewConfirmAppointmentBtn1').on('click', function() {
            $('#ViewBillPaid').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();

            console.log(data);

            $.ajax({
              type: 'POST',
              url: 'include/showPaidConfirmAppoint.inc.php',
              data: {
                'id': data[0]
              },
              dataType: "json",
              success: function(response) {
                console.log(response);
                $('#bbbill_id').html(response[0]);
                $('#bbbill_id').html(response[0]);
                $('#bbill_patientname').html(response[3]);
                $('#bbill_patientname1').html(response[3]);
                $('#bbill_doctor').html(response[3]);
                $('#bbill_service').html(response[4]);
                $('#bbill_datentime').html(response[6]);
                $('#bbill_total').html(response[5]);
                $('#bbill_status').html(response[7]);

                $('#abbbill_id').val(response[0]);
                $('#abbill_patientname').val(response[1]);
                $('#abbill_total').val(response[5]);
                $('#abbill_datentime').val(response[6]);
                $('#abbill_status').val(response[7]);
                $('#abbill_service').html(response[4]);

                $("#settime").change(function() {
                  var time = $(this).val();
                  $('#msg_body').val('Hi ' + response[1]);
                  $('#email_body').val('Hi ' + response[1] + ', we would like to inform you that your appointment request in Branch ' + response[5] +
                    ' has been confirmed. Your schedule has been set on ' + response[7] + ' at ' + time);
                });

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
          </script>
<script>
function onlyNumberKey(evt){
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if(ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
  return false;
  return true;
}
</script>
</body>

</html>