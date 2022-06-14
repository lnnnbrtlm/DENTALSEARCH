<?php

include('session.php');
if (!isset($_SESSION['login_admin'])) {
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PROFILE | Dental Clinic</title>

    <link href="style.css" rel="stylesheet" />
    <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">

    <script>
        /* trigger when page is ready */
        $(document).ready(function (){
            $(".pr-password").passwordRequirements({

            });
        });
    </script>
    <style>
    .passUpdate {
        padding: 2px;
        margin-right: 270px;
        border: 1px solid green;
        color: darkgreen;
        background: lightgreen;
        border-radius: 3px;
        text-align: left;
        font-size: 15px;
    }

    .wrongPass {
        padding: 2px;
        margin-right: 270px;
        border: 1px #691c1c;
        color: #fff;
        background: #FF0000;
        border-radius: 3px;
        text-align: left;
        font-size: 15px;
    }
    /* The message box is shown when the user clicks on the password field */
#msg1 {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#msg1 p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
    </style>
</head>

<body>

    <!-- NAVIGATION -->

    <!-- This will appear when client is not logged in -->

    <?php include 'navbar (logged-in).php';
  ?>

    <!-- This will appear when client is logged in -->

    <?php // include 'navbar (not logged-in).php';
  ?>

    <!-- HERO -->

    <div class="bgimage-4">

        <div class="container py-5">


                        <h1 class="header-1">Profile</h1>


        </div>
    </div>



    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="mb-4">
                        <div class="card-body bg-white mt-4 border border-1">


                            <!--- ------>
                            <div class="container text-center pt-5 pb-2">
                                <div style="padding-bottom: 10px;"><img src="profile pictures/<?php
                                                                              $email = $_SESSION['login_admin'];
                                                                              $query1 = "SELECT *FROM patient_record WHERE email='$email'";
                                                                              $query_run1 = mysqli_query($conn, $query1);
                                                                              while ($row = mysqli_fetch_array($query_run1)) {
                                                                                echo $row['profile_img'];
                                                                              } ?>" alt="Avatar Logo"
                                        style="width:150px; background-color: white;" class="rounded-pill"></div>
                                <h3><?php $email = $_SESSION['login_admin'];
                    $query = "SELECT *FROM patient_record WHERE email='$email'";
                    $query_run = mysqli_query($conn, $query);
                    while ($row1 = mysqli_fetch_array($query_run)) {
                      echo $row1['first_name']." ".$row1['last_name']; ?></h3>
                                <hr>
                                <p style="font-size: 14px; margin-top: -10px; color: #0D6EFD;"><i
                                        class="fas fa-certificate"></i> Verified</p>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mb-4">
                        <div class="card-body bg-white mt-4 border border-1">
                            <div class="container pt-5 pb-5">
                                <h1>Profile</h1><br>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="profile.php">Personal
                                            Information</a>
                                    </li>
                                </ul><br>
                                <form action="updateProfile.php" method="POST" enctype="multipart/form-data">
                                   <div class="container text-center py-5">
                                   </div>
                                   <div class="row">
                                   <input type="hidden" name="patient_id" value="<?php echo $row1['patient_id']; ?>">
                                   
                                <div class="col-4">
                                        <p>Update Profile Image:</p>
                                    </div>
                                    <div class="col-8">
                                    <input type="file" class="form-control-file" onchange="displayImg(this)" id="profileImg" name="profileImg" disabled>
                                    </div>
                                </div>
  
                                <div class="row">
                                <div class="col-4">
                                        <p style="padding:4px;">First Name:</p>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $row1['first_name']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-4">
                                        <p style="padding:4px;">Last Name:</p>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $row1['last_name']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:4px;">Email:</p>
                                    </div>
                                    <div class="col-8">
                                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $row1['email']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:4px;">Phone Number:</p>
                                    </div>
                                    <div class="col-8">
                                    <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $row1['contactno']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:4px;">Parent/Guardian:</p>
                                    </div>
                                    <div class="col-8">
                                    <input type="text" id="pg" name="pg" class="form-control" value="<?php echo $row1['parent_guardian']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:4px;">Birthdate:</p>
                                    </div>
                                    <div class="col-8">
                                    <input type="text" id="bdate" name="bdate" class="form-control" value="<?php echo $row1['birthdate']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:4px;">Age:</p>
                                    </div>
                                    <div class="col-8">
                                    <input type="text" id="age" name="age" class="form-control" value="<?php echo $row1['age']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:4px;">Gender:</p>
                                    </div>
                                    <div class="col-8">
                                    <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $row1['gender']; ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:4px;">Address</p>
                                    </div>
                                    <div class="col-8">
                                    <input type="text" id="address" name="address" class="form-control" value="<?php echo $row1['address']; ?>" disabled>
                                    </div>
                                </div>
                                <br>
                                 <button onclick="enable()" type="button" class="btn btn-warning">Edit</button>
            <button type="submit" name="updateprofile" id="save" disabled class="btn btn-success">Save</button>
           </form>
            <hr>
                                <h3 class="py-3">Change Password</h3>
                                <?php
                    }
              ?>

                                <?php
              /* Change Password */ //////////////
              include('changePass.php') ?>


                                <form method="post" action="#">
                                    <div class="form-group">
                                        <label class="pb-2" for="old-pass">Type current password:</label>
                                        <input type="password" id="old-pass" class="form-control" name="currentPass"
                                            placeholder="Current"><br>
                                        <div class="row">
                                            <div class="col">
                                                <label class="pb-2" for="new-pass">Type new password:</label>
                                                <input type="password" id="newpassword" class="form-control"
                                                    placeholder="New" name="newPass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                            </div>
                                            <div id="msg1">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              </div>
                                            <div class="col">
                                                <label class="pb-2" for="rnew-pass">Re-type new password:</label>
                                                <input type="password" id="confirm_new_password" class="form-control"
                                                    placeholder="Re-type new" name="newPass1">
                                            </div>
                                            <span id='message1'></span>
                                        </div>
                                    </div>
                                    <br>
                                    <input style="float: right;" type="submit" class="btn btn-success"
                                        name="btnChangePass" data-bs-toggle="modal" data-bs-target="#change-pass"
                                        value="Save"></input>
                            </div>
                        </div>

                        <hr>
                        </form>


                       

                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    <script>
    $('#newpassword, #confirm_new_password').on('keyup', function() {
        if (($('#newpassword').val() || $('#confirm_new_password').val()) == "") {

        } else if ($('new#password').val() == $('#confirm_new_password').val()) {
            $('#message1').html('Matching').css('color', 'green');
        } else
            $('#message1').html('Not Matching').css('color', 'red');
    });
    </script>

    <!-- FOOTER -->


    <?php include 'footer.php';
  ?>

</body>

</html>

<script>


      function enable() {
        document.getElementById("firstname").disabled = "";
        document.getElementById("lastname").disabled = ""
        document.getElementById("contact").disabled = "";
        document.getElementById("pg").disabled = "";
        document.getElementById("age").disabled = "";
        document.getElementById("address").disabled = "";
        document.getElementById("profileImg").disabled = "";
        document.getElementById("save").disabled = "";

      

      }

    </script>



<script>
var myInput = document.getElementById("newpassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("msg1").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("msg1").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

</script>