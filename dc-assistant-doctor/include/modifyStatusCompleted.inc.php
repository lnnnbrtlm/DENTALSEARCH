<?php 

	session_start();
	include 'connection.php';
	include 'function.php';
	date_default_timezone_set('Asia/Manila');

    
	$date = date('Y-m-d');
	$date1 = date('Y-m-d');

	$status = $_POST['stats1'];
    $ref_no = $_POST['ref1'];
    $pro_id = $_POST['pro_id1'];
    $tooth_id = $_POST['tooth_id'];
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $dname = $_POST['dname'];
    $sname = $_POST['sname'];
    
    $branch = getBranch($conn,$_SESSION['login_admin1']);
    $price = getProPrice($conn, $sname);


 
     $sql = "UPDATE dentalchart SET status = 'Completed',dentaldate= '$date' WHERE procedure_id= '$pro_id' AND tooth_id = '$tooth_id'";
     $result = mysqli_multi_query($conn,$sql);


    if($result){
        header("location: ../dental-chart-adult.php");
        exit();
    }
  
    ?>