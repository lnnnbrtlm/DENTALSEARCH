<?php 
session_start();
include "connection.php";
include "function.php";

$Equip_Name = $_POST['Equip_Name'];
$Requested_Date = $_POST['Requested_Date'];
$Date_Defected = $_POST['Date_Defected'];
$Quantity = $_POST['Quantity'];
$status ='ACTIVE';



if (addEquipment($conn,$Equip_Name,$Requested_Date,$Date_Defected,$Quantity,$status)) {
	$_SESSION['patientErr'] = "addSuccess";
	header("Location: ../assistant-inventory_medicine.php");
	exit();
}

?>

