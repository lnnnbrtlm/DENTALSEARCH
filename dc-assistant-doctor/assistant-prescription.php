<?php
include 'include/connection.php';
include 'include/function.php';

include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}
$email = $_SESSION['login_admin1'];
$sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
$result = mysqli_query($conn,$sql);
$sql1 = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)==0 && mysqli_num_rows($result1)==0){

header("location: assistant-index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Add Prescription | Prescription</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<?php include "./navbar.php" ?>


  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
        class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->

    <div>
      <h1 style="color: white;"><i class="fas fa-prescription mr-3"></i>Prescription</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" href="assistant-prescription.php">Add Prescription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assistant-prescription_list.php">Prescription List</a>
        </li>

        


      </ul><br>

    

      <h4>Add Prescription</h4>
       <!-- MESSAGE  -->
       <?php 
      if (isset($_SESSION['patientErr'])) {

               if ($_SESSION['patientErr'] == "addSuccess") {
                  echo '
                    <div class="alert alert-primary alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Prescription Added.
                    </div>
                  ';
                  $_SESSION['patientErr'] = "";
                }

      }
      ?>
      <hr>
      <div class=row>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

        <div class=col>
        <form action="include/addPrescription.inc.php" method="POST">
            <p><b>Information:</b></p>

            <div class="input-group mt-3 mb-3">
               <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Patient</label>
              </div>
              <select class="selectpicker" data-live-search="true" id="inputGroupSelect01" name="patient_name">
                      <option  selected disabled>Select Patient..</option>
                      <?php showPatientPL($conn); ?>
              </select>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Doctor</label>
              </div>
              <select class="selectpicker" data-live-search="true" id="inputGroupSelect01" name="doctor_name">
                      <option selected disabled>Select Doctor</option>
                      <?php showDoctorDD($conn); ?>
              </select>
            </div>

            

        </div>

        <div class="col">

          <div class="row" style="padding-left: 15px;">
            <div class="form-group">
              <label for="comment"><b>Note:</b></label>
              <textarea style="width: 400px;" class="form-control" name="note" rows="5" id="note"></textarea>
            </div>
          </div>
        </div>
      </div>
</div>

      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Medicine</th>
              <th>Dosage</th>
              <th>Dose</th>
         
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><select name="meds" id="meds" style="width: 150px; height: 30px;">
                  <option value="select"></option>
                  <?php showMedicineDD($conn); ?>
                </select></td>
                <td><select name="dosage" id="frequency" style="width: 100px; height: 30px;">
                  <option value="select"></option>
                  <option value="1mg">1</option>
                  <option value="2mg">2</option>
                  <option value="3mg">3</option>
                </select></td>
                <td><input type="text" onkeypress='return restrictAlphabets(event)' name="frequency" placeholder="0" style="width: 100px;" onKeyDown="limitText(this,3);" 
onKeyUp="limitText(this,3)"></td>


             

            </tr>

          </tbody>
        </table>

       

      <br>


    <!--  END CONTENT -->

    <div style="float:right;"><button type="submit" class="btn btn-success">Save</button></div></div>
</form>

  </div>
   

</div>
</div>
</div>


  <!-- End demo content -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="main.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.min.js"></script>
<script src="script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2.min.js"></script>
<script src="https://oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

  <script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>


  <script type="text/javascript">
   /*code: 48-57 Numbers*/
   function restrictAlphabets(e){
       var x = e.which || e.keycode;
   	if((x>=48 && x<=57))
   		return true;
   	else
   		return false;
   }
</script>

</body>

</html>
<script>
  $('select').selectpicker();
</script>