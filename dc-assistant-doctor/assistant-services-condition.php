<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Condition | Data Management</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
 <!--data table -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  
  
</head>

<body>

<?php 

include "./navbar.php";
include 'include/connection.php';
include 'include/function.php';
?>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->





    <div>
      <h1 style="color: white;"><i class="fas fa-list-alt mr-3"></i>Services</h1>
    </div><br>


    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

    <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link " href="assistant-services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="assistant-services-procedures.php">Procedures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="assistant-services-condition.php">Condition</a>
                </li>

            </ul><br>
      <!-- MESSAGE  -->
      <?php 
      if (isset($_SESSION['serviceErr'])) {
                if ($_SESSION['serviceErr'] == "upSuccess") {
                  echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Service Updated.
                    </div>
                  ';
                  $_SESSION['serviceErr'] = "";
                }
               if ($_SESSION['serviceErr'] == "addSuccess") {
                  echo '
                    <div class="alert alert-primary alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Service Added.
                    </div>
                  ';
                  $_SESSION['serviceErr'] = "";
                }
      }
      ?>
      <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddService">Add
          Service</button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Edit">Edit</button>
      </div><br>

      <div class="table-responsive">
      <table class="table table-hover" id="example" >
          <thead>
            <tr>
              <th>Legend</th>
              <th>Conditon</th>
            </tr>
          </thead>
          <tbody>
            <?php showConTable($conn); ?>
          </tbody>
        </table>
      </div>
    </div>



    <!-- The Modal -->
    <div class="modal fade" id="Edit">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Service</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

 <form action="include/updateCondition.inc.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
         
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Selected Condition</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="up_id">
                      <option selected disabled>Choose...</option>
                      <?php showConDD($conn); ?>
              </select>
            </div>


            
              <div class="form-group">
                <label for="service">Condition:</label>
                <input type="text" class="form-control" placeholder="Service Name" name="up_condition" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)">
              </div>
              <div class="form-group">
                <label for="service">Legend</label>
                <input type="text" class="form-control" placeholder="Service Name" name="up_legend" onKeyDown="limitText(this,3);" 
onKeyUp="limitText(this,3)">
              </div>



        

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </div>
    </form>
        </div>
      </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="AddService">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Condition</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

            <form action="include/addCondition.inc.php" method="POST">
              <div class="form-group">
                <label for="service">Condition</label>
                <input type="text" class="form-control" placeholder="Condition Name" name="condition" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)">
              </div>
              <div class="form-group">
                <label for="service">Legend</label>
                <input type="text" class="form-control" placeholder="Service Name" name="legend" onKeyDown="limitText(this,3);" 
onKeyUp="limitText(this,3)">
              </div>


          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
     
        </div>
      
      </div>
      </form>
    </div>


  <!-- End demo content -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
    <!-- data tables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>


  </script>
        <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();

} );</script>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>
</body>

</html>