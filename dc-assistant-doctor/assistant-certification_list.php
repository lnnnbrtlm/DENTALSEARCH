<?php
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
  <title>Certificate List | Reports</title>
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
  <div class="page-content p-5" id="content" >
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
        class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->

    <div>
      <h1 style="color: white;"><i class="fas fa-certificate" style="font-size: 40px;"></i> Certification</h1>
    </div><br>
    
    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" href="assistant-certification.php">Issue Certificate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="assistant-certification_list.php">Certificate List</a>
        </li>

      </ul><br>


      <div class="table-responsive">
        <table id="example" class="table table-hover">
          <thead>
            <tr>
        
              <th>Patient Name</th>
              <th>Certificating Doctor</th>
              <th>Certification Time & Date</th>
              <th>Remarks</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <form method="post" action="generatepdf.php">
          <?php
            $email = $_SESSION['login_admin1'];
            $query1= "SELECT *FROM certification";
            $query_run1=mysqli_query($conn,$query1);    
            while ($row=mysqli_fetch_array($query_run1)) {
              
            ?><tr>
              
              <td  value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></td>
              <td  value="<?php echo $row['doctor']; ?>"><?php echo $row['doctor']; ?></td>
              <td  value="<?php echo $row['time_n_date']; ?>"><?php echo $row['time_n_date']; ?></td>
              <td  value="<?php echo $row['remarks']; ?>"><?php echo $row['remarks']; ?></td>
              <td>
           
              <a type="button" data-toggle="tooltip" href="generatecert.inc.php?id=<?= $row['id'] ?>" class="btn btn-link btn-primary" data-original-title="Generate Certificate">
              <i class="fas fa-print text-light" aria-hidden="true"></i>
																</a>
                <button type="button" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button>
            </form>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>

      <!--  END CONTENT -->

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

<script>
   function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
    </script>