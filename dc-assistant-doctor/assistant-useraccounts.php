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
  <title>User Accounts | Data Management</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="stylesheet-new.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!--datatable css-->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <!--datatable js-->
    
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
  <style>
      /* The message box is shown when the user clicks on the password field */
#msg {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#msg p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
</head>

<body>



<?php
include "./navbar.php";
include "include/connection.php";
include "include/function.php";

  //====================DELETE SERVICES======================================
  if (isset($_POST['deletesubmit'])){
    $status = inactiveUser($conn,$_POST['deleteUser']);
    
    }

?>



  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->



    <div>
      <h1 style="color: white;"><i class="fas fa-users mr-3"></i>User Accounts</h1>
    </div><br>

    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">

      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" href="assistant-useraccounts.php">User Account List</a>
        </li>

       

      </ul><br>


             <!-- MESSAGE  -->
             <?php 
      if (isset($_SESSION['patientErr'])) {

               if ($_SESSION['patientErr'] == "addSuccess") {
                  echo '
                    <div class="alert alert-primary alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> User Added.
                    </div>
                  ';
                  $_SESSION['patientErr'] = "";
                } 
               
                if ($_SESSION['patientErr'] == "archiveSuccess") {
                  echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong>Move to Archive.
                    </div>
                  ';
                  $_SESSION['patientErr'] = "";
                }
                if ($_SESSION['patientErr'] == "error") {
                  echo '
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Oops!</strong>The email you entered is already unavailable.
                    </div>
                  ';
                  $_SESSION['patientErr'] = "";
                }

      }
      ?>
      
<!-- MESSAGE  -->
              <?php 
              if (isset($_SESSION['upPatientErr'])) {

                       if ($_SESSION['upPatientErr'] == "upSuccess") {
                          echo '
                            <div class="alert alert-primary alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Success!</strong> User Update.
                            </div>
                          ';
                          $_SESSION['upPatientErr'] = "";
                        }

              }
              ?>
      
      <div style="float: left;">
        <button style="margin-right: 5px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#AddAcc"> Add Account</button>
      </div>
    

      <div class="table-responsive pt-3">
      <table class="table table-hover" id="example" >
          <thead>
            <tr>
              <th>Profile Picture</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Type</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           
              <?php
          showUser($conn);
          ?>
       
          </tbody>
        </table>
      </div>

           

      <!-- The Modal -->
      <div class="modal fade" id="ViewAcc">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">[<span id="showUserID"></span>] <span id="showUserFULLname"></span></h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <!-- Modal body -->
            <div class="modal-body">
<div class="container text-center py-5">
  <form action="include/updateUser.inc.php" method="POST" enctype="multipart/form-data">
    <!--<div style="padding-bottom: 5px;"><img id="profileImgupdate"  alt="Avatar Logo"
        style="width:120px; background-color: white;"  class="rounded-pill"></div>
    <h3>Profile</h3>
    <p style="font-size: 14px"class="text-muted">Profile Picture</p>
