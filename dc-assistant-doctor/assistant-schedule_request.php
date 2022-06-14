<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Schedule Request</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php include "./navbar.php" ?>


  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
        class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->



    <div>
      <h1 style="color: white;"><i class="fas fa-portrait" style="font-size: 40px;"></i> Schedule Request</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" href="assistant-schedule_request.php">Schedule Requests</a>
        </li>
      </ul><br>

      <div style="float: right; padding-bottom: 10px;">
        <form class="form-inline" action="/action_page.php">
          <button style="margin-right: 5px;" type="button" class="btn btn-primary">Search</button> <input
            style="width: 300px;" type="email" class="form-control" placeholder="Search" id="email">
        </form>
      </div>

      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Service</th>
              <th>Preferred Day</th>
              <th>Preferred Time and Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mae Nery</td>
              <td>Hilot</td>
              <td>Friday</td>
              <td>10:00AM | 12/25/2021</td>
              <td><a href="#" data-toggle="modal" data-target="#ViewPres">Set Appointment</a></td>
            </tr>
            <tr>
              <td>Mae Nery</td>
              <td>Derma</td>
              <td>Friday</td>
              <td>10:00AM | 12/25/2021</td>
              <td><a href="#" data-toggle="modal" data-target="#ViewPres">Set Appointment</a></td>
            </tr>
            <tr>
              <td>Mae Nery</td>
              <td>Brace</td>
              <td>Friday</td>
              <td>10:00AM | 12/25/2021</td>
              <td><a href="#" data-toggle="modal" data-target="#ViewPres">Set Appointment</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- The Modal -->
      <div class="modal fade" id="ViewPres">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[PT0001] Gerie Mae / Prescription List</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


              <h4>Appointment Infromation</h4>
              <hr>
              <div class=row>
        <div class=col>
          <form action="/action_page.php">
            <div class="input-group mt-3 mb-3">
              <div class="input-group-prepend">
                <button id="dropdown-patient" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                  Patient Names
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">[PID00001] Gerie Mae</a>
                  <a class="dropdown-item" href="#">[PID00002] Lennon</a>
                </div>
              </div>
              <input type="text" class="form-control" placeholder="Search.." value="">
            </div>

            <div class="input-group mt-3 mb-3">
              <div class="input-group-prepend">
                <button id="dropdown-patient" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                  Services
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Cleaning</a>
                  <a class="dropdown-item" href="#">Braces</a>
                </div>
              </div>
              <input type="text" class="form-control" placeholder="Search.." value="">
            </div>

            <div class="input-group mt-3 mb-3">
              <div class="input-group-prepend">
                <button id="dropdown-patient" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                  Doctor
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Urna</a>
                  <a class="dropdown-item" href="#">Lorenzo</a>
                </div>
              </div>
              <input type="text" class="form-control" placeholder="Search.." value="">
            </div>
          </form>

        </div>
        <div class="col">
          <p><b>Appointment Status:</b> <span class="badge badge-secondary">Unconfirmed</span></p>
          <label for="apptstart" style="padding-top: 10px;"><b>Appointment Start: </b></label>
          <input style="height: 35px; margin-left: 11px;" type="datetime-local" id="apptstart" name="apptstart">


        </div>
        </form>
      </div>

      <div class="row" style="padding-left: 15px;">
        <div class="form-group">
          <label for="comment"><b>Note:</b></label>
          <textarea style="width: 400px;" class="form-control" rows="5" id="comment"></textarea>
        </div>


      </div>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <a href="assistant-appointment_calendar.php" target="_blank"><button type="button" class="btn btn-info">Calendar</button></a>
              <button type="button" class="btn btn-success" data-dismiss="modal">Save & Close</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>



      <!-- End demo content -->

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
      <script src="main.js"></script>
</body>

</html>