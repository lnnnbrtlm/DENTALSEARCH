<?php
//===================ADDING OF PATIENT==================================
 function addPatient($conn,$fullname,$first_name,$last_name,$middle_name,$birthdate,$address,$parent_guardian,$age,$password,$email,$contactno,$gender,$status){
// prepare and bind

$stmt = $conn->prepare("INSERT INTO patient_record (fullname,first_name,last_name,middle_name,birthdate,address,parent_guardian,age,password,email,contactno,gender,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssss", $d0,$d1, $d2, $d3,$d4, $d5, $d6,$d7, $d8, $d9, $d10,$d11,$d12);

// set parameters and execute

$d0 = $fullname;
$d1 = $first_name;
$d2 = $last_name;
$d3 = $middle_name;
$d4 = $birthdate;
$d5 = $address;
$d6 = $parent_guardian;
$d7 = $age;
$d8 = $password;
$d9 = $email;
$d10 = $contactno;
$d11 = $gender;
$d12 = $status;

if ($stmt->execute()) {
return true;
}
 }

function DateNow(){

	date_default_timezone_set('Asia/Manila');
  $date = date('h:i:s a m/d/Y');
  
  echo date(' F-d-Y / h:i A', strtotime($date));

}





//=================== ADD BILLING FUNCTION ==================================
function addBillingInfo($conn, $ref_no,$patient_name,$doctor,$service,$price,$date,$status){

  $stmt = $conn->prepare("INSERT INTO billing (ref_no,patient_name,doctor,service,price,date,status) VALUES(?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssss", $d1, $d2, $d3,$d4, $d5, $d6, $d7);

  $d1 = $ref_no;
  $d2 = $patient_name;
  $d3 = $doctor;
  $d4 = $service;
  $d5 = $price;
  $d6 = $date;
  $d7 = $status;

  if ($stmt->execute()){
    return true;
  }
}

function showBillingDetails($conn,$id){
$sql = "SELECT * FROM billing WHERE bill_id ='$id' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    return array($row["bill_id"],$row["patient_id"],$row["patient_name"],$row["service"],$row["date"],$row["status"],$row["amount_paid"],$row["price"],$row["balance"],$row["bill_change"],$row['clinic_name']);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}


//=================== ADD BILLING FUNCTION ==================================
function addBilling($conn, $ref_no,$patient_name,$doctor,$service,$price,$date,$status){

  $stmt = $conn->prepare("INSERT INTO billing (ref_no,patient_name,doctor,service,price,date,status) VALUES(?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssss", $d1, $d2, $d3,$d4, $d5, $d6, $d7);

  $d1 = $ref_no;
  $d2 = $patient_name;
  $d3 = $doctor;
  $d4 = $service;
  $d5 = $price;
  $d6 = $date;
  $d7 = $status;

  if ($stmt->execute()){
    return true;
  }
}
//=======SHOW BILLING LIST===================================================
function showBillingTable($conn){
  $sql = "SELECT * FROM billing";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo " <tr>
          <td>".$row['bill_id']."</td>
          <td>".$row['patient_name']."</td>
          <td>".$row['service']."</td>
          <td>".$row['price']."</td>
          <td>".$row['date']."</td>";
          switch ($row['status']){
          case 'Unpaid':
            echo '<td><span class="badge badge-secondary">'.$row["status"].'</span></td>';
            break;
          
            case 'Paid':
            echo '<td><span class="badge badge-primary">'.$row["status"].'</span></td>';
            break;
            default:
              echo '<td>Something problem</td>';
            }
          echo '<td><button type="button" id="buttonBill" class="viewBillBtn btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button></td></tr>
  ';
    }}else{
      echo '<td>0 result</td>';
    }
  }




 //=======SHOW PRICE ===================================================
 function getPrice($conn, $service_name){
  $sql = "SELECT * FROM `services` WHERE `service_name` = '".$service_name."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
       return $row['price'];
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
  
  
 //=======SHOW CLINIC NAME ===================================================
 function getClinicName($conn, $clinic){
  $sql = "SELECT * FROM `clinic_tbl` WHERE `clinic_id` = '".$clinic."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
       echo $row['clinic_name'];
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
  
    
 //=======SHOW PATIENT CONTACT NO ===================================================
 function getPatientContactNo($conn, $email){
  $sql = "SELECT * FROM `patient_record` WHERE `email` = '".$email."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
       echo $row['contactno'];
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
  //=======SHOW BILLING LIST===================================================
function showConTable($conn){
  $sql = "SELECT * FROM conditiontbl";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
          <td>'.$row["con_legend"].'</td>
          <td>'.$row["t_condition"].'</td>

  </tr>';
    }}else{
      echo '0 result';
    }
  }
    //=======SHOW BILLING LIST===================================================
function showProTable($conn){
  $sql = "SELECT * FROM restotbl";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
          <td>'.$row["pro_legend"].'</td>
          <td>'.$row["t_procedure"].'</td>
          <td>'.$row["price"].'</td>

  </tr>';
    }}else{
      echo '0 result';
    }
  }
  
      //=======SHOW TODAY'S APPOINTMENTS===================================================
function showTodaysAppointments($conn,$clinic){
$date = date('Y-m-d');
  $sql = "SELECT * FROM appointments WHERE clinic_id='$clinic' AND appointment_datentime='$date'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
          <td>'.$row["appointment_datentime"].'</td>
          <td>'.$row["start_time"].'</td>
          <td>'.$row["patient_name"].'</td>
          <td>'.$row["service_name"].'</td>

  </tr>';
    }}else{
      echo '<tr><td colspan="4"> There is no appointments for today.</td></tr>';
    }
  }

//=======SHOW PATIENT LIST===================================================
function showPatient($conn,$clinic){
$sql = "SELECT DISTINCT patient_name,patient_id,email FROM clinic_patients WHERE clinic_id='$clinic'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo ' <tr>
        <td>'.$row["patient_id"].'</td>
        <td>'.$row["patient_name"].'</td>
        <td>'.$row["email"].'</td>
<td>

               
                <button type="button" class="viewxray btn btn-primary" data-toggle="modal" data-target="#xray" title="Upload X-Ray">X-ray</button>
              

      </tr>
      ';
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}

//=======SHOW PATIENT LIST===================================================
function showPatientDDDistinct($conn,$clinic){
$sql = "SELECT DISTINCT patient_name FROM clinic_patients WHERE clinic_id='$clinic'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo '
        <option value="'.$row["patient_name"].'">'.$row["patient_name"].'</option>
      ';
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}


//=======SHOW PATIENT LIST===================================================
function showEmailDDDistinct($conn,$clinic){
$sql = "SELECT DISTINCT email FROM clinic_patients WHERE clinic_id='$clinic'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo '
        <option value="'.$row["email"].'">'.$row["email"].'</option>
      ';
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}

//=======SHOW PATIENT LIST===================================================
function showPatientWithDental($conn,$clinic){
  $sql = "SELECT DISTINCT ref_no,patient_id,patient_name,dental_type FROM dentalchart WHERE clinic_id='$clinic'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
          <td>'.$row["ref_no"].'</td>
          <td>'.$row["patient_id"].'</td>
          <td>'.$row["patient_name"].'</td>
  <td>
  
                  <button type="button" class="viewDentalPatient btn btn-info" title="Patient Dental Chart">View Dental Chart</button>
       
        </tr>
        ';
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
//=======SHOW PATIENT INACTIVE===================================================
function showPatientInactive($conn){
  $sql = "SELECT * FROM patient_record WHERE status='INACTIVE'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
          <td>'.$row["patient_id"].'</td>
          <td>'.$row["first_name"].'</td>
          <td>'.$row["last_name"].'</td>
          <td>'.$row["contactno"].'</td>
          <td>'.$row["gender"].'</td>
  <td>
  
                  <button type="button" class="btn btn-success openRestoremodal" title="Restore"><i class="fa fa-refresh" aria-hidden="true"></i>
                  </button>       
          <button type="button"  class="btn btn-danger opendeletemodal" title="Delete Patient"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
  
        </tr>
        ';
    }
  } else {
    echo "<tr><td>0 results</td></tr>";
  }
  
  //mysqli_close($connection);
  
  }
//=======SHOW Dental Table ===================================================
function showDentalTable($conn, $ref_no){
  $sql = "SELECT * FROM dentalchart WHERE ref_no = '$ref_no' ORDER BY procedure_id DESC";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo " <tr>
          
          <td>".$row['procedure_id']."</td>
          <td>".$row['patient_name']."</td>
          <td>".$row['pro_legend']." ".$row['t_procedure']."</td>
          <td>".$row['tooth_id']."</td>
          <td>".$row['price']."</td>";
          if($row['status'] == 'Planned'){

          echo "<td>
          <form method='POST' action='include/modifyStatusProgress.inc.php'>
          <input type='hidden' name='pro_id' value='".$row['procedure_id']."'/>
          <input type='hidden' name='ref' value='".$row['ref_no']."'/>
          <input type='hidden' name='stats' value='".$row['status']."'/>
          <input type='hidden' name='tooth_id' value='".$row['tooth_id']."'/>
          <span class='badge bg-secondary'>".$row['status']."</span></td>
          <td>".$row['dentaldate']."</td>
          <td>
          <button type='submit' name='toProgress' class='btn btn-primary'><i class='fas fa-spinner'></i></button>
                          </form></td>
                          </tr>";
          }if($row['status'] == 'In Progress'){
            echo "
<form method='POST' action='include/modifyStatusCompleted.inc.php'>
          <input type='hidden' name='pro_id1' value='".$row['procedure_id']."'/>
            <input type='hidden' name='ref1' value='".$row['ref_no']."'/>
          <input type='hidden' name='stats1' value='".$row['status']."'/>
          <input type='hidden' name='tooth_id' value='".$row['tooth_id']."'/>
          <input type='hidden' name='pid' value='".getPID($conn, $row['ref_no'])."'>
          <input type='hidden' name='pname' value='".getPname($conn, $row['ref_no'])."'>
          <input type='hidden' name='dname' value='".getDname($conn, $row['ref_no'])."'>
          <input type='hidden' name='sname' value='".getSname($conn, $row['ref_no'])."'>
            <td><span class='badge bg-primary'>".$row['status']."</span></td><td>".$row['dentaldate']."</td>
                   <td> <button type='submit' name='toComplete' class='btn btn-success'><i class='fas fa-check'></i></button>
                            </form></td>
                            </tr>";
          }if($row['status'] == 'Completed'){
            echo "<td><span class='badge bg-success'>".$row['status']."</span></td><td>".$row['dentaldate']."</td>
                            </td>
                            </tr>";
             }

    }
  }
}

//=======SHOW Dental Table ===================================================
function showDentalTableCompleted($conn){
  $sql = "SELECT * FROM dentalchart WHERE status='Completed'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo " <tr>
          
          <td>".$row['procedure_id']."</td>
          <td>".$row['patient_name']."</td>
          <td>".$row['pro_legend']." ".$row['t_procedure']."</td>
          <td>".$row['dentaldate']."</td>
          <td>".$row['price']."</td>
          <td>".$row['payment_status']."</td>
          <td>
          <button type='button' class='viewConfirmAppointmentBtn1 btn btn-warning '><i class='fa fa-eye' aria-hidden='true'></i></button>
                        </td>          
                            </tr>";
             }

    }
  }


//=======SHOW Dental Table ===================================================
function showDentalTableView($conn, $ref_no){
  $sql = "SELECT * FROM dentalchart WHERE ref_no = '$ref_no' ORDER BY procedure_id DESC";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo " <tr>
          
          <td>".$row['patient_name']."</td>
          <td>".$row['pro_legend']." ".$row['t_procedure']."</td>
          <td>".$row['tooth_id']."</td>
          <td>".$row['price']."</td>";
          if($row['status'] == 'Planned'){

            echo "<td>
            <input type='hidden' name='ref' value='".$row['ref_no']."'/>
            <input type='hidden' name='stats' value='".$row['status']."'/>
            <input type='hidden' name='tooth_id' value='".$row['tooth_id']."'/>
            <span class='badge bg-secondary'>".$row['status']."</span></td>
            <td>".$row['dentaldate']."</td>
                            </tr>";
            }if($row['status'] == 'In Progress'){
              echo "
              <input type='hidden' name='ref1' value='".$row['ref_no']."'/>
            <input type='hidden' name='stats1' value='".$row['status']."'/>
            <input type='hidden' name='tooth_id' value='".$row['tooth_id']."'/>
            <input type='hidden' name='pid' value='".getPID($conn, $row['ref_no'])."'>
            <input type='hidden' name='pname' value='".getPname($conn, $row['ref_no'])."'>
            <input type='hidden' name='dname' value='".getDname($conn, $row['ref_no'])."'>
            <input type='hidden' name='sname' value='".getSname($conn, $row['ref_no'])."'>
              <td><span class='badge bg-primary'>".$row['status']."</span></td><td>".$row['dentaldate']."</td>
                              </tr>";
            }if($row['status'] == 'Completed'){
              echo "<td><span class='badge bg-success'>".$row['status']."</span></td><td>".$row['dentaldate']."</td>
                              </td>
                              </tr>";
               }
             }

    }
  }




//=======SHOW MODAL PATIENT LIST===================================================
function showModalPatient($conn,$patient_id){
$sql = "SELECT * FROM patient_record WHERE patient_id ='".$patient_id."' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

      return array($row["patient_id"],$row["first_name"],$row["last_name"],$row["middle_name"],$row["birthdate"],$row["contactno"],$row["gender"],$row["age"],$row["address"],$row['email'],$row['parent_guardian']);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}


