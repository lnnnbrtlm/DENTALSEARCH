<?php

?>

<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}
/*
$id = $_GET['id'];
$query = "SELECT * FROM certification WHERE id='$id'";
$result = $conn->query($query);
$resident = $result->fetch_assoc();
*/
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
  <style>

* {
  box-sizing: border-box;
}

.row {
  display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
  flex: 50%;
  padding: 10px;
  
  

  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}

</style>
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
										<div class="card-title"></div>
										<div class="card-tools">
											<button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('content')">
												<i class="fa fa-print"></i>
												Print Bill
											</button>
										</div>
									</div>
								</div>
    </div>

   <!-- Page content holder -->
<div style="margin-top: 5rem; background: none no-repeat scroll 0 0 #fff;" id="content">
   

    <!-- CONTENT -->
  
    

    <div class="d-flex flex-wrap ">
                                        
                  <div class="d-flex flex-wrap justify-content-around" >
                                        <div style=""class="text-center">
                                        <img src="pdf/examples/images/tooth.jpg" class="img-fluid" height="400" width="400">
										</div>
										<div style="padding-top: 4rem;  padding-right: 3rem;" class="text-center">
                    <h2 class="mb-0">Dr. Sample Dental Clinic</h2>
                                            <h5 class="mb-0">dr.sample@gmail.com</h5>
                                            <h5 class="mb-0">location</h5>
                                            <h5 class="mb-0">0989786789</h5>
										</div>
                                        <div style="padding-left: 2rem; padding-top: 2rem;"class="text-center">
                                        <img src="pdf/examples/images/cdt.jpg" class="img-fluid" height="180" width="180">
										</div>
									</div>

    <div class="card-body m-5 mw-75" id="content">
    <div class="d-flex flex-wrap justify-content-around" style="border-bottom:1px">

    
    

    </div>
    <div class="row mt-2">
    <div class="col-md-12">
        <div class="text-center mt-2">
            <h1 class="mt-4 fw-bold" >BILLING INVOICE</h1>
        </div>
<hr style="border: solid; "></hr>

<div class="row">
  <div class="column" style="">
  <div class="card border-0" style="width: 20rem; padding-bottom: 4rem;">

  <div class="card-block" style="padding-top: 1rem;"> 
        <h5 class="card-text">
            Patient 
        </h5>
        </div> 

  <div class="card-block" style="padding-top: 1rem;"> 
        <h5 class="card-text">
        Patient Address 
        </h5>
        </div> 
        
        <div class="card-block" style="padding-top: 1rem;">
        <h5 class="card-text">
        Patient Email 
        </h5>
        </div>

        <div class="card-block" style="padding-top: 1rem;">
        <h5 class="card-text">
        Patient Contact No. 
        </h5>
    </div>

</div>
  </div>


  <div class="column" >
  <div class="card border-0" style="width: 20rem;">

<div class="card-block" style="padding-top: 1rem;"> 
      <h5 class="card-text">
          Date 
      </h5>
      </div> 

<div class="card-block" style="padding-top: 1rem;"> 
      <h5 class="card-text">
          Invoice #
      </h5>
      </div> 
      
      

</div>
  </div>
</div>

<div class="card-block" style=" padding-bottom: 1rem;"> 
      <h5 class="card-text">
        Billing Information
      </h5>
</div> 

<div style="overflow-x:auto;">
      <table  class="table table-striped table-bordered">
          <thead>
            <tr style="font-weight: 700;">
            <td>Service Avail</td>
            <td>Doctor</td>
            <td>Amount</td>
            
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
</div>

<div class="card-block" style="padding-top: 2rem;"> 
      <h5 class="card-text">
        Total Amount:
      </h5>
</div> 
<div class="card-block" style="padding-top: 2rem;"> 
      <h5 class="card-text">
        Mode of Payment:
      </h5>
</div> 
    
    <div style="float: right; margin-top: 5rem;">
    <p>___________________________</p>

  <div style="float: right; padding-right: 20px;">
    <p><b>Doctor's Signature</b></p>
</div>
  </div>
</div>  <!-- End demo content -->

  
    <!--  END CONTENT -->
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