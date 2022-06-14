<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Prescription List</title>
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
      <h1 style="color: white;"><i class="fas fa-prescription" style="font-size: 40px;"></i> Prescription</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" href="assistant-prescription.php">Add Prescription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="assistant-prescription_list.php">Prescription List</a>
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
              <th>Patient ID</th>
              <th>First Name</th>
              <th>Prescribing Doctor</th>
              <th>Prescribing Time & Date</th>
              <th>Note</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>PID0001</td>
              <td>Gerie Mae</td>
              <td>Urna</td>
              <td>10:00AM | 12/27/2021</td>
              <td>XXXXXXXXX</td>
              <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewPrescription"><i
                    class="fa fa-eye" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-success"><i class="fas fa-print" aria-hidden="true"></i></button>

                <button type="button" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!--  END CONTENT -->


      <!-- The Modal -->
      <div class="modal fade" id="ViewPrescription">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[PID0001] Gerie Mae</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <h4>Prescription Information</h4>
              <hr>
              <div class=row>
        
                <div class=col>
                  <form action="/action_page.php">
                    <p><b>Information:</b></p>
        
                    <div class="input-group mt-3 mb-3">
                      <div class="input-group-prepend">
                        <button id="dropdown-patient" type="button" class="btn btn-outline-secondary dropdown-toggle"
                          data-toggle="dropdown">
                          Patient ID
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">[PID0001] Gerie Mae</a>
                          <a class="dropdown-item" href="#">[PID0002] Lennon</a>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Search.." value="Gerie Mae">
                    </div>
        
                    <div class="input-group mt-3 mb-3">
                      <div class="input-group-prepend">
                        <button id="dropdown-patient" type="button" class="btn btn-outline-secondary dropdown-toggle"
                          data-toggle="dropdown">
                          Prescribing Doctor
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Urna</a>
                          <a class="dropdown-item" href="#">Lorenzo</a>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Search.." value="Urna">
                    </div>
        
                    <p><b>Prescribing Time & Date:</b> 10:00AM | 12/17/2021</p>
        
                </div>
        
                <div class="col">
        
                  <div class="row" style="padding-left: 15px;">
                    <div class="form-group">
                      <label for="comment"><b>Note:</b></label>
                      <textarea style="width: 400px;" class="form-control" rows="5" id="comment"></textarea>
                    </div>
                  </div>
                </div>
        
        
        
                </form>
              </div>
        
        
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Medicine</th>
                      <th>Dose</th>
                      <th>Dose Unit</th>
                      <th>Form</th>
                      <th>Frequency</th>
                      <th>Duration</th>
                      <th>Duration Unit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><select name="meds" id="meds" style="width: 150px; height: 30px;">
                          <option value="select"></option>
                          <option value="advil">Advil</option>
                          <option value="tylenol">Tylenol</option>
                          <option value="bayer">Bayer</option>
                        </select></td>
                      <td><input type="text" placeholder="0.00" style="width: 100px;"></td>
                      <td><select name="doseunit" id="doseunit" style="width: 100px; height: 30px;">
                          <option value="select"></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select></td>
                      <td><select name="form" id="form" style="width: 100px; height: 30px;">
                          <option value="select"></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select></td>
                      <td><select name="frequency" id="frequency" style="width: 100px; height: 30px;">
                          <option value="select"></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select></td>
        
                      <td><input type="text" placeholder="0" style="width: 100px;"></td>
        
                      <td><select placeholder="0" name="durationunit" id="durationunit" style="width: 100px; height: 30px;">
                          <option value="select"></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select></td>
        
                    </tr>
        
                  </tbody>
                </table>
                
        
                <div ><button type="button" class="btn btn-info">Add</button>
                  <br><br>
              </div>

            </div>




            <!-- Modal footer -->
            <div class="modal-footer">

              <button type="button" class="btn btn-warning">View & Print</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

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