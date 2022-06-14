<?php

include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}
$clinic = $_SESSION['clinic'];
if(isset($_GET['clinic_id'])){
$clinicid = $_GET['clinic_id'];
  $sql = "UPDATE clinic_tbl SET `verify_status`=1 WHERE clinic_id='$clinicid'";
  $result = mysqli_query($conn,$sql);
}

if(isset($_GET['clinic_id'])){
$clinicid = $_GET['clinic_id'];
$sql = "UPDATE clinic_tbl SET `verify_status`=1 WHERE clinic_id='$clinicid'";
mysqli_query($conn,$sql);
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Clinic List | Dental Track</title>
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
#myImg {

border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}


#myImg2 {

border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}

#myImg2:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
/*overflow: auto;*/ /* Enable scroll if needed */
overflow-y: scroll !important;
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.9); /* Black w/ opacity */

}

/* Modal Content (image) */
.modal-content {
margin: auto;
display: block;
width: 80%;
max-width: 700px;

overflow:auto;
}

/* Caption of Modal Image */
#caption {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
text-align: center;
color: #ccc;
padding: 10px 0;
height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
-webkit-animation-name: zoom;
-webkit-animation-duration: 0.6s;
animation-name: zoom;
animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
from {-webkit-transform:scale(0)} 
to {-webkit-transform:scale(1)}
}

@keyframes zoom {
from {transform:scale(0)} 
to {transform:scale(1)}
}

/* The Close Button */
.close {
position: absolute;
top: 15px;
right: 35px;
color: #f1f1f1;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
}

.close:hover,
.close:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
  width: 100%;
}
}
</style>
  

</head>

<body>

  <?php
  include "./navbar.php";
  include 'include/connection.php';
  include 'include/function.php';
  include 'sendemail.php';
  
  //====================DELETE CLINIC======================================
        if (isset($_POST['deletesubmit'])){
          $status = inactiveClinic($conn,$_POST['deleteClinic']);
          
          }
          if (isset($_POST['restoresubmit'])){
            $status = restoreService($conn,$_POST['restoreClinic']);
            $status1 = restoreServiceNotif($conn,$_POST['restoreClinic']);
           
            }
            if (isset($_POST['denysubmit'])){
              $status = denyClinic($conn,$_POST['denyClinic']);
              
              }
  
?>


  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->

    <div>
      <h1 style="color: white;"><i class="fas fa-calendar mr-3"></i>Dental Clinic List</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">

        <li class="nav-item">
          <a class="nav-link active" href="admin-clinic.php">Clinic List</a>
        </li>
      </ul><br>

 <!-- MESSAGE  -->
      <?php 
      if (isset($_SESSION['serviceErr'])) {
                if ($_SESSION['serviceErr'] == "archiveSuccess") {
                  echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Clinic Succesfully Moved to Archie.
                    </div>
                  ';
                  $_SESSION['serviceErr'] = "";
                }
              }
      ?>
      <!-- MESSAGE  -->
      <?php
      if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "addSuccess") {
          echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Succesfully.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
        if ($_SESSION['patientErr'] == "delSuccess") {
          echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Denied Request.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
      }
      ?>
      
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                  <th style="display: none;">Clinic ID</th>
                  <th>Clinic Name</th>
                  <th>Clinic Address</th>
                  <th>Clinic Email</th>
                  <th>Contact No.</th>
                  <th>Permit Photo</th>
                  <th>Status</th>
                 <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                showAllDental($conn);
                ?>
              </tbody>
            </table>
          </div>
        </div>
        </div>
        <!-- Image modal -->


  <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img id="modal-img" class="modal-content" >
    
  
  <div id="caption"></div>
</div>


                <!------MODAL VERIFY -->


<div class="modal fade" id="myModalVerify" role="dialog">
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
          <label class="col-md-4 control-label" for="restoreClinic">Clinic Name</label>  
          
          <input id="restoreClinic1" name="restoreClinic1" type="text" placeholder="" class="form-control input-md" required readonly>
          <div class="col-md-5">
          <input style="display: none;" id="restoreClinic" name="restoreClinic" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>


        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="restoresubmit" name="restoresubmit" class="btn btn-success btn-block" value="Set as Verified"></input>
          </div>
        </div>
            </form> 
            <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="form-group">
          <div class="col-md-12">
          <input style="display: none;" id="denyClinic" name="denyClinic" type="text" placeholder="" class="form-control input-md" required readonly>
         <input type="submit" id="denysubmit" name="denysubmit" class="btn btn-danger btn-block" value="Deny Request"></input>
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
          <label class="col-md-4 control-label" for="deleteClinic">Clinic Name</label>  
          <div class="col-md-5">
          <input id="deleteClinic" name="deleteClinic" type="text" placeholder="" class="form-control input-md" required readonly>
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
$('.opendeletemodal').on('click',function(){
 $('#myModaldelete').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteClinic').val(data[0]);

});

//====================VERIFICATION=====================================
$('.openVerificationmodal').on('click',function(){
 $('#myModalVerify').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#denyClinic').val(data[0]);
$('#restoreClinic1').val(data[1]);
$('#restoreClinic').val(data[0]);

});
//=========================================================

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
<script>
   // Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = document.getElementById("myImg");
var modalImg = document.getElementById("modal-img");
var captionText = document.getElementById("caption");
// img.onclick = function(){
//   modal.style.display = "block";
//   modalImg.src = this.src;
//   captionText.innerHTML = this.alt;
// }


document.addEventListener("click", (e) => {
  const elem = e.target;
  if (elem.id==="myImg") {
    modal.style.display = "block";
    modalImg.src = elem.dataset.biggerSrc || elem.src;
    captionText.innerHTML = elem.alt; 
  }
})

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
    </script>
</body>

</html>

