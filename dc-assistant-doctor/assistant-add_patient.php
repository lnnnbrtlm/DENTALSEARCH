<?php

include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Add Patient | Patient</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <?php
  include "./navbar.php"
  ?>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->

    <div>
      <h1 style="color: white;"><i class="fas fa-user mr-3"></i>Patient</h1>
    </div><br>

    <div class="container pt-3 pb-5 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" href="assistant-add_patient.php">Add Patient</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="assistant-patient_list.php">Patient List</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="assistant-patient-dental.php">Patients' Dental Charts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="assistant-patient_xray.php">Patient X-ray</a>
        </li>

      </ul><br>

      <h4>Personal Information</h4>
      <!-- MESSAGE  -->
      <?php
      if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "addSuccess") {
          echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Patient Added.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
      }
      ?>

      <hr>
      <div class="container text-center">



      </div>
      <div class=row>

        <div class=col>

          <form action="include/addPatient.inc.php" method="POST" enctype="multipart/form-data">


            <label for="firstName"><b>First Name:</b></label>
            <input type="text"   class="form-control" placeholder="First Name" name="firstname" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" required>

            <label for="lastName" style="padding-top: 10px;"><b>Last Name:</b></label>
            <input type="text"  class="form-control" placeholder="Last Name" name="lastname" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"required>

            <label for="middleName" style="padding-top: 10px;"><b>Middle Name:</b></label>
            <input type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" placeholder="Middle Initial" name="middlename" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" required>

            <label for="age" style="padding-top: 10px; float: right;"><b>Age:</b></label>

            <label for="birthdate" style="padding-top: 10px;"><b>Birthdate:</b></label><br>
            <input style="height: 35px;" type="date" id="dob" name="birthdate">
            <input style="width: 100px; float: right;" type="number" class="form-control" id="age" placeholder="Age" name="age" readonly required>

        </div>

        <div class="col">
          <label for="contactNO"><b>Contact Number:</b></label>
          <input type="number" class="form-control" placeholder="Contact No." name="contactno" onKeyDown="limitText(this,13);" 
onKeyUp="limitText(this,13)" required>

          <label for="email" style="padding-top: 10px;"><b>Email:</b></label>

          <input type="email" class="form-control" placeholder="Email" name="email" onKeyDown="limitText(this,60);" 
onKeyUp="limitText(this,60)" required>


          <label for="pg" style="padding-top: 10px;"><b>Parent/Guardian:</b></label>
          <input type="text"  class="form-control" placeholder="Parent/Guardian" name="pg" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" required>

          <label for="gender" style="padding-top: 10px;"><b>Gender:</b></label>
          <select style="width: 100px;" name="gender" class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>

        </div>


      </div>
      <label for="contactNO"><b>Default Password:</b></label>
          <input type="text" class="form-control" value="Abc_1234"; placeholder="" name="pass" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" readonly required>
      <label style="padding-top: 10px;" for="address"><b>Address:</b></label>
      <input type="text" class="form-control" placeholder="Address" name="address" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" required>
      <hr>

      <?php include "./questions.php" ?>

      <div style="float: right;"><button type="button" class="btn btn-warning">Clear</button> <button type="submit" name="save_radio" class="btn btn-success">Save</button></div>
    </div>
  </div>
  <!--  END CONTENT -->
  </form>
  </div>
  <!-- End demo content -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="main.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $("#dob").change(function() {
        var dob = $(this).val();
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#age').val(age);
      });


    })
  </script>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>

</body>

</html>