<?php
date_default_timezone_set('Asia/Manila');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "walangiwanan04";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$daysResult = mysqli_query($conn, "SELECT clinic_id, dayname FROM days WHERE clinic_id = $id");
$storeDays = [];
while($dayRow = mysqli_fetch_array($daysResult)){
    array_push($storeDays, $dayRow['dayname']);
}

$stringDays = implode(' ', $storeDays);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desired Clinic</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <?php 
        $result = mysqli_query($conn,"SELECT clinic_id, clinic_name FROM clinic_tbl WHERE clinic_id = $id");
        while($row = mysqli_fetch_array($result)) {
    ?>
        <button type="button" id="book">Book now</button>  
    <?php
        }
    ?>
    
<div id="view-modal">
    <form id="myForm">
        <div>
            <input type="text" value="<?= $id ?>" name="serviceid" id="serviceid">
            <label for="services">Services</label>
            <select name="services" id="services">
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
            </select>
            <button type="submit" name="findIt">Look for available date</button>
        </div>
    </form>
    <div id="disabledDay">

    </div>
    <h1>CREATE SCHED</h1>
    <form id="createSched">
        <input type="text" value="<?= $id ?>" name="serviceid" id="serviceid">
        <input type="date" id="date_picker" name="datepicker">
        <input type="text" id="finalServiceName" name='finalServiceName'>
        <select id="succ"></select>
        <button type='submit'>Create Appointment</button>
    </form>

    <input type="hidden" id="storeDays" value="<?= $stringDays; ?>">
    
</div> 

<script>

    $('#createSched').on('submit', (e) => {
        e.preventDefault();
        var serviceid = $('#serviceid');
        var datepicker = $('#date_picker');
        var finalservicename = $('#finalServiceName');
        var succ = document.querySelector('#succ');

        let opt = succ.selectedIndex;
        let endtime = succ.options[opt].dataset.endtime;
        console.log(endtime);

        $.ajax({
            type: 'POST',
            url: 'addappointment.php',
            data: {
                serviceid: serviceid.val(),
                datepicker: datepicker.val(),
                finalservicename: finalservicename.val(),
                succ: succ.value,
                endtime: endtime
            }
        });

    });

    $('#date_picker').change(function(){
        $.ajax({
            type: 'post',
            url: "createAppointment.php",
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
            url: 'findAvailableDate.php',
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
            minDate: 0
        });

    });


</script>
</body>
</html>