//=======SHOW MODAL PATIENT LIST===================================================
function showDentalNew($conn,$patient_id){
  $sql = "SELECT * FROM appointments WHERE patient_id ='".$patient_id."' ORDER BY appointment_refno DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["patient_id"],$row["appointment_refno"],$row["patient_name"],$row["email"],$row["doctor_name"],$row["service_name"],$row["branch"],$row["note"],$row["inchair_datentime"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  


//=======SHOW MODAL PATIENT LIST===================================================
function showModalQuestions($conn,$patient_id){
  $sql = "SELECT * FROM questions WHERE patient_id ='".$patient_id."' ";
  $result = mysqli_query($conn, $sql);
  $sql1 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_eight LIKE '%Local%'";
  $result1 = mysqli_query($conn, $sql1);
  $sql2 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_eight LIKE '%Penicillin%'";
  $result2 = mysqli_query($conn, $sql2);
  $sql3 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_eight LIKE '%Sulfa%'";
  $result3 = mysqli_query($conn, $sql3);
  $sql4 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_eight LIKE '%Aspirin%'";
  $result4 = mysqli_query($conn, $sql4);
  $sql5 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_eight LIKE '%Latex%'";
  $result5 = mysqli_query($conn, $sql5);
  $sql6 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_eight LIKE '%Others%'";
  $result6 = mysqli_query($conn, $sql6);
  $sql7 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%High%'";
  $result7 = mysqli_query($conn, $sql7);
  $sql8 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%Low%'";
  $result8 = mysqli_query($conn, $sql8);
  $sql9 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%Epilepsy%'";
  $result9 = mysqli_query($conn, $sql9);
  $sql10 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%AIDS%'";
  $result10 = mysqli_query($conn, $sql10);
  $sql11 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%Sexually%'";
  $result11 = mysqli_query($conn, $sql11);
  $sql12 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%Ulcers%'";
  $result12 = mysqli_query($conn, $sql12);
  $sql13 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%Seizure%'";
  $result13 = mysqli_query($conn, $sql13);
  $sql14 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%Rapid%'";
  $result14 = mysqli_query($conn, $sql14);
  $sql15 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%Radiation%'";
  $result15 = mysqli_query($conn, $sql15);
  $sql16 = "SELECT * FROM questions WHERE patient_id = '.$patient_id.' AND question_fifteen LIKE '%Joint%'";
  $result16 = mysqli_query($conn, $sql16);
  $local =" "; $peni = " "; $sulfa = " "; $aspirin = " "; $latex = " "; $others = " "; $radiation= " ";
  $hbp= " "; $lbp= " "; $epi= " "; $aids= " "; $std= " "; $stu= " "; $seiz= " "; $rapid= " "; $joint= " ";
  if(mysqli_fetch_assoc($result1)){
    $local='1';
  }
  if(mysqli_fetch_assoc($result2)){
    $peni='1';
  }
  if(mysqli_fetch_assoc($result3)){
    $sulfa='1';
  }
  if(mysqli_fetch_assoc($result4)){
    $aspirin='1';
  }
  if(mysqli_fetch_assoc($result5)){
    $latex='1';
  }
  if(mysqli_fetch_assoc($result6)){
    $others='1';
  }
  if(mysqli_fetch_assoc($result7)){
    $hbp='1';
  }
  if(mysqli_fetch_assoc($result8)){
    $lbp='1';
  }
  if(mysqli_fetch_assoc($result9)){
    $epi='1';
  }
  if(mysqli_fetch_assoc($result10)){
    $aids='1';
  }
  if(mysqli_fetch_assoc($result11)){
    $std='1';
  }
  if(mysqli_fetch_assoc($result12)){
    $stu='1';
  }
  if(mysqli_fetch_assoc($result13)){
    $seiz='1';
  }
  if(mysqli_fetch_assoc($result14)){
    $rapid='1';
  }
  if(mysqli_fetch_assoc($result15)){
    $radiation='1';
  }
  if(mysqli_fetch_assoc($result16)){
    $joint='1';
  }


  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["patient_id"],$row["question_one"],$row["question_two"],$row["input_two"],$row["question_three"],$row["input_three"],$row["question_four"],$row["input_four"],$row["question_five"],$row["input_five"],$row["question_six"],$row["question_seven"],$local,$peni,$sulfa,$aspirin,$latex,$others,$row["input_eight"],$row["question_nine"],$row["input_nine"],$row["question_ten"],$row["question_eleven"],$row["question_twelve"],
        $row["question_thirteen"],$row["question_fourteen"],$hbp,$lbp,$epi,$aids,$std,$stu,$seiz,$rapid,$radiation,$joint,$row["input_fifteen"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
//===================ADDING OF SERVICE==================================
function addService($conn,$clinic,$upload_pdf4,$service_name,$service_des,$price,$status){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO services (profile_img,service_name,service_des,price,clinic_id,status) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $d1, $d2, $d3,$d4,$d5,$d6);
  
  // set parameters and execute
  $d1 = $upload_pdf4;
  $d2 = $service_name;
  $d3 = $service_des;
  $d4 = $price; 
  $d5 = $clinic;
  $d6 = $status;
  

  if ($stmt->execute()) {
  return true;
  }
  }
  //===================ADDING OF SERVICE==================================
function addDoctor($conn,$upload_pdf4,$doctor_fullname,$clinic){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO doctor_tbl (doctor_img,doctor_fullname,clinic_id) VALUES (?,?,?)");
  $stmt->bind_param("sss", $d1, $d2,$d3);
  
  // set parameters and execute
  $d1 = $upload_pdf4;
  $d2 = $doctor_fullname;
  $d3 = $clinic;


  if ($stmt->execute()) {
  return true;
  }
  }
  //===================ADDING OF SERVICE==================================
function addProcedure($conn,$pro_legend,$t_procedure,$price){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO restotbl (pro_legend,t_procedure,price) VALUES (?,?,?)");
  $stmt->bind_param("sss", $d1, $d2, $d3);
  
  // set parameters and execute
  $d1 = $pro_legend;
  $d2 = $t_procedure;
  $d3 = $price;
 
  

  if ($stmt->execute()) {
  return true;
  }
  }
   //===================ADDING OF SERVICE==================================
function addCondition($conn,$con_legend,$t_condition){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO conditiontbl (con_legend,t_condition) VALUES (?,?)");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = $con_legend;
  $d2 = $t_condition;

 
  

  if ($stmt->execute()) {
  return true;
  }
  }
  //===================ADDING OF BRANCH==================================
function addBranch($conn,$upload_pdf4,$branch_name,$branch_address,$status){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO tbl_branch (profile_img,branch_name,branch_address,status) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $d1, $d2, $d3, $d4);
  
  // set parameters and execute
  $d1 = $upload_pdf4;
  $d2 = $branch_name;
  $d3 = $branch_address;
  $d4 = $status;

  

  if ($stmt->execute()) {
  return true;
  }
  }
//===================UPDATE OF SERVICE==================================
function updateService($conn,$profile_img,$service_id,$service_name,$service_des,$price){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE services SET profile_img =?, service_name = ?, service_des = ?, price = ? WHERE service_id = ?");
  $stmt->bind_param("sssss", $d1, $d2, $d3, $d4, $d5);
  
  // set parameters and execute
  $d1 = $profile_img;
  $d2 = $service_name;
  $d3 = $service_des;
  $d4 = $price;
  $d5 = $service_id;

  if ($stmt->execute()) {
  return true;
  }
  }
  //===================UPDATE OF SERVICE==================================
function updateDoctor($conn,$doctor_img,$up_doctorid,$upfullname){
  // prepare and bind
$stmt = $conn->prepare("UPDATE doctor_tbl SET doctor_img =?, doctor_fullname= ? WHERE doctor_id = ?");
  $stmt->bind_param("sss", $d1, $d2, $d3);
  
  // set parameters and execute
  $d1 = $doctor_img;
  $d2 = $doctor_fullname;
  $d3 = $doctor_id;


  if ($stmt->execute()) {
  return true;
  }
  }
  //===================UPDATE OF SERVICE==================================
function updateProcedure($conn,$id,$pro_legend,$t_procedure,$price){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE restotbl SET pro_legend =?, t_procedure = ?, price = ? WHERE id = ?");
  $stmt->bind_param("ssss", $d1, $d2, $d3, $d4);
  
  // set parameters and execute
  $d1 = $pro_legend;
  $d2 = $t_procedure;
  $d3 = $price;
  $d4 = $id;

  if ($stmt->execute()) {
  return true;
  }
  }
   //===================UPDATE OF SERVICE==================================
function updateCondition($conn,$id,$con_legend,$t_condition){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE conditiontbl SET con_legend =?, t_condition = ? WHERE id = ?");
  $stmt->bind_param("sss", $d1, $d2, $d3);
  
  // set parameters and execute
  $d1 = $con_legend;
  $d2 = $t_condition;
  $d3 = $id;

  if ($stmt->execute()) {
  return true;
  }
  }
  //===================UPDATE OF SERVICE==================================
function updateServiceNoImage($conn,$service_id,$service_name,$service_des,$price){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE services SET service_name = ?, service_des = ?, price = ? WHERE service_id = ?");
  $stmt->bind_param("ssss", $d1, $d2, $d3, $d4);
  
  // set parameters and execute
  $d1 = $service_name;
  $d2 = $service_des;
  $d3 = $price;
  $d4 = $service_id;

  if ($stmt->execute()) {
  return true;
  }
  }
   //===================UPDATE OF SERVICE==================================
function updateDoctorNoImage($conn,$up_doctorid,$upfullname){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE doctor_tbl SET  doctor_fullname = ?  WHERE doctor_id = ?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = $upfullname;
  $d2 = $up_doctorid;

  if ($stmt->execute()) {
  return true;
  }
  }
  //===================UPDATE OF BRANCH==================================
function updateBranch($conn,$upbranch_id,$upbranch_address,$upbranch_name){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE tbl_branch SET branch_address = ?, branch_name = ? WHERE branch_id = ?");
  $stmt->bind_param("sss", $d1, $d2, $d3);
  
  // set parameters and execute
  
  $d1 = $upbranch_address;
  $d2 = $upbranch_name;
  $d3 = $upbranch_id;


  if ($stmt->execute()) {
  return true;
  }
  }
  //=======SHOW SERVICE DROPDOWN===================================================
function showServiceDD($conn, $clinic){
$sql = "SELECT * FROM services WHERE clinic_id='$clinic' AND `status`='ACTIVE'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

      echo '
      <option value="'.$row['service_id'].'">'.$row['service_name'].'</option>
      ';

  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}
  //=======SHOW SERVICE DROPDOWN===================================================
  function showProcedureDD($conn){
    $sql = "SELECT * FROM restotbl";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
    
          echo '
          <option value="'.$row['id'].'">'.$row['t_procedure'].'</option>
          ';
    
      }
    } else {
      echo "0 results";
    }
    
    //mysqli_close($connection);
    
    }

  //=======SHOW PROCEDURE DROPDOWN===================================================
  function showProDD($conn){
    $sql = "SELECT * FROM restotbl";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
    
          echo '
          <option value="'.$row['t_procedure'].'">'.$row['pro_legend']." ".$row['t_procedure'].'</option>
          ';
    
      }
    } else {
      echo "0 results";
    }
    
    //mysqli_close($connection);
    
    }

     //=======SHOW CONDITION DROPDOWN===================================================
  function showConDD($conn){
    $sql = "SELECT * FROM conditiontbl";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
    
          echo '
          <option value="'.$row['t_condition'].'">'.$row['con_legend']." ".$row['t_condition'].'</option>
          ';
    
      }
    } else {
      echo "0 results";
    }
    
    //mysqli_close($connection);
    
    }
 //=======SHOW PATIENT DROPDOWN===================================================

 function showPatientDD($conn){

  $sql = "SELECT * FROM patient_record ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '

        <option value="'.$row['first_name'].'">'.$row['first_name'].' '.$row['last_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

  //=======SHOW PATIENT DROPDOWN===================================================

 function showPatientDDD($conn,$clinic){

  $sql = "SELECT * FROM clinic_patients WHERE clinic_id = '$clinic'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo "

        <option value='".$row['patient_id']."'>".$row['patient_name']."</option>
        ";
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

   //=======SHOW PATIENT DROPDOWN===================================================
 function showBranchDD($conn){
  $sql = "SELECT * FROM tbl_branch";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '

        <option value="'.$row['branch_name'].'">'.$row['branch_address'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
   //=======SHOW PATIENT CERTIFICATE===================================================
 function showPatientCC($conn){
  $sql = "SELECT * FROM patient_record";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '

        <option value="'.$row['fullname'].'">'.$row['first_name'].' '.$row['last_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

  //=======SHOW PATIENT NAME PRESCRIPTION ===================================================
 function showPatientPL($conn){
  $sql = "SELECT * FROM patient_record";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '

        <option value="'.$row['fullname'].'">'.$row['first_name'].' '.$row['last_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

 //=======SHOW PATIENT NAME===================================================
 function getPatientName($conn, $id){
  $sql = "SELECT * FROM patient_record WHERE patient_id = '".$id."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
       return $row['first_name'].' '.$row['last_name'];
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

  
 //=======SHOW PATIENT NAME===================================================
 function getPatientId($conn, $email){
  $sql = "SELECT * FROM patient_record WHERE email = '".$email."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
       return $row['patient_id'];
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
 //=======SHOW PATIENT NAME===================================================
 function getPatientEmail($conn, $id){
  $sql = "SELECT * FROM patient_record WHERE patient_id = '".$id."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
       return $row['email'];
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
  
   //=======SHOW DOCTOR DROPDOWN===================================================
 function showDoctorDD($conn){
  $sql = "SELECT * FROM user_accounts where user_type = 'Doctor'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['first_name'].' '.$row['last_name'].'">'.$row['first_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
   //=======SHOW SERVICE DROPDOWN===================================================
function showServiceDDD($conn,$clinic){
  $sql = "SELECT * FROM services WHERE clinic_id = '$clinic'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['service_name'].'">'.$row['service_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
//=======SHOW SERVICE DROPDOWN===================================================
function showRestoDDD($conn){
  $sql = "SELECT * FROM restotbl";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['t_procedure'].'">'.$row['t_procedure'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
  
function showServicePriceDDD($conn,$clinic){
  $sql = "SELECT * FROM services WHERE clinic_id = '$clinic'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['price'].'">'.$row['price'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
     //=======SHOW SERVICE DROPDOWN===================================================
function showDoctorDDD($conn,$clinic){
  $sql = "SELECT * FROM doctor_tbl WHERE clinic_id = '$clinic'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['doctor_id'].'">'.$row['doctor_fullname'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
   //=======SHOW SERVICE DROPDOWN===================================================
function showServiceDDP($conn, $clinic){
  $sql = "SELECT * FROM services WHERE clinic_id='$clinic'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option name="price" value="'.$row['price'].'">'.$row['service_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
   //=======SHOW MAPS===================================================
 function showMaps($conn){
  $sql = "SELECT * FROM map";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['map_name'].'">'.$row['map_address'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
//=======SHOW SERVICE TABLE===================================================
function showServiceTable($conn,$clinic){
$sql = "SELECT * FROM services WHERE `status`='ACTIVE' AND clinic_id='$clinic'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo  "<tr>
<td style='text-align: center;'><span style='display: none;'>".$row['service_id']."</span><img src='include/profile pictures/".$row['profile_img']."' width='50'></td></center>
        <td>".$row['service_name']."</td>
        <td>".$row['service_des']."</td>
        <td>".$row['price']."</td>
        <td>
        <button type='button'  class='btn btn-danger opendeletemodal' title='Move to Archive'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
       

      ";
      
  }
} else {
  echo "0 results";
}
}//=======SHOW SERVICE TABLE===================================================
function showSalesTable($conn){
  $sql = "SELECT * FROM sales";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo  "<tr>
  
          <td>".$row['sale_name']."</td>
          <td>".$row['sale_quantity']."</td>
          <td>".$row['sale_price']."</td>
          
         
  
        ";
        
    }
  } else {
    echo "0 results";
  }
  }
//=======SHOW SERVICE TABLE===================================================
function showClinicTableInactive($conn){
  $sql = "SELECT * FROM clinic_tbl WHERE `status`='INACTIVE'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo  "<tr>
 
          <td>".$row['clinic_name']."</td>
          <td>".$row['clinic_address']."</td>
           <td>".$row['clinic_email']."</td>
             <td>".$row['clinic_contact']."</td>
              <td>".$row['status']."</td>
         
         
  
        ";
        
    }
  } else {
    echo "<td>0 results</td>";
  }
  }
  //=======SHOW SERVICE TABLE===================================================
function showFeedbackTable1($conn){
  $sql = "SELECT * FROM site_feedback";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo  "<tr>
         <td>".$row['clinic_name']."</td>
          <td>".$row['rate']."</td>
          <td>".$row['comment']."</td>
 
        ";
        
    }
  } else {
    echo "<td>0 results</td>";
  }
  }
//=======SHOW SERVICE TABLE===================================================
function showFeedbacks($conn,$clinic){
  $sql = "SELECT * FROM feedback WHERE clinic_id='$clinic'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo  "<tr>
          <td>".$row['patient_name']."</td>
   <td>".$row['rate']."</td>
          <td>".$row['feedback']."</td>
         
  
        ";
        
    }
  } else {
    echo "0 results";
  }
  
//mysqli_close($connection);

}
//=======SHOW BRANCH TABLE===================================================
function showBranchTable($conn){
  $sql = "SELECT * FROM tbl_branch WHERE status='ACTIVE'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>

  <td style='text-align: center;'><span style='display: none;'>".$row['branch_id']."</span><img src='include/profile pictures/".$row['profile_img']."' width='50'></td></center>
          <td>".$row['branch_name']."</td>
          <td>".$row['branch_address']."</td>

          <td>
          <button type='button'  class='btn btn-danger opendeletemodal' title='Move to Archive'><i class='fa fa-archive' aria-hidden='true'></i></button></td>
        ";
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  //=======SHOW BRANCH TABLE===================================================
function showBranchTableInactive($conn){
  $sql = "SELECT * FROM tbl_branch WHERE status='INACTIVE'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
  <td style='text-align: center;'><span style='display: none;'>".$row['branch_id']."</span><img src='include/profile pictures/".$row['profile_img']."' width='50'></td></center>
          <td>".$row['branch_name']."</td>
          <td>".$row['branch_address']."</td>
        
          <td>
          <button type='button' class='btn btn-success openrestoreBranch' title='Restore'><i class='fa fa-refresh' aria-hidden='true'></i>
          </button>       
  <button type='button'  class='btn btn-danger opendeleteBranch' title='Delete Patient'><i class='fa fa-trash-o' aria-hidden='true'></i></button>
         ";
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
//===================UPDATE OF PATIENT==================================
function updatePatient($conn,$patient_id,$first_name,$last_name,$middle_name,$birthdate,$address,$parent_guardian,$age,$email,$contactno,$gender){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE patient_record
    SET first_name = ?, last_name = ?, middle_name = ?, birthdate = ?, address = ?, parent_guardian = ?, age = ?, email = ?, contactno = ?, gender = ?
    WHERE patient_id = ?");
  $stmt->bind_param("sssssssssss", $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9, $d10, $d11);
  
  // set parameters and execute
  $d1 = $first_name;
  $d2 = $last_name;
  $d3 = $middle_name;
  $d4 = $birthdate;
  $d5 = $address;
  $d6 = $parent_guardian;
  $d7 = $age;
  $d8 = $email;
  $d9 = $contactno;
  $d10 = $gender;
  $d11 = $patient_id;

  if ($stmt->execute()) {
  return true;
  }
  }

  //=======SHOW PATIENT LIST NAME - APPOINTMENT===================================================
function showPatientNAME($conn){
$sql = "SELECT * FROM patient_record";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo '<a class="dropdown-item"  >'.$row['last_name'].', '.$row['first_name'].' '.$row['middle_name'].'</a>';
  }
} else {
echo '<a class="dropdown-item" >No Patient Found.</a>';
}

//mysqli_close($connection);

}

  //=======SHOW PATIENT LIST NAME - APPOINTMENT===================================================
  function showPatientNameDD($conn,$clinic){
    $sql = "SELECT * FROM clinic_patients WHERE clinic_id = '$clinic'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
     echo '
        <option value="'.$row['patient_id'].'">'.$row['patient_name'].'</option>
        ';
      }
    } else {
    echo '<option class="dropdown-item" >No Patient Found.</option>';
    }
    
    //mysqli_close($connection);
    
    }
    
    
  //=======SHOW PATIENT LIST NAME - APPOINTMENT===================================================
  function showPatientNameDDD($conn,$clinic){
    $sql = "SELECT DISTINCT patient_name FROM clinic_patients WHERE clinic_id = '$clinic'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
     echo '
        <option value="'.$row['patient_name'].'">'.$row['patient_name'].'</option>
        ';
      }
    } else {
    echo '<option class="dropdown-item" >No Patient Found.</option>';
    }
    
    //mysqli_close($connection);
    
    }
        
  //=======SHOW PATIENT LIST NAME - APPOINTMENT===================================================
  function showPatientIDDDD($conn,$clinic){
    $sql = "SELECT DISTINCT patient_id FROM clinic_patients WHERE clinic_id = '$clinic'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
     echo '
        <option value="'.$row['patient_id'].'">'.$row['patient_id'].'</option>
        ';
      }
    } else {
    echo '<option class="dropdown-item" >No Patient Found.</option>';
    }
    
    //mysqli_close($connection);
    
    }
        
  //=======SHOW PATIENT LIST NAME - APPOINTMENT===================================================
  function showPatientEmailDDD($conn,$clinic){
    $sql = "SELECT DISTINCT email FROM clinic_patients WHERE clinic_id = '$clinic'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
     echo '
        <option value="'.$row['email'].'">'.$row['email'].'</option>
        ';
      }
    } else {
    echo '<option class="dropdown-item" >No Patient Found.</option>';
    }
    
    //mysqli_close($connection);
    
    }
  //=======SHOW SERVICE LIST - APPOINTMENT===================================================
