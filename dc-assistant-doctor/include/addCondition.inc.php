<?php 
session_start();
include "connection.php";
include "function.php";


$condition = $_POST['condition'];
$legend = $_POST['legend'];




if (addCondition($conn,$condition,$legend)) {
	$_SESSION['serviceErr'] = "addSuccess";
	header("Location: ../assistant-services-condition.php");
	exit();
}
?>