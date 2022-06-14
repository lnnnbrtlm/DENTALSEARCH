<?php 
session_start();
include "connection.php";
include "function.php";

$upbranch_id = $_POST['upbranch_id'];
$upbranch_address = $_POST['upbranch_address'];
$upbranch_name = $_POST['upbranch_name'];



if (updateBranch($conn,$upbranch_id,$upbranch_address,$upbranch_name)) {
	$_SESSION['serviceErr'] = "upSuccess";
	header("Location: ../assistant-customize-branches.php");
	exit();
}