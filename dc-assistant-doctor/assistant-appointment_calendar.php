<?php 
include 'include/connection.php';
include 'include/function.php';

include('session.php');
if(!isset($_SESSION['login_admin1'])){
  header("location: logout1.php");
}
$clinic = $_SESSION['clinic'];
$daysResult = mysqli_query($conn, "SELECT clinic_id, dayname FROM days WHERE clinic_id =".$clinic."");
$storeDays = [];
while($dayRow = mysqli_fetch_array($daysResult)){
    array_push($storeDays, $dayRow['dayname']);
}

$stringDays = implode(' ', $storeDays);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Appointment List</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">
  <link rel="stylesheet" href="style-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<?php 
  include "./navbar.php" 
  ?>
<style type="text/css">
    #select2Form .form-control-feedback {
        z-index: 100;
    }
    .help-block{
        color: red;
    }
    body{
        background-color: #c0ed4d;
    }
</style>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->

    <div>
      <h1 style="color: white;"><i class="fas fa-calendar mr-3"></i>Appointment</h1>
    </div><br>
    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
     
        <li class="nav-item">
          <a class="nav-link" href="assistant-appointment_list.php">Appointment List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="assistant-appointment_calendar.php">Set Appointment</a>
        </li>

      </ul><br>
<div class="modal-body">
        <?php 
        $result = mysqli_query($conn,"SELECT clinic_id, clinic_name FROM clinic_tbl WHERE clinic_id = $clinic");
        while($row = mysqli_fetch_array($result)) {
    ?>
    <?php
        }
    ?>
    
<div id="view-modal">
    <form id="myForm">
        <div>
                <label for="patient_name">Patient</label>
        <select class="form-control" id="patient_name">
        <?php showPatientNameDDD($conn, $clinic); ?>
        </select>
        
        <select id="patient_id" style="display: none;">
        <?php showPatientIDDDD($conn, $clinic); ?>
        </select>
        <select id="email" style="display: none;">
        <?php showPatientEmailDDD($conn, $clinic); ?>
        </select>
            <input type="text" value="<?= $clinic ?>" style="display: none;" name="serviceid" id="serviceid">
            <label for="services" class="pt-3">Services</label>
            <select name="services" class="form-control" style="margin-bottom: 5px;" id="services">
            <?php
                $result = mysqli_query($conn, "SELECT clinic_id, service_name 
                                               FROM services 
                                               WHERE clinic_id = $clinic
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
        <input type="text" style="display: none;" value="<?= $clinic ?>"  name="serviceid" id="serviceid">
        <input  style="margin-top: 2rem;" placeholder="Select Date" style="margin-y: 5px;" id="date_picker" name="datepicker" autocomplete="off" readonly>
        <input type="text" style="display: none;" id="finalServiceName" name='finalServiceName'>
        <input type="text" style="display: none;" id="clinicName"  value="<?php echo getClinicName($conn,$clinic); ?>">
        <select style="height:30px;" id="succ"></select>

        
        <br><br>
        <button  class="btn btn-success" type='submit'>Create Appointment</button>
    </form>

    <input type="hidden" id="storeDays" value="lalala<?= $stringDays; ?>">
    
</div> 
  </div>




  <!-- End demo content -->

  </body>


<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#apptstart').attr('min',today);
    </script>
    
    
<script>

    $('#createSched').on('submit', (e) => {
        e.preventDefault();
        var serviceid = $('#serviceid');
        var datepicker = $('#date_picker');
        var finalservicename = $('#finalServiceName');
        var succ = document.querySelector('#succ');
        var clinicName =  $('#clinicName').val();
        var patient_name = document.querySelector('#patient_name');
        var patient_id = document.querySelector('#patient_id');
        var email = document.querySelector('#email');


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
                endtime: endtime,
                clinic_name: clinicName,
                patient_name: patient_name.value,
                patient_id : patient_id.value,          
                email: email.value
            },
            success: function(response) {
              console.log(response);
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
        <script>
          $('#patient_name').change(function(){
            var x = $('option:selected',this).index()
            $('#patient_id').prop('selectedIndex',x);
            $('#email').prop('selectedIndex',x);

          });
  
          </script>

</html>