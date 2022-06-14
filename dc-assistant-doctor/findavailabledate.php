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

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$servicename = test_input($_POST['servicename']);
$serviceid = test_input($_POST['serviceid']);

$sql = mysqli_query($conn, "SELECT *, COUNT(`service_name`) AS total
                            FROM `appointments`
                            WHERE `clinic_id` = $serviceid
                            AND `service_name` = '$servicename'
                            AND `status` = 'Upcoming'
                            GROUP BY `appointment_datentime` ASC
                            ");

$i = 0;
while($row = mysqli_fetch_array($sql)){
    if($row['total'] == 5){
        echo "<input type='text' id='day".$i."' value='".$row['appointment_datentime']."'/>";
        $i++;
    }
}
echo "<input type='hidden' id='length' value='".$i."'/>
      <script>
      document.querySelector('#finalServiceName').value = '$servicename';
      </script>
     ";

?>