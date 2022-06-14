<?php 
session_start();
include "connection.php";
include "function.php";
$con = mysqli_connect("localhost","root","","db_dentalclinic");






if(isset($_POST['save_radio']))
{
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
            $question_eight .= $chk1.",";  
        }  

    $checkbox2=$_POST['tech'];  
    $clk="";  
    foreach($checkbox2 as $chk2)  
        {  
            $question_fifteen .= $chk2.",";  
        }  

    $query = "INSERT INTO questions (question_one,question_two,question_three,question_four,question_five,question_six,question_seven,question_eight,question_nine,question_ten,question_eleven,question_twelve,question_thirteen,question_fourteen,question_fifteen,input_two,input_three,input_four,input_five,input_eight,input_nine,input_fifteen) VALUES ('$question_one','$question_two','$question_three','$question_four','$question_five','$question_six','$question_seven','$question_eight','$question_nine','$question_ten','$question_eleven','$question_twelve','$question_thirteen','$question_fourteen','$question_fifteen','$input_two','$input_three','$input_four','$input_five','$input_eight','$input_nine','$input_fifteen')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: ../assistant-add_patient.php");
    }
    else{
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: ../assistant-add_patient.php");
    }
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];
$birthdate = $_POST['birthdate'];
$age = $_POST['age'];
$contactno = $_POST['contactno'];
$email = $_POST['email'];
$password = $_POST['pass'];
$pg = $_POST['pg'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$fullname = $_POST['firstname']." ".$_POST['lastname'];
$status = 'ACTIVE';


if (addPatient($conn,$fullname,$firstname,$lastname,$middlename,$birthdate,$address,$pg,$age,$password,$email,$contactno,$gender,$status)) {

    $_SESSION['patientErr'] = "addSuccess";
	header("Location: ../assistant-add_patient.php");
	exit();
}

if(isset($_POST['save_radio']))
{
    $firstname = $_POST['firstname'];
		$checkuid = "SELECT * FROM `patient_record` ORDER BY patient_id DESC LIMIT 1";
		$checkresult = mysqli_query($con, $checkuid);
		if(mysqli_num_rows($checkresult)>0)
		{
			if($row = mysqli_fetch_assoc($checkresult)){
			$uid = $row['patient_uid'];
			$get_numbers =str_replace("SR", "", $uid);
			$id_increase = $get_numbers+1;
			$get_string = str_pad($id_increase, 5,0, STR_PAD_LEFT);
			$id = "SR".$get_string;

			$insert_qry = "INSERT INTO `patient_record`(`patient_uid`,`firstname`) VALUES ('$id','$firstname')";
			$result = mysqli_query($conn,$insert_qry);
			if($result)
			{
				echo "Entry Added in Database".'<br>'."registration Number : ".$id;
			}
			else {
				echo "error";
			}

		}

	}


}
?>

