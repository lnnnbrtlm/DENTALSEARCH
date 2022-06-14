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
          <a class="nav-link  active" href="assistant-patient_list.php">Patient List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assistant-patient-dental.php">Patients' Dental Charts</a>
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
              <th>Patient Id</th>
              <th>Patient Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            showPatient($conn,$_SESSION['clinic']);
            ?>
          </tbody>
        </table>
      </div>

      <!-- MODAL XRAY -->
      <div class="modal fade" id="xray" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">[<span id="PatientID"></span>] <span id="PatientFULLname"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
            <form action="include/addXray.inc.php" method="POST" enctype="multipart/form-data">
            <div class="container text-center py-5">
            
            
              <div class="form-group">  
                <input type="file" class="form-control-file" onchange="displayImg(this)" id="profileImg" name="profileImg" required>
              </div>
    </div>
              <div class="form-group">
                <input type="hidden" value="<?php echo $clinic; ?>" name="clinic_id3">
              <p><b>Date:</b><input type="text" style="border: none;" readonly name="time_n_date" value="&nbsp;<?php echo " ".$date;?>"></input></p>
                
              </div>

              <input type="text" class="form-control" placeholder="ID" id="upPatientID" name="patient_id" hidden  >
              <input type="text" class="form-control" name="clinic_id" value="<?php echo $clinic; ?>" hidden  >
              <input type="text" class="form-control" placeholder="ID" id="xemail" name="xemail" hidden  >
              <input type="text" class="form-control" placeholder=" " id="upPatientFULLname" name="patient_name" hidden >
                    

              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
    </form>
        </div>
      </div>
      <!-- MODAL XRAY END -->


      <!-- The Modal -->
      <div class="modal fade" id="ViewPatient">
        <div class="modal-dialog modal-xl modal-dialog-centered" data-backdrop="static">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[<span id="showPatientID"></span>] <span id="showPatientFULLname"></span></h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


              <h4>Personal Information</h4>


              <hr>
              <div class="row">

                <div class="col">
                  <form action="include/updatePatient.inc.php" method="POST">
                    <input type="hidden" name="updatePatientID" id="updatePatientID">
                    <label for="firstName"><b>First Name:</b></label>
                    <input type="text" class="form-control" placeholder="First Name" id="showPatientFname" name="updatePatientFname" disabled>

                    <label for="lastName" style="padding-top: 10px;"><b>Last Name:</b></label>
                    <input type="text" class="form-control" placeholder="Last Name" id="showPatientLname" name="updatePatientLname" disabled>

                    <label for="middleName" style="padding-top: 10px;"><b>Middle Initial:</b></label>
                    <input type="text" class="form-control" placeholder="Middle Initial" id="showPatientMname" name="updatePatientMname" disabled>

                    <label for="age" style="padding-top: 10px; float: right;"><b>Age:</b></label>

                    <label for="birthdaytime" style="padding-top: 10px;"><b>Birthdate:</b></label><br>
                    <input style="height: 35px;" type="date" id="showPatientBdate" name="updatePatientBdate" disabled>
                    <input style="width: 100px; float: right;" type="number" class="form-control" id="showPatientAge" name="updatePatientAge" placeholder="Age" disabled readonly>
                    
                </div>

                <div class="col">
                  <label for="contactNO"><b>Contact Number:</b></label>
                  <input type="number" class="form-control" placeholder="Contact No." id="showPatientContactNo" name="updatePatientContactNo" disabled>

                  <label for="Email" style="padding-top: 10px;"><b>Email:</b></label>
                  <input type="email" class="form-control" placeholder="Email" id="showPatientEmail" name="updatePatientEmail" disabled>

                  <label for="pg" style="padding-top: 10px;"><b>Parent/Guardian:</b></label>
                  <input type="text" class="form-control" placeholder="Parent/Guardian" id="showPatientPG" name="updatePatientPG" disabled>

                  <label for="gender" style="padding-top: 10px;"><b>Gender:</b></label>
                  <select style="width: 100px;" id="showPatientGender" name="updatePatientGender" class="form-control" disabled>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>

                </div>


              </div>

              <label style="padding-top: 10px;" for="address"><b>Address:</b></label>
              <input type="text" class="form-control" placeholder="Address" id="showPatientAddress" name="updatePatientAddress" disabled>
              <hr>

            </div>




            <!-- Modal footer -->
            <div class="modal-footer">

              <button onclick="enable()" type="button" class="btn btn-warning">Edit</button>

              <button type="submit" class="btn btn-success">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
          </div>
        </div>
      </div>

    
<!------MODAL DELETE -->

<div class="modal fade" id="myModaldelete" role="dialog">
    <div class="modal-dialog">
 

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style="font-weight: bold; font-size: 20px;">Move to Archive</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>

        <!-- Form Name -->
      
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="deletePatient">Patient Name</label>  
          <div class="col-md-5">
          <input id="deletePatient" name="deletePatient" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>


        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="deletesubmit" class="btn btn-danger btn-block" value="Move to Archive"></input>
          </div>
        </div>
        </fieldset>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
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
      function enable() {
        document.getElementById("showPatientFname").disabled = "";
        document.getElementById("showPatientLname").disabled = "";
        document.getElementById("showPatientMname").disabled = "";
        document.getElementById("showPatientAge").disabled = "";
        document.getElementById("showPatientContactNo").disabled = "";
        document.getElementById("showPatientEmail").disabled = "";
        document.getElementById("showPatientPG").disabled = "";
        document.getElementById("showPatientAddress").disabled = "";
        document.getElementById("showPatientGender").disabled = "";
        document.getElementById("showPatientBdate").disabled = "";

      }

      //=================SHOW BLVD========================


      //=================SHOW BLVD========================

      $('.viewxray').on('click', function() {
        $('#xray').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $.ajax({
          type: 'POST',
          url: 'include/showProfilePatient.inc.php',
          data: {
            'patient_id': data[0]
          },
          dataType: "json",
          success: function(response) {
            $('#upPatientID').val(response[0]);
            $('#PatientID').html(response[0]);
            $('#upPatientFULLname').val(response[1]+' '+response[2]);
            $('#PatientFULLname').html(response[1]+' '+response[2]);

          }
        });

      });


      $(document).ready(function() {

        $("#showPatientBdate").change(function() {
          var dob = $(this).val();
          dob = new Date(dob);
          var today = new Date();
          var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
          $('#showPatientAge').val(age);
        });


      })
    </script>

    <script type="text/javascript">
//====================DELETE ROOM=====================================
$('.opendeletemodal').on('click',function(){
 $('#myModaldelete').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deletePatient').val(data[0]);

});
$('#Data').DataTable( {
       // dom: 'Bfrtip',
        buttons: [
           //  'print', 'pdf', 'excel'
        ]
    } );
//=========================================================


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
                $('#pid').val(response1[0]);
                $('#drefno').val(response1[1]);
                $('#demail').val(response1[3]);
                
              }
            });
            
            
/*
    var win = window.open('http://dental-chart-adult-new.php', '_blank');
if (win) {

    //Browser has allowed it to be opened
    win.focus();
} else {
    //Browser has blocked it
    alert('Please allow popups for this website');
}

      */  
  });
  </script>

</body>

</html>