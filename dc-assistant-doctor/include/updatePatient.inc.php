<?php 
session_start();
include 'connection.php';
include 'function.php';

$first_name = $_POST['updatePatientFname'];
$last_name = $_POST['updatePatientLname'];
$middle_name = $_POST['updatePatientMname'];
$birthdate = $_POST['updatePatientBdate'];
$address = $_POST['updatePatientAddress'];
$parent_guardian = $_POST['updatePatientPG'];
$age = $_POST['updatePatientAge'];
$email = $_POST['updatePatientEmail'];
$contactno = $_POST['updatePatientContactNo'];
$gender = $_POST['updatePatientGender'];
$patient_id = $_POST['updatePatientID'];

	$question_one  = $_POST['q1'];
    $question_two  = $_POST['q2'];
    $question_three  = $_POST['q3'];
    $question_four  = $_POST['q4'];
    $question_five  = $_POST['q5'];
    $question_six  = $_POST['q6'];
    $question_seven  = $_POST['q7'];
    $question_nine  = $_POST['q9'];
    $question_ten  = $_POST['q10'];
    $question_eleven  = $_POST['q11'];
    $question_twelve  = $_POST['q12'];
    $question_thirteen  = $_POST['bloodtype'];
    $question_fourteen  = $_POST['bloodpressure'];
    $question_eight = " ";
    $question_fifteen = " ";
    $input_two  = $_POST['input2'];
    $input_three  = $_POST['input3'];
    $input_four  = $_POST['input4'];
    $input_five  = $_POST['input5'];
    $input_eight  = $_POST['input8'];
    $input_nine  = $_POST['input9'];
    $input_fifteen  = $_POST['inputlast'];

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

if(updatePatient($conn,$patient_id,$first_name,$last_name,$middle_name,$birthdate,$address,$parent_guardian,$age,$email,$contactno,$gender)){
	$query = "UPDATE questions SET question_one = '$question_one', question_two ='$question_two',input_two='$input_two',question_three='$question_three',input_three='$input_three',question_four='$question_four',input_four='$input_four',question_five='$question_five',input_five='$input_five',question_six='$question_six',question_seven='$question_seven',question_eight='$question_eight',input_eight='$input_eight',question_nine='$question_nine',input_nine='$input_nine',question_ten='$question_ten',question_eleven='$question_eleven',question_twelve='$question_twelve',question_thirteen='$question_thirteen',question_fourteen='$question_fourteen',question_fifteen='$question_fifteen',input_fifteen='$input_fifteen'
    WHERE patient_id='$patient_id'";
    $query_run = mysqli_query($conn, $query);
	$_SESSION['upPatientErr'] = "upSuccess";
	header("Location: ../assistant-patient_list.php");
	exit();
}	