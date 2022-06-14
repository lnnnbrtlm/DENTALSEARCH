<?php
include('conn.php');
include('session.php');
include('function.php');

$id = $_GET['clinic_id'];
$owner = "SELECT * FROM clinic_tbl WHERE clinic_id='$id'";
$own = mysqli_query($conn, $owner);
if(mysqli_num_rows($own)>0){
    while($row=mysqli_fetch_assoc($own)){
    $ownerId = $row['user_id'];
}}
$owner1 = "SELECT * FROM user_accounts WHERE `user_id`='$ownerId'";
$own1 = mysqli_query($conn, $owner1);
if(mysqli_num_rows($own1)>0){
    while($row=mysqli_fetch_assoc($own1)){
    $ownerName = $row['fullname'];
}}
$nameClinic = getClinicName($conn, $id);
if(isset($_SESSION['login_admin'])){
  $email = $_SESSION['login_admin'];
  $clinicName = "SELECT * FROM clinic_tbl WHERE clinic_id='.$id.'";
  $clinicNameResult = mysqli_query($conn, $clinicName);
  
}
$daysResult = mysqli_query($conn, "SELECT clinic_id, dayname FROM days WHERE clinic_id =".$id."");
$storeDays = [];
while($dayRow = mysqli_fetch_array($daysResult)){
    array_push($storeDays, $dayRow['dayname']);
}

$stringDays = implode(' ', $storeDays);
$scheduledDays = "SELECT * FROM `days` WHERE clinic_id=".$id."";
$resultDays = mysqli_query($conn, $scheduledDays);
$rowDays2 = array();
while($rowDays3 = mysqli_fetch_assoc($resultDays)){
array_push($rowDays2,$rowDays3['dayname']);
}
$dayList = implode(', ',$rowDays2);

