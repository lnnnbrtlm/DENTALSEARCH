<?php 
session_start();
include 'connection.php';
include 'function.php';


$first_name = $_POST['updateUserFname'];
$last_name = $_POST['updateUserLname'];
$middle_name = $_POST['updateUserMname'];
$birthdate = $_POST['updateUserBdate'];
$address = $_POST['updateUserAddress'];
$user_type = $_POST['updateUserType'];
$age = $_POST['updateUserAge'];
$email = $_POST['updateUserEmail'];
$contactno = $_POST['updateUserContactNo'];
$gender = $_POST['updateUserGender'];
$user_id = $_POST['updateUserID'];
$password = $_POST['updateUserPassword'];

$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["updateprofileImg"]["name"] );
$extension4=end($temp4);
$profile_img=$_FILES["updateprofileImg"]["name"];
move_uploaded_file($_FILES["updateprofileImg"]["tmp_name"], "profilepictures/".$_FILES["updateprofileImg"]["name"]);

if (empty($profile_img)){
	
	if(updateUsernoImage($conn,$user_id,$first_name,$last_name,$middle_name,$birthdate,$address,$age,$password,$email,$contactno,$gender,$user_type,$branch)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-useraccounts.php");
	exit();
}	
}	else { 
		if(updateUser($conn,$profile_img,$user_id,$first_name,$last_name,$middle_name,$birthdate,$address,$password,$age,$email,$contactno,$gender,$user_type)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-useraccounts.php");
	exit(); 


}
}	
