<?php
require ('connection.php');
require_once('pdf/tcpdf.php');

include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
} 

if(isset($_POST['submit'])){
	$id = $_POST['certID'];
	$query = "SELECT * from certification where id = '$id'";
	$query_run = mysqli_query($conn, $query);
	
		while($row = mysqli_fetch_array($query_run)){
		if($row >0){
		$name = $row['name'];
		$service = $row['service'];
		$doctor = $row['doctor'];
		$remarks = $row['remarks'];
	}else{
		echo "error";
	}}

class PDF extends TCPDF
{
		public function Header(){
			
			$imagefile = K_PATH_IMAGES.'logo.jpg';
			$this->Image($imagefile, 30, 10, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			$this->Ln(7); //space
			$this->SetFont('helvetica','B',20); //font name/style/size
			$this->Cell(189,5,'Dr. Sample Dental Clinic',0,1,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(189,3,'#32 Reliance Road Novaliches, Quezon City',0,1,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(189,3,'dr.sample@gmail.com',0,1,'C');
			$this->SetFont('helvetica','',10);
			$this->Cell(189,3,'09474957983',0,1,'C');
			$this->Ln(4);
			$this->Cell(189,3,'_____________________________________________________________________________________________',0,1,'L');
		}


		public function Footer(){
			
			

	
	$this->setY(55);
	$this->SetFont('helvetica','B',20);
	$this->Cell(180,7,'DENTAL CERTIFICATE',0,1,'C');
	$this->SetFont('helvetica','',10);
	$this->Ln(8);
	$this->setX(150);
	$this->Cell(180,7,'Date:',0,1,'');
	
	$this->Ln(10);
	$this->Cell(180,7,'To Whom It May Concern:',0,1,'');
	$this->Ln(2);
	$this->setX(25);
	$this->Cell(180,7,'This is to certify that ____________________________ was examined and treated
	__________________ at',0,1,'');
	$this->Ln(-2);
	$this->setX(73);
	$this->Cell(180,7,'(Patient Name)                                                                 
	    (Service) ',0,1,'');

	$this->Ln(1);
	$this->Cell(180,7,'the Dental Clinic on ________________ with the following diagnosis:',0,1,'');
	$this->Ln(-2);
	$this->setX(57);
	$this->Cell(180,7,'(Date)',0,1,'');
	$this->Ln(4);
	$this->Multicell(189,15,'_____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________',0,'L',0,1,'','',true);
	
	$this->Ln(15);
	$this->Cell(180,7,'And would need medical attention for ___________________ days barring complications.',0,1,'');
	$this->Ln(-2);
	$this->setX(80);
	$this->Cell(180,7,'(Number of Days)',0,1,'');
	$this->Ln(15);

	$this->SetMargins(0,0,5);
	$this->Cell(180,7,'______________________',0,1,'R');
	
	$this->Ln(-2);
	$this->setX(3);
	$this->Cell(180,7,'Doctor Name',0,1,'R');


		}
}
/* Date
// Page Number
date_default_timezone_set("Asia/Manila");
$today = date("F j, Y/ g:i A", time());

$this->Cell(25,5,'Generation Date/Time: '.$today,0,0,'L');
$this->Cell(164,5,'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(),0,false,'R',0,'',0,false,'T','M');
*/

// create new PDF document
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Lennon Bartolome');
$pdf->SetTitle('Medicine List');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
$pdf->setMargins(50,70,0);

$pdf->setY(99);
$pdf->setX(73);
$pdf->SetFont('dejavusans', '', 10, '', true);
$pdf->Cell(10,5,$name.'',0,1,);


$pdf->Ln(4);

}
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_start();
$pdf->Output('example_001.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+









?>