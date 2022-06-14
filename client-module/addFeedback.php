<?php
include 'connection.php';

if(isset($_POST['toFeedback'])){

    $feedback = $_POST['input_feedback'];
    $pname = $_POST['pname'];
    $dname = $_POST['dname'];
    $sname = $_POST['sname'];


$stmt =$conn->prepare("INSERT INTO feedback(`patient_name`,`doctor_name`,`service_name`,`feedback`) VALUES(?,?,?,?)");
$stmt->bind_param("ssss",$d1,$d2,$d3,$d4);

$d1 = $pname;
$d2 = $dname;
$d3 = $sname;
$d4 = $feedback;

if ($stmt->execute()) {
    	
header("Location: records-appointments.php");
    }
  }




?>