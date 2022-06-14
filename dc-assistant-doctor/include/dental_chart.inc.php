<?php 
require_once 'connection.php';
require_once 'function.php';

$ref_no = $_POST['ref_no'];
$selectedTooth = $_POST['selectedTooth'];
$conditionSelect = $_POST['conditionSelect'];
$restoSelect = $_POST['restoSelect'];
$position = $_POST['position'];
$pid = $_POST['pid'];
$conditionLegend = getToothCond($conn, $conditionSelect);
$restoLegend = getToothPro($conn, $restoSelect);
$status = "Planned";
$restoPrice = getProPrice($conn, $restoSelect);
$patient_name = $_POST['patientname2'];
$date = date('Y-m-d');
$ref_no1 = $_POST['ref_no'];
$pid1 = $_POST['pid'];
$patient_name1 = $_POST['patientname2'];
$date1 = date('Y-m-d');
$clinic_id = $_POST['clinic_id'];
$clinic_name = $_POST['clinic_name'];
$dental_type = $_POST['dental_type'];
$email = $_POST['email'];
$notes = $_POST['notes'];

if($position == '1'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date," "," "," "," ",$mark,$mark," "," "," "," ",$dental_type,$notes, $status)) {
	echo 1;
}	
}

if($position == '2'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date," "," "," "," "," ",$mark," ",$mark," "," ",$dental_type,$notes, $status)) {
	echo 1;
}
}
if($position == '3'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date," "," "," ",$mark,$mark," "," "," "," "," ",$dental_type,$notes, $status)) {
	echo 1;
}	
}
if($position == '4'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date," "," "," "," "," "," ",$mark,$mark," "," ",$dental_type,$notes, $status)) {
	echo 1;
}	
}
if($position == '5'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date," "," ",$mark,$mark," "," "," "," "," "," ",$dental_type,$notes, $status)) {
	echo 1;
}	
}
if($position == '6'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date,$mark,$mark," "," "," "," "," "," "," "," ",$dental_type,$notes, $status)) {
	echo 1;
}	
}
if($position == '7'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date,$mark," "," "," "," "," ",$mark," "," "," ",$dental_type,$notes, $status)) {
	echo 1;
}	
}
if($position == '8'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date," ",$mark,$mark," "," "," "," "," "," "," ",$dental_type,$notes, $status)) {
	echo 1;
}	
}
if($position == '9'){
$mark = '1';
	if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date," "," "," "," "," "," "," "," ",$mark," ",$dental_type,$notes, $status)) {
	echo 1;
}	
}
if($position == '10'){
	$mark = '1';
		if (addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$selectedTooth,$conditionLegend, $restoLegend,$conditionSelect ,$restoSelect,$restoPrice,$date," "," "," "," "," "," "," "," "," ",$mark,$dental_type,$notes, $status)) {
		echo 1;
	}	
	}

	