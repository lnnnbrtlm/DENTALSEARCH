<?php

include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}

$user_id = $_SESSION['user_id'];
if($_SESSION['user_type'] != 'Admin'){

if(!isset($_SESSION['clinic'])){
header("location: index-branch-picker.php");
}else{
  $clinic = $_SESSION['clinic'];
}
}else{

}
if(isset($_GET['verify_status'])){
  $sql = "UPDATE clinic_tbl SET `verify_status`=3 WHERE clinic_id='$clinic'";
  mysqli_query($conn,$sql);
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Dashboard | HOME </title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!----Data tables css -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

  <script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
var x1=x.toUTCString();// changing the display to UTC string
document.getElementById('ct').innerHTML = x1;
tt=display_c();
 }

</script>

</head>

<body onload=display_ct();>

  <?php
  include "./navbar.php";
  include 'include/connection.php';
  include 'include/function.php';
  ?>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->
    <div>
      <h1 style="color: white;"><i class="fa fa-th-large mr-3 fa-fw"></i>Dashboard</span></h1>
      
      
      <h1 style = "color: white;"><i class="far fa-clock"></i><span id="digital-clock"></span></h1>
			<script src="time.js"></script>
    </div>
    <br>

    <div class="container pt-3 pb-3 ">
      <div class="card-deck">
        <div class="card bg-light text-dark">
          <div class="card-body text-center">
            <div class="row">
              <div class="col"><i style="font-size:80px" class="fas fa-users"></i></div>
              <div class="col">
               <h1 style="font-size:70px">
                <?php if($_SESSION['user_type'] == 'Admin'){ ?>
              <?php echo showTotalPatientAdmin($conn); ?></h1>
                </div>
                </div>   
                  <h6 class="card-text">Total User/s</h6>     
                  <?php } else{?>
               <?php echo showTotalPatient($conn,$clinic); ?></h1>
              </div>
                  
            </div>
            <h6 class="card-text">Total Patient/s</h6>
            <?php } ?>
          </div>
        </div> 
        

        <div class="card bg-light text-dark">
          <div class="card-body text-center">
            <div class="row">
              <div class="col"><i style="font-size:80px" class="fas fa-user-md"></i></div>
              <div class="col">
                <h1 style="font-size:70px">
                <?php if($_SESSION['user_type'] == 'Admin'){ ?>
                  <h1 style="font-size:70px"><?php echo showTotalClinic($conn); ?>
                  </h1>
              </div>
            </div>
            <h6 class="card-text">Total Clinic/s</h6>
                  <?php } else{?>
              <?php echo showTotalDoctor($conn,$clinic); ?> </h1>
              </div>
            </div>
            <h6 class="card-text">Total Doctor/s</h6>
            <?php } ?>
          </div>
        </div>




        <div class="card bg-light text-dark">
          <div class="card-body text-center">
            <div class="row">
              <div class="col"><i style="font-size:80px" class="fas fa-calendar-check"></i></i></div>
              <div class="col">
              <?php if($_SESSION['user_type'] == 'Admin'){
                  
                  ?>
                  <h1 style="font-size:70px"><?php echo showOwnerClinic($conn); ?>
                  </h1></div>
            
            </div>
            <h6 class="card-text">Total Clinic Owner</h6>
                  <?php }else{ ?>
                <h1 style="font-size:70px"><?php echo showTodaysAppoint($conn,$clinic); ?></h1>
              </div>
            
            </div>
            <h6 class="card-text">Today's Appointment/s</h6>
            <?php } ?>
          </div>
        </div>
      </div><br>












      <br>

      <?php if($_SESSION['user_type'] == 'Admin'){
                  
                  ?>

      <div class="card bg-light">
        <div class="card-body text-center">
        <h4>Clinic Owners</h4><br>
          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th>Owner ID</th>
                  <th>Owner Name</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <?php showOwnersTable1($conn); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } else {?>
    <div class="card bg-light">
        <div class="card-body text-center">
        <h4>Today's Appointments</h4><br>
          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th>Date</th>
                  <th>Time</th>
                  <th>Patient Name</th>
                  <th>Service</th>
                </tr>
              </thead>
              <tbody>
                <?php showTodaysAppointments($conn,$clinic); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>

  <!-- UNCONFIRMED MODAL -->

  <!-- The Modal -->
  <div class="modal fade" id="ViewAppointUnconfirmed">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">[APTXXXX] Gerie Mae</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <h4>Appointment Information</h4>
          <hr>
          <div class=row>

            <div class=col>
              <form action="/action_page.php">
                <p><b>Appointment ID:</b> <span style="color: lightgray"> Confirm to generate</span></p>
                <p><b>Patient Name:</b> Gerie Mae</p>
                <p><b>Service:</b> Cleaning</p>
                <p><b>Doctor:</b> Urna</p>
                <p><b>Note:</b> Allergic to xxxx</p>
                <button type="button" class="btn btn-link" disabled>Send SMS and Email</button><br>


            </div>
            <div class="col">
              <p><b>Appointment Time:</b> 10:00AM | 12/26/2021</p>
              <p><b>Appointment Status:</b> <span class="badge badge-secondary">Unconfirmed</span></p>
              <p><b>In Chair Time:</b> <span style="color: lightgray">00:00XX | 00/00/0000</span> </p>
              <p><b>Checked-In Time:</b> <span style="color: lightgray">00:00XX | 00/00/0000</span> </p>


            </div>
            </form>

          </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

          <button type="button" class="btn btn-primary">Confirm</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>

      </div>
    </div>
  </div>

  <!-- RESCHED -->

  <!-- The Modal -->
  <div class="modal fade" id="Resched">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reschedule</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <label for="apptstart" style="padding-top: 10px;"><b>Appointment Start: </b></label><br>
          <input style="height: 35px; margin-left: 11px;" type="datetime-local" id="apptstart" name="apptstart">
          <br><br>


        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

          <button type="button" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>

      </div>
    </div>
  </div>




  <!-- End demo content -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="main.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
    <!----Data tables js -->
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  
<script>
    $(document).ready(function() {
      var ctx = $("#chart-line");
      var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Unconfirm", "Confirmed", "Checked-in", "In-chair", "Completed", "Cancelled"],
          datasets: [{
            data: [<?php echo showTotalDashboard($conn, "pending_appointments where status = 'Unconfirmed'"); ?>, <?php echo showTotalDashboard($conn, "appointments where status = 'Confirmed'"); ?>, <?php echo showTotalDashboard($conn, "appointments where status = 'Checked-In'"); ?>, <?php echo showTotalDashboard($conn, "appointments where status = 'In-Chair'"); ?>, <?php echo showTotalDashboard($conn, "appointments where status = 'Completed'"); ?>, <?php echo showTotalDashboard($conn, "appointments where status = 'Cancelled'"); ?>, 0],
            label: "Total",
            borderColor: "#458af7",
            backgroundColor: '#458af7',
            
          }, 
        ]
        },
        options: {
          title: {
            display: true,
            text: 'Total Patient based on Status'
          }
        }
      });
    });
  </script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
  <script>
    $(document).ready(function() {
      var ctx = $("#chart-pie");
      var myLineChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ["Doctors", "Appointment", "Patient"],
          datasets: [{
            data: [<?php echo showTotalDashboard($conn, "user_accounts where user_type = 'Doctor'"); ?>, <?php echo showTotalDashboard($conn, "appointments"); ?>, <?php echo showTotalDashboard($conn, "patient_record"); ?>],
            backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)"]
          }]
        },
        options: {
          title: {
            display: true,
            text: 'Stats'
          }
        }
      });
    });
  </script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();

} );
</script>

</body>


</html>