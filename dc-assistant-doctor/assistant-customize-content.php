<?php
include('session.php');
include 'include/connection.php';
include 'include/function.php';
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
    <title>Content | Customize</title>
    <link rel="icon" href="img/tooth.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet-new.css">
    <link rel="stylesheet" href="customize-content.css">

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
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
                class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

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
                    <a class="nav-link active" href="assistant-customize-content.php">Content</a>
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
                              <strong>Success!</strong> Content Updated.
                            </div>
                          ';
                          $_SESSION['upPatientErr'] = "";
                        }

              }
              ?>

            <h4>Homepage</h4>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="header">
                        Cheers for a healthy teeth.
                    </div>
                    <h6>(Header)</h6>
                    <div class="header-descripiton">
                        <p>It's going to be the best dental care you'll have ever had. The dental professionals here
                            will make your experience easy and hassle-free. Just relax and enjoy the services provided
                            by the dental experts.</p>
                        <h6>(Description)</h6>
                    </div>
                </div>
                <div class="col">
                    <img src="img/bg-new-hero.png" style="width:400px;">
                    
                </div>

            </div>
            <form action="include/updateContent.inc.php" method="POST" enctype="multipart/form-data">

            <?php
                $email = $_SESSION['login_admin1'];
            $query1= "SELECT *FROM content WHERE content_id= 1";
            $query_run1=mysqli_query($conn,$query1);    
            while ($row=mysqli_fetch_array($query_run1)) {
               ?>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Header</span>
                </div>
                <input type="text" aria-label="First name" id ="edit1" name = "update1" class="form-control" value="<?php echo $row['homepage_header']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description</span>
                </div>
                <input type="text" aria-label="First name" id ="edit2" name = "update2" class="form-control" value="<?php echo $row['homepage_description']; ?>" disabled>
            </div><br>
            <div class="custom-file">

           </div>

            <h4>Featured Services</h4>
            <hr>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Service 1</label>
                </div>
                <select class="custom-select"  name = "update3" id ="edit3" disabled>
                <option hidden><?php echo $row['service_one']; ?></option>
                <?php showServiceDDD($conn); ?>

                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Service 2</label>
                </div>
                <select class="custom-select"  name = "update4" id ="edit4" disabled>
                <option hidden><?php echo $row['service_two']; ?></option>
                <?php showServiceDDD($conn); ?>

                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Service 3</label>
                </div>
                <select class="custom-select" name = "update5" id="edit5" disabled>
                <option hidden><?php echo $row['service_three']; ?></option>
                <?php showServiceDDD($conn); ?>

                </select>
            </div>

            <h4>Header 2</h4>
            <hr>
            <div class="row">
                <div class="col">
          <h1 class="title-header-1">About our technologies</span></h1>
          <h6>(Header)</h6>
          <p>Learn more about our latest technology.</p>
          <h6>(Header Description)</h6>

          <div class="row ">
            <div class="col-2 text-center">
              <i class="fas fa-user-md fa-4x tech-icons"></i>
            </div>
            <div class="col-6">
              <p><span style="font-weight: bold;"> Healthcare Professionals</span><br>
              <h6>(Header 1)</h6>
              The dental procedure will be performed by highly trained dentists and our dentist's assistant who will ensure that you get the best service.</p>
              <h6>(Description 1)</h6>
            </div>
          </div><br>

          <div class="row">
            <div class="col-2 text-center">
              <i class="fas fa-medkit fa-4x tech-icons"></i>
            </div>
            <div class="col-6">
              <p><span style="font-weight: bold;"> We Provide High-Quality Care</span><br>
              <h6>(Header 2)</h6>
              We will make your experience at our Dental office pleasant and easy. From the moment you visit us, we will take the time to make you comfortable.</p>
              <h6>(Description 2)</h6>
            </div>
          </div><br>

          <div class="row">
            <div class="col-2 text-center">
              <i class="fas fa-star-of-life fa-4x tech-icons"></i>
            </div>
            <div class="col-6">
              <p><span style="font-weight: bold;"> Ready To Aid</span><br>
              <h6>(Header 3)</h6>
              When you are ready, our team is waiting to answer any questions you may have. Please feel free to book an appointment online or call our office at (0999) 123 4321 for more information.</p>
              <h6>(Description 3)</h6>
            </div>
          </div>
          </div>
          <div class="col">
          <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Header</span>
                </div>
                <input type="text" aria-label="First name" id ="edit6" name = "update6" class="form-control" value="<?php echo $row['about_tech_header']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Header Description</span>
                </div>
                <input type="text" aria-label="First name" id ="edit7" name = "update7" class="form-control" value="<?php echo $row['about_tech_description']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Header 1</span>
                </div>
                <input type="text" aria-label="First name" id ="edit8" name = "update8" class="form-control" value="<?php echo $row['about_tech_headerone']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description 1</span>
                </div>
                <input type="text" aria-label="First name" id ="edit9" name = "update9" class="form-control" value="<?php echo $row['about_tech_description_one']; ?>" disabled>
            </div><br>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Header 2</span>
                </div>
                <input type="text" aria-label="First name" id ="edit10" name = "update10" class="form-control" value="<?php echo $row['about_tech_header_two']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description 2</span>
                </div>
                <input type="text" aria-label="First name" id ="edit11" name = "update11" class="form-control" value="<?php echo $row['about_tech_description_two']; ?>" disabled>
            </div><br>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Header 3</span>
                </div>
                <input type="text" aria-label="First name" id ="edit12" name = "update12" class="form-control" value="<?php echo $row['about_tech_header_three']; ?>" disabled> 
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description 3</span>
                </div>
                <input type="text" aria-label="First name" id ="edit13" name = "update13" class="form-control" value="<?php echo $row['about_tech_description_three']; ?>" disabled>
            </div><br>


          </div>
          </div>
            

            <h4>FAQ</h4>
            <hr>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">FAQ 1</span>
                </div>
                <input type="text" aria-label="First name" id ="edit14" name = "update14" class="form-control" value="<?php echo $row['faq_one']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">FAQ 1 (ANSWER)</span>
                </div>
                <input type="text" aria-label="First name" id ="edit15" name = "update15" class="form-control" value="<?php echo $row['faq_one_answer']; ?>" disabled>
            </div><br>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">FAQ 2</span>
                </div>
                <input type="text" aria-label="First name" id ="edit16" name = "update16" class="form-control" value="<?php echo $row['faq_two']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">FAQ 2 (ANSWER)</span>
                </div>
                <input type="text" aria-label="First name" id ="edit17" name = "update17" class="form-control" value="<?php echo $row['faq_two_answer']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">FAQ 3</span>
                </div>
                <input type="text" aria-label="First name" id ="edit18" name = "update18" class="form-control" value="<?php echo $row['faq_three']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">FAQ 3 (ANSWER)</span>
                </div>
                <input type="text" aria-label="First name" id ="edit19" name = "update19" class="form-control" value="<?php echo $row['faq_three_answer']; ?>" disabled>
            </div><br>

            <h4>About Us Page</h4>
            <hr>

            <div class="row">
                <div class="col-md-6 ">
                    <img src="img/about-1.jpg" style="width: 400px; float: right;"><br>
                    
                </div>
                <div class="col-md-6">
                    <div class="header">
                        <p>Excellent Techniques For Healthy Dental Condition</p>
                        <h6>(Header)</h6>

                    </div>

                    <div class="header-descripiton" style="color: #1A1A1A;">
                        <p>The best dental health begins with a diet and a daily routine. If you can create a healthy
                            routine, you will be able to maintain good dental hygiene.</p>
                        <h6>(Description)</h6>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Header</span>
                </div>
                <input type="text" aria-label="First name" id ="edit20" name = "update20" class="form-control" value="<?php echo $row['aboutus_header']; ?>" disabled>
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Description</span>
                </div>
                <input type="text" aria-label="First name" id ="edit21" name = "update21" class="form-control" value="<?php echo $row['aboutus_description']; ?>" disabled>
            </div><br>
            <div class="custom-file">

           
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Founded on</span>
                </div>
                <input type="text" aria-label="First name" id ="edit22" name = "update22" class="form-control" value="<?php echo $row['aboutus_founded']; ?>" disabled>
            </div><br>
            </div>
            <h4>Featured Doctors</h4>
            <hr>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Doctor 1</label>
                </div>
                <select class="custom-select" name = "update23" id="edit23" disabled>
                <option hidden><?php echo $row['doctor_one']; ?></option>
                <?php showDoctorDD($conn); ?>

                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Doctor 2</label>
                </div>
                <select class="custom-select" name = "update24" id="edit24" disabled>
                <option hidden><?php echo $row['doctor_two']; ?></option>
                <?php showDoctorDD($conn); ?>

                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Doctor 3</label>
                </div>
                <select class="custom-select" name = "update25" id="edit25" disabled>
                <option hidden><?php echo $row['doctor_three']; ?></option>
                <?php showDoctorDD($conn); ?>

                </select>
            </div>

            <div style="float: right;"> <button type="button" class="btn btn-primary">Clear</button>
            <button onclick="enable()" type="button" class="btn btn-warning">Edit</button>
 
            <button type="submit" class="btn btn-success">Save</button>

        </div>
    </form>
    <?php } ?>
            </div>


    </div>

    <!--  END CONTENT -->

    </div>
    <!-- End demo content -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="main.js"></script>
    <script>
    function enable() {
        document.getElementById("edit1").disabled = "";
        document.getElementById("edit2").disabled = "";
        document.getElementById("edit3").disabled = "";
        document.getElementById("edit4").disabled = "";
        document.getElementById("edit5").disabled = "";
        document.getElementById("edit6").disabled = "";
        document.getElementById("edit7").disabled = "";
        document.getElementById("edit8").disabled = "";
        document.getElementById("edit9").disabled = "";
        document.getElementById("edit10").disabled = "";
        document.getElementById("edit11").disabled = "";
        document.getElementById("edit12").disabled = "";
        document.getElementById("edit13").disabled = "";
        document.getElementById("edit14").disabled = "";
        document.getElementById("edit15").disabled = "";
        document.getElementById("edit16").disabled = "";
        document.getElementById("edit17").disabled = "";
        document.getElementById("edit18").disabled = "";
        document.getElementById("edit19").disabled = "";
        document.getElementById("edit20").disabled = "";
        document.getElementById("edit21").disabled = "";
        document.getElementById("edit22").disabled = "";
        document.getElementById("edit23").disabled = "";
        document.getElementById("edit24").disabled = "";
        document.getElementById("edit25").disabled = "";

    }
    </script>
</body>

</html>