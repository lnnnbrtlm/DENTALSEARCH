<?php
include('conn.php');
include('session.php');
include('function.php');
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
  <title>APPOINTMENT | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>


  <script src="script.js"></script>
<style>
  iframe{
    height: 500px;
    width: 1400px;
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

  <div class="bgimage-3">

    <div class="container py-5">

      <h1 class="header-1">Request Appointment</h1>

    </div>
  </div>


  <!-- <div class="container">
<h1 class="title-header ">Pick your preferred date</h1>
<p style="text-align: center;">Select your preferred date to appoint. This will be the basis of your appointment and the clinic will assigned you time. Your final appointment will be updated through sms/email or check your records tab on your "Profile" page.</p>
</div> -->

  <div class="container py-3">
  

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Step 1 (Choose Branch)</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Step 2 (Medical Background)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Step 3 (Choose Date)</a>
      </li>
    </ul>
    <br>
    <!-- MESSAGE  -->
    <?php

    if (isset($_SESSION['patientErr'])) {

      if ($_SESSION['patientErr'] == "addSuccess") {
        echo '
                    <div class="alert alert-primary alert-dismissible">
                      <strong>Success!</strong> Patient Added.
                    </div>
                  ';
        $_SESSION['patientErr'] = "";
      }
      if ($_SESSION['patientErr'] == "FullyBooked") {
        echo '
                    <div class="alert alert-danger alert-dismissible" width="200px">
                      <strong>Failed!</strong> The requested date is already Fully Booked.
                    </div>
                  ';
        $_SESSION[  'patientErr'] = "";
      }
    }
    ?>




    <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane container active" id="home">
          <div class="container-responsive">
            <h1 class="title-header ">Pick your preferred Clinic</h1>
            <p style="text-align: center;">Select your preferred branch to book an apointment.</p>
            <?php
	if (isset($_POST["submit_address"]))
	{
    
		$address = $_POST["address"];
		$address = str_replace(" ", "+", $address);
		?>

		<iframe width="600" height="450" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>

		<?php
	}else{ ?>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7717.55276161661!2d121.025141!3d14.725231!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b106fa410e77%3A0xbf854af9c93669ef!2s49%20St%20Vincent%20St%2C%20Novaliches%2C%20Quezon%20City%2C%20Metro%20Manila%2C%20Philippines!5e0!3m2!1sen!2sus!4v1648608456217!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 <?php }
?>

<form method="POST" action="appointment.php">
	<p>
		<select id="address" name="address">
            <?php
            showBranchesDD($conn);
            ?>
           </select> 
	</p>

	<input type="submit" name="submit_address" value="Locate">
</form>
<form method="POST" action="addQuestions.php">
  <div style="text-align: center;">
  <strong> Select Branch: </strong>
		<select id="selectedBranch" name="selected_branch">
        <?php
            showBranchesDDN($conn);
            ?>
          </select>
</div>  
  </div>
        </div>
        <div class="tab-pane container fade" id="menu1">
          <div class="container-responsive">
        <h1 class="title-header">Questions</h1>
        <p style=" text-align: center;">Please answer all the questions. This will appear once after you answer all the
            questions.</p>
          </div>




          <div class="container-responsive">
            <?php include 'questions.php'; ?>


          </div>

        </div>
        <div class="tab-pane container fade" id="menu2">



          <h1 class="title-header ">Appointment</h1>
          <p style="text-align: center;">Please fill-up the forms.</p>
          <small class="text-warning">Note: Cancelling appointment can't be done 3 hours before the destined schedule.</small>
          <hr>



          <label for="date">Preferred Date:</label>
          <input style="height: 35px;" type="date" id="dob" name="birthdate" required>
          <div class="input-group mt-5 mb-3">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Service</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="service">
                <option selected disabled>Select Service..</option>
                <?php showServiceDDD($conn); ?>
              </select>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Doctor</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="doctor">
              <option selected disabled>Select Doctor..</option>
              <?php showDoctorDDD($conn); ?>
            </select>
          </div>



          <label for="note" style="margin-top: 20px;" class="form-label">Note:</label>
          <textarea class="form-control" style='margin-bottom: 10px;' id="note" name="note" rows="3"></textarea>

          <br><button style="float: right;" name="send_request" type="submit" class="btn btn-success">Send Request</button>

          <br>

    </form>
  </div>

  </div>

  <br>
  </div>
  </div>
  </div>
  </div>

  <br>
  <br>


  <!-- FOOTER -->

  <?php include 'footer.php';
  ?>

</body>
<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#dob').attr('min',today);
    </script>
</html>