function showService($conn){
$sql = "SELECT * FROM services";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo '<a class="dropdown-item" >'.$row['service_name'].'</a>';
  }
} else {
echo '<a class="dropdown-item" >No Service Found.</a>';
}

//mysqli_close($connection);

}

//===================ADDING OF WALKIN APPOINTMENT==================================
function addWalkinAppointment($conn,$clinic,$patient_id,$patient_name,$email,$doctor_name,$service_name,$note,$datentime,$time,$status){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO appointments (clinic_id,patient_id,patient_name,email,doctor_name,service_name,note,appointment_datentime,appointment_time,status) VALUES (?,?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssssss", $d0,$pid, $d1, $d2, $d3,$d4,$d6,$d7,$d8,$d9);
  
  // set parameters and execute
  $d0 = $clinic;
  $pid = $patient_id;
  $d1 = $patient_name;
  $d2 = $email;
  $d3 = $doctor_name;
  $d4 = $service_name;
  $d6 = $note;
  $d7 = $datentime;
  $d8 = $time;
  $d9 = $status;
  
  if ($stmt->execute()) {
  return true;
  }
  }
//===================ADDING OF PENDING APPOINTMENT==================================
 function addPendingAppointment($conn,$patient_id,$patient_name,$doctor_name,$service_name,$note,$datentime,$status){
// prepare and bind
$stmt = $conn->prepare("INSERT INTO pending_appointments (patient_id,patient_name,doctor_name,service_name,note,appointment_datentime,status) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("sssssss", $pid, $d1, $d2, $d3,$d4,$d5,$d6);

// set parameters and execute
$pid = $patient_id;
$d1 = $patient_name;
$d2 = $doctor_name;
$d3 = $service_name;
$d4 = $note;
$d5 = $datentime;
$d6 = $status;

if ($stmt->execute()) {
return true;
}
}

//=======SHOW PENDING APPOINTMENT LIST===================================================
function showPendingAppointmentAdmin($conn, $clinic){
$sql = "SELECT * FROM appointments WHERE clinic_id='$clinic' AND status != 'Cancelled'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo ' <tr>
        <td>'.$row["appointment_refno"].'</td>
        <td>'.$row["patient_name"].'</td>
        <td>'.$row["service_name"].'</td>
        <td>'.$row["appointment_datentime"].'</td>';
        
        if($row['status'] == 'Upcoming') {
        echo '<td><span class="badge badge-secondary">'.$row["status"].'</span></td>';
        }
        if($row['status'] == 'Completed') {
        echo '<td><span class="badge badge-success">'.$row["status"].'</span></td>';
        }
    echo '<td>'; 
if ($row["status"] == "Upcoming") {
  echo '<a  href="ongoing.php?refno='.$row["appointment_refno"].'" type="button"  class="  btn btn-warning" ><i class="fa fa-eye" ></i></a>';
}else{
    echo '<a  href="complete.php?refno='.$row["appointment_refno"].'" type="button"  class="  btn btn-warning" ><i class="fa fa-eye" ></i></a>';
}






              echo '</td>
      </tr>
      ';
  }
} else {
 echo ' <tr>
        <td colspan="7" align="center">NO PENDING APPOINTMENTS</td>
      </tr>
      ';
}
//<button type="button" id="bukas" class="  btn btn-warning viewConfirmAppointmentBtn" ><i class="fa fa-eye" ></i></button>
//mysqli_close($connection);

}

//=======SHOW PENDING APPOINTMENT LIST===================================================
function showPendingAppointment($conn){
  $sql = "SELECT * FROM appointments";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
          <td>'.$row["id"].'</td>
          <td>'.$row["patient_name"].'</td>
          <td>'.$row["service_name"].'</td>
          <td>'.$row["appointment_datentime"].'</td>
          <td>'.$row["doctor_name"].'</td>    
          <td>'.$row["branch"].'</td>   
          <td><span class="badge badge-secondary">'.$row["status"].'</span></td>
  <td>
  
  <button type="button" name="toConfirm" class="viewPendingAppointmentBtn1  btn btn-warning" ><i class="fa fa-eye" ></i></button>
  
                </td>
        </tr>
        ';
    }
  } else {
   echo ' <tr>
          <td colspan="7" align="center">NO PENDING APPOINTMENTS</td>
        </tr>
        ';
  }
  
  //mysqli_close($connection);
  
  }
  
//=======SHOW CLINIC LIST===================================================

function showClinics($conn, $user_id){
  $sql = "SELECT * FROM clinic_tbl WHERE user_id='$user_id'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
      echo '<tr><td>'.$row["clinic_name"].'</td>
          <td>'.$row["clinic_address"].'</td>
          
         </tr>';
    }
  }
}

//=======SHOW OWNERSLIST===================================================

function showOwnersTable($conn){
  $sql = "SELECT * FROM user_accounts WHERE user_type = 'Admin'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
      echo '<tr><td><img src="include/profile pictures/'.$row['profile_img'].'"</td>
          <td>'.$row["fullname"].'</td>
          <td>'.$row["email"].'</td>
          ';
    }
  }
}
//=======SHOW OWNERSLIST===================================================

function showOwnersTable1($conn){
  $sql = "SELECT * FROM user_accounts";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
      echo '<tr>
       <td>'.$row["user_id"].'</td>
          <td>'.$row["fullname"].'</td>
          <td>'.$row["email"].'</td>
          ';
    }
  }
}

//=======SHOW PENDING APPOINTMENT LIST===================================================
function showMyDocSched($conn,$clinic){
  $sql1 = "SELECT * FROM doctor_tbl WHERE clinic_id='$clinic'";
  $result1 = mysqli_query($conn, $sql1);
  
  if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
  echo ' <tr>
  <td style="display;none:">'.$row["doctor_id"].'</td>
  <td style="text-align: center;">
  <img src="include/profile pictures/'.$row["doctor_img"].'"  width="50"></td></center>

          <td>'.$row["doctor_fullname"].'</td>
          <td>
          <button type="button" class="btn btn-danger opendeleteService" title="Delete Doctor"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
          </td>

        </tr>
        ';
    }
  } else {
   echo ' <tr>
          <td colspan="7" align="center">NO PENDING APPOINTMENTS</td>
        </tr>
        ';
  }
  
  //mysqli_close($connection);
  
  }
  
  //=======SHOW PENDING APPOINTMENT LIST===================================================
function showMySched($conn){
  $sql1 = "SELECT * FROM appointments WHERE branch='$branch'";
  $result1 = mysqli_query($conn, $sql1);
  
  if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
  echo ' <tr>
          <td>'.$row["patient_id"].'</td>
          <td>'.$row["patient_name"].'</td>
          <td>'.$row["service_name"].'</td>
          <td>'.$row["appointment_datentime"].'</td>
          <td>'.$row["doctor_name"].'</td>    
          <td>'.$row["branch"].'</td>   
          <td><span class="badge badge-secondary">'.$row["status"].'</span></td>

        </tr>
        ';
    }
  } else {
   echo ' <tr>
          <td colspan="7" align="center">NO PENDING APPOINTMENTS</td>
        </tr>
        ';
  }
  
  //mysqli_close($connection);
  
  }
  
//===================UPDATE PENDING APPOINTMENT - CONFIRMED...==================================
function deleteUnconfirmed($conn,$id){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM pending_appointments WHERE id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $id;

  if ($stmt->execute()) {
  return true;
  }
  }

//===================ADDING OF PENDING APPOINTMENT==================================
 function addAppointment($conn,$patient_id,$patient_name,$email,$doctor_name,$service_name,$branch,$note,$pending_datentime,$time,$status){
// prepare and bind
$stmt = $conn->prepare("INSERT INTO appointments (patient_id,patient_name,email,doctor_name,service_name,branch,note,appointment_datentime,appointment_time,status) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssss", $pid, $d1, $d2, $d3,$d4,$d5,$d6,$d7,$d8,$d9);

// set parameters and execute
$pid = $patient_id;
$d1 = $patient_name;
$d2 = $email;
$d3 = $doctor_name;
$d4 = $service_name;
$d5 = $branch;
$d6 = $note;
$d7 = $pending_datentime;
$d8 = $time;
$d9 = $status;

if ($stmt->execute()) {
return true;
}
}

