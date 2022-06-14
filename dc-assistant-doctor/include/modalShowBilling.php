<?php 
    include 'connection.php';
    include 'function.php';
    
 echo json_encode(showBillingDetails($conn,$_POST['id']));