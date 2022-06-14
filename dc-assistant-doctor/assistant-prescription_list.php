<?php
include 'include/connection.php';
include 'include/function.php';

include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}
$email = $_SESSION['login_admin1'];
$sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
$result = mysqli_query($conn,$sql);
$sql1 = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)==0 && mysqli_num_rows($result1)==0){

header("location: assistant-index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Prescription List | Prescription</title>
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

  <!----Data tables css -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  

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
      <h1 style="color: white;"><i class="fas fa-prescription mr-3"></i>Prescription</h1>
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

     

      <div class="table-responsive">
        <table id="example" class="table table-hover">
          <thead>
            <tr>
              
              <th>Patient Name</th>
              <th>Prescribing Doctor</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $email = $_SESSION['login_admin1'];
            $query1= "SELECT *FROM prescription_list";
            $query_run1=mysqli_query($conn,$query1);    
            while ($row=mysqli_fetch_array($query_run1)) {
              
            ?><tr>
             
              <td  value="<?php echo $row['patient_name']; ?>"><?php echo $row['patient_name']; ?></td>
              <td  value="<?php echo $row['doctor_name']; ?>"><?php echo $row['doctor_name']; ?></td>
           <td>
              <a type="button" data-toggle="tooltip" href="generateprescription.php?id=<?= $row['prescription_id'] ?>" class="btn btn-link btn-primary" data-original-title="Generate Certificate">
              <i class="fas fa-print text-light" aria-hidden="true"></i>
																</a>
            <button type="button" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </td>
               
          </form>
              
            </tr>
            <?php }?>
              
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
                      <th>Form</th>
                      <th>Frequency</th>
                      <th>Duration</th>

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
                      
                      <td><select name="frequency" id="frequency" style="width: 100px; height: 30px;">
                          <option value="select"></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select></td>
        
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
  <!----Data tables js -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  



    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();

} );
</script>
</body>

</html>