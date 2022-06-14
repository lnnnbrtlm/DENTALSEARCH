<?php
include('conn.php');

session_start();


if(isset($SESSION['login_admin'])){
$admin_check = $_SESSION['login_admin'];
$query = "SELECT email FROM patient_record WHERE email ='$admin_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['email'];
}
else{

}
?>