<?php
include 'session.php';
include 'conn.php';
$errors = array();
$errors1 = array();
$msg1='';
$msg='';
if(isset($_POST['loginsubmit'])){
	
	$time=time()-30;
	$ip_address=getIpAddr();
	// Getting total count of hits on the basis of IP
	$query=mysqli_query($conn,"select count(*) as total_count from loginlogs where TryTime > $time and IpAddress='$ip_address'");
	$check_login_row=mysqli_fetch_assoc($query);
	$total_count=$check_login_row['total_count'];
	//Checking if the attempt 3, or youcan set the no of attempt her. For now we taking only 3 fail attempted
	if($total_count==3){
		$msg1='disabled';
	$msg="To many failed login attempts. Please login after 30 sec";
	
	}

	$email = $_POST['email'];
	$password = $_POST['password'];
	$btn = $_POST['loginsubmit'];
	if (empty($email) || empty($password)) {
		/*array_push($errors, "Username or Password is Missing.");*/
		session_destroy();
	}
	else{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM patient_record WHERE status='INACTIVE' AND email ='$email'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0){
		array_push($errors, "The Account you try to login is doesnt exist");
		mysqli_close($conn);
	}else{
	
	
	$query1 = "SELECT email, Password FROM patient_record where email=? AND password=? LIMIT 1";
	
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
			$_SESSION['login_admin'] = $email;
			$_SESSION['btnsubmit'] = $btn;
			header("location: index.php");
		}
        else*/ if($stmt1->fetch())
            {
                $_SESSION['login_admin'] = $email;
                $_SESSION['loginsubmit'] = $btn;
				$_SESSION['user'] = $password;
				$sql = "SELECT * FROM patient_record WHERE email = '".$_SESSION['login_admin']."'";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
				$_SESSION['login_admin'] = $email;
			$_SESSION['btnsubmit'] = $btn;
			header("location: index.php");
				}}
            }
	
			else{
				$total_count++;
				$rem_attm=3-$total_count;
				if($rem_attm==0){
				$msg1='disabled';
				$msg="To many failed login attempts. Please login after 30 sec";
				header("refresh:30, url=reset.php");
				}else if($rem_attm<0){
				$$rem_attm=0;
				$msg1='disabled';
				$msg="Too many failed login attempts. Please login after 30 sec";
				header("refresh:30, url=reset.php");
 			
  		}else{
				$msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
				}
				$try_time=time();
				mysqli_query($conn,"insert into loginlogs(IpAddress,TryTime) values('$ip_address','$try_time')");
				}}
			}		
				

/* For admin login 
if(isset($_SESSION['login_admin'])){
	header("location: admin-appointment.php");
}*/

if(isset($_SESSION['login_admin'])){
	$email = $_SESSION['login_admin'];

		$sql3 = "SELECT * FROM patient_record WHERE email = '$email' LIMIT 1";
		$sql4 = "SELECT * FROM patient_record WHERE email = '$email' AND password = '$passowrd' LIMIT 1";
        $result3 = mysqli_query($conn,$sql3);
		$result4 = mysqli_query($conn,$sql4);
        if(mysqli_num_rows($result3)>0){
			if($row=mysqli_fetch_assoc($result3)){
			$_SESSION['user_id'] = $row['user_id'];
		}
		if(mysqli_num_rows($result4)>0){
		while($row1 = mysqli_fetch_assoc($result4)){
			$_SESSION['user_type'] = $row1['user_type'];
		}
		header('location: index.php');
	}
	}
}

}else{
	$ses = "";
}

// Getting IP Address
function getIpAddr(){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
	$ipAddr=$_SERVER['HTTP_CLIENT_IP'];
	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
	$ipAddr=$_SERVER['REMOTE_ADDR'];
	}
	return $ipAddr;
	}
?>