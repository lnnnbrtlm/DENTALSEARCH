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
  <title>APPOINTMENT | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
  
</head>

<style>
  .name {
    margin-top: -21px;
    font-size: 18px
  }

  .fw-500 {
    font-weight: 500 !important
  }


  .rate {
    border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px
  }

  .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
  }

  .rating>input {
    display: none
  }

  .rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
  }

  .rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
  }

  .rating>label:hover:before,
  .rating>label:hover~label:before {
    opacity: 1 !important
  }

  .rating>input:checked~label:before {
    opacity: 1
  }

  .rating:hover>input:checked~label:before {
    opacity: 0.4
  }

  .buttons {
    top: 6px;
    position: relative
  }

  .rating-submit {
    border-radius: 15px;
    color: #fff;
    height: 49px
  }

  .rating-submit:hover {
    color: #fff
  }
</style>

<body>

  <!-- NAVIGATION -->

  <!-- This will appear when client is not logged in -->

  <?php include 'navbar (logged-in).php';
  ?>

  <!-- This will appear when client is logged in -->

  <?php // include 'navbar (not logged-in).php';
  ?>

  <!-- HERO -->

  <div class="bgimage-5">


  <div class="container py-5">
            <h1 class="header-1">Records</h1>
  </div>


  </div>



  <div class="container-fluid bg-light">
    <div class="container">
      <div class="row">

        <div class="mb-4">
          <div class="card-body bg-white mt-4 border border-1">

            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="records-appointments.php">Appointments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="records-payment.php">Payment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="records-x-ray.php">X-Rays</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="records-cancelled.php">Cancelled</a>
              </li>

            </ul><br>


            <div class="container text-center ">
              <h3>Cancelled Appointments</h3>
              <hr>
              <table class="table table-striped table-hover bg-light">
                <thead class="bg-primary" style="color: white;">
                  <tr>
                    <th scope="col">APT ID</th>
                    <th scope="col">Service</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $email = $_SESSION['login_admin'];
                  $query1= "SELECT `service_name`,`appointment_datentime`,`doctor_name`,`branch`,`status` FROM appointments FULL OUTER JOIN pending_appointments WHERE appointments.email=pending_appointments.email AND appointments.email='$email'";
            
                  $query1 = "SELECT * FROM pending_appointments WHERE email='$email'";
                  $query_run1 = mysqli_query($conn, $query1);
                  if (!$query_run1) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                  } else {
                    while ($row1 = mysqli_fetch_array($query_run1)) {
                  ?>
                      <tr>
                        <th scope="row">APT00<?php echo $row1['id']; ?></th>
                        <td><?php echo $row1['service_name']; ?></td>
                        <td><?php echo $row1['appointment_datentime']; ?></td>
                        <td><?php echo $row1['appointment_datentime']; ?></td>
                        <td><?php echo $row1['doctor_name']; ?></td>
                        <td><?php echo $row1['branch']; ?></td>
                        <td><span class="badge bg-secondary"><?php echo $row1['status']; ?></span></td>
                        <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cancel"><i class="fas fa-minus-circle"></i></button>

                          <!-- feedback button -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedback">FEEDBACK</button>
                          <!-- feedback button -->

                        </td>
                      </tr>


                  <?php }
                  }

                  $query2 = "SELECT * FROM appointments WHERE email='$email'";
                  $query_run2 = mysqli_query($conn, $query2);
                  if (!$query_run2) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                  } else {
                    while ($row2 = mysqli_fetch_array($query_run2)) {
                  ?>
                      <tr>
                        <th scope="row">APT00<?php echo $row2['appointment_refno'];?></th>
                        <td><?php echo $row2['service_name']; ?></td>
                        <td><?php echo $row2['appointment_datentime']; ?></td>
                        <td><?php echo $row2['appointment_datentime']; ?></td>
                        <td><?php echo $row2['doctor_name']; ?></td>
                        <td><?php echo $row2['branch']; ?></td>
                        <td><span class="badge bg-primary"><?php echo $row2['status']; ?></span></td>
                        <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cancel"><i class="fas fa-minus-circle"></i></button>

                          <!-- feedback button -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedback">FEEDBACK</button>
                          <!-- feedback button -->

                        </td>
                      </tr>


                  <?php }
                  } ?>
                </tbody>
              </table>

              


              </div>

            </div>

          </div>
        </div>






      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cancel Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-muted">Are you sure you want to cancel the appointment?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          <a type="button" class="btn btn-primary">Yes</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Feedback!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container text-center pt-2 pb-2">
            <div style="padding-bottom: 10px;"><img src="profile pictures/4 - fbi hasbulla.jpg" alt="Avatar Logo" style="width:150px; height:150px; object-fit: scale-down; background-color: white;" class="rounded-pill"></div>
            <span class="name mb-1 fw-500">Dr. Ace Tata</span><br>
            <b><small class="text-truncate ml-2">Clinic :</small></b><br>
            <small class="text-truncate ml-2">Derder Dental Clinic</small>

            <div class="location mt-4"> <span class="d-block">
                <b><small class="text-truncate ml-2">Service Type:</small></b> </span>


              <span><small class="text-truncate ml-2">Porcelain Veneers</small> </span><br>

              <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Feedback:</label>
              </div>

              <div class="rate bg-success py-3 text-white mt-3">
                <h6 class="mb-0">Rate your service</h6>
                <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div>
                <div class="buttons px-4 mt-0"> <button class="btn btn-warning btn-block rating-submit">Submit</button> </div>


              </div>

            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        </div>
      </div>
    </div>
  </div>




  <!-- FOOTER -->


  <?php include 'footer.php';
  ?>


</body>

</html>