//=======SHOW CANCELLED APPOINTMENT LIST===================================================
function showCancelledAdmin($conn){
  $sql = "SELECT * FROM appointments";
  $result = mysqli_query($conn, $sql);
  $email = $_SESSION['login_admin1'];
          $sql1 = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
          $result1 = mysqli_query($conn,$sql1);
          
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      switch($row['status']){
      case 'Cancelled':
  
   echo ' <tr>
            <td>'.$row["appointment_refno"].'</td>
            <td>'.$row["patient_name"].'</td>
            <td>'.$row["service_name"].'</td>
            <td>'.$row["appointment_datentime"].'</td>
            <td>'.$row["doctor_name"].'</td>    
            <td>'.$row["clinic_id"].'</td>    
            <td><span class="badge badge-danger">'.$row["status"].'</span></td>
            
          </tr>
          ';
    }}
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
//=======SHOW CANCELLED APPOINTMENT LIST===================================================
function showCancelled($conn,$clinic){
  $sql = "SELECT * FROM appointments WHERE clinic_id='$clinic'";
  $result = mysqli_query($conn, $sql);
  $email = $_SESSION['login_admin1'];
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      switch($row['status']){
      case 'Cancelled':
  
   echo ' <tr>
            <td>'.$row["appointment_refno"].'</td>
            <td>'.$row["patient_name"].'</td>
            <td>'.$row["service_name"].'</td>
            <td>'.$row["appointment_datentime"].'</td>
            
            <td><span class="badge badge-danger">'.$row["status"].'</span></td>
            
          </tr>
          ';
    }}
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }


//=======SHOW APPOINTMENT LIST===================================================
function showAppointment($conn, $clinic){
  $sql = "SELECT * FROM appointments WHERE clinic_id ='$clinic'";
  $result = mysqli_query($conn, $sql);
  
          
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if($row['status'] != 'Cancelled'){
  
   echo ' <tr>
            <td>'.$row["appointment_refno"].'</td>
            <td>'.$row["patient_name"].'</td>
            <td>'.$row["service_name"].'</td>
            <td>'.$row["appointment_datentime"].'</td>
            <td>'.$row["doctor_name"].'</td>   
            <td>'.$row["clinic_id"].'</td>
            <td>';
          
  switch($row["status"]) {
      case 'Unconfirmed':
    echo '<span class="badge badge-secondary" title="Unconfirmed Status - it means that the patient ">'.$row["status"].'</span>';
    break;
  
    case 'Confirmed':
    echo '<span class="badge badge-primary" title="Confirmed Status - it means that the patient appointment is approved by the assistant.">'.$row["status"].'</span>';
    break;
  
    case "Checked-In":
    echo '<span class="badge badge-info" title="Checked-In - this status is for the patients that is currently on the clinic and waiting to be In-Chair">'.$row["status"].'</span>';
    break;
  
    case 'Upcoming':
    echo '<span class="badge badge-warning" title="In-Chair Status - it means that the patient is currently being check up by the Doctor">'.$row["status"].'</span>';
    break;
  
    case 'Completed':
    echo '<span class="badge badge-success" title="Complete Status - it means that the patient status is done">'.$row["status"].'</span>';
    break;
    default:
      echo 'Something problem';
    }
          
  
            echo '</td>
  <td>
  <button type="button" class="viewConfirmAppointmentBtn btn btn-warning "><i class="fa fa-eye" aria-hidden="true"></i></button>
                </td>
          </tr>
          ';
    }}
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
//=======SHOW APPOINTMENT LIST===================================================
function showAppointmentComplete($conn, $clinic){

  $email = $_SESSION['login_admin1'];
          $sql1 = "SELECT * FROM billing WHERE clinic_id='$clinic' AND balance=0 ORDER BY bill_id DESC";
          $result1 = mysqli_query($conn,$sql1);
          
  
  if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
      if($row['status'] != 'Cancelled'){
  
   echo ' <tr>
            <td style="display: none;">'.$row["bill_id"].'</td>
            <td>'.$row["patient_name"].'</td>
            <td>'.$row["service"].'</td>
           
            <td>'.$row["price"].'</td>
            <td>'.$row["amount_paid"].'</td>
            <td>'.$row["bill_change"].'</td>
            <td>'.$row["date"].'</td>
  
            <td>'.$row["status"].'</td>
            <td>
  <button type="button" class="viewConfirmAppointmentBtn btn btn-warning "><i class="fa fa-eye" aria-hidden="true"></i></button>
                </td>

  
          </tr>
          ';
    }}
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
  
//=======SHOW APPOINTMENT LIST===================================================
function showAppointmentCompleteBal($conn, $clinic){

  $email = $_SESSION['login_admin1'];
          $sql1 = "SELECT * FROM billing WHERE clinic_id='$clinic' AND balance != 0 ORDER BY bill_id DESC";
          $result1 = mysqli_query($conn,$sql1);
          
  
  if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
      if($row['status'] != 'Cancelled'){
  
   echo ' <tr>
            <td style="display: none;">'.$row["bill_id"].'</td>
            <td>'.$row["patient_name"].'</td>
            <td>'.$row["service"].'</td>
           
            <td>'.$row["price"].'</td>
            <td>'.$row["amount_paid"].'</td>
            <td>'.$row["balance"].'</td>
            <td>'.$row["date"].'</td>
  
            <td>'.$row["status"].'</td>
            <td>
  <button type="button" class="viewConfirmAppointmentBtn btn btn-warning "><i class="fa fa-eye" aria-hidden="true"></i></button>
                </td>

  
          </tr>
          ';
    }}
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
 //=======SHOW APPOINTMENT LIST===================================================
function showAllDental($conn){

  $email = $_SESSION['login_admin1'];
          $sql1 = "SELECT * FROM clinic_tbl";
          $result1 = mysqli_query($conn,$sql1);
          
  
  if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
    
  
   echo ' <tr>
            <td style="display: none;">'.$row["clinic_id"].'</td>
            <td>'.$row["clinic_name"].'</td>
            <td>'.$row["clinic_address"].'</td>
            <td>'.$row["clinic_email"].'</td>
            <td>'.$row["clinic_contact"].'</td>
            <td><img src="img/'.$row["permit_photo"].'" width="50" height="50" id="myImg"></td>
            <td>'.$row["status"].'</td>
 <td>
        <button type="button"  class="btn btn-success openVerificationmodal" title="Move to Archive"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
        <button type="button"  class="btn btn-danger opendeletemodal" title="Move to Archive"><i class="fa fa-ban" aria-hidden="true"></i></button></td>
  
          </tr>
          
            
          ';
   }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
   //=======SHOW APPOINTMENT LIST===================================================
function showAllUser($conn){

  $email = $_SESSION['login_admin1'];
          $sql1 = "SELECT * FROM patient_record";
          $result1 = mysqli_query($conn,$sql1);
          
  
  if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
    
  
   echo ' <tr>
            <td>'.$row["fullname"].'</td>
            <td>'.$row["address"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["contactno"].'</td>
    
            <td>'.$row["status"].'</td>

  
          </tr>
          ';
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
//=======SHOW MODAL PATIENT PENDING APPOINTMENT===================================================
function showModalAppointRecord($conn,$id){
  $sql = "SELECT * FROM appointments WHERE appointment_refno ='".$id."' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["appointment_refno"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
  
//=======SHOW MODAL PATIENT PENDING APPOINTMENT===================================================
function showModalPatientPendingAppointment($conn,$id){
$sql = "SELECT * FROM pending_appointments WHERE id ='".$id."' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

      return array($row["id"],$row["patient_name"],$row["email"],$row["contactno"],$row["doctor_name"],$row["service_name"],$row["branch"],$row["note"],$row["appointment_datentime"],$row["status"],$row['patient_id']);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}

//=======SHOW APPOINTMENT DASHBOARD===================================================
function showAppointmentIndex($conn){
  $date = date('Y-m-d');
  $sql = "SELECT * FROM appointments WHERE appointment_datentime='$date'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
           <td>'.$row["appointment_datentime"].'</td>
          <td>'.$row["patient_name"].'</td>
          <td>'.$row["service_name"].'</td>
          <td>'.$row["doctor_name"].'</td>    
          <td>';

switch($row["status"]) {
    case 'Unconfirmed':
  echo '<span class="badge badge-secondary">'.$row["status"].'</span>';
  break;

  case 'Confirmed':
  echo '<span class="badge badge-primary">'.$row["status"].'</span>';
  break;

  case "Checked-In":
  echo '<span class="badge badge-info">'.$row["status"].'</span>';
  break;

  case 'In-Chair':
  echo '<span class="badge badge-warning">'.$row["status"].'</span>';
  break;

  case 'Completed':
  echo '<span class="badge badge-success">'.$row["status"].'</span>';
  break;

  case 'Cancelled':
  echo '<span class="badge badge-danger">'.$row["status"].'</span>';
  break;
  default:
    echo 'Something problem';
  }
          echo '</td>
                
        </tr>
        ';
    }
  } else {
    echo "";
  }
  
  //mysqli_close($connection);
  
  }
  
