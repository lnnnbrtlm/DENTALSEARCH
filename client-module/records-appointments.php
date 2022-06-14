<?php
include('connection.php');
include('function.php');
include('session.php');
if (!isset($_SESSION['login_admin'])) {
  header("location: index.php");
}

if(isset($_POST['cancelAppoint'])){
  $id = $_POST['appointment_id'];
  $sql = "UPDATE appointments SET `status`='Cancelled' WHERE appointment_refno = '$id'";
  $result = mysqli_query($conn, $sql);

  if($result){
    header("location: records-appointments.php");
  }else{
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>APPOINTMENT | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">
  
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!--data -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
 <!-- data tables -->

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> 
  
</head>

<style>

</style>

<body class="bg-light">

  <!-- NAVIGATION -->

  <!-- This will appear when client is not logged in -->

  <?php include 'navbar (logged-in).php';
  ?>

  <!-- This will appear when client is logged in -->

  <?php // include 'navbar (not logged-in).php';
  ?>

  <!-- HERO -->




  <div class="container-fluid bg-light" style="padding-bottom:500px;">
    <div class="container py-5">
      
      <div class="card">
        <div class="card-body">

          <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Upcoming</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Completed</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Cancelled</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-transaction-tab" data-bs-toggle="pill" data-bs-target="#pills-transaction" type="button" role="tab" aria-controls="pills-transaction" aria-selected="false">Transaction History</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-dentalhistory-tab" data-bs-toggle="pill" data-bs-target="#pills-dentalhistory" type="button" role="tab" aria-controls="pills-transaction" aria-selected="false">Dental History</button>
            </li>
          </ul>


          <div class="tab-content" id="pills-tabContent">
          
          <div class="tab-pane fade show" id="pills-dentalhistory" role="tabpanel" aria-labelledby="pills-home-tab">
                       <div class="table-responsive">
                <table class="table table-bordered display" id="">
                  <thead>
                    <tr>
                    <th scope="col" style="display:none;">Id</th>
                      <th scope="col">Dental Clinic</th>
                      <th scope="col">Service</th>
                      <th scope="col">Tooth</th>
                      <th scope="col">Price</th>
                      <th scope="col">Notes</th>
                      <th scope="col">Date Completed</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php showDentalRecord($conn,$_SESSION['login_admin']); ?>

                  </tbody>
                </table>
              </div>
          </div>
          
          
          
          
          
          
          

            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="table-responsive">
                <table class="table table-bordered display" id="example">
                  <thead>
                    <tr>
                     <th scope="col" style="display:none;">Ref ID</th>
                      <th scope="col">Dental Clinic</th>
                      <th scope="col">Service</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  <!-- This function is for showing UPCOMING appointments only --------------->
                  <?php showAppointments($conn,$_SESSION['login_admin']); ?>
                   
                  </tbody>
                </table>
              </div>
            </div>

  <!-- Button trigger modal -->


            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="table-responsive">
                   <table class="table table-bordered display">
                  <thead>
                    <tr>
                     <th scope="col" style="display:none;">Ref ID</th>
                      <th scope="col">Dental Clinic</th>
                      <th scope="col">Service</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <!-- This function is for showing COMPLETED appointments only -------------------->
                    <?php showAppointmentsCompleted($conn, $_SESSION['login_admin']); ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <div class="table-responsive">
                <table class="table table-bordered display">
                  <thead>
                  <tr>
                    <th scope="col" style="display:none;">Ref ID</th>
                      <th scope="col">Dental Clinic</th>
                      <th scope="col">Service</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>

                    </tr>
                  </thead>
                    <!-- This function is for showing CANCELLED appointments only -------------------->
                    <?php showCancelledAppointments($conn,$_SESSION['login_admin']); ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            
            
            
            <div class="tab-pane fade" id="pills-transaction" role="tabpanel" aria-labelledby="pills-transaction">
            <div class="table-responsive">
                <table class="table table-bordered display">
                  <thead>
                  <tr>
                
                      <th scope="col">Clinic Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Balance</th>
                      <th scope="col">Amount Paid</th>
                      <th scope="col">Change</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                   <?php showPayment($conn,$_SESSION['login_admin']); ?>
              
                  </tbody>
                </table>             
          </div>
        </div>    
            </div>
          
      </div>

    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalCancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"style='border-radius: 10px;'>
      <div class="modal-header" style='background-color: #A52A2A;'>
        <h5 class="modal-title" id="exampleModalLabel" style='color: #fff;'>Appointment Cancellation</h5>
        
      </div>
      <div class="modal-body">
        <strong>Do you want to cancel this appointment?</strong>
        <form method="post">
        <input type="hidden" name="appointment_id" id="appointment_id"/>
      </div>
      <div class="modal-footer">
        <button type="submit" name="cancelAppoint" class="btn btn-danger">Yes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
</form>
      </div>
    </div>
  </div>
</div>


  <!-- FOOTER -->



 <?php include 'footer.php';
  ?>
<script type="text/javascript">
       $(document).ready(function() {
   $('#example').DataTable();
} );


  $('.cancellation').on('click', function() {
        $('#modalCancel').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $.ajax({
          type: 'POST',
          url: 'showPatientAppoint.php',
          data: {
            'id': data[0]
          },
          dataType: "json",
          success: function(response) {
            console.log(response);
            
            $('#appointment_id').val(response[0]);
          }
        });
      });

  </script>
</body>

</html>
