<?php
include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}
$email = $_SESSION['login_admin1'];
$sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) == 0 && mysqli_num_rows($result1) == 0) {

  header("location: assistant-index.php");
}
$clinic = $_SESSION['clinic'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Archive | </title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  

  <style>

  </style>

</head>

<body>

  <?php

  include "./navbar.php";
  include "include/connection.php";
  include "include/function.php";

//====================DELETE SERVICES======================================
if (isset($_POST['deletesubmit'])){
  $query1 = deletePatient1($conn,$_POST['deletePatient']);
  
  }
  //====================DELETE MEDICINE======================================
if (isset($_POST['deletemedsubmit'])){
  $query1 = deleteMedicine1($conn,$_POST['deleteMed']);
  
  }
    //====================DELETE Equipmeny======================================
if (isset($_POST['deleteEquipsubmit'])){
  $query1 = deleteMedicine2($conn,$_POST['deleteEquip']);
  
  }
     //====================DELETE Service======================================
if (isset($_POST['deleteServicesubmit'])){
  $query1 = deleteService1($conn,$_POST['deleteService']);
  
  }
     //====================DELETE ADMIN=====================================
if (isset($_POST['deleteAdminsubmit'])){
  $query1 = deleteAdmin1($conn,$_POST['deleteAdmin']);
  
  }
      //====================DELETE ADMIN=====================================
if (isset($_POST['deleteDoctorsubmit'])){
  $query1 = deleteDoctor1($conn,$_POST['deleteDoctor']);
  
  }
       //====================DELETE ASSISTANT=====================================
if (isset($_POST['deleteAssistantsubmit'])){
  $query1 = deleteAssistant1($conn,$_POST['deleteAssistant']);
  
  }
       //====================DELETE BRANCH=====================================
if (isset($_POST['deleteBranchsubmit'])){
  $query1 = deleteBranch1($conn,$_POST['deleteBranch']);
  
  }
  //====================RESTORE PATIENT======================================
if (isset($_POST['restoresubmit'])){
  $status = restorePatient($conn,$_POST['restorePatient']);
  
  }
  //====================RESTORE MEDICINE======================================
if (isset($_POST['medsubmit'])){
  $status = restoreMedicine($conn,$_POST['restoreMed']);
  
  }
    //====================RESTORE MEDICINE EQUIPMENT======================================
if (isset($_POST['equipsubmit'])){
  $status = restoreEquipment($conn,$_POST['restoreEquip']);
  
  }
   //====================RESTORE  SERVICE======================================
if (isset($_POST['servicesubmit'])){
  $status = restoreService($conn,$_POST['restoreService']);
  }
     //====================RESTORE ADMIN======================================
if (isset($_POST['adminsubmit'])){
  $status = restoreAdmin($conn,$_POST['restoreAdmin']);
  }
     //====================RESTORE DOCTOR======================================
if (isset($_POST['docsubmit'])){
  $status = restoreDoctor($conn,$_POST['restoreDoctor']);
  }
    //====================RESTORE ASSISTANT======================================
if (isset($_POST['asssubmit'])){
  $status = restoreAssistant1($conn,$_POST['restoreAssistant']);
  }
     //====================RESTORE BRANCH======================================
if (isset($_POST['branchsubmit'])){
  $status = restoreBranch1($conn,$_POST['restoreBranch']);
  }




?>

  ?>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->





    <div>
      <h1 style="color: white;"><i class="fas fa-user-md mr-3"></i>Archive</h1>
    </div><br>


    <div class="container pt-3 pb-3 ">
      <div class="card-deck">
        <div class="card bg-light text-dark">
          <div class="card-body text-center">

          
            <h4>Archive List</h4><br>
             <!-- Nav tabs -->
      <ul class="nav nav-tabs" id="myTab">
 
      
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu2">Services</a>
        </li>
        
   
      </ul>
        <!-- Tab panes -->
        <div class="tab-content">
        <!-- Patient List -->
        <!-- MESSAGE  -->
      <?php
      if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "addSuccess") {
          echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Succesfully Restore.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
        if ($_SESSION['patientErr'] == "delSuccess") {
          echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Deleted.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
      }
      ?>

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
          <label class="col-md-4 control-label" for="deleteService">Service ID</label>  
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
               <!------MODAL RESTORE -->
<div class="modal fade" id="myModalService" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style="font-weight: bold; font-size: 20px;">Restore</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="restoreService">Service ID</label>  
          <div class="col-md-5">
          <input id="restoreService" name="restoreService" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="servicesubmit" class="btn btn-success btn-block" value="Restore Data"></input>
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
  <!---- END OF MODAL -->
        <div class="tab-pane container fade" id="menu2">
          <br>
          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th>Service Image</th>
              <th>Service</th>
              <th>Description</th>
              <th>Price</th>
              <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
            showServiceTableInactive($conn,$clinic);
            ?>  
              </tbody>
            </table>
          </div>
        </div>
                   <!------MODAL DELETE -->
<div class="modal fade" id="myModaldeleteAdmin" role="dialog">
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
          <label class="col-md-4 control-label" for="deleteAdmin">User ID</label>  
          <div class="col-md-5">
          <input id="deleteAdmin" name="deleteAdmin" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="deleteAdminsubmit" class="btn btn-danger btn-block" value="Permanently Delete"></input>
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
  <!---- END OF MODAL -->
                       <!------MODAL RESTORE -->
<div class="modal fade" id="myModalAdmin" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style="font-weight: bold; font-size: 20px;">Restore</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="restoreAdmin">Admin ID</label>  
          <div class="col-md-5">
          <input id="restoreAdmin" name="restoreAdmin" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="adminsubmit" class="btn btn-success btn-block" value="Restore Data"></input>
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
  <!---- END OF MODAL -->

        <div class="tab-pane container fade" id="menu3">
          <br>
          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th>Profile Picture</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>User Type</th>
              <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
            showUserInactive($conn);
            ?>  
              </tbody>
            </table>
          </div>
        </div>
                        <!------MODAL DELETE -->
<div class="modal fade" id="myModaldeleteDoctor" role="dialog">
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
          <label class="col-md-4 control-label" for="deleteDoctor">Doctor ID</label>  
          <div class="col-md-5">
          <input id="deleteDoctor" name="deleteDoctor" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="deleteDoctorsubmit" class="btn btn-danger btn-block" value="Permanently Delete"></input>
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
  <!---- END OF MODAL -->
             <!------MODAL RESTORE -->
<div class="modal fade" id="myModalDoc" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style="font-weight: bold; font-size: 20px;">Restore</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="restoreDoctor">Doctor ID</label>  
          <div class="col-md-5">
          <input id="restoreDoctor" name="restoreDoctor" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="docsubmit" class="btn btn-success btn-block" value="Restore Data"></input>
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
  <!---- END OF MODAL -->
        <div class="tab-pane container fade" id="menu4">
          <br>
          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th>Profile Picture</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>User Type</th>
              <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
            showUserInactiveDoc($conn);
            ?>  
              </tbody>
            </table>
          </div>
        </div>
                               <!------MODAL DELETE -->
<div class="modal fade" id="myModaldeleteAssistant" role="dialog">
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
          <label class="col-md-4 control-label" for="deleteAssistant">Assistant ID</label>  
          <div class="col-md-5">
          <input id="deleteAssistant" name="deleteAssistant" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="deleteAssistantsubmit" class="btn btn-danger btn-block" value="Permanently Delete"></input>
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
  <!---- END OF MODAL -->
                    <!------MODAL RESTORE -->
<div class="modal fade" id="myModalAss" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style="font-weight: bold; font-size: 20px;">Restore</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="restoreAssistant">Assistant ID</label>  
          <div class="col-md-5">
          <input id="restoreAssistant" name="restoreAssistant" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="asssubmit" class="btn btn-success btn-block" value="Restore Data"></input>
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
  <!---- END OF MODAL -->
        <div class="tab-pane container fade" id="menu5">
          <br>
          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th>Profile Picture</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>User Type</th>
              <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
            showUserInactiveAss($conn);
            ?>  
              </tbody>
            </table>
          </div>
        </div>
                                       <!------MODAL DELETE -->
<div class="modal fade" id="myModaldeleteBranch" role="dialog">
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
          <label class="col-md-4 control-label" for="deleteBranch">Branch ID</label>  
          <div class="col-md-5">
          <input id="deleteBranch" name="deleteBranch" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="deleteBranchsubmit" class="btn btn-danger btn-block" value="Permanently Delete"></input>
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
  <!---- END OF MODAL -->
         <!------MODAL RESTORE -->
<div class="modal fade" id="myModalBranch" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style="font-weight: bold; font-size: 20px;">Restore</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="restoreBranch">Branch ID</label>  
          <div class="col-md-5">
          <input id="restoreBranch" name="restoreBranch" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="branchsubmit" class="btn btn-success btn-block" value="Restore Data"></input>
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
  <!---- END OF MODAL -->
        <div class="tab-pane container fade" id="menu6">
          <br>
          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                <th>Branch Name</th>
              <th>Branch Address</th>
              <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
              showBranchTableInactive($conn);
              ?>
              </tbody>
            </table>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
   

  <!-- End demo content -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="main.js"></script>
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
  </script>

<script type="text/javascript">
//====================DELETE ROOM=====================================
$('.opendeleteMed').on('click',function(){
 $('#myModaldeleteMed').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteMed').val(data[0]);

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
//====================DELETE ROOM=====================================
$('.opendeleteEquip').on('click',function(){
 $('#myModaldeleteEquip').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteEquip').val(data[0]);

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
//====================DELETE ROOM=====================================
$('.opendeleteAdmin').on('click',function(){
 $('#myModaldeleteAdmin').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteAdmin').val(data[0]);

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
//====================DELETE ROOM=====================================
$('.opendeleteDoctor').on('click',function(){
 $('#myModaldeleteDoctor').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteDoctor').val(data[0]);

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
//====================DELETE ROOM=====================================
$('.opendeleteAssistant').on('click',function(){
 $('#myModaldeleteAssistant').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteAssistant').val(data[0]);

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
//====================DELETE ROOM=====================================
$('.opendeleteBranch').on('click',function(){
 $('#myModaldeleteBranch').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteBranch').val(data[0]);

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
//====================RESTORE ROOM=====================================
$('.openRestoremodal').on('click',function(){
 $('#myModalRestore').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restorePatient').val(data[0]);

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
//====================RESTORE MED====================================
$('.openrestoreMed').on('click',function(){
 $('#myModalMed').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restoreMed').val(data[0]);

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
//====================RESTORE EQUIP====================================
$('.openrestoreEquip').on('click',function(){
 $('#myModalEquip').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restoreEquip').val(data[0]);

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
//====================RESTORE EQUIP====================================
$('.openrestoreService').on('click',function(){
 $('#myModalService').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restoreService').val(data[0]);

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
//====================RESTORE EQUIP====================================
$('.openrestoreAdmin').on('click',function(){
 $('#myModalAdmin').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restoreAdmin').val(data[0]);

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
//====================RESTORE EQUIP====================================
$('.openrestoreDoctor').on('click',function(){
 $('#myModalDoc').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restoreDoctor').val(data[0]);

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
//====================RESTORE EQUIP====================================
$('.openrestoreAssistant').on('click',function(){
 $('#myModalAss').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restoreAssistant').val(data[0]);

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
//====================RESTORE EQUIP====================================
$('.openrestoreBranch').on('click',function(){
 $('#myModalBranch').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restoreBranch').val(data[0]);

});
$('#Data').DataTable( {
       // dom: 'Bfrtip',
        buttons: [
           //  'print', 'pdf', 'excel'
        ]
    } );
//=========================================================
</script>






</body>
</html>