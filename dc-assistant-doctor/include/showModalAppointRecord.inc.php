<?php 
    include 'connection.php';
    include 'function.php';

//list($patient_id,$first_name,$last_name,$middle_name,$birthdate,$contactno,$gender,$age,$address) = showModalPatient($conn,$_POST['patient_id']);
    
 echo json_encode(showModalAppointRecord($conn,$_POST['id']));