<?php
	require_once'connection.php';
	
	if(ISSET($_REQUEST['Med_Id'])){
		$mem_id=$_REQUEST['Med_Id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `inventory_medicine` WHERE `Med_Id`='$Med_Id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$Med_Name=$fetch['Med_Name'];
		$Quantity=$fetch['Quantity'];
		$Expiry_date=$fetch['Expiry_date'];
        $Requested_date=$fetch['Requested_date'];
        $Price=$fetch['Price'];
		
		
		mysqli_query($conn, "INSERT INTO `archive_inventory_medicine` VALUES('', '$Med_Name', '$Quantity', '$Expiry_date', '$Requested_date', '$Price')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `inventory_medicine` WHERE `Med_Id`='$Med_Id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='assistant-inventory_medicine.php'</script>";
	}
?>