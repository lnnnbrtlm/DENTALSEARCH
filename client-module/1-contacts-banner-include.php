<?php
include 'connection.php';

$query1 = "SELECT * FROM control_panel WHERE panel_id= '1'";
$query_run1 = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_array($query_run1)) {
?>

<div class="container-fluid text-white" style="background-color:#0d6efd;">

    <div class="row d-flex justify-content-evenly text-center">
      <div class="col-md-4 col-lg-4 col-xl-3 py-3 text-md-end">
        <i class="fas fa-phone-alt fa-lg"></i><span style="padding-left: 10px;"><?php echo $row['clinic_contact']; ?></span>
      </div>
      <div class="col-md-4 col-lg-4 col-xl-2 py-3">
        <i class="fas fa-calendar fa-lg "></i><span style="padding-left: 10px;"><?php echo $row['start_day']; ?> - <?php echo $row['end_day']; ?> <br>(<?php echo date("g:i a", strtotime($row['start_time'])); ?> -
        <?php echo date("g:i a", strtotime($row['end_time']));  ?>)</span>
      </div>
      <div class="col-md-4 col-lg-4 col-xl-3 py-3 text-md-start">
        <i class="fas fa-envelope fa-lg"></i><span style="padding-left: 10px;"><?php echo $row['clinic_email']; ?></span>
      </div>
    </div>
  </div> 

  
<?php } ?>