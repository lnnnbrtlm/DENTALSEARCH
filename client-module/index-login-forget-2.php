<?php
include('session.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeception;

require 'SMTP/vendor/autoload.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $verification_code = $_POST['code'];
	


    $sql = "UPDATE patient_record SET `password` = 'Abcd_123' WHERE email = '$email' AND verification_code = '$verification_code'";
    $result = $conn->query($sql);
    
  
        
$sqlSel = "SELECT * FROM patient_record WHERE email='$email' AND verification_code ='$verification_code'";
$result3 = mysqli_query($conn, $sqlSel);
if(mysqli_num_rows($result3)>0){

         /* //Instantation and passing 'true' enables execeptions
          $mail = new PHPMailer(true);
          try {
              //enable verbose debug output
              $mail->SMTPDebug = 0; //SMTP Debug Server
              //Send using SMTP
             // $mail->isSMTP();
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
              $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
              $mail->Subject = "Email Verification";
              $mail->Body = "<p> Your new password is : <b style='font-size:30px'> Abcd_123 </b></p>";
              
              //echo Message has been sent;
              $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
              if($mail->send()){*/
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Verification Success: Your Password has been set to Abcd_123');
              window.location.href='index.php';
              </script>");
             /* }
        exit();
    }catch(Exeption $e){
        die(mysqli_error($conn));
      }*/
    }else{
        $msg1 = "Verification code is wrong.";
        $css_class = "alert-danger";
    


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
    <title>FORGET PASSWORD | DENTALSEARCH</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">

        <form class="login-form text-center" method="post">

        <div class="mb-5"><span class="text-dark mx-1 logo-nav">DENTAL<span style="color:#fd9f35;">SEARCH</span></div>
            <h5>OTP</h5>
            
              <?php if(!empty($msg1)): ?>
						<div class="alert <?php echo $css_class; ?>">
							<?php echo $msg1;?>
						</div>
				<?php endif; ?>

            <div class="container text-center"><h5>Verification Email Sent to</h5><?php echo $_GET['email']; ?>
           <br> <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" name="code" placeholder="Enter OTP" onKeyDown="limitText(this,30);" onKeyUp="limitText(this,30)">
            </div> <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
            <small>Enter the OTP that has been sent to your email.</small>

            

           
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