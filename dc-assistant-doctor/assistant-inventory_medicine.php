<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Inventory List</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <!--data tables-->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <!--data tables js-->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

  <?php 
  include "./navbar.php";
  include "include/connection.php";
  include "include/function.php";

   //====================DELETE SERVICES======================================
   if (isset($_POST['deletesubmit'])){
    $status = inactiveMedicine($conn,$_POST['deleteMedicene']);
    }

  ?>

<script type="text/javascript">
         /*code: 48-57 Numbers*/
         function restrictAlphabets(e) {
             var x = e.which || e.keycode;
             if ((x >= 48 && x <= 57))
                 return true;
             else
                 return false;
         }
      </script>
  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->



    <div>
      <h1 style="color: white;"><i class="fa fa-cubes" style="font-size: 40px;"></i> Inventory</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" href="assistant-inventory_medicine.php">Medicine List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assistant-inventory_equipments.php">Stocks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="assistant-inventory_restock.php">Restock</a>
        </li>
      </ul><br>

      

      <form action="include/reportMedicine.inc.php" method="post"  target="_blank">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#AddItem">Add Item</button>

      <button type="submit" class="btn btn-danger" data-toggle="modal" name="create_pdf"><i class="fa fa-print" aria-hidden="true" > Generate Report</i></button>
    </form>
     <!-- MESSAGE  -->
    <?php 

       if (isset($_SESSION['patientErr'])) {

        if ($_SESSION['patientErr'] == "addSuccess") {
           echo '
             <div class="alert alert-primary alert-dismissible">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <strong>Success!</strong> Equipment Added.
             </div>
           ';
           $_SESSION['patientErr'] = "";
         }
        
         if ($_SESSION['patientErr'] == "archiveSuccess") {
           echo '
             <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <strong>Success!</strong> Equipment Update.
             </div>
           ';
           $_SESSION['patientErr'] = "";
         }

      if (isset($_SESSION['patientErr'])) {

               if ($_SESSION['patientErr'] == "addSuccess") {
                  echo '
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Medicine Added.
                    </div>
                  ';
                  $_SESSION['patientErr'] = "";
                }
                if ($_SESSION['patientErr'] == "achiveSuccess") {
                  echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Move to Arhive.
                    </div>
                  ';
                  $_SESSION['patientErr'] = "";
                }
              }
              ?>
              <?php 
              if (isset($_SESSION['upPatientErr'])) {
                
                if ($_SESSION['upPatientErr'] == "upSuccess") {
                  echo '
                    <div class="alert alert-primary alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> Medicine Update.
                    </div>
                  ';
                  $_SESSION['upPatientErr'] = "";
                }
              
             

                

              }

}
      ?>
      <div class="table-responsive">
        <table id="example" class="table table-hover">
          <thead>
            <tr>
            <th style="display:none;">Medicine ID</th>
              <th>Medicine</th>
              <th>Quantity</th>
              <th>Expiry Date</th>
              <th>Requested Date</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
  
              <?php
          showMedicine($conn);
          ?>
              
          </tbody>
        </table>
      </div>

     
             

      <!-- The Modal -->
      <div class="modal fade" id="ViewMed">
        <div class="modal-dialog modal-xl modal-dialog-centered">

          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              
              <h4 class="modal-title">[<span id="showMedID"></span>] <span id="showMedname"></span></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="include/updateMedicine.inc.php" method="POST">
                <input type="hidden" name="updateMedID"  id="updateMedID">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Medicine</th>
                      <th>Quantity</th>
                      <th>Expiry Date</th>
                      <th>Requested Date</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><input type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" id="showMedname1" name="updateMedname" 
                      style="width: 100px;" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled></td>
                      <td><input type="text" onkeypress='return restrictAlphabets(event)' class="form-control" id="showMedquantity" name="updateMedquantity" 
                      style="width: 100px;" onKeyDown="limitText(this,3);" 
