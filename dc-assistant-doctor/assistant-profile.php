<?php
include('session.php');
if (!isset($_SESSION['login_admin1'])) {
    header("location: logout1.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>My Profile | Dental Clinic</title>
    <link rel="icon" href="img/tooth.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

        <!-- CONTENT -->

        <div>
            <h1 style="color: white;"><i class="fas fa-user-circle mr-3 fa-fw"></i>My Profile</h1>
        </div><br>

        <div class="container pt-3 pb-5 bg-light rounded shadow-lg">

            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="assistant-profile.php">User Profile</a>
                </li>


            </ul><br>

            <?php 
              if (isset($_SESSION['upPatientErr'])) {

                       if ($_SESSION['upPatientErr'] == "upSuccess") {
                          echo '
                            <div class="alert alert-primary alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Success!</strong> Profile Updated.
                            </div>
                          ';
                          $_SESSION['upPatientErr'] = "";
                        }

              }
              ?>

            <h4>Personal Information</h4>
            <hr>
            <div class=row>

                <div class=col>

                    <form action="include/updateMyprofile.inc.php" method="POST" enctype="multipart/form-data">
                    <?php
                      
                $email = $_SESSION['login_admin1'];
            $query1= "SELECT *FROM user_accounts WHERE email='$email' LIMIT 1";
            $query_run1=mysqli_query($conn,$query1);    
            while ($row=mysqli_fetch_array($query_run1)) {
               ?>
                        <label for="firstName"><b>First Name:</b></label>
                        <input type="text"  class="form-control" placeholder="First Name" name="first_name" id="firstName" value="<?php echo $row['first_name']; ?>" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled>
                        
                        <label for="lastName" style="padding-top: 10px;"><b>Last Name:</b></label>
                        <input type="text"  class="form-control" placeholder="Last Name" name="last_name" value="<?php echo $row['last_name']; ?>" id="lastName" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled>

                        <label for="middleName" style="padding-top: 10px;"><b>Middle Name:</b></label>
                        <input type="text" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" placeholder="Middle Initial" name="middle_name" value="<?php echo $row['middle_name']; ?>" id="middleName" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)" disabled>

                        <label for="age" style="padding-top: 10px; float: right;"><b>Age:</b></label>

                        <label for="birthdaytime" style="padding-top: 10px;"><b>Birthdate:</b></label><br>
                        <input style="height: 35px;" type="date" id="bdate" name="birthdate" value="<?php echo $row['birthdate']; ?>" disabled>
                        <input style="width: 100px; float: right;" type="age" class="form-control"  placeholder="Age" id="age" name="age" value="<?php echo $row['age']; ?>" disabled>


                </div>

                <div class="col">
                    <label for="contactNO"><b>Contact Number:</b></label>
                    <input type="text" onkeypress='return restrictAlphabets(event)' class="form-control" placeholder="Contact No." name="contactno" id="contactNO" value="<?php echo $row['contactno']; ?>" onKeyDown="limitText(this,13);" 
onKeyUp="limitText(this,13)"  disabled>

                    <label for="Email" style="padding-top: 10px;"><b>Email:</b></label>
                    <input type="Email" class="form-control" placeholder="Email" id="Email" name="email" value="<?php echo $row['email']; ?>"  onKeyDown="limitText(this,60);" 
onKeyUp="limitText(this,60)" disabled>


                    <label for="gender" style="padding-top: 10px;"><b>Gender:</b></label>
                    <select style="width: 100px;" id="gender" name="gender" class="form-control" disabled>
                        <option hidden><?php echo $row['gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                </div>

                
            </div>

            <label style="padding-top: 10px;" for="address"><b>Address:</b></label>
            <input type="address" class="form-control" placeholder="Address" name="address" id="address" value="<?php echo $row['address']; ?>" onKeyDown="limitText(this,130);" 
onKeyUp="limitText(this,130)"  disabled>

            <label for="type" style="padding-top: 10px;"><b>Password:</b></label>


                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?php echo $row['password']; ?>" onKeyDown="limitText(this,130);" onKeyUp="limitText(this,130)"  disabled>
                 

            <hr>
        <?php } ?>


            <br>
            <div style="float: right;"> <button onclick="enable()" type="button" class="btn btn-warning">Edit</button>
            <button type="submit" name="updateprofile" class="btn btn-success">Save</button>
            </div> 
            </form>

        </div>

        <!--  END CONTENT -->

    </div>
    <!-- End demo content -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="main.js"></script>
    <script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    <script>


      function enable() {
        document.getElementById("firstName").disabled = "";
        document.getElementById("middleName").disabled = "";
        document.getElementById("lastName").disabled = "";
        document.getElementById("age").disabled = "";
        document.getElementById("contactNO").disabled = "";
        document.getElementById("Email").disabled = "";
       
        document.getElementById("address").disabled = "";
        document.getElementById("gender").disabled = "";
        document.getElementById("password").disabled = "";
        document.getElementById("bdate").disabled = "";
      }

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