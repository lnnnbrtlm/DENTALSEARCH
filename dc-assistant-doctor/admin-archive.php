<?php

include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
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
      <h1 style="color: white;"><i class="fas fa-calendar mr-3"></i>Archive</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">

        <li class="nav-item">
          <a class="nav-link active" href="admin-archive.php">Clinic Archive List</a>
        </li>



      </ul><br>
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


      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
 
  <!------MODAL DELETE -->
<div class="modal fade" id="myModaldeleteClinic" role="dialog">
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
          <label class="col-md-4 control-label" for="deleteClinic">Clinic Name</label>  
          <div class="col-md-5">
          <input id="deleteClinic" name="deleteClinic" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>  
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="deleteClinicsubmit" class="btn btn-danger btn-block" value="Permanently Delete"></input>
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
<div class="modal fade" id="myModalClinicRestore" role="dialog">
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
          <label class="col-md-4 control-label" for="restoreClinic">Clinic Name</label>  
          <div class="col-md-5">
          <input id="restoreClinic" name="restoreClinic" type="text" placeholder="" class="form-control input-md" required readonly>
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
  
  
   <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                  <th>Clinic Name</th>
                  <th>Clinic Address</th>
                  <th>Clinic Email</th>
                  <th>Clinic Contact No.</th>
                  <th>Status</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php
             showClinicTableInactive($conn);
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
//====================DELETE ROOM=====================================
$('.opendeleteClinic').on('click',function(){
 $('#myModaldeleteClinic').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteClinic').val(data[0]);

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
$('.openrestoreClinic').on('click',function(){
 $('#myModalClinicRestore').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#restoreClinic').val(data[0]);

});
$('#Data').DataTable( {
       // dom: 'Bfrtip',
        buttons: [
           //  'print', 'pdf', 'excel'
        ]
    } );
//=========================================================
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