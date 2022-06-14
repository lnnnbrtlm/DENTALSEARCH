<?php
session_start();
include 'include/function.php';
include 'include/connection.php';
if(isset($_SESSION['adult']))
{
$ref_no = $_SESSION['adult'];
}
if(isset($_POST['adult'])){
    $ref_no = $_POST['ref_no'];
}

list($appointment_refno,$patient_name,$service_name,$clinic_id,$clinic_name,$status,$patient_id,$email) =  showModalPatientConfirmAppointment($conn,$ref_no);

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
            <a href="assistant-appointment_list.php" style="text-decoration: none; color: white;"><i class="fas fa-angle-left "></i> Back</a>
        </div>
        <div class="container-fluid d-flex justify-content-center">

            <img style="height:50px; padding-right: 10px;" src="img/logo-1.png">

            <a href="assistant-index.php"  style="text-decoration: none;"><span class="logo">Dental <span style="color:#2666cf;">Clinic</span></a>

        </div>
        <div class="container-fluid  d-flex justify-content-around">
        </div>

    </nav>

    <div class="bgimage1 py-5">
        <h2 style="text-align: center; color: white;"><i class="fas fa-teeth"></i> Dental Chart</h2>
    </div>

    <?php include 'dental-chart-adult-include.php'; ?>

    <div class="bgimage2 py-5">
        <h2 style="text-align: center; color: white;" id="second"><i class="fas fa-tooth"></i> Tooth Information</h2>
    </div>

    <div class="container-flex bg-color py-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                        <form method="post" action="#">
							<input type="hidden" name="dental_type" id="dental_type" value="adult"/>
                                <fieldset disabled>
                                    <legend style="font-weight: bold;">Patient Information</legend>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Appointment Reference No.</label>
                                        <input type="text"  value="<?php echo $appointment_refno; ?>"  id="ref_no" class="form-control" placeholder="APT00001">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Patient Name</label>
                                        <input class="form-control" id="patientname2" onload="copyText(this)" type="text" name='patientname2' value="<?php echo $patient_name; ?>" readonly/><br>
                                        <input type="hidden" id="pid" name="pid" value="<?php echo $patient_id; ?>">
                                    </div>
                                </fieldset>

                            <hr>

                        </div>
                    </div>
                </div>


                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">

                                <div class="row">
                                    <div class="col">
                                        <br>
                                        <div class="border container justify-content-center" style="height:100px; width:100px; margin-top: 0;">
                                            <img id="ImageFrame" src="img/upper/select.png" style="margin-left: -5px; margin-top: 5px;"height="80px" width="60px;">
                                            <!-- Pag walang nakapili -->
                                            <!-- <br><i class="fas fa-times fa-3x"></i> -->
                                        </div>
                                        <div style="margin-top: 5px;">
                               
                                        <strong>Tooth #: </strong><input type="text" name="toothNumber" id="selectedTooth" style="width: 25px; font-weight: bold; border: none;" value=""></input>
                             
                                    </div>
</div>
                                    <div class="col">

                                        <label style="margin-top: 12px;"><strong>Surface</strong></label>
                                        <div class="mb-5">
                                            <svg width="30" height="48" transform="scale(3,-3)" class="molar">
                                                <polygon id="bottom-right" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />
                                                <polygon id="bottom-left" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />


                                                <polygon id="left-down" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />
                                                <polygon id="left-up" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />


                                                <polygon id="top-left" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />
                                                <polygon id="top-right" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />


                                                <polygon id="right-down" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />
                                                <polygon id="right-up" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />

                                                <polygon id="preview-center" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />

                                            </svg>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                            </div>

                            <label for="lblsurface" class="form-label">Surface</label>
                            <select class="form-select mb-3" name="position" id="position" aria-label="Default select example">
                                <option value="Select" disabled readonly selected>Select</option>
                                <option value="1">Buccal</option>
                                <option value="2">Buccal - Mesial</option>
                                <option value="3">Buccal - Distal</option>
                                <option value="4">Mesial</option>
                                <option value="5">Distal</option>
                                <option value="6">Lingual</option>
                                <option value="7">Lingual - Mesial</option>
                                <option value="8">Lingual - Distal</option>
                                <option value="9">Occlusal</option>
                                <option value="10">All</option>
                            </select>
                            <label for="condition" class="form-label">Condition</label>
                            <select class="form-select mb-3" name="conditionSelect" id="conditionSelect" aria-label="Default select example">
                                <option selected disabled>Select</option>
                                <?php
                                     showAllToothCond($conn);
                                ?>
                            </select>
                            <label for="proc-res" class="form-label">Procedure & Restoration</label>
                            <select class="form-select" name="restoSelect" id="restoSelect" aria-label="Default select example">
                                <option selected >Select</option>
                                <?php
                                     showAllToothPro($conn);
                                ?>
                            </select><br>
                            
                            <div class="form-group">
    <label for="exampleFormControlTextarea1">Note</label>
    <textarea class="form-control" id="notes" rows="3"></textarea>
  </div><br>
                            
                            
                            <input type="hidden" id="ref_no" name="ref_no" value="<?php echo $appointment_refno; ?>"></input>
                            <input type="hidden" id="clinic_id" name="clinic_id" value="<?php echo $clinic_id ; ?>"></input>
                            <input type="hidden" id="clinic_name" name="clinic_name" value="<?php echo $clinic_name ; ?>"></input>
                            <input type="hidden" id="email" name="email" value="<?php echo $email; ?>"></input>
                    
                            
                            <button style="float: right;" name="submit" type="button" onclick="saveChart()" class="btn btn-danger" value="Save">Save</button>
                            </form>
                        </div>

                    </div>

                </div>


            </div>


        </div>
    </div>

    <div class="bgimage3 py-5">
        <h2 style="text-align: center; color: white;"><i class="fas fa-teeth-open"></i> Planned Procedures</h2>
    </div>
    <div class="container-flex bg-color">
        <div class="container bg-color py-5">

            <div class="card">
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Tooth</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Date Completed</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                            showDentalTable($conn, $ref_no);
                            ?>
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

  if((tooth == 11) || (tooth == 12) || (tooth == 13) || (tooth == 14) || (tooth == 15) || (tooth == 16) || (tooth == 17) || (tooth == 18) ||
  (tooth == 41) || (tooth == 42) || (tooth == 43) || (tooth == 44) || (tooth == 45) || (tooth == 46) || (tooth == 47) || (tooth == 48)){
  
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
var clinic_id = $('#clinic_id').val();
var clinic_name = $('#clinic_name').val();
var email= $('#email').val();
var dental_type = $('#dental_type').val();
var notes = $('#notes').val();

  var form_data = new FormData();

form_data.append("ref_no",ref_no);
form_data.append("patientname2",patientname2);
form_data.append("selectedTooth",selectedTooth);
form_data.append("conditionSelect",conditionSelect);
form_data.append("restoSelect",restoSelect);
form_data.append("position",position);
form_data.append("pid",pid);
form_data.append("clinic_id",clinic_id);
form_data.append("clinic_name",clinic_name);
form_data.append("email",email);
form_data.append("dental_type",dental_type);
form_data.append("notes",notes);

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