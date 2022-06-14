<?php 
session_start();
include 'connection.php';
include 'function.php';


$Med_Name = $_POST['updateMedname'];
$Quantity = $_POST['updateMedquantity'];
$Expiry_date = $_POST['updateMedexpiry'];
$Requested_date = $_POST['updateMedrequested'];
$Price = $_POST['updateMedprice'];
$Med_Id = $_POST['updateMedID'];



if(updateMedicine($conn,$Med_Id,$Med_Name,$Quantity,$Expiry_date,$Requested_date,$Price)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-inventory_medicine.php");
	exit();
}	