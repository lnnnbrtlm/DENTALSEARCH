<?php 

	session_start();
	include 'connection.php';
	include 'function.php';
	date_default_timezone_set('Asia/Manila');

	$status = $_POST['fbill_status'];
    $id = $_POST['fbill_id'];
    $date = $_POST['fbill_datentime'];
    $mop = $_POST['bill_mop'];
    
    
    if(modifyBill($conn,'Paid',$date,$mop,$id)){
        
        header("Location: ../assistant-billing_appointments.php");
        exit();
} else {
    echo 'Error';
}



    
    ?>

