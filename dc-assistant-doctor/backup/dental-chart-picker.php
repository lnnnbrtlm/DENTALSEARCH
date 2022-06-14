<?php


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/tooth.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Chart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dental.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
</head>
<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid d-flex justify-content-around">
            <a href="assistant-appointment_list.php" style="text-decoration: none; color: white;"><i
                    class="fas fa-long-arrow-alt-left fa-2x"></i></a>
        </div>
        <div class="container-fluid  d-flex justify-content-around">
            <h2 style="color: white;">Dental Chart</h2>
        </div>
        <div class="container-fluid  d-flex justify-content-around">
           
        </div>

    </nav>

    <div class="container py-5 d-flex justify-content-center">

        <div class="card " style="width: 40rem;">
            <div class="card-body p-5">
              <center><h5 class="card-title">Choose Dental Chart Type</h5></center><br>

              <div class="row">
                <div class="col-6">
                    <center><img style="width: 200px;" src="img/1.png"><br><br>
                        <a href="dental-chart-adult.php?ref_no=<?php echo $_GET['ref_no']; ?>" class="btn btn-primary">Adult</a></center>

                </div>
                <div class="col-6">
                <center><img style="width: 240px;" src="img/2.png"><br><br>
                    <a href="dental-chart-child.php?ref_no=<?php echo $_GET['ref_no']; ?>" class="btn btn-primary">Child</a></center>
                </div>
            </div>
            </div>
          </div>

    </div>

    <!-- END NAVBAR -->
    
</body>
</html>