if(empty($dayList)){
  $dayList = 'HAHAHAHA';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BOOK NOW | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link href="css/style-new.css" rel="stylesheet" />
 <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    div.gfg{
      margin: 5px;
      padding: 5px;
      background-color: none;
max-height: 350px;
      overflow: auto;
      text-align: justify;
    }
    </style>
</head>

<body>

  <!-- NAVIGATION -->

  <!-- This will appear when client is not logged in -->

  <?php
  if (isset($_SESSION['login_admin'])) {
    include 'navbar (logged-in).php';
  ?>

    <!-- This will appear when client is logged in -->

  <?php } else {
    include 'navbar (not logged-in).php';
  } ?>

<?php
if(isset($_POST['toFeedback'])){

  $name = $_POST['patient_name'];
  $rate = $_POST['rate'];
  $feedback = $_POST['feedback'];
  $clinic_id = $_POST['clinic_id'];
  $pic = $_POST['picture'];
  
$stmt =$conn->prepare("INSERT INTO feedback(`picture`,`clinic_id`,`patient_name`,`rate`,`feedback`) VALUES(?,?,?,?,?)");
$stmt->bind_param("sssss",$d1,$d2,$d3,$d4,$d5);

$d1 = $pic;
$d2 = $clinic_id;
$d3 = $name;
$d4 = $rate;
$d5 = $feedback;

if ($stmt->execute()) {
    
header("Location: clinic.php?clinic_id=".$id."");
  }
}
?>
<?php 


$sql = "SELECT * FROM clinic_tbl WHERE clinic_id=".$id."";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

echo ' 

  <div class="container-flex py-3 bg-light">
    <div class="container">

      <div class="row">
        <div class="col">
          <div class="card" style="height:450px">
            <div class="card-body" style="background:url(../dc-assistant-doctor/img/'.$row["clinic_photo3"].'); background-repeat: no-repeat;
  background-size: cover; background-position: center;">
          

            </div>
          </div>
        </div>
      </div>


      <div class="row pb-4">
        <div class="col-md-8 mt-4 ">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-1">
                  <img src="../dc-assistant-doctor/img/'.$row["logo"].'" style="width:60px">
                </div>
                <div class="col-md-8">
                  <h2 style="margin-bottom:0">'.$row["clinic_name"].'</h2>
                  <small class="text-muted"><i class="fas fa-map-marker-alt me-3"></i>'.$row["clinic_address"].'</small></p>
                </div>';
                //here
                if(isset($_SESSION['login_admin'])){
               echo ' <div class="col-md-3">
                  <div style="float:right;">
                    <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#Book">Book</button>
                  </div>
                </div>';
                 }
                 $time_in_12_hour_format = date("g:i a", strtotime($row['start_time']));
                 $time_in_12_hour_format1 = date("g:i a", strtotime($row['end_time']));
               echo ' 
              </div>

            </div>
          </div>

          <div class="row pt-4">
            <div class="col">
              <div class="card">
                <div class="card-body" style="text-align:justify;">
                '.$row["clinic_desc"].'
                                </div>
              </div>
            </div>
          </div>

          <div class="row pt-4">
          <iframe width="600" height="450" src="https://maps.google.com/maps?q='.$row["clinic_address"].'&output=embed"></iframe>
            </iframe>
          </div>

        </div>
        <div class="col-md-4 mt-4">
          <div class="card">
            <div class="card-body">
              <p><i class="fas fa-clock me-3"></i><strong>Clinic Time</strong><br>
                <small class="text-muted">'.$time_in_12_hour_format.' - '.$time_in_12_hour_format1.'</small>
              </p>
              <p><i class="fas fa-calendar me-3"></i><strong>Open on</strong><br>
                <small class="text-muted">'.$dayList.'</small>
              
              <p><i class="fas fa-map-marker-alt me-3"></i><strong>Full address</strong><br>
                <small class="text-muted">'.$row["clinic_address"].'</small>
              </p>
              <p><i class="fas fa-phone me-3"></i><strong>Contact</strong><br>
                <small class="text-muted">'.$row["clinic_contact"].'</small>
              </p>
              <p><i class="fas fa-envelope me-3"></i><strong>Email</strong><br>
                <small class="text-muted">'.$row["clinic_email"].'</small>
              </p>
              <p><i class="fas fa-envelope me-3"></i><strong>Owner</strong><br>
                <small class="text-muted">'.$ownerName.'</small>
              </p>

            </div>
          </div>
        </div>
      </div>
      ';

?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
            <div class="table-responsive">
              <table class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Service</th>
                    
                    <th scope="col">Estimated Duration</th>

                  </tr>
                </thead>
                <tbody>
        <?php showServiceClinic($conn, $row['clinic_id'])?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

   
<div class="filler">
      <div class="row ">
      <?php
       $query = "SELECT * FROM doctor_tbl WHERE clinic_id = '".$row['clinic_id']."'";
       $query_run = mysqli_query($conn, $query);
       if(mysqli_num_rows($query_run) > 0){
         while($row1 = mysqli_fetch_assoc($query_run)){
        
         ?> 

          <div class="col-md-4 mt-4 d-flex justify-content-center">
          <div class="card" style="width: 20rem; ">
          <img style="height: 400px" src="../dc-assistant-doctor/include/profile pictures/<?php echo $row1['doctor_img']; ?>"   class="card-img-top img-card" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dr. <?php echo $row1['doctor_fullname'];?> </h5>

            </div>
          </div>
         </div>
          <?php
       }
    }
      else{
        echo "";
      }
?>

        </div>
        </div>

        <?php
   }
  } else {
    echo "0 results";
  }
  ?>

        <div class="col pt-3">
          <div class="card">
              <div class="card-body">
                
              <h4>Feedbacks</h4><br>
              <div class="gfg">
              <?php 
              $sql1 = "SELECT * FROM feedback WHERE clinic_id = '$id' ORDER BY id DESC";
              $result1 = mysqli_query($conn,$sql1);
              if (mysqli_num_rows($result1) > 0){
                while($row = mysqli_fetch_assoc($result1)){
              
              ?>
              <img src="profile pictures/<?php echo $row['picture']; ?>" alt="Avatar Logo" style="width:40px;" class="rounded-pill me-3" alt="">
              <label for="feedback" class="form-label me-3"><b><?php echo $row['patient_name']; ?></b></label>
              <i class="fas fa-star"></i><label id="rate" class="form-label me-3"><?php echo $row['rate']; ?></label><br>
              <label id="feedback" class="form-label me-3" style="padding-left:60px;"><?php echo $row['feedback']; ?></label><br><br>
              <?php } } else {
                      echo 'There is no comments on this Clinic.';
              }  ?>
                </div>
                <br>
 
       
          <div class="card">
              <div class="card-body">
                <?php
