<?php
date_default_timezone_set('Asia/Manila');

$servername = "127.0.0.1";
$username = "mrdesgm_user1";
$password = "eZNCMGiV7iUg6bBT";
$dbname = "mrdesgm_dbdental";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$serviceid = $_POST['serviceid'];
$datepicker = $_POST['datepicker'];
$finalservicename = $_POST['finalservicename'];
$succ = $_POST['succ']; // start_time
$endtime = $_POST['endtime'];
$email = $_POST['email'];
$patient_id = $_POST['patient_id'];
$patient_name = $_POST['patient_name'];
$clinic_name= $_POST['clinic_name'];


$sql = "INSERT INTO appointments(clinic_id, service_name,patient_id, patient_name, email, start_time, end_time, appointment_datentime, `status`,`clinic_name`)
        VALUES($serviceid, '$finalservicename','$patient_id', '$patient_name', '$email', '$succ', '$endtime', '$datepicker', 'Upcoming','$clinic_name')";
mysqli_query($conn, $sql);

$sql1 = "INSERT INTO clinic_patients(clinic_id, patient_id, patient_name, email)
        VALUES($serviceid,'$patient_id', '$patient_name', '$email')";
mysqli_query($conn, $sql1);




        

//START HERE EMAIL 
$from = "noreply@4r-dentalclinic.com";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$to = $email;
$subject = "Clinic Appointment";
$content = '';
$content.='  
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
 </style>
</head>
<body>
<p>
Hi  '.$patient_name.', <br>
Your appointment is  <b>successfully booked </b>for  to <u>'.$clinic_name.'</u> on  at '.$datepicker.'-'.$succ.'.
</p>
</body>
</html>';
$headers .= "FROM: ". $from;
mail($to, $subject, $content, $headers);
//END HERE


$sql3 = "SELECT * FROM patient_record WHERE patient_id=".$patient_id."";
$result = mysqli_query($conn, $sql3);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
if($row = mysqli_fetch_assoc($result)) {

include 'smsAPIContr.php';
 $reciever = trim($row['contactno']);
$message = 'Hi  '.$patient_name.', your appointment to '.$clinic_name.' was Successfully booked.';
$smsAPICode = "TR-YOKAI926861_R2DGJ";
$smsAPIPassword ="a2fcekx8lj";

$send = new owang(); 
$send->itexmo($reciever, $message,$smsAPICode,$smsAPIPassword);

}
}

?>