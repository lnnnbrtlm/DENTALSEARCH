<?php 
	session_start();
	include 'connection.php';
	include 'function.php';

	$patient_id = $_POST['patient_id'];
	$patient_name = getPatientName($conn, $patient_id);
	$service_name = $_POST['service_name'];
	$doctor_name = $_POST['doctor_name'];
	$datentime = $_POST['pending_datentime'];
	$note = $_POST['note'];
	$status = "Unconfirmed";

	if (addPendingAppointment($conn,$patient_id,$patient_name,$doctor_name,$service_name,$note,$datentime,$status)) {
			$_SESSION['pendingApptErr'] = "addSuccess";
			header("Location: ../assistant-appointment_calendar.php");
			exit();
	}
	