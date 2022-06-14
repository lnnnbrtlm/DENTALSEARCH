<?php 

include('session.php');
if(!isset($_SESSION['login_admin'])){
	header("location: index.php");
}

include('function.php');
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
          <h1 class="header-1">X-Rays</h1>
</div>


</div>


  <div class="container-fluid bg-light "  style="padding-bottom:400px">
    <div class="container">
      <div class="row">

        <div class="mb-4">
          <div class="card-body bg-white mt-4 border border-1">



            <div class="filler">
    <div class="container py-5">
      <div class="row ">
<div class="row">
<?php
$pid = getPatientID($conn,$_SESSION['login_admin']);
$query2 = "SELECT * FROM x_ray WHERE patient_id = '$pid'";
       $query_run2 = mysqli_query($conn, $query2);
      if (mysqli_num_rows($query_run2)){
       while ($row = mysqli_fetch_array($query_run2)){
       ?>
   <div class="col-md-4 mt-4 d-flex justify-content-center">
          <div class="card" style="width: 22rem;">
            <img src="../dc-assistant-doctor/include/profile pictures/<?php echo $row['x_ray']; ?>"   class="card-img-top img-card" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['patient_name']; ?></h5>
              <p class="card-text"><?php echo $row['date']; ?></p>
            </div>
          </div>
        </div>
      <?php
    }} else {
        echo'No record found.';
    
  }
  
?>

  </div>
      <br>

    </div>
  </div>
 
  <!-- Modal -->

</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->

<br><br>
<br>
<br><br>
<br>

<br><br>
<br>  <?php include 'footer.php';
  ?>

</body>

<script>
  function do_sql($sql_string) {
$connection = new PDO("mysql:host=localhost;dbname=secret", 'root', '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $row_result = $connection->query($sql_string);
} catch (PDOException $Exception) {
    echo $sql_string . '</br>';
    echo $Exception;
    exit();
}

return $row_result;
}
  </script>


</html>