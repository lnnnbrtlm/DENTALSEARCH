<?php
date_default_timezone_set('Asia/Manila');

$servername = "127.0.0.1";
$username = "mrdesgm_user1";
$password = "eZNCMGiV7iUg6bBT";
$dbname = "mrdesgm_dbdental";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$clinic_id = $_POST['clinic_id'];
$clinic_name = $_POST['clinic_name'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

$sql = "INSERT INTO site_feedback(`clinic_id`,`clinic_name`, `rate`, `comment`) 
        VALUES ('$clinic_id','$clinic_name', '$rating', '$comment')";
        if(mysqli_query($conn,$sql)){

        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
