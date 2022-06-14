<?php
include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");


}
$clinic = $_SESSION['clinic'];
?>

<?php 
  $date = date('F d, Y');
  $date1 = date('Y-m-d');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Patient List | Patient</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="stylesheet-new.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!--data tables-->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  <!--data tables js-->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>

  <?php
  include "./navbar.php";
  include "include/connection.php";
  include "include/function.php";

  
        //====================DELETE SERVICES======================================
        if (isset($_POST['deletesubmit'])){
          $status = inactivePatient($conn,$_POST['deletePatient']);
          }
  ?>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->



    <div>
      <h1 style="color: white;"><i class="fas fa-user mr-3"></i>Patient</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
      
        <li class="nav-item">
          <a class="nav-link" href="assistant-patient_list.php">Patient List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" href="assistant-patient-dental.php">Patients' Dental Charts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="assistant-patient_xray.php">Patient X-ray</a>
        </li>
      </ul><br>
      <!-- MESSAGE  -->
      <?php
      if (isset($_SESSION['upPatientErr'])) {

        if ($_SESSION['upPatientErr'] == "upSuccess") {
          echo '
                            <div class="alert alert-primary alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Success!</strong> Patient Update.
                            </div>
                          ';
          $_SESSION['upPatientErr'] = "";
        }
        if ($_SESSION['upPatientErr'] == "archiveSuccess") {
          echo '
                            <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Success!</strong> Move to Archive.
                            </div>
                          ';
          $_SESSION['upPatientErr'] = "";
        }
        
        
      }
      ?>

      <br>

      <div class="table-responsive">
        <table class="table table-hover" id="example">
          <thead>
            <tr>
              <th>Ref. ID</th>
              <th>Patient ID</th>
              <th>Patient Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            showPatientWithDental($conn,$clinic);
            ?>
          </tbody>
        </table>
      </div>

      
<!------MODAL VIEW DENTALCHART -->

<div class="modal fade" id="myModalDental" role="dialog">
    <div class="modal-dialog">
 

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style=" font-size: 20px;">Patient:&nbsp;</span> <span style="font-weight: bold; font-size: 20px;" id="dpatientname"></span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="dental-chart-adult-new.php">
          <input type="hidden" name="pid" id="pid"/>
          <input type="hidden" name="gender" id="dgender"/>
          <input type="hidden" name="email" id="demail"/>
          <input type="hidden" name="drefno" id="drefno"/>
          <input type="hidden" name="name" id="ddpatientname"/>
          <input type="hidden" name="dental_type" id="dental_type"/>
       <input type="submit" id="submit" name="dchart" class="btn btn-success btn-block" value="View Dental Chart"></input>
        </form>
        </div>
        <div class="modal-footer">
      
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

      <!-- The Modal -->
      <div class="modal fade" id="Prescription">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[PT0001] Gerie Mae / Prescription List</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


              <div class="container">
                <h4>Prescription:</h4>

                <table class="table table-striped">

                  <thead>
                    <tr>

                      <th>Appointment ID</th>
                      <th>Prescribing Doctor</th>
                      <th>Prescription Time</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>PID0001</td>
                      <td>Urna</td>
                      <td>10:00 | 12/26/2021</td>
                      <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewPres"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ViewPres"><i class="fas fa-print" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                  </tbody>

                </table>
                <button type="button" class="btn btn-primary">Add</button>
              </div>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>

          </div>
        </div>
      </div>

    </div>

    
    <!-- End content -->

    <script>


      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>

<script src="showImg.js"></script>

<script type="text/javascript">
  $('.viewDentalPatient').on('click', function() {
 $('#myModalDental').modal();
    $tr1 = $(this).closest('tr');
        var data1 = $tr1.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data1);
        $.ajax({
              type: 'POST',
              url: 'include/showPatientDentalChart.inc.php',
              data: {
                'id': data1[0]
              },
              dataType: "json",
              success: function(response1) {
                console.log(response1);

                $('#dpatientname').html(response1[2]);
                $('#ddpatientname').val(response1[2]);
                $('#pid').val(response1[1]);
                $('#drefno').val(response1[0]);
                $('#demail').val(response1[3]);
                $('#dental_type').val(response1[4]);
                
              }
            });
            

  });
  </script>

</body>

</html>