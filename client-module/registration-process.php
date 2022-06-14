<?php
session_start();
include('conn.php');
if(isset($_POST['btnNext'])){
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['pass'];
$guardian = $_POST['guardian'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];

$checkAvailability ="SELECT email FROM patient_record WHERE email='$email' LIMIT 1";
$checkAvailability_run = mysqli_query($conn,$checkAvailability);

if(mysqli_num_rows($checkAvailability_run) >0){
  $_SESSION['status'] = "Email has been already used.";
  header('registration-1.php');
}else{
    header('registration-2.php');
}
}
if(isset($_POST['btnSubmit'])){

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['pass'];
$guardian = $_POST['guardian'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$medtreatment = $_POST['mdTreatment'];
$goodHealth = $_POST['goodHealth'];
$serious = $_POST['seriousIllness'];

}


?>