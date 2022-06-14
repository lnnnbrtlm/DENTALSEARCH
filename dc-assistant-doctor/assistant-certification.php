<?php
include('session.php');
include 'include/connection.php';
include 'include/function.php';
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

$date = date('F d, Y');
$date1 = date('Y-m-d');
if(isset($_POST['save'])){
  $name = $_POST['patient_name'];
  $doctor = $_POST['doctor_name'];
  $service = $_POST['service_name'];
  $remarks = $_POST['remarks'];
  $restday = $_POST['restday'];
  $time_n_date = $_POST['time_n_date'];
  $msg = "";
  $css_class= "alert-success";

  $conn1 = mysqli_connect('localhost', 'root', '', 'db_dentalclinic');
  $mysql = mysqli_query($conn1,"INSERT INTO `certification` (`name`, `doctor`, `service`,`rest_day`, `time_n_date`, `remarks`) 
  VALUES('$name','$doctor','$service','$restday','$date1','$remarks')");
			if(!$mysql){
                echo mysqli_error($conn1);
    die();
            }else{
			$msg = "Saved Successfully";
			$css_class = "alert-success";
}
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Issue Certificate | Reports</title>
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
      <h1 style="color: white;"><i class="fas fa-certificate mr-3"></i>Certification</h1>
    </div><br>

    <div class="container pt-3 pb-5 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" href="assistant-certification.php">Issue Certificate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assistant-certification_list.php">Certificate List</a>
        </li>

      </ul><br>

      <h4>Issue Certificate</h4>
      <?php if(!empty($msg)): ?>
						<div class="alert <?php echo $css_class; ?>">
							<?php echo $msg;?>
						</div>
				<?php endif; ?>
      <hr>
      <div class=row>

        <div class=col>
          <form method="post" action="#">
            <p><b>Information:</b></p>
            
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


            <div class="input-group mt-3 mb-3">
              <div class="input-group-prepend">
                <button id="dropdown-patient" type="button"  disabled class="btn btn-outline-secondary dropdown-toggle"
                  data-toggle="dropdown">
                  Patient ID
                </button>
                <div class="dropdown-menu">
                </div>
              </div>
              <select class="selectpicker" data-live-search="true" id="inputGroupSelect01" name="patient_name">
                      <option selected disabled>Select Patient..</option>
                      <?php showPatientCC($conn); ?>
</select>
            </div>

            <div class="input-group mt-3 mb-3">
              <div class="input-group-prepend">
                <button id="dropdown-patient" type="button" disabled class="btn btn-outline-secondary dropdown-toggle"
                  data-toggle="dropdown">
                  Doctor
                </button>
                <div class="dropdown-menu">
                </div>
              </div>
              <select class="selectpicker" data-live-search="true" id="inputGroupSelect01" name="doctor_name">
                      <option selected disabled>Select Doctor</option>
                      <?php showDoctorDD($conn); ?>
              </select>
            </div>

            <label for="diagnosis"><b>Diagnosis:</b></label>
            <select class="selectpicker" data-live-search="true" id="inputGroupSelect01" name="service_name">
                      <option selected disabled>Select Services</option>
                      <?php showServiceDDD($conn); ?>
              </select>



        </div>

        <div class="col">
        <div class="row" style="padding-left: 15px;">
            <div class="form-group">
              <label for="comment"><b>Must rest for:</b></label>
              <input type="text" style="width: 500px;" class="form-control" rows="5" name="restday" id="restday"></input>
            </div>
          </div>
          <div class="row" style="padding-left: 15px;">
            <div class="form-group">
              <label for="comment"><b>Remarks:</b></label>
              <textarea style="width: 500px;" class="form-control" rows="5" name="remarks" id="comment"></textarea>
            </div>
          </div>

          <p><b>Certification Time & Date:</b><input type="text" style="border: none;" readonly name="time_n_date" value="&nbsp;<?php echo " ".$date;?>"></input></p>
        </div>

    
      </div>

      <br>

      <br>
      <div style="float: right;">
      <input type="submit" value="Save" name="save" class="btn btn-success"></input>
    </div>
   
    </div>
    </form>

    <!--  END CONTENT -->

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
</body>

</html>

<script>
  $('select').selectpicker();
</script>