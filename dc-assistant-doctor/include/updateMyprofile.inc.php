<?php 
session_start();
include 'connection.php';
include 'function.php';



$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$middle_name = $_POST['middle_name'];
$birthdate = $_POST['birthdate'];
$age = $_POST['age'];
$address = $_POST['address'];
$password = $_POST['password'];
$contactno = $_POST['contactno'];
$email = $_POST['email'];
$gender = $_POST['gender'];



    if(updateMyprofile($conn,$first_name,$last_name,$middle_name,$birthdate,$age,$address,$password,$contactno,$email,$gender)){
        $_SESSION['upPatientErr'] = "upSuccess";
        header("Location: ../assistant-profile.php");
	exit(); 


}	

?>