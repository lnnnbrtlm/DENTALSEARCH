<?php 
session_start();
include 'connection.php';
include 'function.php';

$up_procedure = $_POST['up_procedure'];
$up_legend = $_POST['up_legend'];
$up_price = $_POST['up_price'];
$up_id = $_POST['up_id'];



if(updateProcedure($conn,$up_id,$up_procedure,$up_legend,$up_price)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-services-procedures.php");
	exit();
}	