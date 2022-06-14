<?php include('session.php'); ?>
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
  include 'include/connection.php';
  include 'include/function.php';
  ?>

        <!-- The Modal -->
      <div class="container">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">[<span id="complete_refno"></span>] <b id="complete_patientname"></b></h4>

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
              <a href="assistant-appointment_list.php" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>

            </div>

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
	var my_var_arr = location.search.replace('?', '').split('=');

 $.ajax({
              type: 'POST',
              url: 'include/showPatientConfirmAppoint.inc.php',
              data: {
                'id': my_var_arr[1]
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
</script>
</body>
</html>