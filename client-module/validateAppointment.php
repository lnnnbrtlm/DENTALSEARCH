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

parse_str($_POST['data'], $formData);
$data = array(
    "servicename" => $formData['finalServiceName'],
    "serviceid" => $formData['serviceid'],
    "servicedate" => $formData['datepicker']
);

$servicename = $data['servicename'];
$serviceid = $data['serviceid'];
$servicedate = $data['servicedate'];

// find start_time and end_time of a clinic
$sqlTime = "SELECT start_time, 
                   end_time 
            FROM clinic_tbl 
            WHERE clinic_id = $serviceid";
$sqlResultTime = mysqli_query($conn, $sqlTime);
while($rowTime = mysqli_fetch_array($sqlResultTime)){
    $start_time = $rowTime['start_time'];
    $end_time = $rowTime['end_time'];

    // create a list of time depends on the service
    $sqlService = "SELECT estimated_time
                   FROM services
                   WHERE service_name = '$servicename'
                   AND clinic_id = $serviceid";
    $sqlResultService = mysqli_query($conn, $sqlService);
    while($rowService = mysqli_fetch_array($sqlResultService)){

        $estimated_time = $rowService['estimated_time'];

        // create list of time
        $listOfTime = array($start_time);

        for($i = 0; $i < 100; $i++){
            $secs = strtotime(end($listOfTime))-strtotime("00:00:00");
            $result = date("H:i:s",strtotime($estimated_time . "+30 minutes")+$secs);

            $lastIndexToSecs = strtotime(end($listOfTime));
            $timeQuota = strtotime($end_time);

            if($lastIndexToSecs < $timeQuota){
                array_push($listOfTime, $result);
            }
            
        }

        $stringTime = implode('\', \'', $listOfTime); 
        $stringF = substr($stringTime, 0, 0) . "'" . $stringTime;
        $stringL = $stringF . "'";
        
        $sortedArr = array();

        $sqlFreeTime = "SELECT * FROM appointments 
                        WHERE start_time IN (".$stringL.")
                        AND appointment_datentime = '$servicedate'
                        AND clinic_id = $serviceid
                        AND status = 'Upcoming'";
        $result = mysqli_query($conn, $sqlFreeTime);
        
        while($row = mysqli_fetch_array($result)){
            array_push($sortedArr, $row['start_time']);
        }

        // sort all available time
        $finalArr = array();
        for($i = 0; $i < sizeof($listOfTime); $i++){
            if(!in_array($listOfTime[$i], $sortedArr)){
                // $finalArr[$i] = $listOfTime[$i];
                array_push($finalArr, $listOfTime[$i]);
            }
        }

        echo "<h3>FULL ARRAY: " .$stringL ."</h3>";
        print_r($finalArr);
       
        for($i = 0; $i < sizeof($finalArr)-1; $i++){

            $secs = strtotime($finalArr[$i])-strtotime("00:00:00");
            $result = date("H:i:s",strtotime($estimated_time . "+30 minutes")+$secs);
            echo "<option data-endtime=".$result." value=".$finalArr[$i].">".$finalArr[$i]."</option>";
        }

    }
}

?>