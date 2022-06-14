<?php
function personalInfo(){
$email = $_SESSION['login_admin'];
  $query1= "SELECT *FROM patient_record WHERE email='$email'";
  $query_run1=mysqli_query($conn,$query1);    
    while ($row1=mysqli_fetch_array($query_run1)) {
    }
}
//=======SHOW MAPS===================================================
function showMaps($conn){
  $sql = "SELECT * FROM map";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['map_id'].'">'.$row['map_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

  
//=======SHOW BRANCHES DROPDOWN VALUE ADDRESS ===================================================
function showBranchesDD($conn){
  $sql = "SELECT * FROM tbl_branch";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '

        <option value="'.$row['branch_address'].'">'.$row['branch_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

  //===================UPDATE OF PROFILE==================================
function updateMyprofile1($conn,$first_name,$last_name,$contactno,$parent_guardian,$age,$address,$patient_id){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE patient_record
    SET first_name = ?, last_name = ?, contactno = ?, parent_guardian = ?, age = ?, address = ? WHERE patient_id = ?");
  $stmt->bind_param("sssssss", $d1, $d2, $d3, $d4, $d5, $d6, $d7);
  
  // set parameters and execute 

  $d1 = $first_name;
  $d2 = $last_name;
  $d3 = $contactno;
  $d4 = $parent_guardian;
  $d5 = $age;
  $d6 = $address;
  $d7 = $patient_id;


  if ($stmt->execute()) {
  return true;
  }
  }  

  //===================UPDATE OF PROFILE==================================
function updateMyprofile2($conn,$profile_img, $first_name,$last_name,$contactno,$parent_guardian,$age,$address,$patient_id){
  // prepare and bind
  $stmt = $conn->prepare("
    UPDATE patient_record
    SET profile_img = ?, first_name = ?, last_name = ?, contactno = ?, parent_guardian = ?, age = ?, address = ? WHERE patient_id = ?");
  $stmt->bind_param("ssssssss", $d0, $d1, $d2, $d3, $d4, $d5, $d6, $d7);
  
  // set parameters and execute 
  $d0 = $profile_img;
  $d1 = $first_name;
  $d2 = $last_name;
  $d3 = $contactno;
  $d4 = $parent_guardian;
  $d5 = $age;
  $d6 = $address;
  $d7 = $patient_id;


  if ($stmt->execute()) {
  return true;
  } 
  }  

//=======SHOW BRANCHES DROPDOWN VALUE NAME ===================================================
function showBranchesDDN($conn){
  $sql = "SELECT * FROM tbl_branch";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '

        <option value="'.$row['branch_name'].'">'.$row['branch_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  }

//=======SHOW SERVICE TABLE===================================================
function showServiceDDD($conn){
  $sql = "SELECT * FROM services WHERE ";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  echo  "<tr>
<td>".$row['service_name']."</td>
          <td>".$row['service_des']."</td>
      
          <td>".$row['estimated_time']."</td>
  
        ";
        
    }
  } else {
    echo "0 results";
  }
  }

  function showServiceClinic($conn, $clinic_id){
    $sql = "SELECT * FROM services WHERE clinic_id='$clinic_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        echo '
        <tr>
          <td>'.$row['service_name'].'</td>
          <td>'.$row['estimated_time'].'</td>
        </tr>
        ';
      }
    }
  }



   //=======SHOW SERVICE DROPDOWN===================================================
function showDoctorDDD($conn){
  $sql = "SELECT * FROM user_accounts WHERE user_type='Doctor'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo '
        <option value="'.$row['first_name']." ".$row['last_name'].'">'.$row['first_name']." ".$row['last_name'].'</option>
        ';
  
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }

  
//============================== CANCELLING APPOINTMENTS =======================
function updateCancel($conn, $cancel_refno, $date, $status){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE appointments SET cancelled_datentime=?, status= ? WHERE appointment_refno= ?");
  $stmt->bind_param("sss", $d1, $d2, $d3);
  
  // set parameters and execute
  $d1 = $date;
  $d2 = $status;
  $d3 = $cancel_refno;
  
  if ($stmt->execute()) {
  return true;
  }

}


//=======SHOW MODAL PATIENT PENDING APPOINTMENT===================================================
function showModalAppointRecord($conn,$id){
  $sql = "SELECT * FROM appointments WHERE appointment_refno ='".$id."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["appointment_refno"],$row["patient_id"],$row["patient_name"],$row["email"],$row["doctor_name"]);
    }
  } else {
  $sql = "SELECT * FROM pending_appointments WHERE id ='".$id."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["appointment_refno"],$row["patient_id"],$row["patient_name"],$row["email"],$row["doctor_name"]);
    }
  } else {
    echo "0 results";
  }
  }
  
  //mysqli_close($connection);
  
  }
  
  //=======SHOW MODAL PATIENT PENDING APPOINTMENT===================================================
