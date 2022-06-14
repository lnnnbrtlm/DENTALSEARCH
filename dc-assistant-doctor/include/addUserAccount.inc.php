<?php 
session_start();
include "connection.php";
include "function.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$birthdate = $_POST['birthdate'];
$age = $_POST['age'];
$address = $_POST['address'];
$contactno = $_POST['contactno'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$user_type = $_POST['user_type'];
$password = $_POST['password'];
$status = 'ACTIVE';
$branch = $_POST['branch'];

$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["profileImg"]["name"] );
$extension4=end($temp4);
$upload_pdf4=$_FILES["profileImg"]["name"];
move_uploaded_file($_FILES["profileImg"]["tmp_name"], "profile pictures/".$_FILES["profileImg"]["name"]);
$check = "SELECT * FROM user_accounts WHERE email='$email'";
$res = mysqli_query($conn, $check);
if(mysqli_num_rows($res)>0){
	echo mysqli_error($conn);
	$_SESSION['patientErr'] = "error";
	header("location: ../assistant-useraccounts.php");
	exit();
}{

if (addUserAccount($conn,$upload_pdf4,$firstname,$lastname,$middlename,$birthdate,$age,$address,$branch,$contactno,$email,$gender,$user_type,$password,$status)) {
	$_SESSION['patientErr'] = "addSuccess";

	

	header("Location: ../assistant-useraccounts.php");
	exit();
}}

?>