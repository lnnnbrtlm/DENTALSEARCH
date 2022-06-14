<?php

include 'include/function.php';
include 'include/connection.php';

$ref_no = $_POST['drefno'];
$pid = $_POST['pid'];

if($_POST['dental_type'] == 'child'){
  $refno = $_POST['drefno'];
  header('location: dental-chart-child-new.php?ref_no='.$refno.'');
}

list($appointment_refno,$patient_name,$service_name,$clinic_id,$status,$patient_id,$email) =  showModalPatientConfirmAppointment($conn,$_POST['drefno']);
list($dentaldate)= dentalDate($conn, $ref_no);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Chart | Adult</title>
    <link rel="stylesheet" href="dental-chart.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/tooth.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid d-flex justify-content-around">
            <a href="assistant-patient-dental.php" style="text-decoration: none; color: white;"><i class="fas fa-angle-left "></i> Back</a>
        </div>
        <div class="container-fluid d-flex justify-content-center">

            <img style="height:50px; padding-right: 10px;" src="img/logo-2.png">

            <span class="logo">Dental <span style="color:#2666cf;">Clinic</span>

        </div>
        <div class="container-fluid  d-flex justify-content-around">
        </div>

    </nav>

    <div class="bgimage1 py-5">
        <h2 style="text-align: center; color: white;"><i class="fas fa-teeth"></i> Dental Chart</h2>
    </div>

    <div class="container mt-3">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">



            <div class="card-body">
                <h3>Patient Information</h3>
                <hr>

                <div class="row">
                    <div class="col">
                        <p><strong>Name:&nbsp;</strong><?php echo $patient_name; ?></p>
                        <p><strong>Email:&nbsp;</strong><?php echo $email; ?></p>

                    </div>

                    <div class="col">
                        <p><strong>Date:&nbsp;</strong><?php echo $dentaldate; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include 'dental-chart-adult-include.php'; ?>

    <div class="container-flex bg-color">
        <div class="container bg-color py-5">
            <div class="row">
                <div class="col">

            

            






        </div>
    </div>


    <div class="container-flex bg-color">
        <div class="container bg-color py-5">

            <div class="card">
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Tooth</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                        <?php 
                            showDentalTableView($conn, $ref_no);
                            ?>
                            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <footer>
        <center>
            <h3 style="color: white;">DENTAL CLINIC</h3>
            <p style="color: white;">Current Date and Time is <span id='date-time'></span>.</p>
        </center>
    </footer>


    <!-- Modal -->
    <div class="modal fade" id="MedicalHistory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Medical History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include 'questions-output.php'; ?>
                    $ref_no
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="dental-chart.js"></script>

    <script type="text/javascript">
        ////////////////////////////////////////////////////////////// SELECTED TOOTH ///////////////////////////////
        function CopyToLabel(a) {
            //Reference the TextBox.

            //Reference the Label.
            var lblName = document.getElementById("selectedTooth");
            // get input value
            //Copy the TextBox value to Label.
            lblName.value = a.value;
        }
    </script>
    <script type="text/javascript">
        ////////////////////////////////////////////////////////////// SELECTED IMG ///////////////////////////////
        function setImg(a) {
            //alert(a.getElementsByTagName('img')[0].src);
            document.getElementById('ImageFrame').src =
                a.getElementsByTagName('img')[0].src
        }
    </script>
    <script type="text/javascript">
        ////////////////////////////////////////////////////////////// SMOOTH SCROLL ///////////////////////////////

        window.smoothScroll = function(target) {
            var scrollContainer = target;
            do { //find scroll container
                scrollContainer = scrollContainer.parentNode;
                if (!scrollContainer) return;
                scrollContainer.scrollTop += 1;
            } while (scrollContainer.scrollTop == 0);

            var targetY = 0;
            do { //find the top of target relatively to the container
                if (target == scrollContainer) break;
                targetY += target.offsetTop;
            } while (target = target.offsetParent);

            scroll = function(c, a, b, i) {
                i++;
                if (i > 30) return;
                c.scrollTop = a + (b - a) / 30 * i;
                setTimeout(function() {
                    scroll(c, a, b, i);
                }, 20);
            }
            // start scrolling
            scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
        }
    </script>
    <script type="text/javascript">
        $('#centerr').on(load, function() {
            var mark = $(this).val();
            if (mark == 1) {
                $(this).removeClass('polygon unmarked');
                $(this).addClass('polygon marked');
            }

        });
    </script>
    <script type="text/javascript">
        $('#position').on('change', function() {
            var val = $(this).find('option:selected').val();
            var tooth = $('#selectedTooth').val();

            if ((tooth == 18) || (tooth == 17) || (tooth == 16) || (tooth == 15) || (tooth == 14) || (tooth == 13) || (tooth == 12) || (tooth == 11) ||
                (tooth == 48) || (tooth == 47) || (tooth == 46) || (tooth == 45) || (tooth == 44) || (tooth == 43) || (tooth == 42) || (tooth == 41)) {

                switch (val) {

                    case '1':
                        $('#top-left,#top-right').removeClass('polygon unmarked');
                        $('#top-left,#top-right').addClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#bottom-right,#preview-center,#left-up,#right-down').removeClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#bottom-right,#preview-center,#left-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '2':
                        $('#right-up,#top-right').removeClass('polygon unmarked');
                        $('#right-up,#top-right').addClass('polygon marked');
                        $('#top-left,#left-down,#bottom-left,#bottom-right,#preview-center,#left-up,#right-down').removeClass('polygon marked');
                        $('#top-left,#left-down,#bottom-left,#bottom-right,#preview-center,#left-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '3':
                        $('#top-left,#left-up').removeClass('polygon unmarked');
                        $('#top-left,#left-up').addClass('polygon marked');
                        $('#top-right,#left-down,#bottom-left,#bottom-right,#preview-center,#right-up,#right-down').removeClass('polygon marked');
                        $('#top-right,#left-down,#bottom-left,#bottom-right,#preview-center,#right-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '4':
                        $('#right-up, #right-down').removeClass('polygon unmarked');
                        $('#right-up, #right-down').addClass('polygon marked');
                        $('#top-right,#top-left,#bottom-left,#bottom-right,#preview-center,#left-up,#left-down').removeClass('polygon marked');
                        $('#top-right,#top-left,#bottom-left,#bottom-right,#preview-center,#left-up,#left-down').addClass('polygon unmarked');
                        break;
                    case '5':
                        $('#left-up, #left-down').removeClass('polygon unmarked');
                        $('#left-up, #left-down').addClass('polygon marked');
                        $('#top-right,#top-left,#bottom-left,#bottom-right,#preview-center,#right-up,#right-down').removeClass('polygon marked');
                        $('#top-right,#top-left,#bottom-left,#bottom-right,#preview-center,#right-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '6':
                        $('#bottom-left,#bottom-right').removeClass('polygon unmarked');
                        $('#bottom-left,#bottom-right').addClass('polygon marked');
                        $('#right-up,#left-down,#top-left,#top-right,#preview-center,#left-up,#right-down').removeClass('polygon marked');
                        $('#right-up,#left-down,#top-left,#top-right,#preview-center,#left-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '7':
                        $('#right-down,#bottom-right').removeClass('polygon unmarked');
                        $('#right-down,#bottom-right').addClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#top-left,#preview-center,#left-up,#top-right').removeClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#top-left,#preview-center,#left-up,#top-right').addClass('polygon unmarked');
                        break;
                    case '8':
                        $('#left-down,#bottom-left').removeClass('polygon unmarked');
                        $('#left-down,#bottom-left').addClass('polygon marked');
                        $('#right-up,#right-down,#bottom-right,#top-left,#preview-center,#left-up,#top-right').removeClass('polygon marked');
                        $('#right-up,#right-down,#bottom-right,#top-left,#preview-center,#left-up,#top-right').addClass('polygon unmarked');
                        break;
                    case '9':
                        $('#preview-center').removeClass('polygon unmarked');
                        $('#preview-center').addClass('polygon marked');
                        $('#right-up,#right-down,#bottom-left,#bottom-right,#top-left,#left-down,#left-up,#top-right').removeClass('polygon marked');
                        $('#right-up,#right-down,#bottom-left,#bottom-right,#top-left,#left-down,#left-up,#top-right').addClass('polygon unmarked');
                        break;
                    case '10':
                        $('#right-up,#right-down,#bottom-left,#bottom-right,#preview-center,#top-left,#left-down,#left-up,#top-right').removeClass('polygon unmarked');
                        $('#right-up,#right-down,#bottom-left,#bottom-right,#preview-center,#top-left,#left-down,#left-up,#top-right').addClass('polygon marked');

                }
            } else {
                switch (val) {

                    case '1':
                        $('#top-left,#top-right').removeClass('polygon unmarked');
                        $('#top-left,#top-right').addClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#bottom-right,#preview-center,#left-up,#right-down').removeClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#bottom-right,#preview-center,#left-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '2':
                        $('#left-up,#top-left').removeClass('polygon unmarked');
                        $('#left-up,#top-left').addClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#bottom-right,#preview-center,#top-right,#right-down').removeClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#bottom-right,#preview-center,#top-right,#right-down').addClass('polygon unmarked');
                        break;
                    case '3':
                        $('#top-right,#right-up').removeClass('polygon unmarked');
                        $('#top-right,#right-up').addClass('polygon marked');
                        $('#top-left,#left-down,#bottom-left,#bottom-right,#preview-center,#left-up,#right-down').removeClass('polygon marked');
                        $('#top-left,#left-down,#bottom-left,#bottom-right,#preview-center,#left-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '4':
                        $('#left-up, #left-down').removeClass('polygon unmarked');
                        $('#left-up, #left-down').addClass('polygon marked');
                        $('#top-right,#top-left,#bottom-left,#bottom-right,#preview-center,#right-up,#right-down').removeClass('polygon marked');
                        $('#top-right,#top-left,#bottom-left,#bottom-right,#preview-center,#right-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '5':
                        $('#right-up, #right-down').removeClass('polygon unmarked');
                        $('#right-up, #right-down').addClass('polygon marked');
                        $('#top-right,#top-left,#bottom-left,#bottom-right,#preview-center,#left-up,#left-down').removeClass('polygon marked');
                        $('#top-right,#top-left,#bottom-left,#bottom-right,#preview-center,#left-up,#left-down').addClass('polygon unmarked');
                        break;
                    case '6':
                        $('#bottom-left,#bottom-right').removeClass('polygon unmarked');
                        $('#bottom-left,#bottom-right').addClass('polygon marked');
                        $('#right-up,#left-down,#top-left,#top-right,#preview-center,#left-up,#right-down').removeClass('polygon marked');
                        $('#right-up,#left-down,#top-left,#top-right,#preview-center,#left-up,#right-down').addClass('polygon unmarked');
                        break;
                    case '7':
                        $('#left-down,#bottom-left').removeClass('polygon unmarked');
                        $('#left-down,#bottom-left').addClass('polygon marked');
                        $('#right-up,#right-down,#bottom-right,#top-left,#preview-center,#left-up,#top-right').removeClass('polygon marked');
                        $('#right-up,#right-down,#bottom-right,#top-left,#preview-center,#left-up,#top-right').addClass('polygon unmarked');
                        break;
                    case '8':
                        $('#right-down,#bottom-right').removeClass('polygon unmarked');
                        $('#right-down,#bottom-right').addClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#top-left,#preview-center,#left-up,#top-right').removeClass('polygon marked');
                        $('#right-up,#left-down,#bottom-left,#top-left,#preview-center,#left-up,#top-right').addClass('polygon unmarked');
                        break;
                    case '9':
                        $('#preview-center').removeClass('polygon unmarked');
                        $('#preview-center').addClass('polygon marked');
                        $('#right-up,#right-down,#bottom-left,#bottom-right,#top-left,#left-down,#left-up,#top-right').removeClass('polygon marked');
                        $('#right-up,#right-down,#bottom-left,#bottom-right,#top-left,#left-down,#left-up,#top-right').addClass('polygon unmarked');
                        break;
                    case '10':
                        $('#right-up,#right-down,#bottom-left,#bottom-right,#preview-center,#top-left,#left-down,#left-up,#top-right').removeClass('polygon unmarked');
                        $('#right-up,#right-down,#bottom-left,#bottom-right,#preview-center,#top-left,#left-down,#left-up,#top-right').addClass('polygon marked');
                        break;
                }

            }
        });
    </script>
    <script type="text/javascript">
        function saveChart() {

            var ref_no = $('#ref_no').val();
            var patientname2 = $('#patientname2').val();
            var selectedTooth = $('#selectedTooth').val();
            var selectedTooth = $('#selectedTooth').val();
            var conditionSelect = $('#conditionSelect').val();
            var restoSelect = $('#restoSelect').val();
            var position = $('#position').val();

            var form_data = new FormData();

            form_data.append("ref_no", ref_no);
            form_data.append("patientname2", patientname2);
            form_data.append("selectedTooth", selectedTooth);
            form_data.append("conditionSelect", conditionSelect);
            form_data.append("restoSelect", restoSelect);
            form_data.append("position", position);

            //Ajax to send file to upload
            $.ajax({
                url: "include/dental_chart.inc.php", //Server api to receive the file
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(dat2) {

                    if (dat2 == 1) {
                        // swalFunc("Event", "Event Successful Added", "success", window.location.href);
                        location.reload();
                    } else {
                        alert(dat2);
                        console.log(dat2);
                    }

                }
            });
        }
    </script>
    <script type="text/javascript">
            $(document).ready(function(){
                var id = $('#patientid').val();
                console.log(id);
            $.ajax({
          type: 'POST',
          url: 'include/showQuestions.inc.php',
          data: {
            'patient_id': id[0]
          },
          dataType: "json",
          success: function(response) {
            var q1 = response[1];
            var q2 = response[2];
            var q3 = response[4];
            var q4 = response[6];
            var q5 = response[8];
            var q6 = response[10];
            var q7 = response[11];
            var e8a = response[12];
            var e8b = response[13];
            var e8c = response[14];
            var e8d = response[15];
            var e8e = response[16];
            var e8f = response[17];
            var q9 = response[19];
            var q10 = response[21];
            var q11 = response[22];
            var q12 = response[23];
            var e15a = response[26];
            var e15b = response[27];
            var e15c = response[28];
            var e15d = response[29];
            var e15e = response[30];
            var e15f = response[31];
            var e15g = response[32];
            var e15h = response[33];
            var e15i = response[34];
            var e15j = response[35];
            $('#answer2').val(response[3]);
            $('#answer3').val(response[5]);
            $('#answer4').val(response[7]);
            $('#answer5').val(response[9]);
            $('#answer8').val(response[18]);
            $('#answer9').val(response[20]);
            $('#bloodtype').val(response[24]);
            $('#bloodpressure').val(response[25]);
            $('#answerlast').val(response[36]);
            if(q1 == 'Yes'){
                $('#q1Yes').prop("checked",true);
            }else{
              $('#q1No').prop("checked",true);
            }
            if(q2 == 'Yes'){
                $('#q2Yes').prop("checked",true);
            }else{
              $('#q2No').prop("checked",true);
            }
            if(q3 == 'Yes'){
                $('#q3Yes').prop("checked",true);
            }else{
              $('#q3No').prop("checked",true);
            }
            if(q4 == 'Yes'){
                $('#q4Yes').prop("checked",true);
            }else{
              $('#q4No').prop("checked",true);
            }
            if(q5 == 'Yes'){
                $('#q5Yes').prop("checked",true);
            }else{
              $('#q5No').prop("checked",true);
            }
            if(q6 == 'Yes'){
                $('#q6Yes').prop("checked",true);
            }else{
              $('#q6No').prop("checked",true);
            }
            if(q7 == 'Yes'){
                $('#q7Yes').prop("checked",true);
            }
            if(e8a == '1'){
                $('#local').prop("checked",true);
            }
            if(e8b == '1'){
                $('#peni').prop("checked",true);
            }
            if(e8c == '1'){
                $('#sulfa').prop("checked",true);
            }
            if(e8d == '1'){
                $('#aspirin').prop("checked",true);
            }
            if(e8e == '1'){
                $('#latex').prop("checked",true);
            }
            if(e8f == '1'){
                $('#others').prop("checked",true);
            }
            if(q9  == 'Yes'){
                $('#q9Yes').prop("checked",true);
            }else{
              $('#q9No').prop("checked",true);
            }
            if(q10 == 'Yes'){
                $('#q10Yes').prop("checked",true);
            }else{
              $('#q10No').prop("checked",true);
            }
            if(q11 == 'Yes'){
                $('#q11Yes').prop("checked",true);
            }else{
              $('#q11No').prop("checked",true);
            }
            if(q12 == 'Yes'){
                $('#q12Yes').prop("checked",true);
            }else{
              $('#q12No').prop("checked",true);
            }
            if(e15a == '1'){
                $('#highblood').prop("checked",true);
            }
            if(e15b == '1'){
                $('#lowblood').prop("checked",true);
            }
            if(e15c == '1'){
                $('#epilepsy').prop("checked",true);
            }
           if(e15d == '1'){
             $('#aids').prop("checked",true);
            }
            if(e15e == '1'){
            $('#std').prop("checked",true);
            }
            if(e15f == '1'){
            $('#stu').prop("checked",true);
            }
            if(e15g == '1'){
            $('#seizure').prop("checked",true);
            }
            if(e15h == '1'){
            $('#rapid').prop("checked",true);
            }
            if(e15i == '1'){
            $('#radiation').prop("checked",true);
            }
            if(e15j == '1'){
            $('#joint').prop("checked",true);
            }
          }
        });
      });
        </script>
</body>

</html>