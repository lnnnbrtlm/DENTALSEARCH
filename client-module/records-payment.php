<?php 

include('session.php');
if(!isset($_SESSION['login_admin'])){
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
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
                <a class="nav-link" aria-current="page" href="records-appointments.php">Appointments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="records-payment.php">Payment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="records-x-ray.php">X-Rays</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="records-cancelled.php">Cancelled</a>
              </li>

            </ul><br>

            <div class="container text-center">
              <h3>Payment History</h3>
              <hr>
              <div class="table-responsive">
              <table class="table table-striped table-hover bg-light">
                <thead class="bg-primary" style="color: white;">
                  <tr>
                    <th scope="col">APT ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Service</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Branch</th>
                    <th scope="col">MOP</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">APT001</th>
                    <td>Mark</td>
                    <td>Cleaning</td>
                    <td>01/26/2022</td>
                    <td>P1000</td>
                    <td>Dr. Mae Nery</td>
                    <td>Quezon City</td>
                    <td>Cash</td>
                    <td><span class="badge bg-success">Paid</span></td>
                  </tr>

                  

                </tbody>
              </table>

             


              </div>
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




  <!-- FOOTER -->


  <?php include 'footer.php';
  ?>

</body>

</html>