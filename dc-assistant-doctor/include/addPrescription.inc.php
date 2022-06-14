<?php 
	session_start();
	include 'connection.php';
	include 'function.php';

	$patient_name = $_POST['patient_name'];
	$doctor_name = $_POST['doctor_name'];
	$note = $_POST['note'];
	$meds = $_POST['meds'];
	$dosage = $_POST['dosage'];
    $frequency = $_POST['frequency'];
   
    
 	if (addPrescription($conn,$patient_name,$doctor_name,$note,$meds,$dosage,$frequency)) {
			$_SESSION['patientErr'] = "addSuccess";
			header("Location: ../assistant-prescription.php");
			exit();
	}
	