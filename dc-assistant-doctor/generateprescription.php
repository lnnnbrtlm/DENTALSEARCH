

<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}
$prescription_id = $_GET['id'];
$query = "SELECT * FROM prescription_list WHERE prescription_id='$prescription_id'";
$result = $conn->query($query);
$resident = $result->fetch_assoc();

$query1 = "SELECT * FROM patient_record JOIN prescription_list ON patient_record.fullname=prescription_list.patient_name WHERE prescription_list.prescription_id='$prescription_id'";
$result1 = $conn->query($query1);
$resident1 = $result1->fetch_assoc();

date_default_timezone_set("Asia/Manila");
date_default_timezone_get();

$date = date('F d, Y');
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
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<?php include "./navbar.php" ?>

<div class="page-content p-5" id="main">
   <!-- Toggle button -->
   <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
        class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
  
  
        <!-- Page content holder -->
  <div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Prescription</div>
										<div class="card-tools">
											<button class="btn btn-danger btn-border btn-round btn-sm" onclick="printDiv('content')">
												<i class="fa fa-print"></i>
												Print Prescription
											</button>
										</div>
									</div>
								</div>
    </div>

   <!-- Page content holder -->
   <div id="content">

<div style="margin-top: 5rem; background: none no-repeat scroll 0 0 #fff;" id="main">
   

    <!-- CONTENT -->
  
    
    <div class="d-flex flex-wrap " >
                                        
                  <div class="d-flex flex-wrap justify-content-around" >
                                        <div style=""class="text-center">
                                        <img src="pdf/examples/images/tooth.jpg" class="img-fluid" height="400" width="400">
										</div>
										<div style="padding-top: 4rem;  padding-right: 1rem;" class="text-center">
                    <h2 class="mb-0">Dr. Sample Dental Clinic</h2>
                                            <h5 class="mb-0">dr.sample@gmail.com</h5>
                                            <h5 class="mb-0">location</h5>
                                            <h5 class="mb-0">0989786789</h5>
										</div>
                                        <div style="padding-left: 1rem; padding-top: 2rem;"class="text-center">
                                        <img src="pdf/examples/images/cdt.jpg" class="img-fluid" height="180" width="180">
										</div>
									</div>

    <div class="card-body m-5 mw-75" >
    <div class="d-flex flex-wrap justify-content-around" style="border-bottom:1px">

    
    

    </div>
    <div class="row mt-2">
    <div class="col-md-12">
        <div class="text-center mt-2">
            <h1 class="mt-4 fw-bold">DENTAL PRESCRIPTION </h1>
        </div>
<hr style="border: solid;"></hr>

        <h4 class="mt-3" style="text-indent: 40px; line-height: 35px; margin-bottom: 15px;">Patient Name: <U><B><span class="fw-bold" style="font-size:30px font-style: bold;"><?= ucwords($resident['patient_name']) ?></span></B></U>, 
        <span class="fw-bold" style="font-size:25px; float: right;"> Age: <U><B style="margin-right:40px;"><?= ucwords($resident1['age']) ?></u></b>Gender: <U><B><?= ucwords($resident1['gender']) ?></u></b></span></U></b></h4>
        <h4 class="mt-3" style="text-indent: 40px; line-height: 35px; margin-bottom: 30px;">Address: <u><b><span class="fw-bold" style="font-size:25px"><?= ucwords($resident1['address']) ?></span></U></B>
        <span class="fw-bold" style="font-size:25px; float: right;">Date: <u><b><?= ucwords($date) ?></span></u></b></h4>,
    <div> 
    <img src="include/TCPDF-main/examples/images/rx.jpg" width="200px">

    </div>

    <div>
      <table  class="table table-striped table-bordered">
          <thead>
            <tr style="font-weight: 700;">
            <td>Medicine</td>
            <td>Dosage</td>
            <td>Dose</td>

</tr>
        </thead>
        <tbody>
            <tr>
                
            <td><?= ucwords($resident['meds']) ?></td>
            <td><?= ucwords($resident['dosage']) ?></td>
            <td><?= ucwords($resident['frequency']) ?></td>
        
</tr>
</tbody>
</table>

<div>
<h4 class="mt-3" style="text-indent: 40px; line-height: 35px; padding-top: 10rem;"><b>Note: </h4>
<h4 class="mt-3" style="text-indent: 40px; line-height: 35px; margin-left: 10px;"><u><?= ucwords($resident['note']) ?></u></b></span>
</div>

</div>
    
        <div style="float: right; margin-top: 10rem;">
    <p><u>_________________</u></p>

  <div style="float: right; padding-right: 20px;">
    <p><b>Doctor's Signature</b></p>
</div>
  </div>
</div>  <!-- End demo content -->

  
    <!--  END CONTENT -->
</div>
  </div>
</div>
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