<?php 

	session_start();
	include 'connection.php';
	include 'function.php';
	date_default_timezone_set('Asia/Manila');

	if (isset($_POST['toProgress'])) {
	$date = date('Y-m-d');

	$status = $_POST['stats'];
    $ref_no = $_POST['ref'];
    
    $up = "UPDATE dentalchart SET status = 'In Progress',dentaldate='$date' WHERE ref_no='$ref_no'";
    $result = mysqli_query($conn, $up);
    if($result){
        header("Location: ../dental-chart-adult.php?ref_no=$ref_no#");
        exit();
    }
}

    
    ?>