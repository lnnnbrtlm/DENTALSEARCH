<?php 
session_start();
include "connection.php";
include "function.php";

$up_doctorid = $_POST['up_doctorid'];
$upfullname = $_POST['upfullname'];
	
$allowedExts4=array("jpeg","png");
$temp4=explode(".",$_FILES["updateprofileImg"]["name"] );
$extension4=end($temp4);
$profile_img=$_FILES["updateprofileImg"]["name"];
move_uploaded_file($_FILES["updateprofileImg"]["tmp_name"], "profile pictures/".$_FILES["updateprofileImg"]["name"]);

if (empty($profile_img)){
	
if(updateDoctorNoImage($conn,$up_doctorid,$upfullname)){
	$_SESSION['patientErr'] = "addSuccess1";
	header("Location: ../assistant-doctors.php");
	exit();
}	
}	else { 
if (updateDoctor($conn,$profile_img,$up_doctorid,$upfullname)) {
	$_SESSION['patientErr'] = "addSuccess1";
	header("Location: ../assistant-doctors.php");
	exit();
}}