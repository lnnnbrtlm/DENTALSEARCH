<?php 

	session_start();
	include 'connection.php';
	include 'function.php';
	date_default_timezone_set('Asia/Manila');


	$date = date('Y-m-d');
	$status = $_POST['stats'];
    $ref_no = $_POST['ref'];
    $pro_id = $_POST['pro_id'];
    $tooth_id = $_POST['tooth_id'];
    
    
    
    if(updateDentalStatProgress($conn,'In Progress',$date, $ref_no, $tooth_id,$pro_id)){
        $_SESSION['adult'] = $ref_no;
        header("Location: ../dental-chart-adult.php");
        exit();
}



    
    ?>