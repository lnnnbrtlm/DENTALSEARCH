<?php  



 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "db_dentalclinic");  
      $sql = "SELECT * FROM prescription_list WHERE prescription_id = ";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["meds"].'</td>  
                          <td>'.$row["dosage"].'</td>
                          <td>'.$row["frequency"].'</td> 
                          <td>'.$row["durationunit"].'</td> 
                     </tr> 


                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('TCPDF-main/tcpdf.php');  

     

     class PDF extends TCPDF
{
          public function Header(){
               $imagefile = K_PATH_IMAGES.'logo.jpg';
               $this->Image($imagefile, 20, 10, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
               $this->Cell(189,3,'_______________________________________________________________________________________________',0,1,'L');

               $this->Ln(5);

               
               

          }

          public function Footer(){
                    $this->SetY(250);//Position at 15 mm from bottom
                    $this->Ln(5);
                    $this->SetFont('helvetica','8',12);

                    // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

                    //$this->MultiCell(189, 15, 'The market is valid for ____________ Days from the date I/we have deposited above _________ receives the above securities in advance.', 0, 'L', 0, 1, '', '', true);
                    
                    $this->Cell(20,1,'_____________________',0,0);
                    $this->Cell(118,1,'',0,0);
                    $this->Cell(51,1,'_____________________',0,1);
                    $this->Cell(20,5,'      Assistant Signature',0,0);
                    $this->Cell(118,5,'',0,0);
                    $this->Cell(51,5,'        Doctor Signature',0,1);

                    $this-> Ln(20);
                    //Set Font
                    $this->SetFont('helvetica', 'I', 12);
                    //page number
                    date_default_timezone_set("Asia/Manila");
                    $today = date("F j, Y/ g:i A", time());

                    $this->Cell(25,5,'Generation Date/Time: '.$today,0,0,'L');
                    $this->Cell(164,5,'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(),0, false, 'R', 0, '', 0, false, 'T', 'M');
          }
     }
      
      $obj_pdf = new PDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");

     
      $obj_pdf->AddPage(); 
      $obj_pdf->SetAuthor('Nicola Asuni');

      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(true);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $content = '';  
      $content .= '  

      <br><br><br><br><br><br><br><br>

      <h3 align="center">Dr. Sample Dental Clinic Equipments Inventory</h3><br /><br />
        
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                               <th>Equipment ID</th>  
                               <th>Equipment Name</th>  
                               <th>Date Requested</th>
                               <th>Date Defected</th> 
                               <th>Quantity</th> 
           </tr>  

           


      ';  
     

      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  

 
 ?>