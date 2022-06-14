<?php
include('conn.php');

if(isset($_POST['btnChangePass'])){
$currPass = $_POST['currentPass'];
$newPass = $_POST['newPass'];
$email = $_SESSION['login_admin'];

$changePass = "SELECT * FROM patient_record where email = '$email' LIMIT 1";
$query_changePass=mysqli_query($conn,$changePass);    
            while ($row2=mysqli_fetch_array($query_changePass)) {
                $curr = $row2['password'];

if($currPass == $curr){
    $sql = "UPDATE patient_record SET `password` = '$newPass' WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "<div class='passUpdate'>Password Updated Successfully</div>";
}else{
    echo "<div class='wrongPass'>Wrong password.</div>";
}
            }
        }
?>