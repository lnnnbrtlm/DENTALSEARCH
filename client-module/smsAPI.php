<?php
    if(isset($_POST['submit'])){

        include 'smsAPIContr.php';
        $reciever = $_POST['reciever'];
        $message = $_POST['message'];
        $smsAPICode = "TR-YOKAI926861_R2DGJ";
        $smsAPIPassword ="a2fcekx8lj";

        $send = new owang(); 
        $send->itexmo($reciever, $message,$smsAPICode,$smsAPIPassword);

        if($send == false){
            header("location: index.php?error=itextmo: no responses from server");
        }
        elseif($send == true){
            header("location: index.php?error=none");
        }
        else{
            header("location: index.php?something wrong just happen");
        }
    }

?>