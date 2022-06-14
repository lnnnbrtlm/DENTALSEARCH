<?php 
session_start();
include "connection.php";
include "function.php";


$pro_legend = $_POST['procedure'];
$t_procedure = $_POST['legend'];
$price = $_POST['price'];



if (addProcedure($conn,$pro_legend,$t_procedure,$price)) {
	$_SESSION['serviceErr'] = "addSuccess";
	header("Location: ../assistant-services.php");
	exit();
}
?>