<?php 
session_start();
include "connection.php";
include "function.php";

$clinic = $_POST['clinic'];
$service = $_POST['service'];
$description = $_POST['description'];
$price = $_POST['price'];
$status = 'ACTIVE';

$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["profileImg"]["name"] );
$extension4=end($temp4);
$upload_pdf4=$_FILES["profileImg"]["name"];
move_uploaded_file($_FILES["profileImg"]["tmp_name"], "profile pictures/".$_FILES["profileImg"]["name"]);


if (addService($conn,$clinic,$upload_pdf4,$service,$description,$price,$status)) {
	$_SESSION['serviceErr'] = "addSuccess";
	header("Location: ../assistant-services.php");
	exit();
}
?>