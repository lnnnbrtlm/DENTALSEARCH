<?php

session_start();
include 'include/connection.php';
include 'include/function.php';

$name = "Wendy Batumbakal";


if (showProcedure($conn, $name)) {
			
    header("Location: ../dc-assistant-doctor/dental-chart-adult.php");
    exit();
}

?>