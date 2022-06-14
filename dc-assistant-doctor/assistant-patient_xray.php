<?php
include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");


}
$clinic = $_SESSION['clinic'];
?>

<?php 
  $date = date('F d, Y');
  $date1 = date('Y-m-d');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Patient List | Patient</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="stylesheet-new.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!--data tables-->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  <!--data tables js-->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<style>
img:hover   {
    width: 125px;
        height: 125px;
        display: block;
        position: relative;
        justify-content: center;
        transform: scale(2.5);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 9999;
        
        
}

    </style>
</head>

<body>

  <?php
  include "./navbar.php";
  include "include/connection.php";
  include "include/function.php";

  
        //====================DELETE SERVICES======================================
        if (isset($_POST['deletesubmit'])){
          $status = inactivePatient($conn,$_POST['deletePatient']);
          }
  ?>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->



    <div>
      <h1 style="color: white;"><i class="fas fa-user mr-3"></i>Patient</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        
        <li class="nav-item">
          <a class="nav-link  " href="assistant-patient_list.php">Patient List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="assistant-patient-dental.php">Patients' Dental Charts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" href="assistant-patient_xray.php">Patient X-ray</a>
        </li>
      </ul><br>
      <!-- MESSAGE  -->
     

      <br>

      

     

      <!------------------------------------   START OF APPOINTMENT CARDS CODE ----------------------------------->

    <div class="container">
      <div class="row">


        <?php
        showXray($conn,$clinic);
        ?>
      </div>
    </div>

    

          
            


  </div>


  <!-- End demo content -->
</body>

</html>

