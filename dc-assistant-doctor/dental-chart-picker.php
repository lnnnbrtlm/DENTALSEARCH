<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Chart | Adult</title>
    <link rel="stylesheet" href="dental-chart.css">
    <link rel="icon" href="img/tooth.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid d-flex justify-content-around">
            <a href="assistant-appointment_list.php" style="text-decoration: none; color: white;"><i
                    class="fas fa-angle-left "></i> Back</a>
        </div>
        <div class="container-fluid d-flex justify-content-center">

            <img style="height:50px; padding-right: 10px;" src="img/logo-1.png">

            <span class="logo">Dental <span style="color:#2666cf;">Clinic</span>

        </div>
        <div class="container-fluid  d-flex justify-content-around">
            <a href="#" style="text-decoration: none; color: white;">Reset</a>
        </div>

    </nav>


    <div class="bgimage1 py-5">
        <h2 style="text-align: center; color: white;"><i class="fas fa-teeth-open"></i> Pick Dental Chart</h2>
    </div>
<div class="container-flex bg-color">
    <div class="container d-flex justify-content-center bg-color text-center py-5">

    
<div class="row">
    <div class="col">
        <div class="card" style="width:500px;">
            <div class="card-body">

            <legend style="font-weight: bold;">Choose a dental chart:</legend>
            <hr>
            <div class="mb-3">
                <form method="post" action="dental-chart-adult.php">
            <input type="hidden" name="ref_no" id="inchair_refno2" value="<?php echo $_POST['ref_no']; ?>">
                <input type="hidden" name="dinchair_patientname" id="finchair_patientname" value="<?php echo $_POST['dinchair_patientname']; ?>">
                <input type="hidden" name="dinchair_email" id="finchair_email" value="<?php echo $_POST['dinchair_email']; ?>">
                <input type="hidden" name="dinchair_service" id="finchair_service" value="<?php echo $_POST['dinchair_service']; ?>">
                <input type="hidden" name="dinchair_doctor" id="finchair_doctor" value="<?php echo $_POST['dinchair_doctor']; ?>">
                <input type="hidden" name="dinchair_branch" id="finchair_branch" value="<?php echo $_POST['dinchair_branch']; ?>">
                <input type="hidden" name="dinchair_note" id="finchair_note" value="<?php echo $_POST['dinchair_note']; ?>">
            <button type="submit" class="btn btn-primary btn-lg" name="adult">Adult</button>
</form>
</div>
            <form method="post" action="dental-chart-child.php">
            <input type="hidden" name="ref_no" id="inchair_refno2" value="<?php echo $_POST['ref_no']; ?>">
                <input type="hidden" name="dinchair_patientname" id="finchair_patientname" value="<?php echo $_POST['dinchair_patientname']; ?>">
                <input type="hidden" name="dinchair_email" id="finchair_email" value="<?php echo $_POST['dinchair_email']; ?>">
                <input type="hidden" name="dinchair_service" id="finchair_service" value="<?php echo $_POST['dinchair_service']; ?>">
                <input type="hidden" name="dinchair_doctor" id="finchair_doctor" value="<?php echo $_POST['dinchair_doctor']; ?>">
                <input type="hidden" name="dinchair_branch" id="finchair_branch" value="<?php echo $_POST['dinchair_branch']; ?>">
                <input type="hidden" name="dinchair_note" id="finchair_note" value="<?php echo $_POST['dinchair_note']; ?>">
            <button type="submit" class="btn btn-primary btn-lg" name="child">Child</button>
</form></div></div>


            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>

</div>


    <footer>
        <center>
            <h3 style="color: white;">DENTAL CLINIC</h3>
            <p style="color: white;">Current Date and Time is <span id='date-time'></span>.</p>
        </center>
    </footer>

  



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="dental-chart.js"></script>
</body>





</html>