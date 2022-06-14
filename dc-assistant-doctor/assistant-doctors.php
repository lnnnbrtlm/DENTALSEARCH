<?php
include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}
$email = $_SESSION['login_admin1'];
$sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) == 0 && mysqli_num_rows($result1) == 0) {

  header("location: assistant-index.php");
}
$clinic = $_SESSION['clinic'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Doctors | Data Management</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="stylesheet-new.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <!--data tables-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  <!--data tables js-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
   

  

  <style>

  </style>

</head>

<body>

  <?php

  include "./navbar.php";
  include "include/connection.php";
  include "include/function.php";
  
  //====================DELETE Doctor======================================
if (isset($_POST['deleteServicesubmit'])){
  $query1 = deleteService1($conn,$_POST['deleteService']);
  
  }
  
  ?>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->





    <div>
      <h1 style="color: white;"><i class="fas fa-user-md mr-3"></i>Doctors</h1>
   
    </div><br>




    <!------------------------------------   START OF APPOINTMENT CARDS CODE ----------------------------------->

    <div class="container pt-3 pb-3 ">
      <div class="card-deck">
        <div class="card bg-light text-dark">
          <div class="card-body text-center">
            <h4>Doctors</h4>
             <!-- MESSAGE  -->
      <?php
      if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "addSuccess") {
          echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Doctors Added.
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
                      <strong>Success!</strong> Doctors Edit.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
      }
      ?>
       <?php
      if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "delSuccess") {
          echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Doctors Delete.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
      }
      ?>
            <hr>
            <div>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddService">Add
          Doctor</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Edit">Edit</button>
</div>

 <!------MODAL DELETE -->
<div class="modal fade" id="myModaldeleteService" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style="font-weight: bold; font-size: 20px;">Delete</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="deleteService">Doctor Name</label>  
          <div class="col-md-5">
          <input id="deleteService" name="deleteService" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="deleteServicesubmit" class="btn btn-danger btn-block" value="Permanently Delete"></input>
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

  
            <div class="table-responsive">
              
              <table class="table table-hover" id="example">
                <thead>
                  <tr>
                  <th style="display;none:">Doctor ID</th>
                  <th>Image</th>
                  <th>Doctor Name</th>
                  <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                
                showMyDocSched($conn,$clinic); 
                  ?>
                </tbody>
              </table>
            </div>
          </div>
 <!-- The Modal -->
 <div class="modal fade" id="AddService">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <form action="include/addDoctor.inc.php" method="POST" enctype="multipart/form-data">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Doctor</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
         
          <br>
            <input type="hidden" name="clinic" value="<?php echo $clinic; ?>">
              <div class="form-group">
              <input type="file" class="form-control-file" onchange="displayImg(this)" id="profileImg" name="profileImg" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" >
                <label for="service">First Name</label>
                <input type="text" class="form-control" placeholder="First Name" name="doctorfname" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)">
              </div>
              <div class="form-group">
                <label for="price">Last Name</label>
                <input type="text" onkeypress='return restrictAlphabets(event)' class="form-control" placeholder="Last Name" name="doctorlname">
              </div>
      

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
     </div>
   
   </div>

 </div>
</div>
</div>

 <!-- The Modal -->
 <div class="modal fade" id="Edit">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Doctor</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

 <form action="include/updateDoctor.inc.php" method="POST"  enctype="multipart/form-data">
          <!-- Modal body -->
          <div class="modal-body">
         
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Doctor Name</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="up_doctorid">
                      <option selected disabled>Choose...</option>
                      <?php showDoctorDDD($conn, $clinic); ?>
              </select>
            </div>

            <input type="file" class="form-control-file" onchange="displayImg(this)" id="profileImg" name="updateprofileImg" >
            <br>
              <div class="form-group">
                <label for="service">Full </label>
                <input type="text" class="form-control" placeholder="Doctor Fullname" name="upfullname" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)">
              </div>
            
<div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
            </div>
    </form>
        </div>
      </div>
    </div>

  

   




  <!-- End demo content -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <!--data tables js-->
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
  <script src="main.js"></script>

<script type="text/javascript">
//====================DELETE ROOM=====================================
$('.opendeleteService').on('click',function(){
 $('#myModaldeleteService').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteService').val(data[0]);

});
$('#Data').DataTable( {
       // dom: 'Bfrtip',
        buttons: [
           //  'print', 'pdf', 'excel'
        ]
    } );
//=========================================================
  </script>


  <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();

} );
</script>
</body>

</html>