function showModalFeedback($conn,$id){
  $sql = "SELECT * FROM appointments WHERE appointment_refno ='".$id."'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        return array($row["appointment_refno"],$row["patient_id"],$row["patient_name"],$row["email"],$row["doctor_name"],$row["service_name"]);
    }
  } else {
    echo "0 results";
  }
  
  //mysqli_close($connection);
  
  }

  function getProfImg($conn,$email){
    $sql = "SELECT * FROM patient_record WHERE email ='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        echo $row['profile_img'];
      }
    }
  }

  
  function getPatientName($conn,$email){
    $sql = "SELECT * FROM patient_record WHERE email ='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        echo $row['fullname'];
      }
    }
  }

  function getPatientID($conn,$email){
    $sql = "SELECT * FROM patient_record WHERE email ='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        return $row['patient_id'];
      }
    }
  }

  function showAppointments($conn, $email){

    $sql = "SELECT * FROM appointments WHERE email='$email' AND `status`='Upcoming'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        echo '
        <tr>
            <td style="display:none">'.$row['appointment_refno'].'</td>
            <td>'.$row['clinic_name'].'</td>
            <td>'.$row['service_name'].'</td>
            <td>'.$row['appointment_datentime'].'</td>
            <td>'.$row['start_time'].'</td>
            <td>'.$row['status'].'</td>
            <td><button type="button" class="cancellation btn btn-danger">
            Cancel
          </button>
      </tr>';
      }
    }
  }

  
  function showAppointmentsCompleted($conn, $email){

    $sql = "SELECT * FROM appointments WHERE email='$email' AND `status`='Completed'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        echo '
        <tr>
            <td style="display: none;">'.$row['appointment_refno'].'</td>
            <td>'.$row['clinic_name'].'</td>
            <td>'.$row['service_name'].'</td>
            <td>'.$row['appointment_datentime'].'</td>
            <td>'.$row['start_time'].'</td>
            <td>'.$row['status'].'</td>
            
      </tr>';
      }
    }
  }

  
  function showCancelledAppointments($conn, $email){

    $sql = "SELECT * FROM appointments WHERE email='$email' AND `status`='Cancelled'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        echo '
        <tr>
            <td style="display: none;">'.$row['appointment_refno'].'</td>
            <td>'.$row['clinic_name'].'</td>
            <td>'.$row['service_name'].'</td>
            <td>'.$row['appointment_datentime'].'</td>
            <td>'.$row['start_time'].'</td>
            <td><span class="badge bg-danger">'.$row['status'].'</span></td>
            
      </tr>';
      }
    }
  }
  
   function showPayment($conn, $email){

    $sql = "SELECT * FROM billing WHERE email='$email' AND `status`='Paid'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        echo '
        <tr>
            <td style="display: none;">'.$row['bill_id'].'</td>
            <td>'.$row['clinic_name'].'</td>
            <td>'.$row['price'].'</td>
            <td>'.$row['balance'].'</td>
            <td>'.$row['amount_paid'].'</td>
            <td>'.$row['bill_change'].'</td>
             <td>'.$row['date'].'</td>
 <td>'.$row['status'].'</td>
      </tr>';
      }
    }
  }

function showDentalRecord($conn, $email){

$sql = "SELECT * FROM dentalchart WHERE email='$email'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_assoc($result)){
    echo '
    <tr>
        <td style="display:none">'.$row['procedure_id'].'</td>
        <td>'.$row['clinic_name'].'</td>
        <td>'.$row['pro_legend']." ".$row['t_procedure'].'</td>
        <td>'.$row['tooth_id'].'</td>
        <td>'.$row['price'].'</td>
        <td>'.$row['notes'].'</td>
        <td>'.$row['dentaldate'].'</td>
        <td>'.$row['status'].'</td>

  </tr>';
  }
}
}
  

  //=======SHOW MODAL PATIENT APPOINTMENT===================================================
function showModalPatientAppointment($conn,$id){
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
  
  function getClinicName($conn, $id){
  $sql = "SELECT * FROM clinic_tbl WHERE clinic_id='$id'";
  $result = mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_assoc($result)){
  return $row['clinic_name'];
  }
  }
  else{
  echo "No clinic name";
  }
  }
  

?>

