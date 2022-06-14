<?php

include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}
$clinic = $_SESSION['clinic'];

if(isset($_GET['appointment_refno'])){
$getRef = $_GET['appointment_refno'];
$updateNotif = "UPDATE appointments SET `notif`='0' WHERE appointment_refno ='$getRef'";
mysqli_query($conn, $updateNotif);
}
?>

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

  <?php
  include "./navbar.php";
  include 'include/connection.php';
  include 'include/function.php';
  include 'sendemail.php';
  ?>



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
          <a class="nav-link active" href="assistant-appointment_list.php">Appointment List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assistant-appointment_calendar.php">Set Appointment</a>
        </li>

      </ul><br>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" id="myTab">
      
      
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu1">Appointment Status </a>
    
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu2">Cancelled Appointments</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <!-- UNCONFIRMED -->
        <div class="tab-pane container active" id="menu1">
          <br>


          <div class="table-responsive">
            <table class="table table-hover" id="example">
              <thead>
                <tr>
                  <th>Reference No.</th>
                  <th>Patient Name</th>
                  <th>Service</th>
                  <th>Appointment Start</th>
                  <th>Status</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $email = $_SESSION['login_admin1'];
                $sql = "SELECT * FROM user_accounts WHERE user_type='ClinicAdmin' and email='$email'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                  showPendingAppointmentAdmin($conn, $clinic);
                }else{
                showPendingAppointment($conn);
                 } ?>
              </tbody>
            </table>
          </div>
          </div>

        <!-- CANCEL -->
        <div class="tab-pane container fade" id="menu2">

          <br>


          <div class="table-responsive">
            <table class="table table-hover" id="example1">
              <thead>
                <tr>
                  <th>Appointment ID</th>
                  <th>Patient Name</th>
                  <th>Service</th>
                  <th>Appointment Start</th>
                 
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $email = $_SESSION['login_admin1'];
                $sql = "SELECT * FROM user_accounts WHERE user_type='Admin' and email='$email'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                  showCancelledAdmin($conn);
                }else{
                showCancelled($conn,$_SESSION['clinic']); }
                ?>
              </tbody>
            </table>
          </div>


        </div>
      </div>


      <!--  END CONTENT -->




      <!-- RESCHED -->

      <!-- The Modal -->
      <div class="modal fade" id="Resched">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Reschedule</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <label for="apptstart" style="padding-top: 10px;"><b>Appointment Start: </b></label><br>
              <input style="height: 35px; margin-left: 11px;" type="datetime-local" id="apptstart" name="apptstart">
              <br><br>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">

              <button type="button" class="btn btn-success">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

          </div>
        </div>
      </div>



      <!-- UNCONFIRMED MODAL -->

      <!-- The Modal -->
      <div class="modal fade" id="ViewAppointUnconfirmed">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[<span id="pending_refno"></span>] <b id="pending_patientname"></b></h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <h4>Appointment Information</h4>
              <hr>
              <div class=row>

                <div class=col>
                  <form action="" method="post">
                    <p><b>Appointment ID:</b> <span style="color: lightgray"> Confirm to generate</span></p>
                    <p><b>Patient Name:</b> <span id="pending_patientname1"></span></p>
                    <p><b>Email:</b> <span id="pending_email"></span></p>
                    <p><b>Contact no.:</b> <span id="pending_contact"></span></p>
                    <p><b>Service:</b> <span id="pending_service"></span></p>
                
                    <p><b>Doctor:</b> <span id="pending_doctor"></span> </p>
                    <p><b>Note:</b> <span id="pending_note"></span></p>
                    


                    <!--<button type="button" class="btn btn-link" disabled>Send SMS and Email</button><br>-->

                    <p><b><i>Send SMS and Email </i></b></p>



                    <div class="modal" id="myModal">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Send Email</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                          </div>
                          <div class="container"></div>
                          <div class="modal-body">
                            <div class="contact-form">

                              <!--<form class="contact" action="" >-->
                              <input type="text" name="name" class="text-box" placeholder="Your Name" required>
                              <input type="email" name="email" class="text-box" placeholder="Your Email" required>
                              <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                              <input type="submit" name="submit" class="send-btn" value="Send">
                              <!-- </form> -->
                            </div>

                          </div>
                          <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn">Close</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <input type="hidden" id="email_name" name="email_name" value="YOKAI Dental Clinic" />
                    <input type="hidden" id="email_email" name="email_email" value="" />
                    <input type="hidden" id="email_subject" name="email_subject" value="YOKAI Dental Clinic" />
                    <textarea id="email_body" name="email_body" style="display: none;" disabled value="Hi"></textarea>
                    
                    
                </div>
                <div class="col">
                  <p><b>Appointment Time:</b> <span id="pending_datentime"></span></p>
                  <p><b>Appointment Status:</b> <span class="badge badge-secondary" id="pending_status"></span></p>
                  <div class="md-form md-outline">
                    <p><b>Schedule Time:</b></p>
                    <input type="time" id="settime" name="time" class="form-control" placeholder="Select time">

                  </div>

                </div>
                </form>

              </div>

            </div>
                  
                    <input type="hidden" id="email_name" name="email_name" value="YOKAI Dental Clinic" />
            <!-- Modal footer -->
            <div class="modal-footer">
              <form action="include/modifyPendingAppointment.php" method="POST">
                <input type="hidden" name="ref_id" id="fpending_refno">
                <input type="hidden" name="patient_id" id="fpending_patientid">
                <input type="hidden" name="pname" id="fpending_patientname">
                <input type="hidden" name="email" id="fpending_email">
                <input type="hidden" name="dname" id="fpending_doctor">
                <input type="hidden" name="sname" id="fpending_service">
                <input type="hidden" name="branch" id="fpending_branch">
                <input type="hidden" name="note" id="fpending_note">
                <input type="hidden" name="dtime" id="fpending_datentime">
                <input type="hidden" name="status" id="fpending_status">
                <input type="hidden" name="time" id="fpending_time">
                <input type="hidden" name="contact" id="fpending_contact">
                <input type="hidden" name="msg_body" id="msg_body">
                <button type="submit" class="btn btn-primary" onClick="sendEmail()" name="toConfirmBtn">Confirm</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

          </div>
        </div>
      </div>

      <!-- CONFIRMED MODAL -->

      <!-- The Modal -->
      <div class="modal fade" id="ViewAppointConfirmed">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[<span id="cnfm_refno"></span>] <b id="cnfm_patientname"></b></h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <h4>Appointment Information</h4>
              <hr>
              <div class=row>


                <div class=col>
                  <form action="/action_page.php">
                    <p><b>Appointment ID:</b> <span id="cnfm_refno1"> Confirm to generate</span></p>
                    <p><b>Patient Name:</b> <span id="cnfm_patientname1"></span></p>
                    <p><b>Email:</b> <span id="cnfm_email"></span></p>
                    <p><b>Service:</b> <span id="cnfm_service"></span></p>
                    <p><b>Doctor:</b> <span id="cnfm_doctor"></span> </p>
                  
                    <p><b>Note:</b><span id="cnfm_note"></p>
                    <button type="button" class="btn btn-link" disabled></button><br>


                </div>
                <div class="col">
                  <p><b>Appointment Time:</b> <span id="cnfm_datentime"></span></p>
                  <p><b>Appointment Status:</b> <span class="badge badge-primary" id="cnfm_status"></span></p>
                


                </div>
                </form>


              </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <form action="include/modifyPendingAppointment.php" method="POST">
                <input type="hidden" name="cref_id" id="fcnfm_refno">
                <button type="submit" class="btn btn-info" name="toCheckInBtn">Check In</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

          </div>
        </div>
      </div>

      <!-- CHECKED IN MODAL -->

      <!-- The Modal -->
      <div class="modal fade" id="ViewAppointCheckedIn">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[<span id="checkin_refno"></span>] <b id="checkin_patientname"></b></h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <h4>Appointment Information</h4>
              <hr>
              <div class=row>

                <div class=col>
                  <p><b>Appointment ID:</b> <span id="checkin_refno1"></span></p>
                  <p><b>Patient Name:</b> <span id="checkin_patientname1"></span></p>
                  <p><b>Email:</b> <span id="checkin_email"></span></p>
                  <p><b>Service:</b> <span id="checkin_service"></span></p>
                  <p><b>Doctor:</b> <span id="checkin_doctor"></span> </p>
                  
                  <p><b>Note:</b> <span id="checkin_note"> </p>
                  <button type="button" class="btn btn-link" disabled></button><br>


                </div>
                <div class="col">
                  <p><b>Appointment Time:</b> <span id="checkin_datentime"></span></p>
                  <p><b>Appointment Status:</b> <span class="badge badge-info" id="checkin_status"></span></p>
                


                </div>
                </form>

              </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <form action="include/modifyPendingAppointment.php" method="POST">
                <input type="hidden" name="fcheckin_refno" id="fcheckin_refno">
                <?php
        $email = $_SESSION['login_admin1'];
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
        $result = mysqli_query($conn,$sql);
        $sql1 = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
        $result1 = mysqli_query($conn,$sql1);
        if((mysqli_num_rows($result)>0) || (mysqli_num_rows($result1)>0)){
        ?>
                <button type="submit" class="btn btn-warning" name="toInChairBtn">In Chair</button>

              </form>

        <?php } ?>
            </form>

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

          </div>
        </div>
      </div>

      <!-- IN CHAIR MODAL -->

      <!-- The Modal -->
      <div class="modal fade" id="ViewAppointInChair">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[<span id="inchair_refno"></span>] <b id="inchair_patientname"></b></h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                  <p><b>Doctor:</b> <span id="inchair_doctor"></span> </p>
                  
                  <p><b>Note:</b><span id="inchair_note"></span></p>
                  <button type="button" class="btn btn-link" disabled></button><br>


                </div>
                <div class="col">
                  <p><b>Appointment Time:</b> <span id="inchair_datentime"></span></p>
                  <p><b>Appointment Status:</b> <span class="badge badge-warning">UpComing</span></p>
                 
                </div>
              </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">

              <a href="assistant-patient_list-prescription.php" target="_blank"> <button type="button" class="btn btn-primary">Prescription</button></a>

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

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

          </div>
        </div>
      </div>

      <!-- COMPLETED MODAL -->

      <!-- The Modal -->
      <div class="modal fade" id="ViewAppointCompleted">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">[<span id="complete_refno"></span>] <b id="complete_patientname"></b></h4>


              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <h4>Appointment Information</h4>
              <hr>
              <div class=row>

                <div class=col>
                  <form action="/action_page.php">
                    <p>Appointment ID:<span id="complete_refno1"></p>
                    <p>Patient Name: <span id="complete_patientname1"></span></p>
                    <p>Service:<span id="complete_service"></span></p>
                    <p>Doctor:<span id="complete_doctor"></span></p>
                    <p>Note: <span id="complete_note"></span></p>
                    <button type="button" class="btn btn-link"></button><br>


                </div>
                <div class="col">
                  <p>Appointment Time: <span id="complete_datentime"></span></p>
                  <p>Appointment Status: <span class="badge badge-success">Complete</span></p>
                 


                </div>
                </form>

              </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <?php
        $email = $_SESSION['login_admin1'];
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
        $result = mysqli_query($conn,$sql);
        $sql1 = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
        $result1 = mysqli_query($conn,$sql1);
        if((mysqli_num_rows($result)>0) || (mysqli_num_rows($result1)>0)){
        ?>
              <a type="button" href="assistant-prescription.php" class="btn btn-primary">Prescription</a>
              <button type="button" class="btn btn-info">Dental Chart</button>
             
        <?php } ?>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

          </div>
        </div>
      </div>

    </div>
    <!-- End demo content -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- data tables -->

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="main.js"></script>



    <script type="text/javascript">
      function sendEmail() {
        var name = $("#email_name");
        var email = $("#email_email");
        var subject = $("#email_subject");
        var body = $("#email_body");
        if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
          $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data: {
              name: name.val(),
              email: email.val(),
              subject: subject.val(),
              body: body.val()
            },
            success: function(response) {
              $('#myForm')[0].reset();
              $('.sent-notification').text("Message sent successfully.");
            }
          });
        }
      }

      function isNotEmpty(caller) {
        if (caller.val() == "") {
          caller.css('border', '1px solid red');
          return false;
        } else {
          caller.css('border', '');
          return true;
        }
      }
    </script>
    <script type="text/javascript">
      < script src = "https://code.jquery.com/jquery-3.4.1.min.js"
      integrity = "sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin = "anonymous" >
    </script>
    </script>

    <script type="text/javascript">
      $(document).ready(function() {

      $("#settime").change(function() {
        var time = $(this).val();
        $('#fpending_time').val(time);
      });
      var email = getElementById('pending_email').value;
      $('#email_email').val(email);
      });

            </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
          $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
      });


      // $('.viewPendingAppointmentBtn').on('click', function() {
      //   $('#ViewAppointUnconfirmed').modal('show');
      //   $tr = $(this).closest('tr');
      //   var data = $tr.children("td").map(function() {
      //     return $(this).text();
      //   }).get();

      //   console.log(data);

      //   $.ajax({
      //     type: 'POST',
      //     url: 'include/showPatientPendingAppoint.inc.php',
      //     data: {
      //       'id': data[0]
      //     },
      //     dataType: "json",
      //     success: function(response) {
      //       console.log(response);
      //       $('#pending_refno').html(response[0]);
      //       $('#pending_patientname').html(response[1]);
      //       $('#pending_patientname1').html(response[1]);
      //       $('#pending_email').html(response[2]);
      //       $('#pending_contact').html(response[3]);
      //       $('#pending_doctor').html(response[4]);
      //       $('#pending_service').html(response[5]);
      //       $('#pending_branch').html(response[6]);
      //       $('#pending_note').html(response[7]);
      //       $('#pending_datentime').html(response[8]);
      //       $('#pending_status').html(response[9]);

      //       $('#fpending_refno').val(response[0]);
      //       $('#fpending_patientid').val(response[0]);
      //       $('#fpending_patientname').val(response[1]);
      //       $('#fpending_email').val(response[2]);
      //       $('#fpending_doctor').val(response[4]);
      //       $('#fpending_service').val(response[5]);
      //       $('#fpending_branch').val(response[6]);
      //       $('#fpending_note').val(response[7]);
      //       $('#fpending_datentime').val(response[8]);
      //       $('#fpending_status').val(response[9]);
      //       $('#email_email').val(response[2]);
      //       $('#fpending_contact').val(response[3]);

      //       $("#settime").change(function() {
      //         var time = $(this).val();
      //         $('#msg_body').val('Hi ' + response[1]);
      //         $('#email_body').val('Hi ' + response[1] + ', we would like to inform you that your appointment request in Branch ' + response[5] +
      //           ' has been confirmed. Your schedule has been set on ' + response[7] + ' at ' + time);
      //       });

      //     }
      //   });

      // });
        


      $('.viewConfirmAppointmentBtn').on('click', function() {
        console.log("hays");
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);
        switch (data[4]) {
          //CONFIRM
          case 'Confirmed':
            $('#ViewAppointConfirmed').modal('show');

            $.ajax({
              type: 'POST',
              url: 'include/showPatientConfirmAppoint.inc.php',
              data: {
                'id': data[0]
              },
              dataType: "json",
              success: function(response) {
                console.log(response);
                $('#cnfm_refno').html(response[0]);
                $('#cnfm_refno1').html(response[0]);
                $('#cnfm_patientname').html(response[1]);
                $('#cnfm_patientname1').html(response[1]);
                $('#cnfm_email').html(response[2]);
                $('#cnfm_doctor').html(response[3]);
                $('#cnfm_service').html(response[4]);
                $('#cnfm_branch').html(response[5]);
                $('#cnfm_note').html(response[6]);
                $('#cnfm_datentime').html(response[7]);
                $('#cnfm_time').html(response[8]);
                $('#cnfm_status').html(response[8]);
                $('#fcnfm_refno').val(response[0]);
              }
            });
            break;
            //CHECK IN
          case 'Checked-In':
            $('#ViewAppointCheckedIn').modal('show');

            $.ajax({
              type: 'POST',
              url: 'include/showPatientConfirmAppoint.inc.php',
              data: {
                'id': data[0]
              },
              dataType: "json",
              success: function(response) {
                console.log(response);
                $('#checkin_refno').html(response[0]);
                $('#checkin_refno1').html(response[0]);
                $('#checkin_patientname').html(response[1]);
                $('#checkin_patientname1').html(response[1]);
                $('#checkin_doctor').html(response[3]);
                $('#checkin_email').html(response[2]);
                $('#checkin_note').html(response[6]);
                $('#checkin_service').html(response[4]);
                $('#checkin_branch').html(response[5]);
                $('#checkin_datentime').html(response[7]);
                $('#checkin_status').html(response[8]);
                $('#checkin_checkintime').html(response[10]);
                $('#fcheckin_refno').val(response[0]);
              }
            });
            break;

            //IN CHAIR TO COMPLETED
          case 'Upcoming':

            $('#ViewAppointInChair').modal('show');

            $.ajax({
              type: 'POST',
              url: 'include/showPatientConfirmAppoint.inc.php',
              data: {
                'id': data[0]
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
                $('#inchair_service').html(response[4]);
                $('#inchair_datentime').html(response[7]);
                $('#inchair_status').html(response[5]);
                $('#inchair_checkintime').html(response[9]);
                $('#inchair_inchairtime').html(response[10]);
                $('#inchair_branch').html(response[5]);
                $('#finchair_refno').val(response[0]);
                $(' #inchair_note').html(response[6]);
                $(' #inchair_email').html(response[2]);
                $('#finchair_patientname').val(response[1]);
                $('#finchair_email').val(response[2]);
                $('#finchair_service').val(response[4]);
                $('#finchair_note').val(response[6]);
                $('#finchair_datetime').val(response[7]);
                $('#finchair_branch').val(response[4]);
                $('#finchair_doctor').val(response[3]);
              }
            });


            break;

          case 'Completed':
            $('#ViewAppointCompleted').modal('show');
            $.ajax({
              type: 'POST',
              url: 'include/showPatientConfirmAppoint.inc.php',
              data: {
                'id': data[0]
              },
              dataType: "json",
              success: function(response) {
                console.log(response);

                $('#complete_refno').html(response[0]);
                $('#complete_refno1').html(response[0]);
                $('#complete_refno2').val(response[0]);
                $('#complete_patientname').html(response[1]);
                $('#complete_patientname1').html(response[1]);
                $('#complete_doctor').html(response[3]);
                $('#complete_service').html(response[4]);
                $('#complete_datentime').html(response[7]);
                $('#complete_status').html(response[5]);
                $('#complete_checkintime').html(response[7]);
                $('#complete_inchairtime').html(response[7]);
                $('#complete_branch').html(response[5]);
                $('#complete_refno').val(response[0]);
                $(' #complete_note').html(response[6]);
                $(' #icomplete_email').html(response[2]);
                $('#complete_patientname').val(response[1]);
                $('#complete_email').val(response[2]);
                $('#complete_service').val(response[4]);
                $('#complete_note').val(response[6]);
                $('#complete_datetime').val(response[7]);
                $('#complete_branch').val(response[4]);
                $('#complete_doctor').val(response[3]);
              }
            });

            break;


          default:
            console.log('ERROR');
        }
      });
      $(document).ready(function() {
        $('#example').DataTable();

      });
      $(document).ready(function() {
        $('#example1').DataTable();

      });
    </script>


    <!-- Email Script-->
    <script type="text/javascript">
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>

    <script>
      $(#checkin_checkintime).ready(function() {
        $datenow = date('d-m-Y');
        $(this).val($datenow).value;

      });
    </script>
</body>

</html>