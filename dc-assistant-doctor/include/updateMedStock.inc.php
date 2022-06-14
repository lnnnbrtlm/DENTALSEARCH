<?php 
session_start();
include 'connection.php';
include 'function.php';

$updatestock = $_POST['updateMedStock'];
$updatequantity = $_POST['updateMedQuantity'];
$Stock = $updatestock + $updatequantity;
$Med_Id = $_POST['updateMedID'];



if(updateMedStock($conn,$Med_Id,$Stock)){
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-inventory_restock.php");
	exit();
}	