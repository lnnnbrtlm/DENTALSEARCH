<?php
include('include/connection.php');

session_start();


if(isset($SESSION['login_admin1'])){
$admin_check = $_SESSION['login_admin1'];
$query = "SELECT email FROM user_accounts WHERE email ='$admin_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['email'];
}
else{

}
?>