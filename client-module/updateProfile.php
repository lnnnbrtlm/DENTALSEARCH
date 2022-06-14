<?php 
session_start();
include 'connection.php';
include 'function.php';




$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact = $_POST['contact'];
$pg = $_POST['pg'];
$age = $_POST['age'];
$address = $_POST['address'];
$patient_id = $_POST['patient_id'];

$allowedExts4=array("pdf");
$temp4=explode(".",$_FILES["profileImg"]["name"] );
$extension4=end($temp4);
$profile_img=$_FILES["profileImg"]["name"];
move_uploaded_file($_FILES["profileImg"]["tmp_name"], "profile pictures/".$_FILES["profileImg"]["name"]);


    if (empty($profile_img)){
	
        if(updateMyprofile1($conn,$firstname,$lastname,$contact,$pg,$age,$address,$patient_id)){
        $_SESSION['upPatientErr'] = "upSuccess";
        header("Location: profile.php");
        exit();
    }	
    }	else { 
        

        if(updateMyprofile2($conn,$profile_img,$firstname,$lastname,$contact,$pg,$age,$address,$patient_id)){
        $_SESSION['upPatientErr'] = "upSuccess";
        header("Location: profile.php");
        exit();
    
    
    }

}	

?>