//===================ADDING OF USER ACCOUNT==================================
function addUserAccount($conn,$upload_pdf4,$first_name,$last_name,$middle_name,$birthdate,$age,$address,$branch,$contactno,$email,$gender,$user_type,$password,$status){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO user_accounts (profile_img, first_name,last_name,middle_name,birthdate,age,address,branch,contactno,email,gender,user_type,password,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssssssssss", $d0, $d1, $d2, $d3,$d4, $d5, $d6, $d7, $d8, $d9, $d10, $d11, $d12, $d13);
  
  // set parameters and execute
  $d0 = $upload_pdf4;
  $d1 = $first_name;
  $d2 = $last_name;
  $d3 = $middle_name;
  $d4 = $birthdate;
  $d5 = $age;
  $d6 = $address;
  $d7 = $branch;
  $d8 = $contactno;
  $d9 = $email;
  $d10 = $gender;
  $d11 = $user_type;
  $d12 = $password;
  $d13 = $status;
  
  
  if ($stmt->execute()) {
    	

  return true;
  }
}

//======= DENTAL CHART SAVE TOP ===================================================
function addDentalChartTop($conn, $toothID, $condition, $procedure, $conLegend, $proLegend, $color){


$stmt = $conn->prepare("INSERT INTO dentalchart(`tooth_id`,`t_condition`,`t_procedure`,`con_legend`,`pro_legend`,`top_side`)
VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss", $d1, $d4, $d5, $d6, $d7, $d8);

// set parameters and execute
$d1 = $toothID;
$d4 = $condition;
$d5 = $procedure;
$d6 = $conLegend;
$d7 = $proLegend;
$d8 = $color;



if ($stmt->execute()) {
return true;
}
}
//======= DENTAL CHART SAVE LEFT ===================================================
function addDentalChartLeft($conn, $toothID, $condition, $procedure, $conLegend, $proLegend, $color){


  $stmt = $conn->prepare("INSERT INTO dentalchart(`tooth_id`,`t_condition`,`t_procedure`,`con_legend`,`pro_legend`,`left_side`)
  VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $d1, $d4, $d5, $d6, $d7, $d8);
  
  // set parameters and execute
  $d1 = $toothID;
  $d4 = $condition;
  $d5 = $procedure;
  $d6 = $conLegend;
  $d7 = $proLegend;
  $d8 = $color;
  
  
  
  if ($stmt->execute()) {
  return true;
  }
  }
  
//======= DENTAL CHART SAVE RIGHT ===================================================
function addDentalChartRight($conn, $toothID, $condition, $procedure, $conLegend, $proLegend, $color){


  $stmt = $conn->prepare("INSERT INTO dentalchart(`tooth_id`,`t_condition`,`t_procedure`,`con_legend`,`pro_legend`,`right_side`)
  VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $d1, $d4, $d5, $d6, $d7, $d8);
  
  // set parameters and execute
  $d1 = $toothID;
  $d4 = $condition;
  $d5 = $procedure;
  $d6 = $conLegend;
  $d7 = $proLegend;
  $d8 = $color;
  
  
  
  if ($stmt->execute()) {
  return true;
  }
  }
  
//======= DENTAL CHART SAVE FRONT ===================================================
function addDentalChartFront($conn, $toothID, $condition, $procedure, $conLegend, $proLegend, $color){


  $stmt = $conn->prepare("INSERT INTO dentalchart(`tooth_id`,`t_condition`,`t_procedure`,`con_legend`,`pro_legend`,`front_side`)
  VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $d1, $d4, $d5, $d6, $d7, $d8);
  
  // set parameters and execute
  $d1 = $toothID;
  $d4 = $condition;
  $d5 = $procedure;
  $d6 = $conLegend;
  $d7 = $proLegend;
  $d8 = $color;
  
  
  
  if ($stmt->execute()) {
  return true;
  }
  }
  
//======= DENTAL CHART SAVE BACK ===================================================
function addDentalChartBack($conn, $toothID, $condition, $procedure, $conLegend, $proLegend, $color){


  $stmt = $conn->prepare("INSERT INTO dentalchart(`tooth_id`,`t_condition`,`t_procedure`,`con_legend`,`pro_legend`,`back_side`)
  VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $d1, $d4, $d5, $d6, $d7, $d8);
  
  // set parameters and execute
  $d1 = $toothID;
  $d4 = $condition;
  $d5 = $procedure;
  $d6 = $conLegend;
  $d7 = $proLegend;
  $d8 = $color;
  
  
  
  if ($stmt->execute()) {
  return true;
  }
  }
  //======= DENTAL CHART SAVE BACK ===================================================
function modifyBill($conn, $status, $date,$mop, $id){

  $stmt = $conn->prepare("UPDATE appointments SET payment_status = ?, payment_date = ?, mop = ? WHERE appointment_refno = ?");
  $stmt->bind_param("ssss", $d1, $d2, $d3, $d4);
  
  // set parameters and execute
  $d1 = $status;
  $d2 = $date;
  $d3 = $mop;
  $d4 = $id;
  
  if ($stmt->execute()) {
  return true;
  }
  }
  
//=======SHOW MODAL PATIENT CONFIRM APPOINTMENT===================================================
function showModalPatientConfirmAppointment($conn,$id){
$sql = "SELECT * FROM appointments WHERE appointment_refno ='$id' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    return array($row["appointment_refno"],$row["patient_name"],$row["service_name"],$row["clinic_id"],$row["clinic_name"],$row["status"],$row["patient_id"],$row["email"],$row["start_time"]);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}



//=======SHOW MODAL PATIENT CONFIRM APPOINTMENT===================================================
function showModalDentalbilling($conn,$id){
  $sql = "SELECT * FROM dentalchart WHERE procedure_id ='".$id."' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
      return array($row["procedure_id"],$row["ref_no"],$row["patient_id"],$row["patient_name"],$row["t_procedure"],$row["price"],$row["dentaldate"],$row["payment_status"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }

//=======SHOW MODAL PATIENT CONFIRM APPOINTMENT===================================================
function showModalDentalView($conn,$id){
  $sql = "SELECT * FROM dentalchart WHERE ref_no ='".$id."' ORDER BY procedure_id DESC";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
      return array($row["ref_no"],$row["patient_id"],$row["patient_name"],$row["clinic_id"],$row['dental_type']);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }

  //=======SHOW MODAL PATIENT CONFIRM APPOINTMENT===================================================
function showDentalDB($conn,$id){
  $sql = "SELECT * FROM dentalchart WHERE patient_id ='".$id."' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
      return array($row["patient_id"],$row["appointment_refno"],$row["patient_name"],$row["email"],$row["dentaldate"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
//=======SHOW MODAL PATIENT CONFIRM APPOINTMENT===================================================
function showBilling($conn,$id){
  $sql = "SELECT * FROM billing WHERE bill_id ='".$id."' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
      return array($row["bill_id"],$row["branch"],$row["ref_no"],$row["patient_id"],$row["patient_name"],$row["doctor"],$row["service"],$row["price"],$row["mode_of_payment"],$row["date"],$row["status"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
  
//=======SHOW MODAL PATIENT CONFIRM APPOINTMENT===================================================
function getPatientInfo($conn,$patient_name){
$sql = "SELECT * FROM appointments WHERE  patient_name ='".$patient_name."' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    return array($row["appointment_refno"],$row["patient_name"],$row["doctor_name"],$row["service_name"],$row["appointment_datentime"],$row["status"],$row["checkin_datentime"],$row["inchair_datentime"]);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}





//===================CHECK IN UPDATE STATUS APPOINTMENT==================================
function updateCancel($conn, $cancel_refno, $date, $status){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE appointments SET cancelled_datentime=?, status= ? WHERE appointment_refno= ?");
  $stmt->bind_param("sss", $d1, $d2, $d3);
  
  // set parameters and execute
  $d1 = $checkin_datentime;
  $d2 = $status;
  $d3 = $cancel_refno;
  
  if ($stmt->execute()) {
  return true;
  }
}
//===================IN CHAIR UPDATE STATUS APPOINTMENT==================================
function updatePatientInChair($conn, $appointment_refno, $inchair_datentime, $status){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE appointments SET inchair_datentime=?, status= ? WHERE appointment_refno= ?");
  $stmt->bind_param("sss", $d1, $d2, $d3);
  
  // set parameters and execute
  $d1 = $inchair_datentime;
  $d2 = $status;
  $d3 = $appointment_refno;
  
  if ($stmt->execute()) {
  return true;
  }
}
//===================IN CHAIR UPDATE STATUS APPOINTMENT==================================
function updatePatientCompeleted($conn, $finchair_refno,$date,$payment_status, $status){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE appointments SET  complete_datentime= ?, payment_status =?, status=? WHERE appointment_refno= ?");
  $stmt->bind_param("ssss", $d1, $d2, $d3,$d4);
  
  // set parameters and execute
  $d1 = $complete_datentime;
  $d2 = $payment_status;
  $d3 = $status;
  $d4 = $appointment_refno;
  
  if ($stmt->execute()) {
  return true;
  }
}

//===================ADDING OF MEDICINES==================================
function addMedicine($conn,$Med_Name,$Quantity,$Expiry_date,$Requested_date,$Price,$status){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO inventory_medicine (Med_Name,Quantity,Expiry_date,Requested_date,Price,status) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $d1, $d2, $d3,$d4, $d5,$d6);
  
  // set parameters and execute
  $d1 = $Med_Name;
  $d2 = $Quantity;
  $d3 = $Expiry_date;
  $d4 = $Requested_date;
  $d5 = $Price;
  $d6 = $status;

  
  
  if ($stmt->execute()) {
  return true;
  }
}

//===================ADDING OF PRESCRIPTION BILL==================================
function addPrescriptionBill($conn,$patient_name,$Med_Name,$Quantity,$Price,$total_price){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO prescription_billing (patient_name,Med_Name,Quantity,Price,total_price) VALUES (?,?,?,?,?)");
  $stmt->bind_param("sssss", $d1, $d2, $d3, $d4, $d5);
  
  // set parameters and execute
  $d1 = $patient_name;
  $d2 = $Med_Name;
  $d3 = $Quantity;
  $d4 = $Price;
  $d5 = $total_price;

  
  
  if ($stmt->execute()) {
  return true;
  }
}

//===================ADDING OF MEDICINES==================================
function addXray($conn,$patient_id,$patient_name,$email,$x_ray,$date,$clinic_id){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO x_ray (patient_id,patient_name,email,x_ray,date,clinic_id) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $d1, $d2, $d3,$d4,$d5,$d6);
  
  // set parameters and execute
  $d1 = $patient_id;
  $d2 = $patient_name;
  $d3 = $email;
  $d4 = $x_ray;
  $d5 = $date;
  $d6 = $clinic_id;

  if ($stmt->execute()) {
  return true;
  }
}

//===================ADDING OF EQUIPMENTS==================================
function addEquipment($conn,$Equip_Name,$Requested_Date,$Date_Defected,$Quantity,$status){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO inventory_equipment (Equip_Name,Requested_Date,Date_Defected,Quantity,status) VALUES (?,?,?,?,?)");
  $stmt->bind_param("sssss", $d1, $d2, $d3,$d4,$d5);
  
  // set parameters and execute
  $d1 = $Equip_Name;
  $d2 = $Requested_Date;
  $d3 = $Date_Defected;
  $d4 = $Quantity;
  $d5 = $status;

  
  
  if ($stmt->execute()) {
  return true;
  }
}

//=======SHOW MEDICINE LIST===================================================
function showMedicine($conn){
$sql = "SELECT * FROM inventory_medicine WHERE status='ACTIVE'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo ' <tr>
<td style="display:none;">'.$row["Med_Id"].'</td>
        <td>'.$row["Med_Name"].'</td>
        <td>'.$row["Quantity"].'</td>
        <td>'.$row["Expiry_date"].'</td>
        <td>'.$row["Requested_date"].'</td>
        <td>'.$row["Price"].'</td>
        <td>

                <button type="button" class="viewMedicine  btn btn-warning"  ><i class="fa fa-eye"></i></button>
    
                <button type="button"  class="btn btn-danger opendeletemodal"><i class="fa fa-archive" aria-hidden="true"></i></button>
              </td>
      </tr>
      ';
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}

//=======SHOW MEDICINE LIST===================================================
function showMedicineInactive($conn){
  $sql = "SELECT * FROM inventory_medicine WHERE status='INACTIVE'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
  <td style="display:none;">'.$row["Med_Id"].'</td>
          <td>'.$row["Med_Name"].'</td>
          <td>'.$row["Quantity"].'</td>
          <td>'.$row["Expiry_date"].'</td>
          <td>'.$row["Requested_date"].'</td>
          <td>'.$row["Price"].'</td>
          <td>
  
          <button type="button" class="btn btn-success openrestoreMed" title="Restore"><i class="fa fa-refresh" aria-hidden="true"></i>
          </button>       
  <button type="button"  class="btn btn-danger opendeleteMed" title="Delete Patient"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </td>
        </tr>';
    }
  } else {
    echo "<tr><td>0 results</td></tr>";
  }
  
  //mysqli_close($connection);
  
  }
  
  
  
//=======SHOW EQUIPMENT LIST===================================================
function showEquipment($conn){
$sql = "SELECT * FROM inventory_equipment WHERE status='ACTIVE'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo ' <tr>
<td style="display:none;">'.$row["Equip_Id"].'</td>
        <td>'.$row["Equip_Name"].'</td>
        <td>'.$row["Requested_Date"].'</td>
        <td>'.$row["Date_Defected"].'</td>
        <td>'.$row["Quantity"].'</td>
        
        <td>

                <button type="button" class="viewEquipment  btn btn-warning"  ><i class="fa fa-eye" ></i></button>
                
                <button type="button"  class="btn btn-danger opendeletemodal"><i class="fa fa-archive" aria-hidden="true"></i></button>
              </td>
      </tr>
      ';
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}
//=======SHOW EQUIPMENT LIST===================================================
function showEquipmentInactive($conn){
  $sql = "SELECT * FROM inventory_equipment WHERE status='INACTIVE'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
  <td style="display:none;">'.$row["Equip_Id"].'</td>
          <td>'.$row["Equip_Name"].'</td>
          <td>'.$row["Requested_Date"].'</td>
          <td>'.$row["Date_Defected"].'</td>
          <td>'.$row["Quantity"].'</td>
          
          <td>
  
          <button type="button" class="btn btn-success openrestoreEquip" title="Restore"><i class="fa fa-refresh" aria-hidden="true"></i>
          </button>       
  <button type="button"  class="btn btn-danger opendeleteEquip" title="Delete Patient"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </td>
        </tr>';
    }
  } else {
    echo "<td>0 results</td>";
  }
  
  //mysqli_close($connection);
  
  }
//=======SHOW USER ACCOUNT LIST===================================================
function showUser($conn){
$sql = "SELECT * FROM user_accounts WHERE status='ACTIVE'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo " <tr>
        <td style='text-align: center;'><span style='display: none;'>".$row['user_id']."</span><img src='include/profile pictures/".$row['profile_img']."' width='50'></td></center>
        <td>".$row['first_name']."</td>
        <td>".$row['last_name']."</td>
        <td>".$row['user_type']."</td>
        <td>".$row['email']."</td>
        
<td>

                <button type='button' class='viewPatientBtn  btn btn-warning' ><i class='fa fa-eye' ></i></button>
               
                <button type='button'  class='btn btn-danger opendeletemodal' title='Move to Archive'><i class='fa fa-trash' aria-hidden='true'></i></button></td>
              </td>
      </tr>
      ";
  }
} else {
  echo "<tr><td>0 results</td></tr>";
}

//mysqli_close($connection);

}
//=======SHOW USER ACCOUNT LIST INACTIVE===================================================
function showUserInactive($conn){
  $sql = "SELECT * FROM user_accounts WHERE user_type='Admin' AND status='INACTIVE'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo " <tr>
          <td style='text-align: center;'><span style='display: none;'>".$row['user_id']."</span><img src='include/profile pictures/".$row['profile_img']."' width='50'></td></center>
          <td>".$row['first_name']."</td>
          <td>".$row['last_name']."</td>
          <td>".$row['user_type']."</td>
          
  <td>
  <button type='button' class='btn btn-success openrestoreAdmin' title='Restore'><i class='fa fa-refresh' aria-hidden='true'></i>
                  </button>       
          <button type='button'  class='btn btn-danger opendeleteAdmin' title='Delete Patient'><i class='fa fa-trash-o' aria-hidden='true'></i></button>  </tr>
        ";
    }
  } else {
    echo "<tr><td>0 results</td></tr>";
  }
  
  //mysqli_close($connection);
  
  }
  //=======SHOW USER ACCOUNT LIST INACTIVE===================================================
function showUserInactiveDoc($conn){
  $sql = "SELECT * FROM user_accounts WHERE user_type='Doctor' AND status='INACTIVE'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo " <tr>
          <td style='text-align: center;'><span style='display: none;'>".$row['user_id']."</span><img src='include/profile pictures/".$row['profile_img']."' width='50'></td></center>
          <td>".$row['first_name']."</td>
          <td>".$row['last_name']."</td>
          <td>".$row['user_type']."</td>
          
  <td>
  <button type='button' class='btn btn-success openrestoreDoctor' title='Restore'><i class='fa fa-refresh' aria-hidden='true'></i>
  </button>       
<button type='button'  class='btn btn-danger opendeleteDoctor' title='Delete Patient'><i class='fa fa-trash-o' aria-hidden='true'></i></button>  </tr>

        ";
    }
  } else {
    echo "<tr><td>0 results</td></tr>";
  }
  
  //mysqli_close($connection);
  
  }
   //=======SHOW USER ACCOUNT LIST INACTIVE===================================================
function showUserInactiveAss($conn){
  $sql = "SELECT * FROM user_accounts WHERE user_type='Assistant' AND status='INACTIVE'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo " <tr>
          <td style='text-align: center;'><span style='display: none;'>".$row['user_id']."</span><img src='include/profile pictures/".$row['profile_img']."' width='50'></td></center>
          <td>".$row['first_name']."</td>
          <td>".$row['last_name']."</td>
          <td>".$row['user_type']."</td>
          
  <td>
  <button type='button' class='btn btn-success openrestoreAssistant' title='Restore'><i class='fa fa-refresh' aria-hidden='true'></i>
  </button>       
<button type='button'  class='btn btn-danger opendeleteAssistant' title='Delete Patient'><i class='fa fa-trash-o' aria-hidden='true'></i></button>  </tr>

        ";
    }
  } else { 
    echo "<tr><td>0esults</td></tr>";
  }
  
  //mysqli_close($connection);
  
  }
//=======SHOW STOCK LIST===================================================
function showStock($conn){
$sql = "SELECT * FROM inventory_medicine WHERE status='ACTIVE'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo ' <tr>
<td style="display:none;">'.$row["Med_Id"].'</td>
        <td>'.$row["Med_Name"].'</td>
        <td>'.$row["Quantity"].'</td>
        <td>'.$row["Expiry_date"].'</td>
        <td>'.$row["Requested_date"].'</td>
        <td>'.$row["Price"].'</td>
                <td><button type="button" class="viewStock btn btn-success" data-toggle="modal" data-target="#AddStock"><i class="fas fa-plus-circle" aria-hidden="true"></i></button>
              </td>
      </tr>
      ';
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}

//===================UPDATE OF MEDICINE==================================
function updateMedicine($conn,$Med_Id,$Med_Name,$Quantity,$Expiry_date,$Requested_date,$Price){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE inventory_medicine
    SET Med_Name = ?, Quantity = ?, Expiry_date = ?, Requested_date = ?, Price = ?
    WHERE Med_Id = ?");
  $stmt->bind_param("ssssss", $d1, $d2, $d3, $d4, $d5, $d6);
  
  // set parameters and execute
  $d1 = $Med_Name;
  $d2 = $Quantity;
  $d3 = $Expiry_date;
  $d4 = $Requested_date;
  $d5 = $Price;
  $d6 = $Med_Id;


  if ($stmt->execute()) {
  return true;
  }
  }


