<?php 
session_start();
include "connection.php";
include "function.php";

$medsname = $_POST['medsname'];
$medsquan = $_POST['medsquan'];
$medsprice = $_POST['medsprice'];
$medstock = $_POST['stocks'];

$medicine = $_POST['medsname'];
$updateStock = $medstock - $medsquan;



if (addPresciptionBill($conn,$medsname,$medsquan,$medsprice)) {
	minusMedStock($conn,$updateStock,$updateStockmedicine);
	$_SESSION['patientErr'] = "addSuccess";
	header("Location: ../assistant-billing_prescription.php");
	exit();
}

?>

