<?php 
session_start();
include "connection.php";
include "function.php";

$fullname = $_POST['doctorfname']." ".$_POST['doctorlname'];
$clinic = $_POST['clinic'];



$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["profileImg"]["name"] );
$extension4=end($temp4);
$upload_pdf4=$_FILES["profileImg"]["name"];
move_uploaded_file($_FILES["profileImg"]["tmp_name"], "profile pictures/".$_FILES["profileImg"]["name"]);


if (addDoctor($conn,$upload_pdf4,$fullname,$clinic)) {
	$_SESSION['patientErr'] = "addSuccess";
	header("Location: ../assistant-doctors.php");
	exit();
}
?>