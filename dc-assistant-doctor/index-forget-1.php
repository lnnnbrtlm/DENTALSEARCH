<?php
include('session.php');
if (isset($_SESSION['login_admin1'])) {
    header("location: assistant-index.php");
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeception;

require 'SMTP/vendor/autoload.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $firstname = 'OWANG';
    $sql = "SELECT * FROM user_accounts WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){

//Instantation and passing 'true' enables execeptions
$mail = new PHPMailer(true);
    try{
    //enable verbose debug output
    $mail->SMTPDebug = 0; //SMTP Debug Server
    //Send using SMTP
    //$mail->isSMTP();
    //Set the SMTP server through 
    $mail->Host = "mail.4r-dentalclinic.com";
    //Enable SMTP authentication
    $mail->SMTPAuth = true;
    //SMTP Username
    $mail->Username = "noreply@4r-dentalclinic.com";
    //SMTP password
    $mail->Password = "x1fGGtRcFo8xMiMl";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //TCP port to connect to, user 465 for 'PHP::ENCRYPTION_SMTPS' above 
    $mail->Port = 587;
    //Recepients
    $mail->setFrom('noreply@4r-dentalclinic.com', 'noreply@4r-dentalclinic.com');
    //add a recipient   
    $mail->addAddress($email, $firstname);
    //Set email format to HTML
    $mail->isHTML(true);
    $verification_code = substr(number_format(time() * rand(), 0, '', ''),0, 6);
    $mail->Subject = "Email Verification";
    $mail->Body = "<p> Your Verification code is : <b style='font-size:30px'>". $verification_code. "</b></p>";
    $mail->send();
    //echo Message has been sent;
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        $sql1 = "UPDATE user_accounts SET verification_code = '$verification_code' WHERE email='$email'";
        $result1 = mysqli_query($conn, $sql1);
        if($result1){
    //insert in user tables
    header("location: index-forget-2.php?email=$email");
        }


    }catch(Exeption $e){
  die(mysqli_error($conn));
}
}else{
    echo ("<script LANGUAGE='JavaScript'>
        window.alert('Email Unavailable');
        window.location.href='index-forget-2-login.php';
        </script>");
}
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="img/tooth.ico">
    <link rel="stylesheet" href="login-style.css">
    <title>FORGET PASSWORD (Admin) | DENTALSEARCH</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">

<form class="login-form text-center" method="post">

           <div class="mb-5"><span class="text-light mx-1 logo-nav">DENTAL<span style="color:#fd9f35">SEARCH</span></span></div>
            
            <h5 class="pb-2">Forget Password</h5>
            <?php include('loginvalidation.php') ?>
            <?php include('errors.php'); ?>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" name="email" placeholder="Type your email address" onKeyDown="limitText(this,30);" onKeyUp="limitText(this,30)">
            </div>
            <small>Please enter your email address so we can send you a new password.</small>
            <button type="submit" name="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Submit</button>
            <p class="mt-3 font-weight-normal">Return to login. <a href="index.php"><strong>Back</strong></a></p>
          </form>
            
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript">
        function limitText(limitField, limitNum) {
            if (limitField.value.length > limitNum) {
                limitField.value = limitField.value.substring(0, limitNum);
            }
        }
    </script>
</body>

</html>