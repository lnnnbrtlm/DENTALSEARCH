<?php 
session_start();
include "connection.php";
include "function.php";


$address = $_POST['address'];
$name = $_POST['name'];


$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["profileImg"]["name"] );
$extension4=end($temp4);
$upload_pdf4=$_FILES["profileImg"]["name"];
move_uploaded_file($_FILES["profileImg"]["tmp_name"], "profile pictures/".$_FILES["profileImg"]["name"]);


if (addBranch($conn,$upload_pdf4,$name,$address,'ACTIVE')) {
	$_SESSION['serviceErr'] = "addSuccess";
	header("Location: ../assistant-customize-branches.php");
	exit();
}