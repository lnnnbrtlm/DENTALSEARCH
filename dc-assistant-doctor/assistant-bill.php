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
  <title>Billing</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">

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
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->



    <div>
      <h1 style="color: white;"><i class="fas fa-money-bill" style="font-size: 40px;"></i> Billing</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" href="assistant-billing_appointments.php">Appointments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assistant-billing_prescription.php">Prescription</a>
        </li>
      </ul><br>

      <div style="float: right; padding-bottom: 10px;">
        <form class="form-inline" action="/action_page.php">
          <button style="margin-right: 5px;" type="button" class="btn btn-primary">Search</button> <input style="width: 300px;" type="email" class="form-control" placeholder="Search" id="email">
        </form>
      </div>

      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Service</th>
              <th>Price</th>
              <th>Date</th>
              <th>Payment</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mae Nery</td>
              <td>Hilot</td>
              <td>1000</td>
              <td>10:00AM | 12/25/2021</td>
              <td>GCash</td>
              <td><span class="badge badge-secondary">Unpaid</span></td>
              <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewBill"><i class="fa fa-eye" aria-hidden="true"></i></button>

                <button type="button" class="btn btn-success"><i class="fas fa-print" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-info"><i class="fas fa-hands-helping" aria-hidden="true"></i></button>

              </td>
            </tr>
            <tr>
              <td>Mae Nery</td>
              <td>Hilot</td>
              <td>1000</td>
              <td>10:00AM | 12/25/2021</td>
              <td>Cash</td>
              <td><span class="badge badge-success">Paid</span></td>
              <td> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ViewBill"><i class="fa fa-eye" aria-hidden="true"></i></button>

                <button type="button" class="btn btn-success"><i class="fas fa-print" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-info"><i class="fas fa-hands-helping" aria-hidden="true"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- The Modal -->
      <div class="modal fade" id="ViewBill">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[PT0001] Gerie Mae</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">


              <h4>Billing Infromation</h4>
              <hr>
              <div class=row>
                <div class=col>
                  <form action="/action_page.php">
                    <p><b>Patient Name:</b> Mae Nery</p>
                    <p><b>Doctor:</b> Urna</p>
                    <p><b>Appointment ID:</b> APT0001</p>




                  </form>

                </div>
                <div class="col">
                  <p><b>Time and Date:</b> 10:00AM | 12/27/2021</p>
                  <label for="payment" style="padding-top: 10px;"><b>Payemnt Method:</b></label>
                  <select id="payment" class="form-control">
                    <option>GCash</option>
                    <option>Paymaya</option>
                    <option>Debit</option>
                    <option>Cash</option>
                  </select>


                </div>
                </form>
              </div>

              <div class="row" style="padding-left: 15px;">
                <div class="form-group">
                  <label for="comment"><b>Note:</b></label>
                  <textarea style="width: 400px;" class="form-control" rows="5" id="comment"></textarea>
                </div>
              </div>

              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Service</th>
                      <th>Date</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Hilot</td>
                      <td>10:00AM | 12/25/2021</td>
                      <td>1000</td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <p style="float: right;"><b>Total:</b> PHP1000</p>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">View & Print</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>



      <!-- End demo content -->

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="main.js"></script>
</body>

</html>