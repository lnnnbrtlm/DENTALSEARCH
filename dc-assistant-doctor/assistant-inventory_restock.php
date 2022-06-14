<?php
include('session.php');
if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Restock | Inventory</title>
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
  
</head>

<body>

  <?php 
  include "./navbar.php";
  include "include/connection.php";
  include "include/function.php";
  ?>


  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->



    <div>
      <h1 style="color: white;"><i class="fa fa-cubes mr-3"></i>Inventory</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" href="assistant-inventory_medicine.php">Medicine List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="assistant-inventory_equipments.php">Stocks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="assistant-inventory_restock.php">Restock</a>
        </li>
      </ul><br>

   


      <div class="table-responsive">
      <table  class="table table-hover" id="example">
          <thead>
            <tr>
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
          showStock($conn);
          ?>
          </tbody>
        </table>
      </div>

      <!-- The Modal -->
      <div class="modal fade" id="AddStock">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">[<span id="showMedID"></span>] <span id="showMedName"></span></h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="include/updateMedStock.inc.php" method="POST">
                 <input type="hidden" name="updateMedID"  id="updateMedID">
              <div class="table-responsive">
                <table id="example3" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Total Quantity</th>
                      <th>Quantity to Add</th>


                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" onkeypress='return restrictAlphabets(event)' placeholder="0" id="showMedQuantity" name ="updateMedQuantity" style="width: 200px;" onKeyDown="limitText(this,3);" 
onKeyUp="limitText(this,3)" readonly disabled></td>

                      <td><input type="text" onkeypress='return restrictAlphabets(event)' placeholder="0" id="updateMedStock" name="updateMedStock" style="width: 200px;" onKeyDown="limitText(this,3);" 
onKeyUp="limitText(this,3)" disabled></td>

                      
                      
                    </tr>

                  </tbody>
                </table>
              </div>


              <!-- Modal footer -->
              <div class="modal-footer">
                <button onclick="enableTxt()" type="button" class="btn btn-warning">Add Stock</button>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            </form>
            </div>
          </div>
        </div>
      </div>



       <!-- End demo content -->

 <!--data tables-->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <!--data tables js-->
  <script type="text/javascript"  src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>



    <script>
    function enableTxt() {
        document.getElementById("updateMedStock").disabled = "";
        document.getElementById("showMedQuantity").disabled = "";
      } 
      
//=================SHOW BLVD========================

$('.viewStock').on('click',function(){
    $('#AddStock').modal('show');

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
      $('#showMedName').html(response[1]);
      $('#showMedQuantity').val(response[2]);
      
    }
    });

});
$(document).ready(function() {
    $('#example').DataTable();

} );
</script>

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