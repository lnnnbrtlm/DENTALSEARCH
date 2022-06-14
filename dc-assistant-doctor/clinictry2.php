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

$name = test_input($_POST['name']);
$desc = $_POST['desc'];
$contactno = test_input($_POST['contactno']);
$email = $_POST['email'];
$address = $_POST['address'];
$street = $_POST['street'];
$brgy = $_POST['brgy'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$start_time = test_input($_POST['start_time']);
$end_time = test_input($_POST['end_time']);
$user_id = test_input($_POST['user_id']);
$id = test_input($_POST['clinic_id']);


$sql = "UPDATE clinic_tbl SET `clinic_name`='$name',`clinic_desc`='$desc',`clinic_contact`='$contactno',`clinic_email`='$email',`clinic_address`='$address',`street`='$street'
,`brgy`='$brgy',`city`='$city',`zip_code`='$zip_code',`start_time`='$start_time',`end_time`='$end_time' WHERE `clinic_id` ='$id'";

$result3 = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn)) {

    
        
    // after adding, find it 
    $sqlServiceDel = "DELETE FROM `services` WHERE `clinic_id`='$id'";
    $sqlDaysDel = "DELETE FROM `days` WHERE `clinic_id`='$id'";
    $result2 = mysqli_query($conn, $sqlServiceDel);
    $result1 = mysqli_query($conn, $sqlDaysDel);
        
       if(mysqli_affected_rows($conn) && mysqli_affected_rows($conn)){
        

        $ortho1 = $_POST['ortho1'];
        $ortho2 = $_POST['ortho2'];
        $ortho3 = $_POST['ortho3'];
        $ortho4 = $_POST['ortho4'];
        $ortho5 = $_POST['ortho5'];
        $ortho6 = $_POST['ortho6'];

        $pedia1 = $_POST['pedia1'];
        $pedia2 = $_POST['pedia2'];
        $pedia3 = $_POST['pedia3'];
        $pedia4 = $_POST['pedia4'];
        $pedia5 = $_POST['pedia5'];
        $pedia6 = $_POST['pedia6'];

        $dent1 = $_POST['dent1'];
        $dent2 = $_POST['dent2'];
        $dent3 = $_POST['dent3'];
        $dent4 = $_POST['dent4'];
        $dent5 = $_POST['dent5'];
        $dent6 = $_POST['dent6'];

        $sunday = test_input($_POST['sunday']);
        $monday = test_input($_POST['monday']);
        $tuesday = test_input($_POST['tuesday']);
        $wednesday = test_input($_POST['wednesday']);
        $thursday = test_input($_POST['thursday']);
        $friday = test_input($_POST['friday']);
        $saturday = test_input($_POST['saturday']);

         
        // add ortho1
        if(!empty($ortho1)){
            $value = $ortho1[0];
            $type = $ortho1[1];
            $time = $ortho1[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add ortho2
        if(!empty($ortho2)){
            $value = $ortho2[0];
            $type = $ortho2[1];
            $time = $ortho2[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add ortho3
        if(!empty($ortho3)){
            $value = $ortho3[0];
            $type = $ortho3[1];
            $time = $ortho3[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add ortho4
        if(!empty($ortho4)){
            $value = $ortho4[0];
            $type = $ortho4[1];
            $time = $ortho4[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add ortho5
        if(!empty($ortho5)){
            $value = $ortho5[0];
            $type = $ortho5[1];
            $time = $ortho5[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add ortho6
        if(!empty($ortho6)){
            $value = $ortho6[0];
            $type = $ortho6[1];
            $time = $ortho6[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add pedia1
        if(!empty($pedia1)){
            $value = $pedia1[0];
            $type = $pedia1[1];
            $time = $pedia1[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add pedia2
        if(!empty($pedia2)){
            $value = $pedia2[0];
            $type = $pedia2[1];
            $time = $pedia2[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add pedia3
        if(!empty($pedia3)){
            $value = $pedia3[0];
            $type = $pedia3[1];
            $time = $pedia3[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add pedia4
        if(!empty($pedia4)){
            $value = $pedia4[0];
            $type = $pedia4[1];
            $time = $pedia4[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add pedia5
        if(!empty($pedia5)){
            $value = $pedia5[0];
            $type = $pedia5[1];
            $time = $pedia5[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add pedia6
        if(!empty($pedia6)){
            $value = $pedia6[0];
            $type = $pedia6[1];
            $time = $pedia6[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }


        // add dent1
        if(!empty($dent1)){
            $value = $dent1[0];
            $type = $dent1[1];
            $time = $dent1[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add dent2
        if(!empty($dent2)){
            $value = $dent2[0];
            $type = $dent2[1];
            $time = $dent2[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add dent3
        if(!empty($dent3)){
            $value = $dent3[0];
            $type = $dent3[1];
            $time = $dent3[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add dent4
        if(!empty($dent4)){
            $value = $dent4[0];
            $type = $dent4[1];
            $time = $dent4[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add dent5
        if(!empty($dent5)){
            $value = $dent5[0];
            $type = $dent5[1];
            $time = $dent5[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add dent6
        if(!empty($dent6)){
            $value = $dent6[0];
            $type = $dent6[1];
            $time = $dent6[2];
            
            $sqlAddDays = "INSERT INTO `services`(`clinic_id`, `service_name`, `service_type`, `estimated_time`) VALUES($id, '$value', '$type', '$time')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add sunday
        if(!empty($sunday)){
            $sqlAddDays = "INSERT INTO days(clinic_id, dayname) VALUES($id, '$sunday')";
            mysqli_query($conn, $sqlAddDays);
        }
        
        // add monday
        if(!empty($monday)){
            $sqlAddDays = "INSERT INTO days(clinic_id, dayname) VALUES($id, '$monday')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add tuesday
        if(!empty($tuesday)){
            $sqlAddDays = "INSERT INTO days(clinic_id, dayname) VALUES($id, '$tuesday')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add wednesday
        if(!empty($wednesday)){
            $sqlAddDays = "INSERT INTO days(clinic_id, dayname) VALUES($id, '$wednesday')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add thursday
        if(!empty($thursday)){
            $sqlAddDays = "INSERT INTO days(clinic_id, dayname) VALUES($id, '$thursday')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add friday
        if(!empty($friday)){
            $sqlAddDays = "INSERT INTO days(clinic_id, dayname) VALUES($id, '$friday')";
            mysqli_query($conn, $sqlAddDays);
        }

        // add saturday
        if(!empty($saturday)){
            $sqlAddDays = "INSERT INTO days(clinic_id, dayname) VALUES($id, '$saturday')";
            mysqli_query($conn, $sqlAddDays);
        }

    }
    else{
    echo 1;
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>