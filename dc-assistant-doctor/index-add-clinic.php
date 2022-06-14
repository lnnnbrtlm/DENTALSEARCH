
<?php

include 'session.php';
if(!isset($_SESSION['login_admin1'])){
    header('location: logout1.php');
}

include 'include/connection.php';
include 'include/function.php';


$user_id = $_SESSION['user_id'];
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
    
    $_SESSION['patientErr'] = "addSuccess1";
	header("Location: index-add-clinic.php");
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
    
    $_SESSION['patientErr'] = "addSuccess1";
	header("Location: index-add-clinic.php");
exit();
    
    } else {
    
      echo 'Image upload failed.';
    }
  }
    
if (isset($_POST['imgSubmitPermit'])) {
  $clinicChoice = $_POST['clinicChoice'];
  $allowedExts7 = array("pdf");
  $temp7 = explode(".", $_FILES["permit"]["name"]);
  $extension7 = end($temp7);
  $profile_img3 = $_FILES["permit"]["name"];
  move_uploaded_file($_FILES["permit"]["tmp_name"], "img/" . $_FILES["permit"]["name"]);

  $sqlUpdate = "UPDATE clinic_tbl SET `permit_photo`='$profile_img3'  WHERE `clinic_id` ='" . $clinicChoice . "'";
  $result3 = mysqli_query($conn, $sqlUpdate);
  if ($result3) {
  
  
$_SESSION['patientErr'] = "addSuccess";
	header("Location: index-add-clinic.php");
exit();
  
  
  } else {
    echo 'Image upload failed.';
  }
}
  
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="img/tooth.ico">
    <title>LOGIN | Dental Clinic</title>

    <style>
        body {
    background: #599fd9;
    background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/bg-logo.png");
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: 'Poppins', sans-serif !important;
  }
    </style>
</head>

<body>


    <div class="container py-5">
        <div class="pb-3">
    <a href="index-branch-picker.php"><button type="button" class="btn btn-secondary">Back</button></a>
    </div>
    
    <div class="card">
            <div class="card-body">
    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dental Clinic Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Image Management</a>
  </li>

</ul>
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
                      <strong>Success!</strong> Business Permit Added.
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
                  <form id="clinicForm">
                  <input type="text" name="user_id" style="display: none;" id="user_id" value="<?php echo $user_id; ?>">
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
                    
                    <h3>Upload business permit</h3><br>
                            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Clinic</label>
                <select class="form-control" id="clinicChoice" name="clinicChoice" required>
                  <?php showClinicDD($conn, $user_id); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">File</label>
                <input type="file" class="form-control-file" id="permit" name="permit" required>
              </div>
              <div style="text-align:right;">
                <button type="submit" name="imgSubmitPermit" id="imgSubmitPermit" class="btn btn-primary">Upload</button>
              </div>
            </form>


  </div>
  
  
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <h3 class="pt-3 text-dark">Image Management</h3>
                      
                    
                      
                      <hr>
            
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

              </form>

       

            </div>
  </div>
  
</div>
    
    </div>
    </div>
    
    
    
    
    
    
    
    
    
    
  

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <!-- data tables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
  <script language="javascript" type="text/javascript">
        function limitText(limitField, limitNum) {
            if (limitField.value.length > limitNum) {
                limitField.value = limitField.value.substring(0, limitNum);
            }
        }
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
            swalFunc("Clinic", "Your clinic is on verification", "success", window.location.href);
            $('#clinicForm')[0].reset();





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