<?php 

include('session.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ABOUT US | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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

  <?php
  }else{ 
   include 'navbar (not logged-in).php'; 
  }?>

  <!-- HERO -->

  <div class="bgimage-2">

    <div class="container py-5">
            <h1 class="header-1">About Us</h1>
    </div>
  </div>
  


<div class="container-flex filler">
  <div class="container py-5 ">

  <?php
                
                $query1= "SELECT * FROM content WHERE content_id= 1";
                $query_run1=mysqli_query($conn,$query1);    
                while ($row=mysqli_fetch_array($query_run1)) {
                   ?>
                   
  <center><img style="height:200px;" src="img/logo1.png"></center><br>
    <h5 class="title">About Us</h5>
    <h1 class="title-header">Learn more about our clinic</h1><br><br>

    <div class="row">
      <div class="col-md-6 ">
        <img src="img/about-1.jpg" style="width: 600px; float: right;">
      </div>
      <div class="col-md-6">
        <div class="header">
          <p><?php echo $row['aboutus_header']; ?></p>
        </div>
        <div class="header-descripiton" style="color: #1A1A1A;">
          <p><?php echo $row['aboutus_description']; ?></p>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container-fluid technologies-bg1  ">
    <div class="container pt-5 pb-5 technologies ">

      <div class="row ">
        <div class="col-md-4 text-center ">

          <h6 class="card-subtitle mb-2 text-muted">Founded on</h6>
          <h5 style="font-size: 40px; font-weight: bold; color: white;" class="card-title about"><?php echo $row['aboutus_founded']; ?></h5>


        </div>
     
      </div>
    </div>

  </div>


  </div>

  

  <div class="container-fluid ">
    <div class="container py-5 ">


      <h5 class="title">Branches</h5>
      <h1 class="title-header">Check out our other branches</h1><br>

      <div class="container-md ">
      <?php
       $query = "SELECT * FROM tbl_branch";
       $query_run = mysqli_query($conn, $query);
       $show_service = mysqli_num_rows($query_run) > 0;
       if($show_service){
         while($row = mysqli_fetch_assoc($query_run)){
       ?>
        <div class="container bcontent d-flex justify-content-center">
          <div class="card" style="width: 700px;">
            <div class="row no-gutters">
              <div class="col-sm-5">
              <img src="../dc-assistant-doctor/include/profile pictures/<?php echo $row['profile_img']; ?>"   class="card-img-top img-card" alt="...">
              </div>
              <div class="col-sm-7">
                  <h5 class="card-title"><?php echo $row['branch_name']; ?></h5>
                  <p class="card-text"><?php echo $row['branch_address']; ?></p>
   
                </div>
              </div>
            </div>
          </div>
        </div><br>
        
        <?php
       }
    }
      else{
        echo "error";
      }
?>
     

      </div>
      <?php } ?>

    </div>
  </div>




  <!-- FOOTER -->

  <?php include 'footer.php';
  ?>

</body>

</html>