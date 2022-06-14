<?php 
session_start();
include 'connection.php';
include 'function.php';


$Equip_Name = $_POST['updateEquipName'];
$Requested_Date = $_POST['updateEquipRequest'];
$Date_Defected = $_POST['updateEquipDefect'];
$Quantity = $_POST['updateEquipQuantity'];
$Equip_Id  = $_POST['updateEquipID'];



if(updateEquipment($conn,$Equip_Id,$Equip_Name,$Requested_Date,$Date_Defected,$Quantity)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-inventory_equipments.php");
	exit();
}	