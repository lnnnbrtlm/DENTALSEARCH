

<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout.php");
}
$id = $_GET['id'];
$query = "SELECT * FROM certification WHERE id='$id'";
$result = $conn->query($query);
$resident = $result->fetch_assoc();
$sec = $conn->query($s)->fetch_assoc();

?>
<!DOCTYPE html>
<html>

<head>
  <title>Certificate List</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<?php include "./navbar.php" ?>


  <!-- Page content holder -->


   <!-- Page content holder -->
<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
        class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->
  
    <div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Certificate of Indigency</div>
										<div class="card-tools">
											<button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('content')">
												<i class="fa fa-print"></i>
												Print Certificate
											</button>
										</div>
									</div>
								</div>
    </div>

    <div class="card-body m-5 mw-75" id="content">
    <div class="d-flex flex-wrap justify-content-around" style="border-bottom:1px solid red">
    <div class="text-center">
        <img src="assets/uploads/<?= $city_logo ?>" class="img-fluid" width="100">
    </div>
    <div class="text-center">
        <h3 class="mb-0">Republic of the Philippines</h3>
        <h3 class="mb-0">NCR</h3>
        <h3 class="mb-0"><?= ucwords($town) ?></h3>
        <h1 class="fw-bold mb-0"><?= ucwords($brgy) ?></i></h2>
        <p><i>Mobile No. <?= $number ?></i></p>
    </div>
    <div class="text-center">
        <img src="pdf/examples/images/tooth.jpg" class="img-fluid" width="100">
    </div>
    </div>
    <div class="row mt-2">
    <div class="col-md-12">
        <div class="text-center mt-5">
            <h1 class="mt-4 fw-bold"><u>OFFICE OF THE BARANGAY CAPTAIN</u></h1>
        </div>
        <div class="text-center">
            <h1 class="mt-4 fw-bold mb-5" style="font-size:38px;color:darkblue">CERTIFICATE OF INDIGENCY</h1>
        </div>
        <h2 class="mt-5 fw-bold">TO WHOM IT MAY CONCERN:</h2>
        <h2 class="mt-3" style="text-indent: 40px;">This is to certify that <span class="fw-bold" style="font-size:25px"><?= ucwords($resident['name']) ?></span>, 
        , of legal age, <span class="fw-bold" style="font-size:25px"><?= ucwords($resident['gender']) ?></span>, <span class="fw-bold" style="font-size:25px"><?= ucwords($resident['civilstatus']) ?></span>,
        and Filipino is a resident of <span class="fw-bold" style="font-size:25px"><?= ucwords($brgy) ?></span> and that he/she is one of indigents in our barangay.</h2>
        <h2 class="mt-3" style="text-indent: 40px;">This certification/clearance is hereby issued to the above-named person for whatever legal purpose it may serve him/her best.</h2>
        <h2 class="mt-5">Given this <span class="fw-bold" style="font-size:25px"><?= date('m/d/Y') ?></span> at the office of the Punong Barangay, <span class="fw-bold" style="font-size:25px"><?= ucwords($brgy) ?></span>
        this Municipality, Philippines.</h2>
    </div>
    <div class="col-md-12">
        <div class="p-3 text-right mr-5" style="margin-top:200px">
            <h1 class="fw-bold mb-0 text-uppercase"><?= ucwords($captain['name']) ?></h1>
            <p class="mr-5">PUNONG BARANGAY</p>
        </div>
    </div>
</div>  <!-- End demo content -->

  
    <!--  END CONTENT -->

  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>

<script>
   function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
    </script>