-->




  </div>
              <h4>Personal Information</h4>
              <hr>
              <div class=row>

                <div class=col>
                  <label for="profile"><b>Edit Profile Picture:</b></label>
                  <input type="file" class="form-control-file" onchange="displayImg(this)" id="showprofileImg" name="updateprofileImg" disabled>
                  <br>
                  
                    <input type="hidden" name="updateUserID"  id="updateUserID">
                    <label for="firstName"><b>First Name:</b></label>
                    <input type="text" class="form-control" placeholder="First Name"
                    id="showUserFname" name="updateUserFname"  disabled>

                    <label for="lastName" style="padding-top: 10px;" ><b>Last Name:</b></label>
                    <input type="text" class="form-control" placeholder="Last Name"  
                    id="showUserLname" name="updateUserLname" disabled>

                    <label for="middleName" style="padding-top: 10px;" ><b>Middle Initial:</b></label>
                    <input type="text" class="form-control" placeholder="Middle Initial"    
                    id="showUserMname" name="updateUserMname" disabled>

                    <label for="age" style="padding-top: 10px; float: right;"><b>Age:</b></label>

                    <label for="birthdaytime" style="padding-top: 10px;"><b>Birthdate:</b></label><br>
                    <input style="height: 35px;"  type="date"  
                    id="showUserBdate" name="updateUserBdate"  disabled>
                    <input style="width: 100px; float: right;" type="number" class="form-control" 
                    id="showUserAge" name="updateUserAge" placeholder="Age"  disabled readonly>

                </div>

                <div class="col">
                  <label for="contactNO"><b>Contact Number:</b></label>
                  <input type="number" class="form-control" placeholder="Contact No."
                  id="showUserContact"  name="updateUserContactNo" disabled>

                  <label for="Email" style="padding-top: 10px;"><b>Email:</b></label>
                  <input type="email" class="form-control" placeholder="Email" 
                  id="showUserEmail" name="updateUserEmail" disabled>

                 

                  <label for="gender" style="padding-top: 10px;"><b>Gender:</b></label>
                  <select style="width: 100px;" id="showUserGender"  name="updateUserGender" class="form-control" disabled>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>

                </div>

               
              </div>

              <label style="padding-top: 10px;" for="address"><b>Address:</b></label>
              <input type="text" class="form-control" placeholder="Address"
              id="showUserAddress" name="updateUserAddress" disabled>
              <hr>


              <label style="padding-top: 10px;" for="password"><b>Password:</b></label>
              <input style="width: 300px;" type="password" class="form-control" placeholder="Edit Password" name="updateUserPassword" id="showUserPassword"  disabled>

              
              <input type="checkbox" onclick="myFunction()"> Show Password

                <script>
                function myFunction() {
                  var x = document.getElementById("showUserPassword");
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }
                </script>

                <br>
              <label for="type" style="padding-top: 10px; "><b>Type:</b></label>
              <select style="width: 300px;" name="updateUserType" id="showUserType" class="form-control" disabled>
                <option >Assistant</option>
                <option >Doctor</option>
              </select><br>

             


              <!-- Modal footer -->
              <div class="modal-footer">
                <button onclick="enable()" type="button" class="btn btn-warning">Edit</button>

                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            </form>
            </div>
          </div>
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
     <!-- Text input-->
     <div class="form-group">
          <label class="col-md-4 control-label" for="deleteUser">User ID</label>  
          <div class="col-md-5">
          <input id="deleteUser" name="deleteUser" type="text" placeholder="" class="form-control input-md" required readonly>
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
  <!---- END OF MODAL -->

      <!-- The Modal -->
      <div class="modal fade" id="AddAcc">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Account</h4> 
              <br>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form action="include/addUserAccount.inc.php" method="POST" enctype="multipart/form-data">
            <div class="container text-center py-5">
    <div style="padding-bottom: 5px;"><img src="img/placeholder.png" alt="Avatar Logo"
        style="width:120px; background-color: white;" id="profileDisplay" class="rounded-pill"></div>
    <h3>Profile</h3>
    <p style="font-size: 14px"class="text-muted">Profile Picture</p>
    <input type="file" class="form-control-file" onchange="displayImg(this)" id="profileImg" name="profileImg" required>
  </div>
              <h4>Personal Information</h4>
      <hr>
              <div class=row>
              

                <div class=col>

                    <label for="firstName"><b>First Name:</b></label>
                    <input type="text"  class="form-control" placeholder="First Name" name="firstname" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" >

                    <label for="lastName" style="padding-top: 10px;"><b>Last Name:</b></label>
                    <input type="text"    class="form-control" placeholder="Last Name" name="lastname" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" >

                    <label for="middleName" style="padding-top: 10px;"><b>Middle Initial:</b></label>
                    <input type="text" onkeydown="return /[a-z]/i.test(event.key)"  class="form-control" placeholder="Middle Initial" name="middlename" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)">

                    <label for="age" style="padding-top: 10px; float: right;"><b>Age:</b></label>

                    <label for="birthdate" style="padding-top: 10px;"><b>Birthdate:</b></label><br>
            <input style="height: 35px;" type="date" id="dob" name="birthdate" >
            <input style="width: 100px; float: right;" type="number" class="form-control" id="age" placeholder="Age" name="age" readonly required>

                </div>

                <div class="col">
                  <label for="contactNO"><b>Contact Number:</b></label>
                  <input type="number" class="form-control" placeholder="Contact No." name="contactno" onKeyDown="limitText(this,13);" 
onKeyUp="limitText(this,13)"  >

                  <label for="Email" style="padding-top: 10px;"><b>Email:</b></label>
                  <input type="email" class="form-control" placeholder="Email" name="email"  onKeyDown="limitText(this,60);" 
