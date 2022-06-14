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
        <img style="width:50px;" src="../dc-assistant-doctor/include/profile pictures/<?php echo $row['clinic_logo']; ?>">
        <span class="text-light mx-1 logo-nav"><?php echo $row['clinic_name']; ?></span></a>


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav">
          <li class="nav-item my-2 me-2">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item my-2 me-2">
            <a href="index-login.php"><button type="button" class="btn btn-outline-primary">Register Clinic</button></a>

          </li>
          <li class="nav-item my-2">
            <a href="index-login.php"><button type="button" class="btn btn-primary rounded">Login</button></a>
          </li>

        </ul>




      </div>
    </div>
  </nav>

  <!-- END NAVIGATION -->



<?php } ?>