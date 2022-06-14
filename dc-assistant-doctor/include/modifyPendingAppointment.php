<?php 

	session_start();
	include 'connection.php';
	include 'function.php';
	
	date_default_timezone_set('Asia/Manila');
	$array = array();
	if (isset($_POST['toConfirmBtn'])) {
	
	$email = $_SESSION['login_admin1'];
	$ref_id = $_POST['ref_id'];
	$patient_id = $_POST['patient_id'];
	$pname = $_POST['pname'];
	$dname = $_POST['dname'];
	$sname = $_POST['sname'];
	$dtime = $_POST['dtime'];
	$email = $_POST['email'];
	$branch = $_POST['branch'];
	$note = $_POST['note'];
	$status = "UpComing";
	$time = $_POST['time'];
	$price = '';

		include '../smsAPIContr.php';
        $reciever = $_POST['contact'];
        $message = $_POST['msg_body'];
        $smsAPICode = "TR-YOKAI418463_TINK4";
        $smsAPIPassword ="v4!n95m1ii";

        $send = new owang(); 
        $send->itexmo($reciever, $message,$smsAPICode,$smsAPIPassword);

		if($send == true){
	if (addAppointment($conn,$patient_id,$pname,$email,$dname,$sname,$branch,$note,$dtime,$time,$status)) {
			deleteUnconfirmed($conn,$ref_id);
			//$_SESSION['pendingApptErr'] = "confirmSuccess";
			header("Location: ../assistant-appointment_list.php");
			exit();
	}
}

	}
	if (isset($_POST['toCheckInBtn'])) {
	
		$cref_id = $_POST['cref_id'];
	
		if (updatePatientCheckIn($conn, $cref_id, date("Y-m-d H:i:s"), "Checked-In")) {
			//$_SESSION['pendingApptErr'] = "confirmSuccess";
			header("Location: ../assistant-appointment_list.php");
			exit();
		}
	}

	if (isset($_POST['toInChairBtn'])) {
	
		$fcheckin_refno = $_POST['fcheckin_refno'];
	
		if (updatePatientInChair($conn, $fcheckin_refno, date("Y-m-d H:i:s"), "In-Chair")) {
			//$_SESSION['pendingApptErr'] = "confirmSuccess";
			header("Location: ../assistant-appointment_list.php");
			exit();
		}
	}
	
		if (isset($_POST['toCompleteBtn'])) {

			$finchair_refno = $_POST['finchair_refno'];
			$date = date('Y-m-d');
			
			$sql = "UPDATE appointments SET complete_datentime ='$date', `status`='Completed' WHERE appointment_refno='$finchair_refno'";
			$result = mysqli_query($conn, $sql);

			if($result){
				header('location: ../assistant-appointment_list.php');
			}
		}


		?>