if(isset($_SESSION['login_admin'])){
  $email = $_SESSION['login_admin'];

?>
              <form  method="POST">
              <h4 class="text-center">Leave Feedback:</h4>
              
              <img src="profile pictures/<?php getProfImg($conn,$email);?>" alt="Avatar Logo" style="width:40px;" class="rounded-pill me-3 m-2 mb-4" alt="">
              <label for="flexRadioDefault1" class="form-label me-3">Rate:</label>
              <input type="hidden" name="picture" value="<?php getProfImg($conn,$email);?>">
              <input class="form-check-input" type="radio" name="rate" value="1" id="flexRadioDefault1">
              <label class="form-check-label me-3" for="flexRadioDefault1">1</label>
              <input class="form-check-input" type="radio" name="rate" value="2" id="flexRadioDefault1">
              <label class="form-check-label me-3" for="flexRadioDefault2">2</label>
              <input class="form-check-input" type="radio" name="rate" value="3" id="flexRadioDefault1">
              <label class="form-check-label me-3" for="flexRadioDefault3">3</label>
              <input class="form-check-input" type="radio" name="rate" value="4" id="flexRadioDefault1">
              <label class="form-check-label me-3" for="flexRadioDefault4">4</label>
              <input class="form-check-input" type="radio" name="rate" value="5" id="flexRadioDefault1">
              <label class="form-check-label me-3" for="flexRadioDefault5">5</label>
              <div class="mb-3">

              <label for="exampleFormControlTextarea1" class="form-label">Comment:</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="feedback" rows="3"></textarea>
              <input type="hidden" name="clinic_id" value="<?php echo $id; ?>">
              <input type="hidden" name="patient_name" value="<?php echo getPatientName($conn,$email) ?>">
            </div>
            <div style="float:right;">
          <button type="submit" name="toFeedback" class="btn btn-outline-primary">Submit</button>
           
    </form>
    <?php } ?>
        </div>
            </div>
     
          </div>
        </div>
      </div>


    </div>


  </div>

</div> 
  <!-- Modal -->
  <div class="modal fade" id="Book" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content" style = "height: 500px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book an appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <?php 
        $result = mysqli_query($conn,"SELECT clinic_id, clinic_name FROM clinic_tbl WHERE clinic_id = $id");
        while($row = mysqli_fetch_array($result)) {
    ?>
    <?php
        }
    ?>
    
<div id="view-modal">
    <form id="myForm">
        <div>
            <input type="text" value="<?= $id ?>"  style="display: none;" name="serviceid" id="serviceid">
            <label for="services">Services</label>
            <select name="services" class="form-control" style="margin-bottom: 5px;" id="services">
            <?php
                $result = mysqli_query($conn, "SELECT clinic_id, service_name 
                                               FROM services 
                                               WHERE clinic_id = $id
                                               ORDER BY service_name ASC");
                while($row = mysqli_fetch_array($result)){
            ?>
                <option value="<?= $row['service_name']; ?>">
                    <?= $row['service_name']; ?>
                </option>
            <?php
                }
            ?>
            </select><br>
            <center><button  class="btn btn-outline-primary" type="submit" name="findIt">Look for available date</button></center>
        </div>
    </form>
    <div id="disabledDay" style="display: none;">

    </div>
    <form id="createSched" class="text-center">
        <input type="text" value="<?= $id ?>" style="display: none;" name="serviceid" id="serviceid">
        <input  style="margin-top: 2rem;" placeholder="2022-04-05" style="margin-y: 5px;" id="date_picker" name="datepicker" autocomplete="off">
        <input type="text" style="display: none;" id="finalServiceName" name='finalServiceName'>
        <select id="succ" onclick="succChange()"></select>
        <input type="hidden" style="display:none " id="email" value="<?php echo $email; ?>">

        <?php 

        $sql = "SELECT * FROM patient_record WHERE email='$email'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){

      echo'
   
        <input type="text" style="display: none;" id="email_name" value="DentalFind">
        <input type="text" style="display: none;" id="email_subject" value="Dental Reservation">
        <input type="text" style="display: none;" id="clinic_name1" value="'.$nameClinic.'">
        <input type="text" style="display:none;" id="patient_id" value=" '.$row['patient_id'].' ">
        <input type="text" style="display:none;" id="contact" value=" '.$row['contactno'].' ">
        <input type="text" style="display:none;" id="patient_name" value=" '.$row['fullname'].'">
        ';
      }
    }
        ?>
        
        <br><br>
        <button  class="btn btn-success"  type='submit'>Create Appointment</button>
    </form>

    <input type="hidden" id="storeDays" value="<?= $stringDays; ?>">
    
</div> 
      
      </div>
    </div>
  </div>

  </div>
</div>
  <!-- FOOTER -->
  <?php include 'footer.php';
  ?>


</body>

