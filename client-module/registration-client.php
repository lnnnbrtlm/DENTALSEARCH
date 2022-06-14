<?php
    include('conn.php');

        if(isset($_POST['btnsubmit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middlename = $_POST['middlename'];
        $age = $_POST['age'];
        $bday = $_POST['birthdaytime'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $guardian = $_POST['guardian'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $fullname = $lastname .", ". $firstname ." ". $middlename;
        if(!empty($firstname) && !empty($lastname) && !empty($middlename) && !empty($age) && !empty($bday) && !empty($contact) && 
        !empty($email) && !empty($password) && !empty($guardian) && !empty($gender)){
            
            $query = "insert into patient_record (fullname, first_name, last_name, middle_name, birthdate, address, parent_guardian, age, password, email, contactno, gender)
            VALUES ('$fullname','$firstname','$lastname','$middlename','$bday','$address','$guardian','$age','$password','$email','$contact','$gender')";

            mysqli_query($conn, $query);
            
        }
        else{
            array_push($errors1, "Please enter a valid input.");
        }
    }
?>
