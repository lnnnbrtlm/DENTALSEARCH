<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}
$email = $_SESSION['login_admin1'];
$sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0){
header("location: assistant-index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Branches | Customize</title>
    <link rel="icon" href="img/tooth.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet-new.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      
 <!--data table -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
   
</head>

<body>
<?php 

include "./navbar.php";
include 'include/connection.php';
include 'include/function.php';

//====================DELETE SERVICES======================================
if (isset($_POST['deletesubmit'])){
  $status = inactiveBranch($conn,$_POST['deleteBranch']);
  
  }
?>


    <!-- Page content holder -->
    <div class="page-content p-5" id="content">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

        <!-- CONTENT -->

        <div>
        <h1 style="color: white;"><i class="fas fa-tools fa-fw mr-3"></i>Customize</h1>
        </div><br>

        <div class="container pt-3 pb-5 bg-light rounded shadow-lg">

            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link " href="assistant-customize.php">Control Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="assistant-customize-content.php">Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="assistant-customize-branches.php">Branches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assistant-customize-backup.php">Back-up and Restore</a>
                </li>

            </ul><br>

<!-- MESSAGE  -->
<?php 
      if (isset($_SESSION['serviceErr'])) {
                if ($_SESSION['serviceErr'] == "upSuccess") {
                  echo '
                    <div class="alert alert-primary alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Branch Updated.
                    </div>
                  ';
                  $_SESSION['serviceErr'] = "";
                }
               if ($_SESSION['serviceErr'] == "addSuccess") {
                  echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Branch Added.
                    </div>
                  ';
                  $_SESSION['serviceErr'] = "";
                }
                if ($_SESSION['serviceErr'] == "archiveSuccess") {
                  echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Move to Archive.
                    </div>
                  ';
                  $_SESSION['serviceErr'] = "";
                }
      }
      ?>
            <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddBranch">Add
          Branch</button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Edit">Edit</button>
      </div><br>

          <table class="table" id="example">
  <thead>
    <tr>
    
    <th>Branch Name</th>
      <th>Branch Address</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php showBranchTable($conn); ?>
   
  </tbody>
</table>     
        </div>
        <!--  END CONTENT -->
    </div>

    <div class="modal fade" id="AddBranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!---- ADD BRANCH MODAL -->
      <div class="modal-body">
      <form action="include/addBranch.inc.php" method="POST" enctype="multipart/form-data">
      <input type="file" class="form-control-file" onchange="displayImg(this)" id="profileImg" name="profileImg" >
      <br>
      <div class="input-group">
     
                <div class="input-group-prepend">
                  
                    <span class="input-group-text">Branch Name</span>
                </div>
                <input type="text" aria-label="First name" name="name" class="form-control">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Branch Address</span>
                </div>
                <input type="text" aria-label="First name" name="address" class="form-control">
            </div><br>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    
    </div>
  </div>
</div>
</form>


<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          

      <!---- EDIT BRANCH MODAL -->
    
      <div class="modal-body">
      <div class="input-group mb-3">
  
      <form action="include/updateBranch.inc.php" method="POST">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Branch</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="upbranch_id">
                    <option selected>Choose...</option>
                    <?php showBranchDD($conn); ?>
                </select>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Branch Address</span>
                </div>
                <input type="text" aria-label="First name" name="upbranch_address" class="form-control">
            </div><br>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Branch Name</span>
                </div>
                <input type="text" aria-label="First name" name="upbranch_name" class="form-control">
            </div><br>

            
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    
    </div>
    </form>
  </div>
</div>
<!------MODAL DELETE -->

<div class="modal fade" id="myModaldelete" role="dialog">
    <div class="modal-dialog">
 

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span style="font-weight: bold; font-size: 20px;">Move to Archive</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
       <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>

        <!-- Form Name -->
      
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="deleteBranch">Branch Name</label>  
          <div class="col-md-5">
          <input id="deleteBranch" name="deleteBranch" type="text" placeholder="" class="form-control input-md" required readonly>
          </div>
        </div>


        <!-- Button -->
        <div class="form-group">
          <div class="col-md-12">
          <input type="submit" id="submit" name="deletesubmit" class="btn btn-danger btn-block" value="Move to Archive"></input>
          </div>
        </div>
        </fieldset>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
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
    <script src="main.js"></script>
    <script>
        function enable() {
            document.getElementById("firstName").disabled = "";
            document.getElementById("middleName").disabled = "";
            document.getElementById("lastName").disabled = "";
            document.getElementById("age").disabled = "";
            document.getElementById("contactNO").disabled = "";
            document.getElementById("Email").disabled = "";
            document.getElementById("pg").disabled = "";
            document.getElementById("address").disabled = "";
            document.getElementById("gender").disabled = "";
            document.getElementById("type").disabled = "";
        }
    </script>
     <script type="text/javascript">

//====================DELETE ROOM=====================================
$('.opendeletemodal').on('click',function(){
 $('#myModaldelete').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteBranch').val(data[0]);

});
$('#Data').DataTable( {
       // dom: 'Bfrtip',
        buttons: [
           //  'print', 'pdf', 'excel'
        ]
    } );
//=========================================================


$(document).ready(function() {
    $('#example').DataTable();

} );</script>
</body>

</html>