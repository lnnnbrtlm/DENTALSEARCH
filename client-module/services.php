<?php 
include('conn.php');
include('session.php');
include('function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SERVICES | Dental Clinic</title>

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

        <?php 
          if(isset($_SESSION['login_admin'])){
        include 'navbar (logged-in).php'; 
          ?>

        <!-- This will appear when client is logged in -->

        <?php }else{
          include 'navbar (not logged-in).php'; 
        }?>

  <!-- HERO -->

  <div class="bgimage-1">
  <div class="container py-5">
    <h1 class="header-1">Services</h1>
  </div>
  </div>
  
  <div class="filler">
    <div class="container py-5">
      <div class="row ">
      <?php
       $query = "SELECT * FROM services";
       $query_run = mysqli_query($conn, $query);
       $show_service = mysqli_num_rows($query_run) > 0;
       if($show_service){
         while($row = mysqli_fetch_assoc($query_run)){
       ?>
      <div class="col-md-4 mt-4 d-flex justify-content-center">
          <div class="card" style="width: 22rem;">
            <img src="../dc-assistant-doctor/include/profile pictures/<?php echo $row['profile_img']; ?>"   class="card-img-top img-card" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['service_name']; ?></h5>
              <p class="card-text"><?php echo $row['service_des']; ?></p>
            </div>
          </div>
        </div>
      <?php
       }
    }
      else{
        echo "error";
      }
?>

      </div>
      <br>

    </div>
  </div>

  <!-- FOOTER -->

  <?php  include 'footer.php'; 
        ?>

</body>

</html>