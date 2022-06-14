<?php
include 'function.php';
include 'connection.php';


  if (isset($_POST['toCancel'])) {
	
    $cancel_refno = $_POST['cancel'];
    $date =  date("Y-m-d H:i:s");
    if (updateCancel($conn, $cancel_refno,$date, "Cancelled")) {
        //$_SESSION['pendingApptErr'] = "confirmSuccess";
        header("Location: records-appointments.php");
        exit();
    }
}
?>