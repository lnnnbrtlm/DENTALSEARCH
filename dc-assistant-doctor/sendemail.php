<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $body = $_POST['body'];

   require_once "PHPMailer/PHPMailer.php";
   require_once "PHPMailer/SMTP.php";
   require_once "PHPMailer/Exception.php";


   $mail = new PHPMailer();

   // smtp settings
   $mail->isSMTP();
   $mail->Host = "smtp.gmail.com";
   $mail->SMTPAuth = true;
   $mail->Username = "for.php.mail69@gmail.com";  //gmail address
   $mail->Password = "_forphpmail69";         //gmail password
   $mail->Port = 465;
   $mail->SMTPSecure = "ssl";

   // email settings
   $mail->isHTML(true);
   $mail->setFrom($email, $name); // Katabi ng user image
   $mail->addAddress($email); //gmail address ng pagsesendan
   $mail->Subject = ("$email ($subject)"); // headline
   $mail->Body = $body; // textarea
   
   if($mail->send()){
      $status = "success";
      $response = "Email is sent!";
   } else {
      $status = "failed";
      $response = "Something is wrong: <br/>". $mail->ErrorInfo;
   }

   exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    
</body>
</html>