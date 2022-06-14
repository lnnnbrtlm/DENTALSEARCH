<!-- NAVIGATION -->
<?php
include 'connection.php';

$query1 = "SELECT * FROM control_panel WHERE panel_id= '1'";
$query_run1 = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_array($query_run1)) {
?>

  <nav class="navbar navbar-expand-lg navbar-dark py-3 px-5 bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">

        <span class="text-light logo-nav">DENTAL<span style=color:#fd9f35;">SEARCH</span></span></a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php#about">About</a>
          </li>
          
           <li class="nav-item">
            <a class="nav-link" href="index.php#team">Our Team</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php#contacts">Contact</a>
          </li>


        </ul>

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index-login.php"><button type="button" class="btn btn-primary">Login</button></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="registration-1-dentalclinic.php"><button type="button" class="btn btn-outline-info">Register As Dental Clinic</button></a>
          </li>

          

        </ul>

      </div>
    </div>
  </nav>

  <!-- END NAVIGATION -->



<?php } ?>