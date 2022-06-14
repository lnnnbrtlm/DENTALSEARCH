<?php 
session_start();
include "connection.php";
include "function.php";

$patient_id = $_POST['patient_id'];
$patient_name = $_POST['patient_name'];
$date = $_POST['time_n_date'];
$email = $_POST['xemail'];
$clinic_id = $_POST['clinic_id3'];

$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["profileImg"]["name"] );
$extension4=end($temp4);
$x_ray=$_FILES["profileImg"]["name"];
move_uploaded_file($_FILES["profileImg"]["tmp_name"], "profile pictures/".$_FILES["profileImg"]["name"]);


if (addXray($conn,$patient_id,$patient_name,$email,$x_ray,$date,$clinic_id)) {
	$_SESSION['patientErr'] = "addSuccess";
	header("Location: ../assistant-patient_list.php");
	exit();
}

?>

