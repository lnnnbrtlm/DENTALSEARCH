<?php 
session_start();
include 'connection.php';
include 'function.php';



$homepage_header = $_POST['update1'];
$homepage_description = $_POST['update2'];
$service_one = $_POST['update3'];
$service_two = $_POST['update4'];
$service_three = $_POST['update5'];
$about_tech_header = $_POST['update6'];
$about_tech_description = $_POST['update7'];
$about_tech_headerone = $_POST['update8'];
$about_tech_description_one = $_POST['update9'];
$about_tech_header_two = $_POST['update10'];
$about_tech_description_two = $_POST['update11'];
$about_tech_header_three = $_POST['update12'];
$about_tech_description_three = $_POST['update13'];
$faq_one = $_POST['update14'];
$faq_one_answer = $_POST['update15'];
$faq_two = $_POST['update16'];
$faq_two_answer = $_POST['update17'];
$faq_three = $_POST['update18'];
$faq_three_answer = $_POST['update19'];
$aboutus_header = $_POST['update20'];
$aboutus_description = $_POST['update21'];
$aboutus_founded = $_POST['update22'];
$doctor_one = $_POST['update23'];
$doctor_two = $_POST['update24'];
$doctor_three = $_POST['update25'];





if (updateContent($conn,$homepage_header,$homepage_description,$service_one,$service_two,$service_three,
$about_tech_header,$about_tech_description,$about_tech_headerone,$about_tech_description_one,$about_tech_header_two,
$about_tech_description_two,$about_tech_header_three,$about_tech_description_three,$faq_one,$faq_one_answer,
$faq_two,$faq_two_answer, $faq_three,$faq_three_answer,$aboutus_header,$aboutus_description,$aboutus_founded,
$doctor_one, $doctor_two,$doctor_three)){

    $_SESSION['upPatientErr'] = "upSuccess";
    header("Location: ../assistant-customize-content.php");
exit(); 
}


?>