onKeyUp="limitText(this,3)" disabled></td>
                      

                      <td><input style="height: 35px;" type="date" id="showMedexpiry" name="updateMedexpiry" id="dob" name="birthdate" disabled></td>
                      <td><input style="height: 35px;" type="date" id="showMedrequested" name="updateMedrequested" id="dob" name="birthdate" disabled></td>


                      
                      <td><input type="text" onkeypress='return restrictAlphabets(event)' class="form-control" id="showMedprice" name="updateMedprice" 
                      style="width: 100px;" disabled></td>
                    </tr>
                  </tbody>
                </table>
              </div>


              <!-- Modal footer -->
              <div class="modal-footer">
              <button onclick="enableTxt()" type="button" class="btn btn-warning">Edit</button>

                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            
            </div>
          </div>
        </div>
        </form>
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
          <label class="col-md-4 control-label" for="deleteMedicene">Medicine Name</label>  
          <div class="col-md-5">
          <input id="deleteMedicene" name="deleteMedicene" type="text" placeholder="" class="form-control input-md" required readonly>
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

      <!-- The Modal -->
      <div class="modal fade" id="AddItem">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Item</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


 
            <!-- Modal body -->
            <div class="modal-body">
              <form action="include/addMedicine.inc.php" method="POST">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Medicine</th>
                      <th>Quantity</th>
                      <th>Expiry Date</th>
                      <th>Requested Date</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      <td><input type="text" onkeydown="return /[a-z]/i.test(event.key)" name="Med_Name" placeholder="" style="width: 200px;" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)"></td>
                      <td><input type="text" onkeypress='return restrictAlphabets(event)' name="Quantity" placeholder="" style="width: 100px;" onKeyDown="limitText(this,3);" 
onKeyUp="limitText(this,3)"   ></td>
                      <td><input style="height: 35px;" type="date" name="Expiry_date" id="dob" name="birthdate" ></td>
                      <td><input style="height: 35px;" type="date" name="Requested_date" id="dob" name="birthdate" ></td>
                      <td><input type="text" onkeypress='return restrictAlphabets(event)' name="Price" placeholder="" style="width: 100px;"></td>
                    </tr>

                  </tbody>
                </table>
              </div>


              <!-- Modal footer -->
              <div class="modal-footer">

                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
             
            </div>
          </div>
        </div>
        </form>
      </div>

  




    <script>
    function enableTxt() {
        document.getElementById("showMedname1").disabled = "";
        document.getElementById("showMedquantity").disabled = "";
        document.getElementById("showMedexpiry").disabled = "";
        document.getElementById("showMedrequested").disabled = "";
        document.getElementById("showMedprice").disabled = "";
      }
      
//=================SHOW BLVD========================

$('.viewMedicine').on('click',function(){
    $('#ViewMed').modal('show');

    $tr =$(this).closest('tr');
    var data = $tr.children("td").map(function(){
    return $(this).text();
    }).get();

    console.log(data);

     $.ajax({
    type: 'POST',
    url: 'include/showMedicine.php',
    data: { 'Med_Id'  : data[0] },
    dataType: "json",
    success: function(response) {
      console.log(response);
      $('#updateMedID').val(response[0]);
      $('#showMedID').html(response[0]);
      $('#showMedname1').val(response[1]);
      $('#showMedname').html(response[1]);
      $('#showMedquantity').val(response[2]);
      $('#showMedexpiry').val(response[3]);
      $('#showMedrequested').val(response[4]);
      $('#showMedprice').val(response[5]);
      
    }
    }); 

});</script>

<script type="text/javascript">

//====================DELETE ROOM=====================================
$('.opendeletemodal').on('click',function(){
 $('#myModaldelete').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteMedicene').val(data[0]);

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
<script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}

</script>
<script type="text/javascript">
   /*code: 48-57 Numbers*/
   function restrictAlphabets(e){
       var x = e.which || e.keycode;
   	if((x>=48 && x<=57))
   		return true;
   	else
   		return false;
   }
</script>
</body>

</html>