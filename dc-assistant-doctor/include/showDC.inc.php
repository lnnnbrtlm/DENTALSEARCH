<?php 
session_start();
include 'connection.php';
include 'function.php';

$first_name = $_POST['updatePatientFname'];
$last_name = $_POST['updatePatientLname'];

$patient_id = $_POST['updatePatientID'];

if(updatePatient($conn,$patient_id,$first_name)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-patient_list.php");
	exit();
}	