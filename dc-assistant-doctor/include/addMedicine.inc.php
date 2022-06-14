<?php 
session_start();
include "connection.php";
include "function.php";

$Med_Name = $_POST['Med_Name'];
$Quantity = $_POST['Quantity'];
$Expiry_date = $_POST['Expiry_date'];
$Requested_date = $_POST['Requested_date'];
$Price = $_POST['Price'];
$status = 'ACTIVE';


if (addMedicine($conn,$Med_Name,$Quantity,$Expiry_date,$Requested_date,$Price,$status)) {
	$_SESSION['patientErr'] = "addSuccess";
	header("Location: ../assistant-inventory_medicine.php");
	exit();
}

?>

