
 <?php 
	$servername="127.0.0.1";
	$username="mrdesgm_user1";
	$password="eZNCMGiV7iUg6bBT";
	$dbname="mrdesgm_dbdental";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
	} 

?>