//=======SHOW MODAL USER ACCOUNT LIST===================================================
function showModalUser($conn,$user_id){
$sql = "SELECT * FROM user_accounts WHERE user_id ='".$user_id."' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

      return array($row["user_id"],$row["first_name"],$row["last_name"],$row["middle_name"],$row["birthdate"],$row["contactno"],$row["gender"],$row["age"],$row["address"],$row["email"],$row['user_type'],$row["password"],$row["profile_img"]);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}



//======= SHOW DENTAL CHART LEGEND ===================================================

function showProcedure($conn, $name){

  $array = array("","","","","","","","","","","","","","","","");

  $sql = "SELECT * FROM dentalchart WHERE patient_name='$name'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $i = 0;

      $array[$i] = $row['pro_legend'];
      
      $i=$i+1;

    }
  }
 
}
//=======SHOW MODAL USER ACCOUNT LIST===================================================
function showPatientInDC($conn,$appointment_refno){
  $sql = "SELECT * FROM apppointments WHERE appointment_refno ='".$appointment_refno."' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["appointment_refno"],$row["patient_name"]);
    }
  } else {
    echo "dawdw";
  }
  
  //mysqli_close($connection);
  
  }

//=======SHOW MODAL MEDICINE LIST===================================================
function showModalMedicine($conn,$Med_Id){
//$sql = "SELECT * FROM user_accounts WHERE Med_Id ='".$Med_Id."' ";
$sql = "SELECT * FROM inventory_medicine WHERE Med_Id ='".$Med_Id."' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

      return array($row["Med_Id"],$row["Med_Name"],$row["Quantity"],$row["Expiry_date"],$row["Requested_date"],$row["Price"]);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}

//=======SHOW MODAL XRAY LIST===================================================
function showModalXray($conn,$patient_id){
  //$sql = "SELECT * FROM user_accounts WHERE Med_Id ='".$Med_Id."' ";
  $sql = "SELECT * FROM x_ray WHERE patient_id ='".$patient_id."' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["patient_id"],$row["patient_name"],$row["x_ray"],$row["date"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }

//===================UPDATE OF USER ACCOUNTS==================================
function updateUser($conn,$profile_img,$user_id,$first_name,$last_name,$middle_name,$birthdate,$address,$password,$age,$email,$contactno,$gender,$user_type){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE user_accounts
    SET profile_img = ?, first_name = ?, last_name = ?, middle_name = ?, birthdate = ?, address = ?, password = ?, age = ?, email = ?, contactno = ?, gender = ?, user_type = ?
    WHERE user_id = ?");
  $stmt->bind_param("sssssssssssss", $d0, $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9, $d10, $d11, $d12);
  
  // set parameters and execute
  $d0 = $profile_img;
  $d1 = $first_name;
  $d2 = $last_name;
  $d3 = $middle_name;
  $d4 = $birthdate;
  $d5 = $address;
  $d6 = $password;
  $d7 = $age;
  $d8 = $email;
  $d9 = $contactno;
  $d10 = $gender;
  $d11 = $user_type;
  $d12 = $user_id;

  if ($stmt->execute()) {
  return true;
  }
  }

  //===================UPDATE OF USER ACCOUNTS NO IMAGE==================================
function updateUsernoImage($conn,$user_id,$first_name,$last_name,$middle_name,$birthdate,$address,$age,$password,$email,$contactno,$gender,$user_type){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE user_accounts
    SET  first_name = ?, last_name = ?, middle_name = ?, birthdate = ?, address = ?, age = ?, password = ?, email = ?, contactno = ?, gender = ?, user_type = ?
    WHERE user_id = ?");
  $stmt->bind_param("ssssssssssss", $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9, $d10, $d11, $d12);
  
  // set parameters and execute
  $d1 = $first_name;
  $d2 = $last_name;
  $d3 = $middle_name;
  $d4 = $birthdate;
  $d5 = $address;
  $d6 = $age;
  $d7 = $password;
  $d8 = $email;
  $d9 = $contactno;
  $d10 = $gender;
  $d11 = $user_type;
  $d12 = $user_id;

  if ($stmt->execute()) {
  return true;
  }
  }

  //===================UPDATE OF EQUIPMENT==================================
function updateEquipment($conn,$Equip_Id,$Equip_Name,$Requested_Date,$Date_Defected,$Quantity){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE inventory_equipment
    SET Equip_Name = ?, Requested_Date = ?, Date_Defected = ?, Quantity = ?
    WHERE Equip_Id = ?");
  $stmt->bind_param("sssss", $d1, $d2, $d3, $d4, $d5);
  
  // set parameters and execute
  $d1 = $Equip_Name;
  $d2 = $Requested_Date;
  $d3 = $Date_Defected;
  $d4 = $Quantity;
  $d5 = $Equip_Id;


  if ($stmt->execute()) {
  return true;
  }
  }

  //=======SHOW MODAL EQUIPMENT LIST===================================================
function showModalEquipment($conn,$Equip_Id){
//$sql = "SELECT * FROM user_accounts WHERE Med_Id ='".$Med_Id."' ";
$sql = "SELECT * FROM inventory_equipment WHERE Equip_Id ='".$Equip_Id."' ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

      return array($row["Equip_Id"],$row["Equip_Name"],$row["Requested_Date"],$row["Date_Defected"],$row["Quantity"]);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}
//===========================INACTIVE/ DELETE Services==========
function inactiveClinic($conn,$clinic_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE clinic_tbl SET status= ? WHERE clinic_id=?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "INACTIVE";
  $d2 = $clinic_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['serviceErr'] = "archiveSuccess";
  }
  }
  //===========================INACTIVE/ DELETE PATIENT=========================================
function inactivePatient($conn,$patient_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE patient_record SET status= ? WHERE patient_id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "INACTIVE";
  $d2 = $patient_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['upPatientErr'] = "archiveSuccess";
  }
  }
   //===========================INACTIVE/ DELETE MEDICINE=========================================
function inactiveMedicine($conn,$Med_Id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE inventory_medicine SET status= ? WHERE Med_Id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "INACTIVE";
  $d2 = $Med_Id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "achiveSuccess";
  }
  }
    //===========================INACTIVE/ DELETE STOCK=========================================
function inactiveStock($conn,$Equip_Id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE inventory_equipment SET status= ? WHERE Equip_Id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "INACTIVE";
  $d2 = $Equip_Id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "archiveSuccess";
  }
  }
      //===========================INACTIVE/ DELETE STOCK=========================================
function inactiveBranch($conn,$branch_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE tbl_branch SET status= ? WHERE branch_id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "INACTIVE";
  $d2 = $branch_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['serviceErr'] = "archiveSuccess";
  }
  }
      //===========================INACTIVE/ DELETE STOCK=========================================
function inactiveUser($conn,$user_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE user_accounts SET status= ? WHERE user_id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "INACTIVE";
  $d2 = $user_id;
  
  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "archiveSuccess";
  }
  }
       //===========================INACTIVE/ DELETE STOCK=========================================
function restorePatient($conn,$patient_id){

	
  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE patient_record SET status= ? WHERE patient_id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "ACTIVE";
  $d2 = $patient_id;
  
  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "addSuccess";
   
  }
  }

    //===========================INACTIVE/ DELETE STOCK=========================================
function restoreMedicine($conn,$Med_Id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE inventory_medicine SET status= ? WHERE Med_Id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "ACTIVE";
  $d2 = $Med_Id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "addSuccess";
  }
  }
  //===========================INACTIVE/ DELETE STOCK=========================================
function restoreEquipment($conn,$Equip_Id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE inventory_equipment SET status= ? WHERE Equip_Id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "ACTIVE";
  $d2 = $Equip_Id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "addSuccess";
  }
  }
   //===========================INACTIVE/ DELETE STOCK=========================================
function restoreService($conn,$clinic_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE clinic_tbl SET `status`= ? WHERE clinic_id=?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "ACTIVE";
  $d2 = $clinic_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "addSuccess";
  }
  }
  
     //===========================INACTIVE/ DELETE STOCK=========================================
function restoreServiceNotif($conn,$clinic_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE clinic_tbl SET `verify_status`= ? WHERE clinic_id=?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "2";
  $d2 = $clinic_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "addSuccess";
  }
  }
     //===========================INACTIVE/ DELETE STOCK=========================================
function denyClinic($conn,$clinic_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE clinic_tbl SET `status`= ?,`verify_status`=? WHERE clinic_id=?");
  $stmt->bind_param("sss", $d1, $d2, $d3);
  
  // set parameters and execute
  $d1 = "DENIED";
  $d2 = 5;
  $d3 = $clinic_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "delSuccess";
  }
  }
   //===========================INACTIVE/ DELETE STOCK=========================================
function restoreAdmin($conn,$user_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE user_accounts SET status= ? WHERE user_id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "ACTIVE";
  $d2 = $user_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "addSuccess";
  }
  }
   //===========================INACTIVE/ DELETE STOCK=========================================
function restoreDoctor($conn,$user_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE user_accounts SET status= ? WHERE user_id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "ACTIVE";
  $d2 = $user_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "addSuccess";
  }
  }
   //===========================INACTIVE/ DELETE STOCK=========================================
function restoreAssistant1($conn,$user_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE user_accounts SET status= ? WHERE user_id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "ACTIVE";
  $d2 = $user_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "addSuccess";
  }
  }
   //===========================INACTIVE/ DELETE STOCK=========================================
function restoreBranch1($conn,$branch_id){

  
  // prepare and bind
  $stmt = $conn->prepare("
  UPDATE tbl_branch SET status= ? WHERE branch_id =?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = "ACTIVE";
  $d2 = $branch_id;
  
  if ($stmt->execute()) {
  
    $_SESSION['patientErr'] = "addSuccess";
  }
  }
//================================================
function deletePatient1($conn,$patient_id){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM patient_record WHERE patient_id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $patient_id;

  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "delSuccess";
  return true;
  }
  }
//================================================
function deleteMedicine1($conn,$Med_Id){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM inventory_medicine WHERE Med_Id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $Med_Id;

  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "delSuccess";
  return true;
  }
  }
//================================================
function deleteMedicine2($conn,$Equip_Id){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM inventory_equipment WHERE Equip_Id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $Equip_Id;

  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "delSuccess";
  return true;
  }
  }
//================================================
function deleteService1($conn,$doctor_id ){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM doctor_tbl WHERE doctor_id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $doctor_id ;

  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "delSuccess";
  return true;
  }
  }
  //================================================
function deleteAdmin1($conn,$user_id){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM user_accounts WHERE user_id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $user_id;

  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "delSuccess";
  return true;
  }
  }
    //================================================
function deleteDoctor1($conn,$user_id){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM user_accounts WHERE user_id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $user_id;

  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "delSuccess";
  return true;
  }
  }
      //================================================
function deleteAssistant1($conn,$user_id){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM user_accounts WHERE user_id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $user_id;

  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "delSuccess";
  return true;
  }
  }
      //================================================
function deleteBranch1($conn,$branch_id){
  // prepare and bind
  $stmt = $conn->prepare("DELETE FROM tbl_branch WHERE branch_id = ?");
  $stmt->bind_param("s", $d1);
  
  // set parameters and execute
  $d1 = $branch_id;

  if ($stmt->execute()) {
    $_SESSION['patientErr'] = "delSuccess";
  return true;
  }
  }
//=======SHOW MODAL STOCK ADDING=================================de==================
function showModalStock($conn,$Med_Id){
//$sql = "SELECT * FROM user_accounts WHERE Med_Id ='".$Med_Id."' ";
$sql = "SELECT * FROM inventory_medicine WHERE Med_Id ='".$Med_Id."' ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

      return array($row["Med_Id"],$row["Med_Name"]);
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}


//=======SHOW DOCTOR LIST===================================================
function showDoctor($conn){
$sql = "SELECT * FROM user_accounts where user_type = 'Doctor'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo ' 


    <div class="col-sm-6 col-md-6 col-lg-4"  style="padding-bottom: 2rem;">
      <div class="card h-100  bg-white p-3 mb-4 shadow">
        <div class="d-flex justify-content-between mb-4" >
          <div class="user-info">
            <div class="user-info__basic">
              <!-- NAME OF THE CLIENT -->
              <h5 class="mb-0">'.$row["last_name"].', '.$row["first_name"].' '.$row["middle_name"].'</h5>
              <p class="text-muted mb-0">'.$row["age"].', '.$row["gender"].'</p>

            </div>
            
          </div><!-- CLOSING CODES -->

          <!-------- DROPDOWN MENU TO CANCEL AND EDIT APPOINTMENT -->
          <div class="dropdown open"><a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu" aria-labelledby="triggerId1">
              <a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
              <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i>Remove Doctor</a>
            </div>
          </div>
          
        </div>
        

        <!-- CLIENT OTHER INFORMATIONS  -->
        <center><img src="include/profile pictures/'.$row["profile_img"].'" style="width: 110px; border-radius:55px;">

          <div class="d-flex justify-content-between mt-4">
            <div>
              <h5 class="mb-0" style=position:absolute;bottom:10px;">Contact:
                <small class="ml-1">'.$row["contactno"].'</small>
              </h5>
            </div>
          </div>
      </div>
    </div> 
      ';
  }
} else {
  echo "0 results";
}

//mysqli_close($connection);

}

//=======SHOW DOCTOR LIST===================================================
function showXray($conn,$clinic){
  $sql = "SELECT * FROM x_ray WHERE clinic_id='$clinic'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' 
  
  
      <div class="col-sm-6 col-md-6 col-lg-4"  style="padding-bottom: 2rem;">
        <div class="card h-100  bg-white p-3 mb-4 shadow">
          <div class="d-flex justify-content-between mb-4" >
            <div class="user-info">
              <div class="user-info__basic">
                <!-- NAME OF THE CLIENT -->
                <h5 class="mb-0">['.$row["patient_id"].'] '.$row["patient_name"].'</h5>
                <p class="text-muted mb-0">'.$row["date"].'</p>
  
              </div>
              
            </div><!-- CLOSING CODES -->
  
            <!-------- DROPDOWN MENU TO CANCEL AND EDIT APPOINTMENT -->
            <div class="dropdown open"><a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu" aria-labelledby="triggerId1">
                <a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
                <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i>Remove Doctor</a>
              </div>
            </div>
            
          </div>
          
  
          <!-- CLIENT OTHER INFORMATIONS  -->
          <center><img src="include/profile pictures/'.$row["x_ray"].'" style="width: 15rem;""
          id="img1">
          
            <div class="d-flex justify-content-between mt-4">
              <div>
                
                
              </div>
            </div>
        </div>
      </div> 
        ';
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }

