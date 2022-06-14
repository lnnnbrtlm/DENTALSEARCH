<?php 
session_start();
include 'connection.php';
include 'function.php';

$up_condition = $_POST['up_condition'];
$up_legend = $_POST['up_legend'];
$up_id = $_POST['up_id'];



if(updateCondition($conn,$up_id,$up_condition,$up_legend)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-services-condition.php");
	exit();
}	