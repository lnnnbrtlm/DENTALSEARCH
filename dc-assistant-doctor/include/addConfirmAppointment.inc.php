<?php 

session_start();
include 'connection.php';
include 'function.php';


$patient_id = $_POST['patient_id'];
$patient_name = getPatientName($conn, $patient_id);
$service_name = $_POST['service_name'];
$doctor_name = $_POST['doctor_name'];
$datentime = $_POST['pending_datentime'];
$status = "Upcoming";
$note = $_POST['note'];
$email = getPatientEmail($conn, $patient_id);
$time = $_POST['time'];
$clinic = $_POST['clinic'];

$sql = "SELECT * FROM appointments WHERE appointment_datentime = '$datentime' AND status != 'Cancelled'";
$sqlresult = mysqli_query($conn, $sql);

if(mysqli_num_rows($sqlresult) < 5){
if (addWalkinAppointment($conn,$clinic, $patient_id,$patient_name,$email,$doctor_name,$service_name,$note,$datentime,$time,$status)){
    $_SESSION['pendingApptErr'] = "addSuccess";
    header("Location: ../assistant-appointment_calendar.php");
    exit();
}
} else{ 
    $_SESSION['patientErr'] = "FullyBooked";
    header("Location: ../assistant-appointment_calendar.php");
    
}


?>