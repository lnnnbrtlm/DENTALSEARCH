<!DOCTYPE html>
<html>

<head>
  <title>Appointment Listss | Transactions</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--data -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

  <style>
    
  </style>

</head>
<body>


  <!-- The Modal -->
      <div class="container">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[<span id="inchair_refno"></span>] <b id="inchair_patientname"></b></h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <h4>Appointment Information</h4>
              <hr>
              <div class=row>

                <div class=col>
                  <p><b>Appointment ID:</b> <span id="inchair_refno1"></span></p>
                  <p><b>Patient Name:</b> <span id="inchair_patientname1"></span></p>
                  <p><b>Email:</b> <span id="inchair_email"></span></p>
                  <p><b>Service:</b> <span id="inchair_service"></span></p>
                  <button type="button" class="btn btn-link" disabled></button><br>


                </div>
                <div class="col">
                  <p><b>Appointment Time:</b> <span id="inchair_datentime"></span></p>
                  <p><b>Appointment Status:</b> <span class="badge badge-secondary">UpComing</span></p>
                 
                </div>
              </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">

              

              <!-- picker-->
              <form action="dental-chart-picker.php" method="POST">
                <input type="hidden" name="ref_no" id="inchair_refno2">
                <input type="hidden" name="dinchair_patientname" id="finchair_patientname">
                <input type="hidden" name="dinchair_email" id="finchair_email">
                <input type="hidden" name="dinchair_service" id="finchair_service">
                <input type="hidden" name="dinchair_doctor" id="finchair_doctor">
                <input type="hidden" name="dinchair_branch" id="finchair_branch">
                <input type="hidden" name="dinchair_note" id="finchair_note">
                <button type="submit" class="btn btn-info"> Dental Chart</button>
              </form>


              <form action="include/modifyPendingAppointment.php" method="POST">
                <input type="hidden" name="finchair_refno" id="finchair_refno">
                <button type="submit" class="btn btn-success" name="toCompleteBtn">Complete</button>

              </form>

              <a href="assistant-appointment_list.php" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>

            </div>

          </div>
        </div>
      </div>









    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- data tables -->

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="main.js"></script>

<script type="text/javascript">
//	var my_var_arr = location.search.replace('?', '').split('=');

  var my_var_arr = location.search.split('=');


	       $.ajax({
              type: 'POST',
              url: 'include/showPatientConfirmAppoint.inc.php',
              data: {
                'id': my_var_arr[1]
              },
              dataType: "json",
              success: function(response) {
                console.log(response);

                $('#inchair_refno').html(response[0]);
                $('#inchair_refno1').html(response[0]);
                $('#inchair_refno2').val(response[0]);
                $('#inchair_patientname').html(response[1]);
                $('#inchair_patientname1').html(response[1]);
                $('#inchair_doctor').html(response[3]);
                $('#inchair_service').html(response[2]);
                $('#inchair_datentime').html(response[8]);
                $('#inchair_status').html(response[5]);
                $('#inchair_checkintime').html(response[9]);
                $('#inchair_inchairtime').html(response[10]);
                $('#inchair_branch').html(response[5]);
                $('#finchair_refno').val(response[0]);
                $(' #inchair_note').html(response[6]);
                $(' #inchair_email').html(response[7]);
                $('#finchair_patientname').val(response[1]);
                $('#finchair_email').val(response[7]);
                $('#finchair_service').val(response[2]);
                $('#finchair_note').val(response[6]);
                $('#finchair_datetime').val(response[8]);
                $('#finchair_branch').val(response[4]);
                $('#finchair_doctor').val(response[3]);
              }
            });

</script>
</body>
</html>