<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REGISTRATION (Step 1) | Dental Clinic</title>

  <link href="stylesheet.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <link rel="style" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
</head>

<body>

  <!-- NAVIGATION -->

<!-- This will appear when client is not logged in -->

<?php // include 'navbar (logged-in).php';
  ?>

  <!-- This will appear when client is logged in -->

  <?php include 'navbar (not logged-in).php';
  ?>

  <!-- HERO -->

  <div class="bgimage1">

    <div class="container py-5">
      <div class="row">
        <div class="col">
          <div class="header">
            <p>Create Account</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container text-center pt-5 pb-2">
    <div style="padding-bottom: 10px;"><img src="img/profile.png" alt="Avatar Logo"
        style="width:150px; background-color: white;" class="rounded-pill"></div>
    <h3>Edcel Jan</h3>
    <p style="font-size: 14px; margin-top: -10px; color: #0D6EFD;"><i class="fas fa-certificate"></i> Verified</p>

  </div>
  <div class="col-lg d-flex justify-content-center">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="registration-1.html">Forms</a></li>
        <li class="breadcrumb-item"><a href="registration-2.html">Questions</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="registration-3.html">Verification</a></li>
      </ol>
    </nav>

  </div>

  <div class="col-lg d-flex justify-content-center pt-1 pb-5">




    <div class="card bg-light" style="width: 1000px">
      <div class="card-body">
        <h4>Verification</h4><hr>
        <div class="container text-center"><h5>Account Verified</h5>


          <a style="float: right;"type="button" href="index.php" class="btn btn-success">Back to Home</a>
        </div>



    </div>
  </div>
  </div>


  <!-- FOOTER -->

  <?php include 'footer.php';
  ?>


</body>

</html>