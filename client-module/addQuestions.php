<?php 
session_start();
include "connection.php";
include "function.php";
$con = mysqli_connect("localhost","root","","db_dentalclinic");

$email = $_SESSION['login_admin'];
$contact = " ";
$sql = "SELECT * FROM patient_record WHERE email = '$email' LIMIT 1";
$sql1 = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($sql1)) {
$name = $row['fullname'];
$id = $row['patient_id'];

}
$sql2 = "SELECT * FROM patient_record WHERE email='$email'";
$sql3 = mysqli_query($conn, $sql2);
while ($row = mysqli_fetch_array($sql3)) {
    $contact = $row['contactno'];
    }

if(isset($_POST['send_request']))
{

    $branch = $_POST['selected_branch'];
    $date = $_POST['birthdate'];
    $note = $_POST['note'];
    $service = $_POST['service'];
    $doctor = $_POST['doctor'];
    $question_one  = $_POST['question_one'];
    $question_two  = $_POST['question_two'];
    $question_three  = $_POST['question_three'];
    $question_four  = $_POST['question_four'];
    $question_five  = $_POST['question_five'];
    $question_six  = $_POST['question_six'];
    $question_seven  = $_POST['question_seven'];
    $question_nine  = $_POST['question_nine'];
    $question_ten  = $_POST['question_ten'];
    $question_eleven  = $_POST['question_eleven'];
    $question_twelve  = $_POST['question_twelve'];
    $question_thirteen  = $_POST['question_thirteen'];
    $question_fourteen  = $_POST['question_fourteen'];

    $input_two  = $_POST['input_two'];
    $input_three  = $_POST['input_three'];
    $input_four  = $_POST['input_four'];
    $input_five  = $_POST['input_five'];
    $input_eight  = $_POST['input_eight'];
    $input_nine  = $_POST['input_nine'];
    $input_fifteen  = $_POST['input_fifteen'];
    
    $checkbox1=$_POST['techno'];  
    $chk="";  
    foreach($checkbox1 as $chk1)  
        {  
            $question_eight = $chk1.",";  
        }  

    $checkbox2=$_POST['tech'];  
    $clk="";  
    foreach($checkbox2 as $chk2)  
        {  
            $question_fifteen = $chk2.",";  
        }  
    $sql = "SELECT * FROM pending_appointments WHERE appointment_datentime = '$date' AND status != 'Cancelled'";
    $sqlresult = mysqli_query($con, $sql);

    if(mysqli_num_rows($sqlresult) < 5){

    $query = "UPDATE questions SET question_one = '$question_one', question_two ='$question_two',input_two='$input_two',question_three='$question_three',input_three='$input_three',question_four='$question_four',input_four='$input_four',question_five='$question_five',input_five='$input_five',question_six='$question_six',question_seven='$question_seven',question_eight='$question_eight',input_eight='$input_eight',question_nine='$question_nine',input_nine='$input_nine',question_ten='$question_ten',question_eleven='$question_eleven',question_twelve='$question_twelve',question_thirteen='$question_thirteen',question_fourteen='$question_fourteen',question_fifteen='$question_fifteen',input_fifteen='$input_fifteen'
    WHERE patient_id='$id'";
    $query_run = mysqli_query($con, $query);
        
    $query1 = "INSERT INTO pending_appointments(patient_id,patient_name,doctor_name,email,contactno,service_name,branch,note,appointment_datentime,status) VALUES ('$id','$name','$doctor','$email','$contact','$service','$branch','$note','$date','Unconfirmed')";
    $query_run1 = mysqli_query($con, $query1);
    
    if($query && $query1){

        $_SESSION['patientErr'] = "addSuccess";
        header("Location: appointment.php");
    }
}else{ 
    header("Location: appointment.php");
    $_SESSION['patientErr'] = "FullyBookedd";
}


}

?>