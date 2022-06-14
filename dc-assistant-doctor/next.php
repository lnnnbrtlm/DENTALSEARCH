<?php

if(isset($_POST['btnNext'])){
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$fullname = $firstname." ".$lastname;
$contact = $_POST['contact'];
$password = $_POST['pass'];
$guardian = $_POST['guardian'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$msg = "";
$css_class = "";

/* ----------- Checking of Email repetition -------------
if(isset($_POST['btnNext'])){
$checkAvailability ="SELECT email FROM patient_record WHERE email='$email' LIMIT 1";
$checkAvailability_run = mysqli_query($conn,$checkAvailability);

if(mysqli_num_rows($checkAvailability_run) >0){
  $_SESSION['status'] = "Email has been already used.";
  header('registration-1.php');
}else{

*/

  $allowedExts4=array("pdf");
  $temp4=explode(".",$_FILES["profileImg"]["name"] );
  $extension4=end($temp4);
  $upload_pdf4=$_FILES["profileImg"]["name"];
  move_uploaded_file($_FILES["profileImg"]["tmp_name"], "profile pictures/".$_FILES["profileImg"]["name"]);

  $conn1 = mysqli_connect('localhost', 'root', '', 'db_dentalclinic');
  $mysql = mysqli_query($conn1,"INSERT INTO `patient_record` (`profile_img`, `fullname`, `first_name`, `last_name`, `birthdate`, `parent_guardian`, `password`, `email`, `contactno`, `gender`) 
  VALUES('$upload_pdf4', '$fullname', '$firstname','$lastname', '$birthday', '$guardian', '$password', '$email', '$contact', '$gender')");
			if(!$mysql){
                echo mysqli_error($conn1);
    die();
            }else{
			$msg = "Saved Successfully";
			$css_class = "alert-success";
}
}
?>