<?php
include 'connection.php';

if(isset($_POST['toFeedback'])){

    $name = $_POST['patient_name'];
    $rate = $_POST['rate'];
    $feedback = $_POST['feedback'];
    $clinic_id = $_POST['clinic_id'];
    $pic = $_POST['picture'];
    


$stmt =$conn->prepare("INSERT INTO feedback(`picture`,`clinic_id`,`patient_name`,`rate`,`feedback`) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssss",$d1,$d2,$d3,$d4,$d5);

$d1 = $pic;
$d2 = $clinic_id;
$d3 = $name;
$d4 = $rate;
$d5 = $feedback;

if ($stmt->execute()) {
    	
header("Location: clinic.php");
    }
  }




?>