<script>
      
    function succChange(){
        var patientname = document.querySelector('#patient_name');
        var appointment_date = document.querySelector('#date_picker');
        var service_name = document.querySelector('#finalServiceName');
        var succ_time = document.querySelector('#succ');
        var email_msg = document.querySelector('#email_msg');
        var email_email = document.querySelector('#email');
        var clinicname = document.querySelector('#clinic_name1');

       email_msg.value = "Hi "+ patientname.value + ", Your appointment is successfully booked for "+ service_name.value + " to "+ clinicname.value +" on "+ appointment_date.value+" at "+succ_time.value+".";
        
    }
    
    $('#createSched').on('submit', (e) => {
        e.preventDefault();
        var serviceid = $('#serviceid');
        var datepicker = $('#date_picker');
        var finalservicename = $('#finalServiceName');
        var succ = document.querySelector('#succ');
        var email = document.querySelector('#email');
        var patient_id = document.querySelector('#patient_id');
        var patient_name = document.querySelector('#patient_name');
        var clinic_name= document.querySelector('#clinic_name1');
        var contact= document.querySelector('#contact');



        let opt = succ.selectedIndex;
        let endtime = succ.options[opt].dataset.endtime;
        console.log(endtime);

        $.ajax({
            type: 'POST',
            url: 'addappointment1.php',
            data: {
                serviceid: serviceid.val(),
                datepicker: datepicker.val(),
                finalservicename: finalservicename.val(),
                succ: succ.value,
                email: email.value,
                endtime: endtime,
                clinic_name: clinic_name.value,
                contact: contact.value,
                patient_id: patient_id.value,
                patient_name: patient_name.value

            },
            success: function(response) {
              swalFunc("Book Clinic", "Appointment Sent Successfully!", "success", window.location.href);  
            }
        });

    });

    $('#date_picker').change(function(){
        $.ajax({
            type: 'post',
            url: "validateAppointment.php",
            data: {
                data: $("#createSched").serialize()
            },
            success: function(response) {
             
                $('#succ').html(response);
                $('#datehidden').html($('#date_picker').val());
            }
        });
    });

    function getDisabledDays(){
        // get parent container 
        let inputsArr = document.querySelectorAll("#disabledDay > input[type='text']");
        let dayLength = $('#length');

        var arrDisabledDates = {};

        for(let i = 0; i < dayLength.val(); i++){
            let data = inputsArr[i].value;
            let dataArr = data.split('-');

            // format date
            dataArr[0]; // year
            dataArr[1]; // month
            dataArr[2]; // day
            let corrFormat = `${dataArr[1]}/${dataArr[2]}/${dataArr[0]}`;
            arrDisabledDates[new Date(corrFormat)] = new Date(corrFormat);
        }
        
        return arrDisabledDates;
    }



    $('#myForm').on('submit', (e) => {
        e.preventDefault();

        var serviceName = $('#services');
        var serviceId = $('#serviceid');

        $.ajax({
            url: 'findavailabledate.php',
            method: 'POST',
            dataType: 'html',
            data: {
                servicename: serviceName.val(),
                serviceid: serviceId.val()
            }, success: function(response){
                $('#disabledDay').html(response);
            }
        });


        let storeDays = $('#storeDays').val();
        let storeDaysArr = storeDays.split(' ');
        let storeDaysIndexArr = [];

        for(let i = 0; i < storeDaysArr.length; i++){
            if(storeDaysArr[i] == 'Sunday') storeDaysIndexArr.push(0);
            if(storeDaysArr[i] == 'Monday') storeDaysIndexArr.push(1); 
            if(storeDaysArr[i] == 'Tuesday') storeDaysIndexArr.push(2);
            if(storeDaysArr[i] == 'Wednesday') storeDaysIndexArr.push(3);
            if(storeDaysArr[i] == 'Thursday') storeDaysIndexArr.push(4);
            if(storeDaysArr[i] == 'Friday') storeDaysIndexArr.push(5);
            if(storeDaysArr[i] == 'Saturday') storeDaysIndexArr.push(6);
        }

        let fullDays = [0,1,2,3,4,5,6];
        var filteredKeywords = fullDays.filter((day) => !storeDaysIndexArr.includes(day));
        
        function disableDay(date){
        
            let arrDisabledDates = getDisabledDays();

            var day = date.getDay(), bDisable = arrDisabledDates[date];
            if (bDisable) return [false, '', '']
            else return [(day != filteredKeywords[0]) && 
                         (day != filteredKeywords[1]) &&
                         (day != filteredKeywords[2]) &&
                         (day != filteredKeywords[3]) &&
                         (day != filteredKeywords[4]) &&
                         (day != filteredKeywords[5]) &&
                         (day != filteredKeywords[6])
                        ];

        }

        $('#date_picker').datepicker({
            beforeShowDay: disableDay,
            dateFormat: 'yy-mm-dd',
            minDate: 1
        });

    });

function swalFunc(newtitle, text, icon, link) {
     swal({
              title: newtitle,
              text: text,
              icon: icon,
            })
            .then((responseSwal) => {
              if (responseSwal) {
                location.href = link;
              }
            });
}


</script>


</html>