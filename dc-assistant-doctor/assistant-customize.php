
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
    <title>Control Panel | Customize</title>
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
            <h1 style="color: white;"><i class="fas fa-tools fa-fw mr-3"></i>Customize</h1>
        </div><br>

        <div class="container pt-3 pb-5 bg-light rounded shadow-lg">

        <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="assistant-customize.php">Control Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assistant-customize-content.php">Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assistant-customize-branches.php">Branches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="assistant-customize-backup.php">Back-up and Restore</a>
                </li>

            </ul><br>
            <!-- MESSAGE  -->
            <?php 
              if (isset($_SESSION['upPatientErr'])) {

                       if ($_SESSION['upPatientErr'] == "upSuccess") {
                          echo '
                            <div class="alert alert-primary alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Success!</strong> Control Panel Updated.
                            </div>
                          ';
                          $_SESSION['upPatientErr'] = "";
                        }

              }
              ?>

            <h4>Control Panel</h4>
            <hr>
            
            <form action="include/updateControlPanel.php" method="POST" enctype="multipart/form-data">

            <?php
                $email = $_SESSION['login_admin1'];
            $query1= "SELECT *FROM control_panel WHERE panel_id= 1";
            $query_run1=mysqli_query($conn,$query1);    
            while ($row=mysqli_fetch_array($query_run1)) {
               ?>
            <input type="hidden" name="updatepanelid"  id="panelid">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Dental Clinic Name</span>
                </div>
                <input type="text" aria-label="First name" name="updateclinicname" id = "showname" class="form-control" value="<?php echo $row['clinic_name']; ?>" disabled>
            </div>
            <br>

            <div class="custom-file">

            <label  for="customFile">Choose file for logo</label>
                <input type="file" class="form-control-file" onchange="displayImg(this)" id="updateprofileImg" name="updateprofileImg" disabled>
                
            </div><br><br>
            <div class=row>

                <div class=col>
                    

                        <label for="contact"><b>Contact Number:</b></label>
                        <input type="contact" class="form-control" name="updatecliniccontact" id = "showcontact" placeholder="Contact No." id="contact" value="<?php echo $row['clinic_contact']; ?>" disabled>



                </div>


                <div class="col">
                    <label for="email"><b>Email:</b></label>
                    <input type="email" class="form-control" name="updateclinicemail" placeholder="Email" id="showemail" value="<?php echo $row['clinic_email']; ?>" disabled>



                </div>

                
            </div><br>
            <h6 style="font-weight:bold;">Schedule (Date & Time):</h6>
            <div class="row">

                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01" >Start</label>
                        </div>
                        <select class="custom-select" name="updatestartday" id="showstartday" required disabled>
                        <option hidden><?php echo $row['start_day']; ?></option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">End</label>
                        </div>
                        <select class="custom-select" name="updateendday" id="showendday" required disabled>
                        <option hidden><?php echo $row['end_day']; ?></option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <label for="appt">Start:</label>
                    <input  type="time" id="showstarttime" name="updatestarttime" value="<?php echo $row['start_time']; ?>" required disabled>
                </div>
                <div class="col">
                    <label for="appt">End:</label>
                    <input type="time" id="showendtime" name="updateendtime" value="<?php echo $row['end_time']; ?>" required disabled>
                </div>
            </div>

            
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address:</label>
                    <textarea class="form-control" name="updateaddress" id="showaddress" rows="3" disabled><?php echo $row['clinic_address']; ?></textarea>
                </div>
            

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Facebook Link</span>
                </div>
                <input type="text" aria-label="First name" name="updatefacebook" id = "showfb" class="form-control" value="<?php echo $row['facebook_link']; ?>" disabled>
            </div><br>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Twitter Link</span>
                </div>
                <input type="text" aria-label="First name" name="updatetwitter" id = "showtwt" class="form-control" value="<?php echo $row['twitter_link']; ?>" disabled>
            </div>

            <hr>

            <?php } ?>

            <br>
            <div style="float: right;"> <button type="button" class="btn btn-primary">Clear</button> 
            <button onclick="enable()" type="button" class="btn btn-warning">Edit</button>

            <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
        </form>
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
        document.getElementById("showname").disabled = "";
        document.getElementById("showcontact").disabled = "";
        document.getElementById("showemail").disabled = "";
        document.getElementById("showstartday").disabled = "";
        document.getElementById("showendday").disabled = "";
        document.getElementById("showstarttime").disabled = "";
        document.getElementById("showendtime").disabled = "";
        document.getElementById("showaddress").disabled = "";
        document.getElementById("showfb").disabled = "";
         document.getElementById("showtwt").disabled = "";
         document.getElementById("updateprofileImg").disabled = "";
        
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
    url: 'include/showControl.inc.php',
    data: { '[panel_id]'  : data[0] },
    dataType: "json",
    success: function(response) {
      $('#updatepanelid').val(response[0]);
      $('#panelid').html(response[0]);
      $('#showname').val(response[1]);
      $('#showcontact').val(response[2]);
      $('#showemail').val(response[3]);

       $('#showstartday').val(response[4]);
      $('#showendday').val(response[5]);
      $('#showstarttime').val(response[6]);
      $('#showshowendtime').val(response[7]);
      $('#showaddress').val(response[8]);
      $('#showshowfb').val(response[9]);
      $('#showtwt').val(response[10]);


    }
    });

});
</script>
</body>

</html>

