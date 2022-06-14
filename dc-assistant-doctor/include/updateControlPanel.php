<?php 
session_start();
include 'connection.php';
include 'function.php';



$clinic_name = $_POST['updateclinicname'];

$clinic_contact = $_POST['updatecliniccontact'];
$clinic_email = $_POST['updateclinicemail'];
$start_day = $_POST['updatestartday'];
$end_day = $_POST['updateendday'];
$start_time = $_POST['updatestarttime'];
$end_time = $_POST['updateendtime'];
$clinic_address = $_POST['updateaddress'];
$facebook_link = $_POST['updatefacebook'];
$twitter_link = $_POST['updatetwitter'];

$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["updateprofileImg"]["name"] );
$extension4=end($temp4);
$profile_img=$_FILES["updateprofileImg"]["name"];
move_uploaded_file($_FILES["updateprofileImg"]["tmp_name"], "profile pictures/".$_FILES["updateprofileImg"]["name"]);

if (empty($profile_img)){
    if(updateControlPanelNoImage($conn,$clinic_name,$clinic_contact,$clinic_email,$start_day,$end_day,$start_time,$end_time,$clinic_address,$facebook_link,$twitter_link)){
        $_SESSION['upPatientErr'] = "upSuccess";
        header("Location: ../assistant-customize.php");
	exit(); 

}	
}	else { 	
    if(updateControlPanel($conn,$clinic_name,$clinic_contact,$clinic_email,$start_day,$end_day,$start_time,$end_time,$clinic_address,$facebook_link,$twitter_link, $profile_img)){
        $_SESSION['upPatientErr'] = "upSuccess";
        header("Location: ../assistant-customize.php");
	exit(); 
    }
}
?>