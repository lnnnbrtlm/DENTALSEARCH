<?php
include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}
$user_id = $_SESSION['user_id'];
$clinic_id1 = $_SESSION['clinic'];
if (isset($_POST['imgSubmit'])) {
  $clinicChoice = $_POST['clinicChoice'];
  $allowedExts4 = array("pdf");
  $temp4 = explode(".", $_FILES["logo"]["name"]);
  $extension4 = end($temp4);
  $profile_img = $_FILES["logo"]["name"];
  move_uploaded_file($_FILES["logo"]["tmp_name"], "img/" . $_FILES["logo"]["name"]);

  $sqlUpdate = "UPDATE clinic_tbl SET `logo`='$profile_img'  WHERE `clinic_id` ='" . $clinicChoice . "'";
  $result = mysqli_query($conn, $sqlUpdate);
  if ($result) {
  
  $_SESSION['patientErr'] = "addSuccess";
	header("Location: assistant-clinic-management.php");
	exit();
  
  } else {
    echo 'Image upload failed.';
  }
}

if (isset($_POST['imgSubmitphoto'])) {
  $clinicChoice = $_POST['clinicChoice'];
  $allowedExts7 = array("pdf");
  $temp7 = explode(".", $_FILES["image3"]["name"]);
  $extension7 = end($temp7);
  $profile_img3 = $_FILES["image3"]["name"];
  move_uploaded_file($_FILES["image3"]["tmp_name"], "img/" . $_FILES["image3"]["name"]);

  $sqlUpdate = "UPDATE clinic_tbl SET `clinic_photo3`='$profile_img3'  WHERE `clinic_id` ='" . $clinicChoice . "'";
  $result3 = mysqli_query($conn, $sqlUpdate);
  if ($result3) {
  
  $_SESSION['patientErr'] = "addSuccess";
	header("Location: assistant-clinic-management.php");
	exit();
  
  } else {
    echo 'Image upload failed.';
  }
}

$scheduledDays = "SELECT * FROM `days` WHERE clinic_id=".$clinic_id1."";
$resultDays = mysqli_query($conn, $scheduledDays);
$rowDays2 = array();
while($rowDays3 = mysqli_fetch_assoc($resultDays)){
array_push($rowDays2,$rowDays3['dayname']);
}
$dayList = implode(', ',$rowDays2);

if(empty($dayList)){
  $dayList = 'HAHAHAHA';
}

$clinicServices1 = "SELECT * FROM `services` WHERE clinic_id=".$clinic_id1."";
$resultServices = mysqli_query($conn, $clinicServices1 );
$rowServices2 = array();
while($rowServices3 = mysqli_fetch_assoc($resultServices)){
array_push($rowServices2,$rowServices3['service_name']);
}
$serviceList1 = implode(', ',$rowServices2);