//===================UPDATE OF MEDICINE STOCK==================================
function updateMedStock($conn,$Med_Id,$Stock){
  // prepare and bind
 
  $stmt = $conn->prepare("
    UPDATE inventory_medicine
    SET Quantity = ?
    WHERE Med_Id = ?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = $Stock;
  $d2 = $Med_Id;


  if ($stmt->execute()) {
  return true;
  }
  }

  //===================UPDATE OF MEDICINE STOCK==================================
function minusMedStock($conn,$updateStock,$medicine){
  // prepare and bind
 
  $stmt = $conn->prepare("
    UPDATE inventory_medicine
    SET Quantity = ?
    WHERE Med_Id = ?");
  $stmt->bind_param("ss", $d1, $d2);
  
  // set parameters and execute
  $d1 = $updateStock;
  $d2 = $medicine;


  if ($stmt->execute()) {
  return true;
  }
  }


//===================SHOW TOTAL PATIENT==================================
function showTotalPatient($conn,$clinic_id){
  $sql = "SELECT DISTINCT patient_id FROM clinic_patients WHERE clinic_id='$clinic_id'";
  
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      return mysqli_num_rows($result);
  } else {
    echo "0";
  }
  
  //mysqli_close($connection);
    }
//===================SHOW TOTAL PATIENT==================================
function showTotalPatientAdmin($conn){
  $sql = "SELECT * FROM patient_record";
  
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      return mysqli_num_rows($result);
  } else {
    echo "0";
  }
  
  //mysqli_close($connection);
    }
//===================SHOW TOTAL TODAY'S APPOINTMENT==================================
function showTodaysAppoint($conn,$clinic_id){
  $date = date('Y-m-d');
  //$sql = "SELECT * FROM user_accounts WHERE Med_Id ='".$Med_Id."' ";
  $sql = "SELECT * FROM appointments WHERE clinic_id='$clinic_id' and appointment_datentime='$date'";
  
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      return mysqli_num_rows($result);
  } else {
    echo "0";
  }
  
  //mysqli_close($connection);
    }
//===================SHOW TOTAL TODAY'S APPOINTMENT==================================
function showOwnerClinic($conn){
  
  $sql = "SELECT * FROM user_accounts";
  
  
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      return mysqli_num_rows($result);
  } else {
    echo "0";
  }
  
  //mysqli_close($connection);
    }
  //===================ADDING OF SERVICE==================================
  function showTotalDoctor($conn,$clinic){
    //$sql = "SELECT * FROM user_accounts WHERE Med_Id ='".$Med_Id."' ";
    $sql = "SELECT * FROM doctor_tbl WHERE clinic_id='$clinic'";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        return mysqli_num_rows($result);
    } else {
      echo "0";
    }
    
    //mysqli_close($connection);
      }
  //===================ADDING OF SERVICE==================================
  function showTotalClinic($conn){
    //$sql = "SELECT * FROM user_accounts WHERE Med_Id ='".$Med_Id."' ";
    $sql = "SELECT * FROM clinic_tbl";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        return mysqli_num_rows($result);
    } else {
      echo "0";
    }
    
    //mysqli_close($connection);
      }

      
  //===================ADDING OF SERVICE==================================
  function showClinicDD($conn,$id){
    //$sql = "SELECT * FROM user_accounts WHERE Med_Id ='".$Med_Id."' ";
    $sql = "SELECT * FROM clinic_tbl WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result)>0) {
      while($row = mysqli_fetch_assoc($result)) {
        echo '<option value='.$row['clinic_id'].'>'.$row['clinic_name'].'</option>'; 
      }
    }else{
      echo "0 result";
    }
    //mysqli_close($connection);
    }
 //=======SHOW PATIENT DROPDOWN===================================================
 function showMedicineDD($conn){
  $sql = "SELECT * FROM inventory_medicine";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['Med_Name'].' ">'.$row['Med_Name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }
//=======SHOW PATIENT DROPDOWN===================================================
function showMedicineMinuse($conn){
  $sql = "SELECT * FROM inventory_medicine";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['Price'].' - '.$row['Med_Name'].'">'.$row['Med_Name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

  //=======SHOW PATIENT DROPDOWN===================================================
function showStocks($conn){
  $sql = "SELECT * FROM inventory_medicine";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['Quantity'].'">'.$row['Quantity'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

  //===================ADDING OF PRESCRIPTION==================================
 function addPrescription($conn,$patient_name,$doctor_name,$note,$meds,$dosage,$frequency){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO prescription_list (patient_name,doctor_name,note,meds,dosage,frequency) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $d1, $d2, $d3,$d4,$d5,$d6);
  
  // set parameters and execute
  $d1 = $patient_name;
  $d2 = $doctor_name;
  $d3 = $note;
  $d4 = $meds;
  $d5 = $dosage;
  $d6 = $frequency;

  
  if ($stmt->execute()) {
  return true;
  }
  }
  //===================ADDING OF PRESCRIPTION==================================
  function addPresciptionBill($conn,$sale_name,$sale_quantity,$sale_price){
    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO sales (sale_name,sale_quantity,sale_price) VALUES (?,?,?)");
    $stmt->bind_param("sss", $d1, $d2, $d3);

    // set parameters and execute
    $d1 = $sale_name;
    $d2 = $sale_quantity;
    $d3 = $sale_price;

  

    if($stmt->execute()){
    return true;
    }
    
  }
  
  //=======SHOW PRESCRIPTION LIST===================================================
/*function showMPrescriptionlist($conn){
  $sql = "SELECT * FROM prescription_list";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo ' <tr>
  <td name="prescription_id" value="<?php $row['prescription_id']; ?>" id="presbadge badge-pill badge-primary">'.$row["prescription_id"].'</td>
          <td>'.$row["patient_name"].'</td>
          <td>'.$row["doctor_name"].'</td>
          <td>
  
        <a type="button" href="generateprescription.php?id=$row["prescription_id"]" class="btn btn-success" name="create_pdf"><i class="fas fa-print" aria-hidden="true"></i></a>

        <button type="button" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
                </td>
        </tr>
        ';
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }
*/
  //=======SHOW MODAL PRESCRIPTION===================================================
function showModalPrescription($conn,$patient_id){
  $sql = "SELECT * FROM prescription_list WHERE prescription_id ='".$prescription_id."' ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["prescription_id"],$row["patient_name"],$row["doctor_name"],$row["note"],$row["meds"],$row["dosage"],$row["frequency"],$row["duration"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }







  //=======SHOW PATIENT LIST===================================================
function showToothPro($conn, $ref_no, $tooth_id){
$sql = "SELECT * FROM dentalchart WHERE ref_no = '".$ref_no."' AND tooth_id = '".$tooth_id."' ORDER BY `procedure_id` DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  return $row["pro_legend"];
  }
} else {
  return " ";
}

//mysqli_close($connection);

}



  //=======SHOW PATIENT LIST===================================================
function showToothCond($conn, $ref_no, $tooth_id){
$sql = "SELECT * FROM dentalchart WHERE ref_no = '".$ref_no."' AND tooth_id = '".$tooth_id."' ORDER BY procedure_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  return $row["con_legend"];
  }
} else {
  return "";
}

//mysqli_close($connection);

}



  //=======SHOW PATIENT LIST===================================================
function showAllToothCond($conn){
$sql = "SELECT * FROM conditiontbl";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["con_legend"].'">'.$row["con_legend"].' - '.$row["t_condition"].'</option>';
  }
}

//mysqli_close($connection);
}

function getToothCond($conn, $con_legend){
$sql = "SELECT * FROM conditiontbl WHERE con_legend = '".$con_legend."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  if($row = mysqli_fetch_assoc($result)) {
    return $row["t_condition"];
  }
}
//mysqli_close($connection);
}




function getUserId($conn, $email){
  $sql = "SELECT * FROM user_accounts WHERE email = '".$email."'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
      return $row["user_id"];
    }
  }
  //mysqli_close($connection);
  }

function getProPrice($conn, $pro_Select){
  $sql = "SELECT * FROM restotbl WHERE pro_legend = '$pro_Select'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
      return $row["price"];
    }
  }
  //mysqli_close($connection);
  }

  
function getBranch($conn, $email){
  $sql = "SELECT * FROM user_accounts WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
      return $row["branch"];
    }
  }
  //mysqli_close($connection);
  }
  
  function getPatientName1($conn, $email){
    $sql = "SELECT * FROM user_accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      if($row = mysqli_fetch_assoc($result)) {
        return $row["first_name"]." ".$row["last_name"];
      }
    }
    //mysqli_close($connection);
    }
  
  
function getSname($conn, $refno){
  $sql = "SELECT * FROM appointments WHERE appointment_refno = '$refno'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
      return $row["service_name"];
    }
  }
  //mysqli_close($connection);
  }

  
function getPID($conn, $refno){
  $sql = "SELECT * FROM appointments WHERE appointment_refno = '$refno'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
      return $row["patient_id"];
    }
  }
  //mysqli_close($connection);
  }

  
function getPname($conn, $refno){
  $sql = "SELECT * FROM appointments WHERE appointment_refno = '$refno'";;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
      return $row["patient_name"];
    }
  }
  //mysqli_close($connection);
  }

  
function getDname($conn, $refno){
  $sql = "SELECT * FROM appointments WHERE appointment_refno = '$refno'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
      return $row["doctor_name"];
    }
  }
  //mysqli_close($connection);
  }

  
  
function getDoctorName($conn, $email){
  $sql = "SELECT * FROM user_accounts WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if($row = mysqli_fetch_assoc($result)) {
      return $row["first_name"].' '.$row["last_name"];
    }
  }
  //mysqli_close($connection);
  }

  //=======SHOW PATIENT LIST===================================================
function showAllToothPro($conn){
$sql = "SELECT * FROM restotbl";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row["pro_legend"].'">'.$row["pro_legend"].' - '.$row["t_procedure"].'</option>';
  }
}
//mysqli_close($connection);
}

  //=======SHOW PATIENT LIST===================================================
  function dentalDate($conn,$refno){
    $sql = "SELECT * FROM dentalchart where ref_no ='$refno'";
    $result = mysqli_query($conn, $sql);
   
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    return array($row["dentaldate"]);
  }
} else {
  echo "taenayan";
}
    //mysqli_close($connection);
    }
    
function getToothPro($conn, $pro_legend){
$sql = "SELECT * FROM restotbl WHERE pro_legend = '".$pro_legend."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  if($row = mysqli_fetch_assoc($result)) {
    return $row["t_procedure"];
  }
}
//mysqli_close($connection);
}


//===================ADDING OF DENTAL CHART RECORD==================================
 function addToothProCond($conn, $ref_no,$pid,$clinic_id,$clinic_name,$patient_name,$email,$tooth_id, $t_condition, $t_procedure, $con_legend, $pro_legend,$price,$dentaldate, $bottomright,$bottomleft,$leftbottom,$lefttop,$topleft,$topright,$rightbottom,$righttop,$center,$all,$dental_type,$notes, $status){
// prepare and bind
  $stmt = $conn->prepare("INSERT INTO dentalchart  (`ref_no`,`patient_id`,`clinic_id`,`clinic_name`,`patient_name`,`email`, `tooth_id`, `t_condition`, `t_procedure`, `con_legend`, `pro_legend`,`price`,`dentaldate`, `bottomright`, `bottomleft`, `leftbottom`, `lefttop`, `topleft`, `topright`, `rightbottom`, `righttop`, `center`,`all`,`dental_type`,`notes`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssssssssssssssssssssss", $d1, $d2, $d3,$d4, $d5, $d6,$d7, $d8, $d9, $d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18,$d19,$d20,$d21,$d22,$d23,$d24,$d25,$d26);

  // set parameters and execute

$d1 = $ref_no;
$d2 = $pid;
$d3 = $clinic_id;
$d4 = $clinic_name;
$d5 = $patient_name;
$d6 = $email;
$d7 = $tooth_id;
$d8 = $t_condition;
$d9 = $t_procedure;
$d10 = $con_legend;
$d11 = $pro_legend;
$d12 = $price;
$d13 = $dentaldate;
$d14 = $bottomright;
$d15 = $bottomleft;
$d16 = $leftbottom;
$d17 = $lefttop;
$d18 = $topleft;
$d19 = $topright;
$d20 = $rightbottom;
$d21 = $righttop;
$d22 = $center;
$d23 = $all;
$d24 = $dental_type;
$d25 = $notes;
$d26 = $status;



if ($stmt->execute()) {
return true;
}
}


//===================UPDATE DENTAL==================================
function updateDentalStat($conn,$status,$date,$ref_no,$tooth_id,$pid,$pname,$dname,$sname,$price,$status1){
 
  $stmt = $conn->prepare("UPDATE dentalchart SET status = ?,dentaldate= ? WHERE ref_no= ? AND tooth_id = ?");
  $stmt->bind_param('ssss',$d1,$d2,$d3,$d4);

  $d1 = $status;
  $d2 = $date;
  $d3 = $ref_no;
  $d4 = $tooth_id;

if($stmt->execute()){
 
    return true;
  }
}


//===================UPDATE DENTAL==================================
function updateDentalStatProgress($conn,$status,$date,$ref_no,$tooth_id,$pro_id){

  $stmt = $conn->prepare("UPDATE dentalchart SET status = ?,dentaldate=? WHERE procedure_id=? AND tooth_id=?");
  $stmt->bind_param('ssss',$d1,$d2,$d3,$d4);

  $d1 = $status;
  $d2 = $date;
  $d3 = $pro_id;
  $d4 = $tooth_id;

if($stmt->execute()){
  return true;
}
}


//=================== ADD BILLING THRU DENTAL CHART ==================================

