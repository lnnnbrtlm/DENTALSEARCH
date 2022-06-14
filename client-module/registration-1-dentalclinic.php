<?php
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeception;

require 'SMTP/vendor/autoload.php';

if (isset($_POST['btnNext'])) {
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $email = $_POST['email'];
  $fullname = $firstname . " " . $lastname;
  $age = $_POST['clientAge'];
  $contact = $_POST['contact'];
  $password = $_POST['pass'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthdate'];
  $address = $_POST['street'].' '.$_POST['brgy'].', '.$_POST['city'];
  $street = $_POST['street'];
  $brgy = $_POST['brgy'];
  $city = $_POST['city'];
  $zip_code = $_POST['zip'];
  $msg = "";
  $css_class = "";

  //Instantation and passing 'true' enables execeptions
  $mail = new PHPMailer(true);

  try {
    //enable verbose debug output
    $mail->SMTPDebug = 0; //SMTP Debug Server
    //Send using SMTP
    //$mail->isSMTP();
    //Set the SMTP server through 
    $mail->Host = "mail.4r-dentalclinic.com";
    //Enable SMTP authentication
    $mail->SMTPAuth = true;
    //SMTP Username
    $mail->Username = "noreply@4r-dentalclinic.com";
    //SMTP password
    $mail->Password = "x1fGGtRcFo8xMiMl";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //TCP port to connect to, user 465 for 'PHP::ENCRYPTION_SMTPS' above 
    $mail->Port = 587;
    //Recepients
    $mail->setFrom('noreply@4r-dentalclinic.com', 'noreply@4r-dentalclinic.com');
    //add a recipient   
    $mail->addAddress($email, $firstname);
    //Set email format to HTML
    $mail->isHTML(true);
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $mail->Subject = "Email Verification";
    $mail->Body = "<p> Your Verification code is : <b style='font-size:30px'>" . $verification_code . "</b></p>";
    $mail->send();
    //echo Message has been sent;

    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    //insert in user tables

    $checkAvailability = "SELECT * FROM user_accounts WHERE email='$email'";
    $checkAvailability_run = mysqli_query($conn, $checkAvailability);

    if (mysqli_num_rows($checkAvailability_run) > 0) {
      $msg1 = "This email has already been used";
      $css_class = "alert-danger";
     // header('Location: registration-1-dentalclinic.php');
    } else {

     
      $mysql = mysqli_query($conn, "INSERT INTO `user_accounts` (`fullname`, `first_name`, `last_name`, `birthdate`, `address`, `street`, `brgy`, `city`, `zip_code`,`age`, `password`, `email`, `contactno`, `gender`,`user_type`,`verification_code`,`status`) 
  VALUES('$fullname', '$firstname','$lastname', '$birthday', '$address', '$street', '$brgy', '$city', '$zip_code','$age', '$password', '$email', '$contact', '$gender','ClinicAdmin','$verification_code','INACTIVE')");

      if($mysql) {
        header("Location: registration-3-dentalclinic.php?email=".$email.""); 
      } else {
        echo mysqli_error($conn);
      }
    }
  } catch (Exception $e) {
    echo mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REGISTRATION (Step 1) | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!-- Bootstrap CSS -->
  <!-- Password Requirements CSS -->
  <link rel="stylesheet" href="css/jquery.passwordRequirements.css" />
  <!--Only for demo purpose - no need to add.-->

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="js/jquery.passwordRequirements.min.js"></script>
  <script>
    /* trigger when page is ready */
    $(document).ready(function() {
      $(".pr-password").passwordRequirements({

      });
    });
  </script>
  <style>
    /* The message box is shown when the user clicks on the password field */
    #msg {
      display: none;
      background: #f1f1f1;
      color: #000;
      position: relative;
      padding: 20px;
      margin-top: 10px;
    }

    #msg p {
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

<body style="      background: linear-gradient(90deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('img/bg-logo.png');
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;">

  <!-- NAVIGATION -->
  <!-- This will appear when client is not logged in -->

  <?php // include 'navbar (logged-in).php';
  ?>

  <!-- This will appear when client is logged in -->

  <?php include 'navbar (not logged-in).php';
  ?>

  <!-- HERO -->

  <?php if (!empty($msg)) : ?>
    <div class="alert <?php echo $css_class; ?>">
      <?php echo $msg; ?>
    </div>
  <?php endif; ?>
  

  <div class="text-center mt-5">
    <h3 style="color:white">Dental Clinic</h3>
    <small class="text-light p-0 m-0">This user can list dental clinics.</small>
    </div>

    <div class="col-lg d-flex justify-content-center">
    

      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="registration-1.php">Forms</a></li>
          <li class="breadcrumb-item active" aria-current="page">Verification</li>
        </ol>
      </nav>

    </div>


    <div class="col-lg d-flex justify-content-center pt-1 pb-5">




      <div class="card bg-light" style="width: 1000px">
        <div class="card-body">




          <!-- LOGIN     -->
          <h4>Registration</h4>
          Please fill-up the froms.
          <hr>

          <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="row">
            <div class="col-md-6">
            <div class="mb-3">
              <input id="fname" type="text" class="form-control" onkeypress="return /[a-z. ]/i.test(event.key)" placeholder="First name" name="fname" onKeyDown="limitText(this,30);" value="<?php echo $_POST['fname']; ?>"  onKeyUp="limitText(this,30)" required>
            </div>
            </div>
            <div class="col-md-6">
 
              <input id="lname" type="text" class="form-control" onkeypress="return /[a-z. ]/i.test(event.key)" placeholder="Last name" name="lname" onKeyDown="limitText(this,30);" onKeyUp="limitText(this,30)" value="<?php echo $_POST['lname']; ?>" required>
  
            </div>
          </div><br>
          <input type="email" class="form-control check_email" placeholder="Email Address/Example@gmail.com" name="email" value="<?php echo $_POST['email']; ?>" onKeyDown="limitText(this,100);" onKeyUp="limitText(this,100)" required><br>
          <?php if (!empty($msg1)) : ?>
            <div class="alert <?php echo $css_class; ?>">
              <?php echo $msg1; ?>
            </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-md-6">
            <div class="mb-3">
             
      
              
              

              <input type="password" class="form-control mb-3" id="password" placeholder="Password" name="pass"  value="<?php echo $_POST['pass']; ?>"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onKeyDown="limitText(this,30);" onKeyUp="limitText(this,30)" required>
              <div id="msg">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              </div>
              
                            
              <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">+63</span>
  <input id="pass" type="text" class="form-control" onkeypress="return onlyNumberKey(event)" placeholder="Mobile number (e.g. 9951701234 )" name="contact"   value="<?php echo $_POST['contact']; ?>" onKeyDown="limitText(this,10);" onKeyUp="limitText(this,10)" required />
</div>
              
            </div>
   
            

            
            </div>

            
                    <div class="col-md-6">
              <input type="password" class="form-control" id="confirm_password"  value="<?php echo $_POST['repass']; ?>"  placeholder="Re-type Password" name="repass" onKeyDown="limitText(this,30);" onKeyUp="limitText(this,30)" required>
              <span id='message'></span>
            </div>

          </div><br>
          

  


          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label style="padding-right: 20px;" for="birthday">Birthdate: </label>
                <input style="height: 35px;" type="date" id="dob" name="birthdate"  min="1912-12-31" max="2022-12-31" value="<?php echo $_POST['birthdate']; ?>" required>
                <label for="age" style="padding-top: 10px; margin-left: 30px;"><b>Age:</b></label>
                <input style="width: 100px;" type="number" id="age" placeholder="Age" name="clientAge"  value="<?php echo $_POST['clientAge']; ?>" readonly required></input>
              </div>
            </div>
            <div class="col-md-6">
              <label style="padding-right: 20px;">Gender:</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male"
                   <?php  echo ($_POST['gender'] == "Male") ? 'checked' : '' ;?>
                 required>
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female"
                          <?php  echo ($_POST['gender'] == "Female") ? 'checked' : '' ;?>
                 required>
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>

            </div>

          </div><br>
          <div class="row">
          <div class="col-md-6">
            <label for="Address">Address:</label>
            <input type="text" class="form-control" placeholder="Street" value="<?php echo $_POST['street']; ?>" name="street" required>
            <div style="padding-bottom:10px;"></div>
            <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $_POST['city']; ?>" required>
          </div>
          <div class="col-md-6">
          <label></label>
          <input type="text" class="form-control" placeholder="Barangay" name="brgy"  value="<?php echo $_POST['brgy']; ?>" required>
            <div style="padding-bottom:10px;"></div>
            <input type="number" class="form-control" placeholder="Zip Code" name="zip"  value="<?php echo $_POST['zip']; ?>" required>
        </div>
        </div>

<br>




  <div style="float: right;">


    <input type="submit" name="btnNext" value="Next" class="btn btn-success"></input>
    </form>
  </div>
 
  </div>
 

  <script>
    $('#password, #confirm_password').on('keyup', function() {
      if (($('#password').val() || $('#confirm_password').val()) == "") {

      } else if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
      } else
        $('#message').html('Not Matching').css('color', 'red');
    });
  </script>

  </div>
  </div>


  <!-- FOOTER -->

  <?php include 'footer.php';
  ?>
  <script src="showImg.js"></script>
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

  <script type="text/javascript">
    $(document).ready(function() {

      $("#showUserBdate").change(function() {
        var showUserBdate = $(this).val();
        showUserBdate = new Date(showUserBdate);
        var today = new Date();
        var age = Math.floor((today - showUserBdate) / (365.25 * 24 * 60 * 60 * 1000));
        $('#showUserAge').val(age);
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

  <script>
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("msg").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("msg").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
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