if(empty($serviceList1)){
  $serviceList1 = 'HAHAHAHA';
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Clinic Management | Data Management</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!--data table -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">




</head>

<body>

  <?php

  include "./navbar.php";
  include 'include/connection.php';
  include 'include/function.php';


  //====================DELETE SERVICES======================================
  if (isset($_POST['deletesubmit'])) {
    $status = inactiveService($conn, $_POST['deleteService']);
  }
  ?>
  <script type="text/javascript">
    /*code: 48-57 Numbers*/
    function restrictAlphabets(e) {
      var x = e.which || e.keycode;
      if ((x >= 48 && x <= 57))
        return true;
      else
        return false;
    }
  </script>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->





    <div>
      <h1 style="color: white;"><i class="fas fa-list-alt mr-3"></i>Clinic Management</h1>
    </div><br>


    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">


      <div class="container py-3">
        <div class="card">
          <div class="card-body">

            <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Add Clinic</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Clinic List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="false">Edit Clinic</a>
              </li>

            </ul>
            <form id="clinicForm" enctype="multipart/form-data">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                  <h3 class="pt-3 text-dark">Dental Clinic Information</h3>
                  
                   <!-- MESSAGE  -->
      <?php
      if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "addSuccess") {
          echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Image Added.
                    </div>
                  ';
          $_SESSION['patientErr'] = "";
        }
      }
      ?>
           
                  
                  <hr>
                  <input type="text" style="display: none;" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Dental Clinic" required>
                      </div>
                      <div class="container">


                        <table class="table">
                          <thead>
                            <tr>
                              <th colspan='3'> Pick Your Services</th>

                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <label for="ortho1">
                                  <input type="checkbox" data-sertype="Orthodontics" data-sertime="00:30:00" name="ortho1" id="ortho1" value="Overcrowded and Misaligned Teeth">
                                  Overcrowded and Misaligned Teeth
                                </label>
                              </td>
                              <td>
                                <label for="ortho2">
                                  <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="ortho2" id="ortho2" value="Treating Malocclusions">
                                  Treating Malocclusions
                                </label>
                              <td>
                                <label for="ortho3">
                                  <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="ortho3" id="ortho3" value="Lip and Cheek Bumpers">
                                  Lip and Cheek Bumpers
                                </label>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="ortho4">
                                  <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="ortho4" id="ortho4" value="Palatal Expanders">
                                  Palatal Expanders
                                </label>
                              </td>
                              <td>
                                <label for="ortho5">
                                  <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="ortho5" id="ortho5" value="Retainers">
                                  Retainers
                                </label>
                              </td>
                              <td>
                                <label for="ortho6">
                                  <input type="checkbox" data-sertype="Orthodontics" data-sertime="00:30:00" name="ortho6" id="ortho6" value="Metal braces">
                                  Metal braces
                                </label>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="pedia1">
                                  <input type="checkbox" data-sertype="Pediatric" data-sertime="00:30:00" name="pedia1" id="pedia1" value="Oral Prophylaxis">
                                  Oral Prophylaxis
                                </label>
                              </td>
                              <td>
                                <label for="pedia2">
                                  <input type="checkbox" data-sertype="Pediatric" data-sertime="01:00:00" name="pedia2" id="pedia2" value="Fluoride Therapy">
                                  Fluoride Therapy
                                </label>
                              </td>
                              <td>
                                <label for="pedia3">
                                  <input type="checkbox" data-sertype="Pediatric" data-sertime="01:00:00" name="pedia3" id="pedia3" value="Preventive Sealants">
                                  Preventive Sealants
                                </label>
                              </td>
                            </tr>
                            <td>
                              <label for="pedia4">
                                <input type="checkbox" data-sertype="Pediatric" data-sertime="01:00:00" name="pedia4" id="pedia4" value="Tooth Fillings">
                                Tooth Fillings
                              </label>
                            </td>
                            <td>
                              <label for="pedia5">
                                <input type="checkbox" data-sertype="Pediatric" data-sertime="00:30:00" name="pedia5" id="pedia5" value="Crowns">
                                Crowns
                              </label>
                            </td>
                            <td>
                              <label for="pedia6">
                                <input type="checkbox" data-sertype="Pediatric" data-sertime="01:00:00" name="pedia6" id="pedia6" value="Pulp Treatment">
                                Pulp Treatment
                              </label>
                            </td>
                            </tr>
                            <td>
                              <label for="dent1">
                                <input type="checkbox" data-sertype="Dentist" data-sertime="00:30:00" name="dent1" id="dent1" value="Dentist Consultation">
                                Dentist Consultation
                              </label>
                            </td>
                            <td>
                              <label for="dent2">
                                <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent2" id="dent2" value="Prophylaxis and oral protectors">
                                Prophylaxis and oral protectors
                              </label>
                            </td>
                            <td>
                              <label for="dent3">
                                <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent3" id="dent3" value="Gingivectomy">
                                Gingivectomy
                              </label>
                            </td>
                            </tr>
                            <td>
                              <label for="dent4">
                                <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent4" id="dent4" value="Cavity fillings">
                                Cavity fillings
                              </label>
                            </td>
                            <td>
                              <label for="dent5">
                                <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="dent5" id="dent5" value="Dental crowns">
                                Dental crowns
                              </label>
                            </td>
                            <td>
                              <label for="dent6">
                                <input type="checkbox" data-sertype="Dentist" data-sertime="0:30:00" name="dent6" id="dent6" value="Tooth Extraction">
                                Tooth Extraction
                              </label>
                            </td>
                          </tbody>
                        </table>
                      </div>

                      
                    </div>

                    <div class="col">

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact number">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com">
                      </div>


                      <label for="days" class="form-label">Schedule </label>
                      <div class="mb-3" id="days">
                        <div>
                          <input type="checkbox" id="sunday" name="sunday" value='Sunday' />
                          <label for="sunday">Sunday</label>
                        </div>
                        <div>
                          <input type="checkbox" id="monday" name="monday" value='Monday' />
                          <label for="monday">Monday</label>
                        </div>
                        <div>
                          <input type="checkbox" id="tuesday" name="tuesday" value='Tuesday' />
                          <label for="tuesday">Tuesday</label>
                        </div>
                        <div>
                          <input type="checkbox" id="wednesday" name="wednesday" value='Wednesday' />
                          <label for="wednesday">Wednesday</label>
                        </div>
                        <div>
                          <input type="checkbox" id="thursday" name="thursday" value='Thursday' />
                          <label for="thursday">Thursday</label>
                        </div>
                        <div>
                          <input type="checkbox" id="friday" name="friday" value='Friday' />
                          <label for="friday">Friday</label>
                        </div>
                        <div>
                          <input type="checkbox" id="saturday" name="saturday" value='Saturday' />
                          <label for="saturday">Saturday</label>
                        </div>
                      </div>
                      <h5>Clinic Time</h5>
                      <div>
                        <label for="start_time">Start Time</label>
                        <input type="time" id="start_time" name="start_time" required />
                      </div>
                      <div>
                        <label for="end_time">End Time</label>
                        <input type="time" id="end_time" name="end_time" required />
                      </div>
                    </div>
                  </div>
                  
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="desc" name="desc" rows="7"></textarea>
                      </div>

                  <div class="row pt-3">
                    <div class="col">

                      

                      <div class="mb-3">
                        <input type="text" class="form-control" id="street" placeholder="Street"></input>
                      </div>

                      <div class="mb-3">
                        <input type="text" class="form-control" id="brgy" placeholder="Barangay"></input>
                      </div>

                    </div>
                    <div class="col">
                      <div class="mb-3">
                        <input type="text" class="form-control" id="city" placeholder="City"></input>
                      </div>

                      <div class="mb-3">
                        <input type="text" class="form-control" id="zip" placeholder="Zip Code"></select>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Full Address"></select>
                      </div>
                    <div style="text-align:right;">
                    <button type="submit" name="clinicAdd" id="submit" class="btn btn-success">Add</button>
                  </div>
                  
                
                    </form>

                  
                  <hr>
                  <h3 class="pt-3 text-dark">Image Management</h3>
            
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Dental Clinic Images</label>
                <select class="form-control" id="clinicChoice" name="clinicChoice" required>
                  <?php showClinicDD($conn, $user_id); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" class="form-control-file" id="image3" name="image3" required>
              </div>
              <div style="text-align:right;">
                <button type="submit" name="imgSubmitphoto" id="imgSubmitphoto" class="btn btn-primary">Upload</button>
              </div>
            </form>
            
            
            <hr>
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Dental Clinic Logo</label>
                <select class="form-control" id="clinicChoice" name="clinicChoice" required>
                  <?php showClinicDD($conn, $user_id); ?>
                </select>
              </div>
                <div class="form-group">
                <label for="exampleFormControlFile1">Logo</label>
                <input type="file" class="form-control-file" id="logo" name="logo" required>
              </div>
              <div style="text-align:right;">
                <button type="submit" name="imgSubmit" id="imgSubmit" class="btn btn-primary">Upload</button>
              </div>

              <hr>
              
          </div>
          </form>


          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Dental Clinic</th>
                    <th scope="col">Location</th>

                  </tr>
                </thead>
                <tbody>
                  <?php showClinics($conn, $user_id); ?>
                </tbody>
              </table>
            </div>
          </div>


          <!-- UPDATE CLINIC STARTS HERE ------------------------------>

          <div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">

            <form id="clinicForm1">

            <h4>> <?php 
            $sqlclinicName = "SELECT * FROM clinic_tbl WHERE clinic_id = '$clinic_id1'";
            $resultcName = mysqli_query($conn, $sqlclinicName);
            if(mysqli_num_rows($resultcName)>0){
            while($row = mysqli_fetch_assoc($resultcName)){
            echo $row['clinic_name'];
             ?></h4>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
              <input type="text" class="form-control" id="uname" name="uname" placeholder="Dental Clinic"
              value="<?php echo $row['clinic_name']; ?>" required>
             <input type="text" style="display: none;" id="uuser_id" value="<?php echo $user_id; ?>">
             <input type="text" style="display: none;" id="uclinic_id" value="<?php echo $clinic_id1; ?>">
            </div>
            <?php
            }
            }
            ?>
            <hr>

            <h4>> <?php 
            $sqlclinicContact = "SELECT * FROM clinic_tbl WHERE clinic_id = '$clinic_id1'";
            $resultcContact = mysqli_query($conn, $sqlclinicContact );
            if(mysqli_num_rows($resultcContact )>0){
            while($row = mysqli_fetch_assoc($resultcContact )){ 
            echo $row['clinic_contact'];
            
            ?>
            </h4>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Contact</label>
              <input type="text" class="form-control" id="ucontactno" value="<?php echo $row['clinic_contact']; ?>" name="ucontactno" placeholder="Contact number">
            </div>
            <?php
            }}
            ?>
            <hr>

            <h4>>  <?php 
            $sqlclinicEmail = "SELECT * FROM clinic_tbl WHERE clinic_id = '$clinic_id1'";
            $resultcEmail = mysqli_query($conn, $sqlclinicEmail );
            if(mysqli_num_rows($resultcEmail)>0){
            while($row = mysqli_fetch_assoc($resultcEmail)){ 
            echo $row['clinic_email'];
            
            ?>
            </h4>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="email" class="form-control" id="uemail" value="<?php echo $row['clinic_email']; ?>" name="uemail" placeholder="example@email.com">
            </div>
            <?php
            }}
            ?>
            <hr>


            <h4>>   <?php 
            $sqlclinicDesc = "SELECT * FROM clinic_tbl WHERE clinic_id = '$clinic_id1'";
            $resultcDesc = mysqli_query($conn, $sqlclinicDesc );
            if(mysqli_num_rows($resultcDesc )>0){
            while($row = mysqli_fetch_assoc($resultcDesc )){ 
            echo $row['clinic_desc'];
            
            ?>
            </h4>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Description</label>
              <textarea class="form-control" id="udesc" name="udesc" rows="7"><?php echo $row['clinic_desc']; ?></textarea>
            </div>
            <?php
            }}
            ?>
            <hr>
            <h4>> <?php 
            $sqlclinicTime = "SELECT * FROM clinic_tbl WHERE clinic_id = '$clinic_id1'";
            $resultcTime = mysqli_query($conn, $sqlclinicTime );
            if(mysqli_num_rows($resultcTime )>0){
            while($row = mysqli_fetch_assoc($resultcTime )){ 
            $time_in_12_hour_format = date("g:i a", strtotime($row['start_time']));
            $time_in_12_hour_format1 = date("g:i a", strtotime($row['end_time']));
              
            echo 'Opens at '.$time_in_12_hour_format.'<br>> Closes at '.$time_in_12_hour_format1 ;
              
            
            ?></h4>
            <h5>Clinic Time</h5>
            <div>
              <label for="start_time">Start Time</label>
              <input type="time" id="ustart_time" value="<?php echo $row['start_time']; ?>" name="ustart_time" required />
            </div>
            <div>
              <label for="end_time">End Time</label>
              <input type="time" id="uend_time" value="<?php echo $row['end_time']; ?>" name="uend_time" required />
            </div>
            <?php
            }}
            ?>
            <hr>

            <h4>> <?php echo $dayList; ?></h4>

            <label for="days" class="form-label">Schedule </label>
            <div class="mb-3" id="days">
              <div>
                <input type="checkbox" id="usunday" name="usunday" value='Sunday' <?php
                $sql = "SELECT * FROM `days` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['dayname']=='Sunday' ? 'checked' : ''); } } ?> />
                <label for="sunday">Sunday</label>
              </div>
              <div>
                <input type="checkbox" id="umonday" name="umonday" value='Monday' <?php
                $sql = "SELECT * FROM `days` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['dayname']=='Monday' ? 'checked' : ''); } } ?> />
                <label for="monday">Monday</label>
              </div>
              <div>
                <input type="checkbox" id="utuesday" name="utuesday" value='Tuesday' <?php
                $sql = "SELECT * FROM `days` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['dayname']=='Tuesday' ? 'checked' : ''); } } ?> />
                <label for="tuesday">Tuesday</label>
              </div>
              <div>
                <input type="checkbox" id="uwednesday" name="uwednesday" value='Wednesday' <?php
                $sql = "SELECT * FROM `days` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['dayname']=='Wednesday' ? 'checked' : ''); } } ?> />
                <label for="wednesday">Wednesday</label>
              </div>
              <div>
                <input type="checkbox" id="uthursday" name="uthursday" value='Thursday' <?php
                $sql = "SELECT * FROM `days` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['dayname']=='Thursday' ? 'checked' : ''); } } ?> />
                <label for="thursday">Thursday</label>
              </div>
              <div>
                <input type="checkbox" id="ufriday" name="ufriday" value='Friday' <?php
                $sql = "SELECT * FROM `days` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['dayname']=='Friday' ? 'checked' : ''); } } ?> />
                <label for="friday">Friday</label>
              </div>
              <div>
                <input type="checkbox" id="usaturday" name="usaturday" value='Saturday' <?php
                $sql = "SELECT * FROM `days` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['dayname']=='Saturday' ? 'checked' : ''); } } ?> />
                <label for="saturday">Saturday</label>
              </div>
            </div>

            <hr>
            <h4>> <?php echo $serviceList1; ?></h4>

            <table class="table">
              <thead>
                <tr>
                  <th colspan='3'> Pick Your Services</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <label for="uortho1">
                      <input type="checkbox" data-sertype="Orthodontics" <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Overcrowded and Misaligned Teeth' ? 'checked' : ''); } } ?> data-sertime="00:30:00" name="uortho1" id="uortho1" value="Overcrowded and Misaligned Teeth">
                      Overcrowded and Misaligned Teeth
                    </label>
                  </td>
                  <td>
                    <label for="uortho2">
                      <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="uortho2" id="uortho2" value="Treating Malocclusions"
                      <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Treating Malocclusions' ? 'checked' : ''); } } ?>>
                      Treating Malocclusions
                    </label>
                  <td>
                    <label for="uortho3">
                      <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="uortho3" id="uortho3" value="Lip and Cheek Bumpers"
                      <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Lip and Cheek Bumpers' ? 'checked' : ''); } } ?>>
                      Lip and Cheek Bumpers
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="uortho4">
                      <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="uortho4" id="uortho4" value="Palatal Expanders"
                      <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Palatal Expanders' ? 'checked' : ''); } } ?>>
                      Palatal Expanders
                    </label>
                  </td>
                  <td>
                    <label for="uortho5">
                      <input type="checkbox" data-sertype="Orthodontics" data-sertime="01:00:00" name="uortho5" id="uortho5" value="Retainers"
                      <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Retainers' ? 'checked' : ''); } } ?>>
                      Retainers
                    </label>
                  </td>
                  <td>
                    <label for="uortho6">
                      <input type="checkbox" data-sertype="Orthodontics" data-sertime="00:30:00" name="uortho6" id="uortho6" value="Metal braces"
                      <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Metal braces' ? 'checked' : ''); } } ?>>
                      Metal braces
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="upedia1">
                      <input type="checkbox" data-sertype="Pediatric" data-sertime="00:30:00" name="upedia1" id="upedia1" value="Oral Prophylaxis"
                      <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Oral Prophylaxis' ? 'checked' : ''); } } ?>>
                      Oral Prophylaxis
                    </label>
                  </td>
                  <td>
                    <label for="upedia2">
                      <input type="checkbox" data-sertype="Pediatric" data-sertime="01:00:00" name="upedia2" id="upedia2" value="Fluoride Therapy"
                      <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Fluoride Therapy' ? 'checked' : ''); } } ?>>
                      Fluoride Therapy
                    </label>
                  </td>
                  <td>
                    <label for="upedia3">
                      <input type="checkbox" data-sertype="Pediatric" data-sertime="01:00:00" name="upedia3" id="upedia3" value="Preventive Sealants"
                      <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Preventive Sealants' ? 'checked' : ''); } } ?>>
                      Preventive Sealants
                    </label>
                  </td>
                </tr>
                <td>
                  <label for="upedia4">
                    <input type="checkbox" data-sertype="Pediatric" data-sertime="01:00:00" name="upedia4" id="upedia4" value="Tooth Fillings"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Tooth Fillings' ? 'checked' : ''); } } ?>>
                    Tooth Fillings
                  </label>
                </td>
                <td>
                  <label for="upedia5">
                    <input type="checkbox" data-sertype="Pediatric" data-sertime="00:30:00" name="upedia5" id="upedia5" value="Crowns"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Crowns' ? 'checked' : ''); } } ?>>
                    Crowns
                  </label>
                </td>
                <td>
                  <label for="upedia6">
                    <input type="checkbox" data-sertype="Pediatric" data-sertime="01:00:00" name="upedia6" id="upedia6" value="Pulp Treatment"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Pulp Treatment' ? 'checked' : ''); } } ?>>
                    Pulp Treatment
                  </label>
                </td>
                </tr>
                <td>
                  <label for="udent1">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="00:30:00" name="udent1" id="udent1" value="Dentist Consultation"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Dentist Consultation' ? 'checked' : ''); } } ?>>
                    Dentist Consultation
                  </label>
                </td>
                <td>
                  <label for="udent2">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="udent2" id="udent2" value="Prophylaxis and oral protectors"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Prophylaxis and oral protectors' ? 'checked' : ''); } } ?>>
                    Prophylaxis and oral protectors
                  </label>
                </td>
                <td>
                  <label for="udent3">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="udent3" id="udent3" value="Gingivectomy"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Gingivectomy' ? 'checked' : ''); } } ?>>
                    Gingivectomy
                  </label>
                </td>
                </tr>
                <td>
                  <label for="udent4">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="udent4" id="udent4" value="Cavity fillings"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Cavity fillings' ? 'checked' : ''); } } ?>>
                    Cavity fillings
                  </label>
                </td>
                <td>
                  <label for="udent5">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="01:00:00" name="udent5" id="udent5" value="Dental crowns"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Dental crowns' ? 'checked' : ''); } } ?>>
                    Dental crowns
                  </label>
                </td>
                <td>
                  <label for="udent6">
                    <input type="checkbox" data-sertype="Dentist" data-sertime="0:30:00" name="udent6" id="udent6" value="Tooth Extraction"
                    <?php
                $sql = "SELECT * FROM `services` WHERE clinic_id = ".$clinic_id1."";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ echo ($row['service_name']=='Tooth Extraction' ? 'checked' : ''); } } ?>>
                    Tooth Extraction
                  </label>
                </td>
              </tbody>
            </table>

            <hr>

            <h4>> <?php 
            $sqlclinicAddress = "SELECT * FROM clinic_tbl WHERE clinic_id = '$clinic_id1'";
            $resultcAddress = mysqli_query($conn, $sqlclinicAddress);
            if(mysqli_num_rows($resultcAddress)>0){
            while($row = mysqli_fetch_assoc($resultcAddress)){
            echo $row['clinic_address'];
             ?>
            </h4>

            <div class="row pt-3">
              <div class="col">

                <div class="mb-3">
                  <input type="text" class="form-control" value="<?php echo $row['clinic_address']; ?>" id="uaddress" name="uaddress" placeholder="Address"></select>
                </div>

                <div class="mb-3">
                  <input type="text" class="form-control" value="<?php echo $row['street']; ?>" id="ustreet" placeholder="Street"></input>
                </div>

                <div class="mb-3">
                  <input type="text" class="form-control" value="<?php echo $row['brgy']; ?>" id="ubrgy" placeholder="Barangay"></input>
                </div>

              </div>
              <div class="col">
                <div class="mb-3">
                  <input type="text" class="form-control" value="<?php echo $row['city']; ?>" id="ucity" placeholder="City"></input>
                </div>

                <div class="mb-3">
                  <input type="text" class="form-control" value="<?php echo $row['zip_code']; ?>" id="uzip" placeholder="Zip Code"></select>
                </div>
              </div>
            </div>
            <?php
            }
            }
            ?>
              <div style="text-align:right;">
                    <button type="submit" name="uclinicAdd" id="usubmit" class="btn btn-success">Add</button>
                  </div>
                  </form>



                <!-- END -------------------------------------------------------------------------------------------------------->


        </div>









      </div>

    </div>
  </div>
  </div>




  </div>


  <!-- End demo content -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
  <!-- data tables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $('#clinicForm').on('submit', (e) => {
      e.preventDefault();

      var name = $('#name');
      var contactno = $('#contactno');
      var email = $('#email');
      var desc = $('#desc');
      var address = $('#address');
      var street = $('#street');
      var brgy = $('#brgy');
      var city = $('#city');
      var zip_code = $('#zip');
      var start_time = $('#start_time');
      var end_time = $('#end_time');
      var user_id = $('#user_id');

      // services
      var ortho1 = $('#ortho1').is(':checked') ? [$('#ortho1').val(), $('#ortho1').attr('data-sertype'), $('#ortho1').attr('data-sertime')] : null;
      var ortho2 = $('#ortho2').is(':checked') ? [$('#ortho2').val(), $('#ortho2').attr('data-sertype'), $('#ortho2').attr('data-sertime')] : null;
      var ortho3 = $('#ortho3').is(':checked') ? [$('#ortho3').val(), $('#ortho3').attr('data-sertype'), $('#ortho3').attr('data-sertime')] : null;
      var ortho4 = $('#ortho4').is(':checked') ? [$('#ortho4').val(), $('#ortho4').attr('data-sertype'), $('#ortho4').attr('data-sertime')] : null;
      var ortho5 = $('#ortho5').is(':checked') ? [$('#ortho5').val(), $('#ortho5').attr('data-sertype'), $('#ortho5').attr('data-sertime')] : null;
      var ortho6 = $('#ortho6').is(':checked') ? [$('#ortho6').val(), $('#ortho6').attr('data-sertype'), $('#ortho6').attr('data-sertime')] : null;

      var pedia1 = $('#pedia1').is(':checked') ? [$('#pedia1').val(), $('#pedia1').attr('data-sertype'), $('#pedia1').attr('data-sertime')] : null;
      var pedia2 = $('#pedia2').is(':checked') ? [$('#pedia2').val(), $('#pedia2').attr('data-sertype'), $('#pedia2').attr('data-sertime')] : null;
      var pedia3 = $('#pedia3').is(':checked') ? [$('#pedia3').val(), $('#pedia3').attr('data-sertype'), $('#pedia3').attr('data-sertime')] : null;
      var pedia4 = $('#pedia4').is(':checked') ? [$('#pedia4').val(), $('#pedia4').attr('data-sertype'), $('#pedia4').attr('data-sertime')] : null;
      var pedia5 = $('#pedia5').is(':checked') ? [$('#pedia5').val(), $('#pedia5').attr('data-sertype'), $('#pedia5').attr('data-sertime')] : null;
      var pedia6 = $('#pedia6').is(':checked') ? [$('#pedia6').val(), $('#pedia6').attr('data-sertype'), $('#pedia6').attr('data-sertime')] : null;


      var dent1 = $('#dent1').is(':checked') ? [$('#dent1').val(), $('#dent1').attr('data-sertype'), $('#dent1').attr('data-sertime')] : null;
      var dent2 = $('#dent2').is(':checked') ? [$('#dent2').val(), $('#dent2').attr('data-sertype'), $('#dent2').attr('data-sertime')] : null;
      var dent3 = $('#dent3').is(':checked') ? [$('#dent3').val(), $('#dent3').attr('data-sertype'), $('#dent3').attr('data-sertime')] : null;
      var dent4 = $('#dent4').is(':checked') ? [$('#dent4').val(), $('#dent4').attr('data-sertype'), $('#dent4').attr('data-sertime')] : null;
      var dent5 = $('#dent5').is(':checked') ? [$('#dent5').val(), $('#dent5').attr('data-sertype'), $('#dent5').attr('data-sertime')] : null;
      var dent6 = $('#dent6').is(':checked') ? [$('#dent6').val(), $('#dent6').attr('data-sertype'), $('#dent6').attr('data-sertime')] : null;



      // days
      var sunday = $('#sunday').is(':checked') ? $('#sunday').val() : null;
      var monday = $('#monday').is(':checked') ? $('#monday').val() : null;
      var tuesday = $('#tuesday').is(':checked') ? $('#tuesday').val() : null;
      var wednesday = $('#wednesday').is(':checked') ? $('#wednesday').val() : null;
      var thursday = $('#thursday').is(':checked') ? $('#thursday').val() : null;
      var friday = $('#friday').is(':checked') ? $('#friday').val() : null;
      var saturday = $('#saturday').is(':checked') ? $('#saturday').val() : null;


      if ((name.val() != '') &&
        (contactno.val() != '') &&
        (email.val() != '') &&
        (desc.val() != '') &&
        (address.val() != '') &&
        (start_time.val() != '') &&
        (end_time.val() != '') &&
        (user_id.val() != '')
      ) {
        //Ajax to send file to upload
        $.ajax({
          url: 'clinictry1.php',
          method: 'POST',
          dataType: 'json',
          data: {
            name: name.val(),
            contactno: contactno.val(),
            email: email.val(),
            desc: desc.val(),
            address: address.val(),
            street: street.val(),
            brgy: brgy.val(),
            city: city.val(),
            zip_code: zip_code.val(),
            user_id: user_id.val(),
            ortho1: ortho1,
            ortho2: ortho2,
            ortho3: ortho3,
            ortho4: ortho4,
            ortho5: ortho5,
            ortho6: ortho6,

            pedia1: pedia1,
            pedia2: pedia2,
            pedia3: pedia3,
            pedia4: pedia4,
            pedia5: pedia5,
            pedia6: pedia6,
            dent1: dent1,
            dent2: dent2,
            dent3: dent3,
            dent4: dent4,
            dent5: dent5,
            dent6: dent6,
            sunday: sunday,
            monday: monday,
            tuesday: tuesday,
            wednesday: wednesday,
            thursday: thursday,
            friday: friday,
            saturday: saturday,
            start_time: start_time.val(),
            end_time: end_time.val()
          },
          success: function(response) {
            console.log(response);
            swalFunc("Clinic", "Clinic Successful Added", "success", window.location.href);
            $('#clinicForm')[0].reset();





          }
        });

      }
    });

    $('#clinicForm1').on('submit', (e) => {
      e.preventDefault();

      var name = $('#uname');
      var contactno = $('#ucontactno');
      var email = $('#uemail');
      var desc = $('#udesc');
      var address = $('#uaddress');
      var street = $('#ustreet');
      var brgy = $('#ubrgy');
      var city = $('#ucity');
      var zip_code = $('#uzip');
      var start_time = $('#ustart_time');
      var end_time = $('#uend_time');
      var user_id = $('#uuser_id');
      var clinic_id = $('#uclinic_id');

      // services
      var ortho1 = $('#uortho1').is(':checked') ? [$('#uortho1').val(), $('#uortho1').attr('data-sertype'), $('#uortho1').attr('data-sertime')] : null;
      var ortho2 = $('#uortho2').is(':checked') ? [$('#uortho2').val(), $('#uortho2').attr('data-sertype'), $('#uortho2').attr('data-sertime')] : null;
      var ortho3 = $('#uortho3').is(':checked') ? [$('#uortho3').val(), $('#uortho3').attr('data-sertype'), $('#uortho3').attr('data-sertime')] : null;
      var ortho4 = $('#uortho4').is(':checked') ? [$('#uortho4').val(), $('#uortho4').attr('data-sertype'), $('#uortho4').attr('data-sertime')] : null;
      var ortho5 = $('#uortho5').is(':checked') ? [$('#uortho5').val(), $('#uortho5').attr('data-sertype'), $('#uortho5').attr('data-sertime')] : null;
      var ortho6 = $('#uortho6').is(':checked') ? [$('#uortho6').val(), $('#uortho6').attr('data-sertype'), $('#uortho6').attr('data-sertime')] : null;

      var pedia1 = $('#upedia1').is(':checked') ? [$('#upedia1').val(), $('#upedia1').attr('data-sertype'), $('#upedia1').attr('data-sertime')] : null;
      var pedia2 = $('#upedia2').is(':checked') ? [$('#upedia2').val(), $('#upedia2').attr('data-sertype'), $('#upedia2').attr('data-sertime')] : null;
      var pedia3 = $('#upedia3').is(':checked') ? [$('#upedia3').val(), $('#upedia3').attr('data-sertype'), $('#upedia3').attr('data-sertime')] : null;
      var pedia4 = $('#upedia4').is(':checked') ? [$('#upedia4').val(), $('#upedia4').attr('data-sertype'), $('#upedia4').attr('data-sertime')] : null;
      var pedia5 = $('#upedia5').is(':checked') ? [$('#upedia5').val(), $('#upedia5').attr('data-sertype'), $('#upedia5').attr('data-sertime')] : null;
      var pedia6 = $('#upedia6').is(':checked') ? [$('#upedia6').val(), $('#upedia6').attr('data-sertype'), $('#upedia6').attr('data-sertime')] : null;


      var dent1 = $('#udent1').is(':checked') ? [$('#udent1').val(), $('#udent1').attr('data-sertype'), $('#udent1').attr('data-sertime')] : null;
      var dent2 = $('#udent2').is(':checked') ? [$('#udent2').val(), $('#udent2').attr('data-sertype'), $('#udent2').attr('data-sertime')] : null;
      var dent3 = $('#udent3').is(':checked') ? [$('#udent3').val(), $('#udent3').attr('data-sertype'), $('#udent3').attr('data-sertime')] : null;
      var dent4 = $('#udent4').is(':checked') ? [$('#udent4').val(), $('#udent4').attr('data-sertype'), $('#udent4').attr('data-sertime')] : null;
      var dent5 = $('#udent5').is(':checked') ? [$('#udent5').val(), $('#udent5').attr('data-sertype'), $('#udent5').attr('data-sertime')] : null;
      var dent6 = $('#udent6').is(':checked') ? [$('#udent6').val(), $('#udent6').attr('data-sertype'), $('#udent6').attr('data-sertime')] : null;



      // days
      var sunday = $('#usunday').is(':checked') ? $('#usunday').val() : null;
      var monday = $('#umonday').is(':checked') ? $('#umonday').val() : null;
      var tuesday = $('#utuesday').is(':checked') ? $('#utuesday').val() : null;
      var wednesday = $('#uwednesday').is(':checked') ? $('#uwednesday').val() : null;
      var thursday = $('#uthursday').is(':checked') ? $('#uthursday').val() : null;
      var friday = $('#ufriday').is(':checked') ? $('#ufriday').val() : null;
      var saturday = $('#usaturday').is(':checked') ? $('#usaturday').val() : null;


      if ((name.val() != '') &&
        (contactno.val() != '') &&
        (email.val() != '') &&
        (desc.val() != '') &&
        (address.val() != '') &&
        (start_time.val() != '') &&
        (end_time.val() != '') &&
        (clinic_id.val() != '') &&
        (user_id.val() != '') 
      ) {
        //Ajax to send file to upload
        $.ajax({
          url: 'clinictry2.php',
          method: 'POST',
          dataType: 'html',
          data: {
            name: name.val(),
            contactno: contactno.val(),
            email: email.val(),
            desc: desc.val(),
            address: address.val(),
            street: street.val(),
            brgy: brgy.val(),
            city: city.val(),
            zip_code: zip_code.val(),
            user_id: user_id.val(),
            clinic_id: clinic_id.val(),
            ortho1: ortho1,
            ortho2: ortho2,
            ortho3: ortho3,
            ortho4: ortho4,
            ortho5: ortho5,
            ortho6: ortho6,

            pedia1: pedia1,
            pedia2: pedia2,
            pedia3: pedia3,
            pedia4: pedia4,
            pedia5: pedia5,
            pedia6: pedia6,
            dent1: dent1,
            dent2: dent2,
            dent3: dent3,
            dent4: dent4,
            dent5: dent5,
            dent6: dent6,
            sunday: sunday,
            monday: monday,
            tuesday: tuesday,
            wednesday: wednesday,
            thursday: thursday,
            friday: friday,
            saturday: saturday,
            start_time: start_time.val(),
            end_time: end_time.val()
          },
          success: function(response) {
            console.log(response);
            swalFunc("Clinic", "Clinic Successful Added", "success", window.location.href);
            $('#clinicForm1')[0].reset();





          }
        });

      }
    });

    function swalFunc(newtitle, text, icon, link) {
      swal({
          title: newtitle,
          text: text,
          icon: icon,
        })
        .then((responseSwal) => {
          if (responseSwal) {
            location.href = link;
          }
        });
    }
  </script>


</body>

</html>
