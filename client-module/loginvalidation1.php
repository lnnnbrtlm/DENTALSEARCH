<?php
include('conn.php');
$errors = array();

if(isset($_POST['btnsubmit'])){
	
	$email = $_POST['admin_email'];
	$password = $_POST['admin_password'];
	$btn = $_POST['btnsubmit'];
	if (empty($email) || empty($password)) {
		/*array_push($errors, "Username or Password is Missing.");*/
		session_destroy();
	}
	else{
	$email = $_POST['admin_email'];
	$password = $_POST['admin_password'];

/*	$query = "SELECT email, password FROM adminacc where email=? AND password=? LIMIT 1";
*/	$query1 = "SELECT Username, Password FROM doctor where Username=? AND Password=? LIMIT 1";
	
    $stmt1 = $conn->prepare($query1);
	$stmt1->bind_param("ss",$email,$password);
	$stmt1->execute();
	$stmt1->bind_result($email, $password);
	$stmt1->store_result();

/*    $stmt = $conn->prepare($query);
	$stmt->bind_param("ss",$email,$password);
	$stmt->execute();
	$stmt->bind_result($email, $password);
	$stmt->store_result();

	if($stmt->fetch())
		{
			$_SESSION['login_admin1'] = $email;
			$_SESSION['btnsubmit'] = $btn;
			header("location: admin-appointment.php");
		}
        else*/ if($stmt1->fetch())
            {
                $_SESSION['login_admin'] = $email;
                $_SESSION['loginsubmit'] = $btn;
                header("location: index.php");
            }
	else{
			array_push($errors, "Email or Password is Incorrect.");
	 }
	 mysqli_close($conn);
		}


/* For admin login 
if(isset($_SESSION['login_admin1'])){
	header("location: admin-appointment.php");
}*/

if(isset($_SESSION['login_admin'])){
	header("location: index.php");
}
}else{
	$ses = "";
}