onKeyUp="limitText(this,60)">


                  <label for="gender" style="padding-top: 10px;"><b>Gender:</b></label>
          <select style="width: 100px;" name="gender" class="form-control">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
                </div>

               
              </div>

              <label style="padding-top: 10px;" for="address"><b>Address:</b></label>
              <input type="text" class="form-control" placeholder="Address" name="address" onKeyDown="limitText(this,130);" 
onKeyUp="limitText(this,130)">

                <div class="row">
                <div class="col">
              <label style="padding-top: 10px;" for="password"><b>Password:</b></label>
              <input style="width: 300px;" type="password" id="password" name="password" class="form-control" placeholder="Type your password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)">
<div id="msg">
                <h3 style="color: black;">Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              </div>


              <input type="checkbox" onclick="Function()"> Show Password

                <script>
                function Function() {
                  var x = document.getElementById("password");
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }
                </script>

              <br>
              <label for="type" style="padding-top: 10px; "><b>Type:</b></label>
              <select style="width: 300px;" name="user_type" id="type" class="form-control" >
                <option value="Assistant">Assistant</option>
                <option value="Doctor">Doctor</option>
                <option value="Admin">Administrator</option>
              </select><br>
              </div>
              <div class="col">
              <label for="type" style="padding-top: 10px; "><b>Branch:</b></label>
              <select style="width: 300px;" name="branch" id="type" class="form-control" >
               <?php 
                  showBranchDD($conn);
               ?>
              </select><br>
            </div>
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
         <!-- End demo content -->
         
         <!-- datatable -->
         <script type="text/javascript">

//====================DELETE ROOM=====================================
$('.opendeletemodal').on('click',function(){
 $('#myModaldelete').modal();

$tr =$(this).closest('tr');

 var data = $tr.children("td").map(function(){
return $(this).text();
}).get();

console.log(data);

$('#deleteUser').val(data[0]);

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
} );
</script>

    <script>
      function enable() {
        document.getElementById("showUserFname").disabled = "";
        document.getElementById("showUserLname").disabled = "";
        document.getElementById("showUserMname").disabled = "";
        document.getElementById("showUserAge").disabled = "";
        document.getElementById("showUserContact").disabled = "";
        document.getElementById("showUserEmail").disabled = "";
        document.getElementById("showUserType").disabled = "";
        document.getElementById("showUserAddress").disabled = "";
        document.getElementById("showUserGender").disabled = "";
         document.getElementById("showUserBdate").disabled = "";
         document.getElementById("showUserPassword").disabled = "";
         document.getElementById("showprofileImg").disabled = "";
      }
      
//=================SHOW BLVD========================

$('.viewPatientBtn').on('click',function(){
    $('#ViewAcc').modal('show');

    $tr =$(this).closest('tr');
    var data = $tr.children("td").map(function(){
    return $(this).text();
    }).get();

    console.log(data);

     $.ajax({ 
    type: 'POST',
    url: 'include/showUser.inc.php',
    data: { 'user_id'  : data[0] },
    dataType: "json",
    success: function(response) {
      $('#updateUserID').val(response[0]);
      $('#showUserID').html(response[0]);
      $('#showUserFname').val(response[1]);
      $('#showUserLname').val(response[2]);
      $('#showUserMname').val(response[3]);

       $('#showUserFULLname').html(response[2]+", "+response[1]+" "+response[3])

       $('#showUserBdate').val(response[4]);
      $('#showUserAge').val(response[7]);
      $('#showUserEmail').val(response[9]);
      $('#showUserGender').val(response[6]);
      $('#showUserAddress').val(response[8]);
      $('#showUserPassword').val(response[11]);
      $('#showUserContact').val(response[5]);
      $('#showUserType').val(response[10]);
      $('#profileImgupdate').val(response[12]);


    }
    });

});
</script>



    <script type="text/javascript">
    $(document).ready(function() {

          $("#dob").change(function(){
              var dob = $(this).val();
              dob = new Date(dob);
              var today = new Date();
              var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
              $('#age').val(age);
          });


    })

    </script>





    <script type="text/javascript">
    $(document).ready(function() {

          $("#showUserBdate").change(function(){
              var showUserBdate = $(this).val();
              showUserBdate = new Date(showUserBdate);
              var today = new Date();
              var age = Math.floor((today-showUserBdate) / (365.25 * 24 * 60 * 60 * 1000));
              $('#showUserAge').val(age);
          });


    })</script>
    
    <script src="showImg.js"></script>
    
    <script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("msg").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("msg").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
   
</body>

</html>