function DentalDuplicate($conn, $ref_no,$pid,$patient_name,$date){

  $sql = "SELECT * FROM dental_duplicate WHERE patient_id = '$pid'";
  $result = mysqli_query($conn, $sql);
  if($row = mysqli_fetch_assoc($result) == 0){
  $stmt =$conn->prepare("INSERT INTO dental_duplicate (`ref_no`,`patient_id`,`patient_name`,`date`)
  VALUES(?,?,?,?)");
  $stmt->bind_param('ssss',$d1,$d2,$d3,$d4);

  $d1 = $ref_no;
  $d2 = $pid;
  $d3 = $patient_name;
  $d4 = $date;

  if($stmt->execute()){
    return true;
  }else{
    die(mysqli_error($conn));
  }
}
}


//=================== ADD BILLING THRU DENTAL CHART ==================================

function addDentalBilling($conn, $ref_no, $pid, $pname, $dname, $sname, $price, $date, $status){

  $stmt =$conn->prepare("INSERT INTO billing (`ref_no`,`patient_id`,`patient_name`,`doctor`,`service`,`price`,`date`,`status`)
  VALUES(?,?,?,?,?,?,?,?)");
  $stmt->bind_param('ssssssss',$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8);

  $d1 = $ref_no;
  $d2 = $pid;
  $d3 = $pname;
  $d4 = $dname;
  $d5 = $sname;
  $d6 = $price;
  $d7 = $date;
  $d8 = $status;

  if($stmt->execute()){
    return true;
  }
}

//=================== ADD BILLING THRU DENTAL CHART ==================================

function addDentalBill($conn, $ref_no, $pid, $pname,$dname,$sname,$price,$date,$status){

  $stmt =$conn->prepare("INSERT INTO billing (ref_no,patient_id,patient_name,doctor,service,price,date,status)
  VALUES(?,?,?,?,?,?,?,?)");
  $stmt->bind_param('ssssssss',$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8);

  $d1 = $ref_no;
  $d2 = $pid;
  $d3 = $pname;
  $d4 = $dname;
  $d5 = $sname;
  $d6 = $price;
  $d7 = $date;
  $d8 = $status;

  if($stmt->execute()){
    return true;
  }
}
//===================Show Reports==================================
function showReports($conn,$clinic){


  if(isset($_POST['from_date']) && isset($_POST['to_date']))
  {
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      //while($row = mysqli_fetch_assoc($result)){
        //  $columns[] = $row['Field'];
       
       // echo '<th>'.$columns[$i].'</th>';
        //$i++;
      //}
            
//$table_column_name = $POST['table_column_name'];
//$sql = "UPDATE nametbl SET  '.$table_column_name.'  = ? "
      
      $query = "SELECT * FROM `appointments` WHERE clinic_id='$clinic' AND `appointment_datentime` BETWEEN '$from_date' AND '$to_date' ";
      $query_run = mysqli_query($conn, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
          foreach($query_run as $row)
          {
              ?>
              <tr>
                  <td><?= $row['appointment_refno']; ?></td>
                  <td><?= $row['patient_name']; ?></td>
                  <td><?= $row['service_name']; ?></td>
                  <td><?= $row['appointment_datentime']; ?></td>
                
              </tr>
              <?php
          }
      }
      else
      {
          echo "No Record Found";
      }
  }
}
//===================Show Reports==================================
function showBillingReports($conn,$clinic){

  if(isset($_POST['from_date']) && isset($_POST['to_date']))
  {
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      //while($row = mysqli_fetch_assoc($result)){
        //  $columns[] = $row['Field'];
       
       // echo '<th>'.$columns[$i].'</th>';
        //$i++;
      //}
            
//$table_column_name = $POST['table_column_name'];
//$sql = "UPDATE nametbl SET  '.$table_column_name.'  = ? "
      
      $query = "SELECT * FROM `billing` WHERE clinic_id='$clinic' AND `date` BETWEEN '$from_date' AND '$to_date' ";
      $query_run = mysqli_query($conn, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
          foreach($query_run as $row)
          {
              ?>
              <tr>
                
                  
                  <td><?= $row['patient_name']; ?></td>
                  <td><?= $row['doctor']; ?></td>
                  <td><?= $row['service']; ?></td>
                  <td><?= $row['price']; ?></td>
                  <td><?= $row['amount_paid']; ?></td>
                  <td><?= $row['date']; ?></td>
                  <td><?= $row['status']; ?></td>
              </tr>
              <?php
          }
      }
      else
      {
          echo "No Record Found";
      }
  }
}
//===================Show Reports==================================
function showReportInventory($conn){

  if(isset($_POST['from_date']) && isset($_POST['to_date']))
  {
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      //while($row = mysqli_fetch_assoc($result)){
        //  $columns[] = $row['Field'];
       
       // echo '<th>'.$columns[$i].'</th>';
        //$i++;
      //}
            
//$table_column_name = $POST['table_column_name'];
//$sql = "UPDATE nametbl SET  '.$table_column_name.'  = ? "
      
      $query = "SELECT * FROM `inventory_medicine` WHERE `requested_date` BETWEEN '$from_date' AND '$to_date' ";
      $query_run = mysqli_query($conn, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
          foreach($query_run as $row)
          {
              ?>
              <tr>
                  <td><?= $row['Med_Id']; ?></td>
                  <td><?= $row['Med_Name']; ?></td>
                  <td><?= $row['Quantity']; ?></td>
                  <td><?= $row['Price']; ?></td>
                  <td><?= $row['Expiry_date']; ?></td>
                  <td><?= $row['Requested_date']; ?></td>
              
              </tr>
              <?php
          }
      }
      else
      {
          echo "No Record Found";
      }
  }
}


//===================UPDATE OF CONTROL PANEL==================================
function updateControlPanel($conn,$clinic_name,$clinic_contact,$clinic_email,$start_day,$end_day,$start_time,$end_time,$clinic_address,$facebook_link,$twitter_link, $profile_img){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE control_panel
    SET clinic_name = ?, clinic_contact = ?, clinic_email = ?, start_day = ?, end_day = ?, start_time = ?, end_time = ?, clinic_address = ?, facebook_link = ?, twitter_link = ?, clinic_logo = ?
    WHERE panel_id = 1");
  $stmt->bind_param("sssssssssss", $d1, $d3, $d4, $d5, $d6, $d7, $d8, $d10, $d11, $d12, $d13);
  
  // set parameters and execute

  $d1 = $clinic_name;
  $d3 = $clinic_contact;
  $d4 = $clinic_email;
  $d5 = $start_day;
  $d6 = $end_day;
  $d7 = $start_time;
  $d8 = $end_time;

  $d10 = $clinic_address;
  $d11 = $facebook_link;
  $d12 = $twitter_link;
  $d13 = $profile_img;

  if ($stmt->execute()) {
  return true;
  }
  }

  //===================UPDATE OF CONTROL PANEL==================================
function updateControlPanelNoImage($conn,$clinic_name,$clinic_contact,$clinic_email,$start_day,$end_day,$start_time,$end_time,$clinic_address,$facebook_link,$twitter_link){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE control_panel
    SET clinic_name = ?, clinic_contact = ?, clinic_email = ?, start_day = ?, end_day = ?, start_time = ?, end_time = ?, clinic_address = ?, facebook_link = ?, twitter_link = ?
    WHERE panel_id = 1");
  $stmt->bind_param("ssssssssss", $d1, $d3, $d4, $d5, $d6, $d7, $d8, $d10, $d11, $d12);
  
  // set parameters and execute

  $d1 = $clinic_name;
  $d3 = $clinic_contact;
  $d4 = $clinic_email;
  $d5 = $start_day;
  $d6 = $end_day;
  $d7 = $start_time;
  $d8 = $end_time;

  $d10 = $clinic_address;
  $d11 = $facebook_link;
  $d12 = $twitter_link;

  if ($stmt->execute()) {
  return true;
  }
  }

  //===================UPDATE OF CONTROL PANEL==================================
function updateContent($conn,$homepage_header,$homepage_description,$service_one,$service_two,$service_three,
$about_tech_header,$about_tech_description,$about_tech_headerone,$about_tech_description_one,$about_tech_header_two,
$about_tech_description_two,$about_tech_header_three,$about_tech_description_three,$faq_one,$faq_one_answer,
$faq_two,$faq_two_answer, $faq_three,$faq_three_answer,$aboutus_header,$aboutus_description,$aboutus_founded,
$doctor_one, $doctor_two,$doctor_three){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE content
    SET homepage_header = ?, homepage_description = ?, service_one = ?, service_two = ?, service_three = ?,
    about_tech_header = ?, about_tech_description = ?, about_tech_headerone = ?, about_tech_description_one = ?,
    about_tech_header_two = ?, about_tech_description_two = ?, about_tech_header_three = ?, about_tech_description_three = ?,
    faq_one = ?, faq_one_answer = ?, faq_two = ?, faq_two_answer = ?, faq_three = ?, faq_three_answer = ?,
    aboutus_header = ?, aboutus_description = ?, aboutus_founded = ?, doctor_one = ?, doctor_two = ?, doctor_three = ?
    WHERE content_id = 1");
  $stmt->bind_param("sssssssssssssssssssssssss", $d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18,$d19,$d20,$d21,$d22,$d23,$d24,$d25);
  
  // set parameters and execute

 
  $d1 = $homepage_header;
  $d2 = $homepage_description;
  $d3 = $service_one;
  $d4 =$service_two;
  $d5 = $service_three;
  $d6 = $about_tech_header;
  $d7 = $about_tech_description;
  $d8 = $about_tech_headerone;
  $d9 = $about_tech_description_one;
  $d10 = $about_tech_header_two;
  $d11 = $about_tech_description_two;
  $d12 = $about_tech_header_three;
  $d13 = $about_tech_description_three;
  $d14 = $faq_one;
  $d15 = $faq_one_answer;
  $d16 = $faq_two;
  $d17 = $faq_two_answer;
  $d18 = $faq_three;
  $d19 = $faq_three_answer;
  $d20 = $aboutus_header;
  $d21 = $aboutus_description;
  $d22 = $aboutus_founded;
  $d23 = $doctor_one;
  $d24 = $doctor_two;
  $d25 = $doctor_three;


  if ($stmt->execute()) {
  return true;
  }
  }

  //===================UPDATE OF CONTROL PANEL==================================
function updateContentNoHeaderImage($conn,$homepage_header,$homepage_description,$service_one,$service_two,$service_three,
$about_tech_header,$about_tech_description,$about_tech_headerone,$about_tech_description_one,$about_tech_header_two,
$about_tech_description_two,$about_tech_header_three,$about_tech_description_three,$faq_one,$faq_one_answer,
$faq_two,$faq_two_answer, $faq_three,$faq_three_answer,$aboutus_header,$aboutus_description,$aboutus_founded,
$doctor_one, $doctor_two,$doctor_three){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE content
    SET homepage_header = ?, homepage_description = ?, service_one = ?, service_two = ?, service_three = ?,
    about_tech_header = ?, about_tech_description = ?, about_tech_headerone = ?, about_tech_description_one = ?,
    about_tech_header_two = ?, about_tech_description_two = ?, about_tech_header_three = ?, about_tech_description_three = ?,
    faq_one = ?, faq_one_answer = ?, faq_two = ?, faq_two_answer = ?, faq_three = ?, faq_three_answer = ?,
    aboutus_header = ?, aboutus_description = ?, aboutus_founded = ?, doctor_one = ?, doctor_two = ?, doctor_three = ?
    WHERE content_id = 1");
  $stmt->bind_param("sssssssssssssssssssssssss", $d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18,$d19,$d20,$d21,$d22,$d23,$d24,$d25);
  
  // set parameters and execute

 
  $d1 = $homepage_header;
  $d2 = $homepage_description;
  $d3 = $service_one;
  $d4 =$service_two;
  $d5 = $service_three;
  $d6 = $about_tech_header;
  $d7 = $about_tech_description;
  $d8 = $about_tech_headerone;
  $d9 = $about_tech_description_one;
  $d10 = $about_tech_header_two;
  $d11 = $about_tech_description_two;
  $d12 = $about_tech_header_three;
  $d13 = $about_tech_description_three;
  $d14 = $faq_one;
  $d15 = $faq_one_answer;
  $d16 = $faq_two;
  $d17 = $faq_two_answer;
  $d18 = $faq_three;
  $d19 = $faq_three_answer;
  $d20 = $aboutus_header;
  $d21 = $aboutus_description;
  $d22 = $aboutus_founded;
  $d23 = $doctor_one;
  $d24 = $doctor_two;
  $d25 = $doctor_three;


  if ($stmt->execute()) {
  return true;
  }
  }

  //===================UPDATE OF CONTROL PANEL==================================
function updateContentNoTechImage($conn,$homepage_header,$homepage_description,$service_one,$service_two,$service_three,
$about_tech_header,$about_tech_description,$about_tech_headerone,$about_tech_description_one,$about_tech_header_two,
$about_tech_description_two,$about_tech_header_three,$about_tech_description_three,$faq_one,$faq_one_answer,
$faq_two,$faq_two_answer, $faq_three,$faq_three_answer,$aboutus_header,$aboutus_description,$aboutus_founded,
$doctor_one, $doctor_two,$doctor_three){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE content
    SET homepage_header = ?, homepage_description = ?, service_one = ?, service_two = ?, service_three = ?,
    about_tech_header = ?, about_tech_description = ?, about_tech_headerone = ?, about_tech_description_one = ?,
    about_tech_header_two = ?, about_tech_description_two = ?, about_tech_header_three = ?, about_tech_description_three = ?,
    faq_one = ?, faq_one_answer = ?, faq_two = ?, faq_two_answer = ?, faq_three = ?, faq_three_answer = ?,
    aboutus_header = ?, aboutus_description = ?, aboutus_founded = ?, doctor_one = ?, doctor_two = ?, doctor_three = ?
    WHERE content_id = 1");
  $stmt->bind_param("sssssssssssssssssssssssss", $d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18,$d19,$d20,$d21,$d22,$d23,$d24,$d25);
  
  // set parameters and execute

 
  $d1 = $homepage_header;
  $d2 = $homepage_description;
  $d3 = $service_one;
  $d4 =$service_two;
  $d5 = $service_three;
  $d6 = $about_tech_header;
  $d7 = $about_tech_description;
  $d8 = $about_tech_headerone;
  $d9 = $about_tech_description_one;
  $d10 = $about_tech_header_two;
  $d11 = $about_tech_description_two;
  $d12 = $about_tech_header_three;
  $d13 = $about_tech_description_three;
  $d14 = $faq_one;
  $d15 = $faq_one_answer;
  $d16 = $faq_two;
  $d17 = $faq_two_answer;
  $d18 = $faq_three;
  $d19 = $faq_three_answer;
  $d20 = $aboutus_header;
  $d21 = $aboutus_description;
  $d22 = $aboutus_founded;
  $d23 = $doctor_one;
  $d24 = $doctor_two;
  $d25 = $doctor_three;


  if ($stmt->execute()) {
  return true;
  }
  }


   //===================UPDATE OF PROFILE==================================
function updateMyprofile($conn,$first_name,$last_name,$middle_name,$birthdate,$age,$address,$password,$contactno,$email,$gender){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE user_accounts
    SET first_name = ?, last_name = ?, middle_name = ?, birthdate = ?, age = ?, address = ?, password = ?, contactno = ?, email = ?, gender = ?
    WHERE email = '$email'");
  $stmt->bind_param("ssssssssss", $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9, $d10);
  
  // set parameters and execute

  $d1 = $first_name;
  $d2 = $last_name;
  $d3 = $middle_name;
  $d4 = $birthdate;
  $d5 = $age;
  $d6 = $address;
  $d7 = $password;

  $d8 = $contactno;
  $d9 = $email;
  $d10 = $gender;

  if ($stmt->execute()) {
  return true;
  }
  }
    
  ?>

  