<?php
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeception;

require 'SMTP/vendor/autoload.php';

if(isset($_POST['btnNext'])){
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$fullname = $firstname." ".$lastname;
$age = $_POST['clientAge'];
$contact = $_POST['contact'];
$password = $_POST['pass'];
$guardian = $_POST['guardian'];
$gender = $_POST['gender'];
$birthday = $_POST['birthdate'];
$address = $_POST['address'];
$msg = "";
$css_class = "";

//Instantation and passing 'true' enables execeptions
$mail = new PHPMailer(true);

try{
    //enable verbose debug output
    $mail->SMTPDebug = 0; //SMTP Debug Server
    //Send using SMTP
    $mail->isSMTP();
    //Set the SMTP server through 
    $mail->Host = "smtp.gmail.com";
    //Enable SMTP authentication
    $mail->SMTPAuth = true;
    //SMTP Username
    $mail->Username = "environmentalmoocs@gmail.com";
    //SMTP password
    $mail->Password = "environmental";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //TCP port to connect to, user 465 for 'PHP::ENCRYPTION_SMTPS' above 
    $mail->Port = 587;
    //Recepients
    $mail->setFrom('environmentalmoocs@gmail.com', 'environmentalmoocs@gmail.com');
    //add a recipient   
    $mail->addAddress($email, $fname);
    //Set email format to HTML
    $mail->isHTML(true);
    $verification_code = substr(number_format(time() * rand(), 0, '', ''),0, 6);
    $mail->Subject = "Email Verification";
    $mail->Body = "<p> Your Verification code is : <b style='font-size:30px'>". $verification_code. "</b></p>";
    $mail->send();
    //echo Message has been sent;

    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    //insert in user tables

$checkAvailability ="SELECT * FROM patient_record WHERE email='$email'";
$checkAvailability_run = mysqli_query($conn,$checkAvailability);

if(mysqli_num_rows($checkAvailability_run) >0){
  $msg1 = "This email has already been used";
  $css_class = "alert-danger";
  header('registration-1.php');
}else{
  $allowedExts4=array("pdf");
  $temp4=explode(".",$_FILES["profileImg"]["name"]);
  $extension4=end($temp4);
  $upload_pdf4=$_FILES["profileImg"]["name"];
  move_uploaded_file($_FILES["profileImg"]["tmp_name"], "profile pictures/".$_FILES["profileImg"]["name"]);

  $conn1 = mysqli_connect('localhost', 'root', '', 'db_dentalclinic');
  $mysql = mysqli_query($conn1,"INSERT INTO `patient_record` (`profile_img`, `fullname`, `first_name`, `last_name`, `birthdate`, `address`, `parent_guardian`,`age`, `password`, `email`, `contactno`, `gender`,`status`) 
  VALUES('$upload_pdf4', '$fullname', '$firstname','$lastname', '$birthday', '$address', '$guardian','$age', '$password', '$email', '$contact', '$gender','INACTIVE')");
	$mysql2 = mysqli_query($conn1,"INSERT INTO `questions` (`question_one`, `question_two`, `input_two`, `question_three`, `input_three`, `question_four`,`input_four`, `question_five`, `input_five`, `question_six`, `question_seven`, `question_eight`, `input_eight`,
  `question_nine`,`input_nine`, `question_ten`, `question_eleven`, `question_twelve`, `question_thirteen`, `question_fourteen`, `question_fifteen`, `input_fifteen`)
  VALUES(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ')"); 
  
      if(!$mysql || !$mysql2){
                echo mysqli_error($conn1);
    die();
            }else{
              header('location: registration-3.php');
}
}
}catch(Exeption $e){
  die(mysqli_error($conn));
}
}
?>