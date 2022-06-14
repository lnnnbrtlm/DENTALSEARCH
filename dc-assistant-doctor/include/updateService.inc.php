<?php 
session_start();
include "connection.php";
include "function.php";

$up_serviceid = $_POST['up_serviceid'];
$up_service = $_POST['up_service'];
$up_price = $_POST['up_price'];
$up_description = $_POST['up_description'];

	
// echo $_POST['up_serviceid'];
// echo $_POST['up_service'];
// echo $_POST['up_price'];
// echo $_POST['up_description'];
$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["updateprofileImg"]["name"] );
$extension4=end($temp4);
$profile_img=$_FILES["updateprofileImg"]["name"];
move_uploaded_file($_FILES["updateprofileImg"]["tmp_name"], "profile pictures/".$_FILES["updateprofileImg"]["name"]);

if (empty($profile_img)){
	
	if(updateServiceNoImage($conn,$up_serviceid,$up_service,$up_description,$up_price)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-services.php");
	exit();
}	
}	else { 
if (updateService($conn,$profile_img,$up_serviceid,$up_service,$up_description,$up_price)) {
	$_SESSION['serviceErr'] = "upSuccess";
	header("Location: ../assistant-services.php");
	exit();
}}