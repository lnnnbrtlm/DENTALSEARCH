<?php

include 'include/function.php';
include 'include/connection.php';

$ref_no = $_GET['ref_no'];

list($appointment_refno,$patient_name,$service_name,$clinic_id,$status,$patient_id,$email) =  showModalPatientConfirmAppointment($conn,$ref_no);
list($dentaldate)= dentalDate($conn, $ref_no);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Chart | Child</title>
    <link rel="stylesheet" href="dental-chart.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/tooth.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid d-flex justify-content-around">
            <a href="dental-chart-picker.php" style="text-decoration: none; color: white;"><i class="fas fa-angle-left "></i> Back</a>
        </div>
        <div class="container-fluid d-flex justify-content-center">

            <img style="height:50px; padding-right: 10px;" src="img/logo-1.png">

            <a href="assistant-index.php"  style="text-decoration: none;"><span class="logo">Dental <span style="color:#2666cf;">Clinic</span></a>

        </div>
        <div class="container-fluid  d-flex justify-content-around">
            <a href="#" style="text-decoration: none; color: white;">Reset</a>
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

    <?php include 'dentalsample.php'; ?>


   

    
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
    function setImg(a){
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

    $('#centerr').on(load, function(){
    var mark = $(this).val();
    if(mark == 1){
        $(this).removeClass('polygon unmarked');
        $(this).addClass('polygon marked');
    }

});
    </script>
<script type="text/javascript">


$('#position').on('change', function(){
  var val = $(this).find('option:selected').val();
  var tooth = $('#selectedTooth').val();

  if((tooth == 55) || (tooth == 54) || (tooth == 53) || (tooth == 52) || (tooth == 51) ||
  (tooth == 75) || (tooth == 74) || (tooth == 73) || (tooth == 72) || (tooth == 71)){
  
    switch (val){

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
}
else{
    switch (val){

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


function saveChart(){

var ref_no = $('#ref_no').val();  
var patientname2 = $('#patientname2').val();
var selectedTooth = $('#selectedTooth').val();  
var selectedTooth = $('#selectedTooth').val();  
var conditionSelect = $('#conditionSelect').val();  
var restoSelect = $('#restoSelect').val();
var position = $('#position').val();
var pid = $('#pid').val();

  var form_data = new FormData();

form_data.append("ref_no",ref_no);
form_data.append("patientname2",patientname2);
form_data.append("selectedTooth",selectedTooth);
form_data.append("conditionSelect",conditionSelect);
form_data.append("restoSelect",restoSelect);
form_data.append("position",position);
form_data.append("pid",pid);

  //Ajax to send file to upload
  $.ajax({
      url: "include/dental_chart.inc.php",                      //Server api to receive the file
             type: "POST",
             cache: false,
             contentType: false,
             processData: false,
             data: form_data,
          success:function(dat2){
        
            if(dat2==1){
                   // swalFunc("Event", "Event Successful Added", "success", window.location.href);
                 location.reload();
            }else{
                 alert(dat2);
                 console.log(dat2);
            }
           
          }
    });
}
</script>
</body>

</html>