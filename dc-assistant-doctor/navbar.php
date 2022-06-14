<?php
if (isset($_SESSION['clinic'])) {
    $clinic = $_SESSION['clinic'];
    $sqlcName = "SELECT * FROM clinic_tbl WHERE clinic_id ='$clinic'";
    $result = mysqli_query($conn, $sqlcName);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nClinic = $row['clinic_name'];
        }
    }
} else {
    $nClinic = "";
}
?>
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar" >

    <!-- DENTAL CLINIC LOGO -->
    <div class="logo-top py-3">


        <span class="text-light logo-nav">DENTAL</span><span class="logo-nav" style="color:#fd9f35;">SEARCH</span>

    </div>

    <!-- DENTAL CLINIC LOGO END -->
    <div class="py-4 px-3 mb-2 bg-light">
        <div class="media d-flex align-items-center">
            <div class="media-body">
                <h3><b style="color: black;"> <?php echo $nClinic; ?> </b></h3>
                <h4 class="m-0"><?php
                                if ($_SESSION['user_type'] == 'Admin') {
                                    $email = $_SESSION['login_admin1'];
                                    $query1 = "SELECT *FROM user_accounts WHERE email='$email'";
                                    $query_run1 = mysqli_query($conn, $query1);
                                    while ($row = mysqli_fetch_array($query_run1)) {
                                        echo $row['last_name'] . ", " . $row['first_name'] . " " . $row['middle_name'];
                                    }
                                }
                                if ($_SESSION['user_type'] == 'ClinicAdmin') {
                                } ?></h4>
                <p class="font-weight-normal text-muted mb-0"><?php
                                                                $email = $_SESSION['login_admin1'];
                                                                $query1 = "SELECT *FROM user_accounts WHERE email='$email'";
                                                                $query_run1 = mysqli_query($conn, $query1);
                                                                while ($row = mysqli_fetch_array($query_run1)) {
                                                                    echo $row['user_type'];
                                                                } ?></p>

            </div>

        </div>



    </div>
    
    <!--notification -->
    <?php 
    if(isset($_SESSION['clinic'])){

    
    ?>
     <ul class="nav navbar-nav navbar-left"  >
      <li class="dropdown" >
       <a href="#" style="text-decoration: none;" data-toggle="dropdown"><i class="fa fa-bell text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0" aria-hidden="true">Notifications</i>
       <?php
       $n = 0;
       $sqlNotif1 = mysqli_query($conn, "SELECT COUNT(*) as totalnum from appointments  WHERE `notif` ='2' AND clinic_id ='$clinic'");
       $actNotif1 = mysqli_query($conn, "SELECT COUNT(*) as totalnums from clinic_tbl  WHERE `verify_status` ='2' AND clinic_id ='$clinic'");
       $actNotif2 = mysqli_query($conn, "SELECT COUNT(*) as totalnumber from clinic_tbl  WHERE `verify_status` ='5' AND clinic_id ='$clinic'");
       while($res1=mysqli_fetch_array($actNotif1)){
        $nums = $res1['totalnums'];
        $n = $n + $nums;
       }
       while($res2=mysqli_fetch_array($actNotif2)){
        $number = $res2['totalnumber'];
        $n = $n + $number;
       }
       while($result1=mysqli_fetch_array($sqlNotif1)){
           $num = $result1['totalnum'];
           $n = $n + $num;
           if($n == 0){
            echo '
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" style="padding-left: 10px;">
            <li style="word-wrap: break-word;
   width: 235px;">There is no notifications.</li></ul>';

           }else{
               
           
       ?>
       <span class="badge" style="
  position: absolute;
  top: -5px;
  right: 50px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
">
<?php
    $t = 0;
    $sqlNotif = mysqli_query($conn, "SELECT COUNT(*) as total from appointments  WHERE `notif` =2 AND clinic_id='$clinic'");
    while($result=mysqli_fetch_array($sqlNotif)){
       $to = $result["total"];
       $t = $t + $to;
    }
    $actNotif = mysqli_query($conn, "SELECT COUNT(*) as totals from clinic_tbl  WHERE `verify_status` =2 AND clinic_id='$clinic'");
    while($result1=mysqli_fetch_array($actNotif)){
        $tot = $result1["totals"];
        $t = $t + $tot;
     }
     $actNotif5 = mysqli_query($conn, "SELECT COUNT(*) as total1 from clinic_tbl  WHERE `verify_status` =5 AND clinic_id='$clinic'");
    while($result2=mysqli_fetch_array($actNotif5)){
        $totnum = $result2["total1"];
        $t = $t + $totnum;
     }
     echo $t;
?>
</span><?php
}
}
?></a>
       <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" style="padding-left: 10px; padding-right: 10px;">
        <?php
        $notifs4 = mysqli_query($conn, "SELECT * from clinic_tbl  WHERE `verify_status` =2 AND clinic_id='$clinic'");
        if(mysqli_num_rows($notifs4)>0){
        while($results=mysqli_fetch_assoc($notifs4)){
            echo '<li style="word-wrap: break-word;
        width: 225px; margin-bottom: 10px; background:#1E90FF; :hover:" class="border-bottom"><a class="dropdown-item" href="assistant-index.php?verify_status='.$results['verify_status'].'" name="removeNotif"><i class="fa fa-exclamation  mr-2" aria-hidden="true"></i>This clinic is<br>successfully verified.</strong></a></li>';
        }
            }
            $notifs = mysqli_query($conn, "SELECT * from appointments  WHERE `notif` =2 AND clinic_id='$clinic' ORDER BY `appointment_refno` DESC LIMIT 5");
            if(mysqli_num_rows($notifs)>0){
            while($result=mysqli_fetch_assoc($notifs)){
                echo '<li style="word-wrap: break-word;
   width: 225px; margin-bottom: 10px; background:#fd9f35; :hover:" class="border-bottom"><a class="dropdown-item" href="assistant-appointment_list.php?appointment_refno='.$result['appointment_refno'].'" name="removeNotif"><i class="fa fa-exclamation  mr-2" aria-hidden="true"></i>New appointment<br>reservation for <br><strong>'.$result["patient_name"].'</strong></a></li>';
     }
        }
        $notif5 = mysqli_query($conn, "SELECT * from clinic_tbl  WHERE `verify_status` =5 AND clinic_id='$clinic'");
            if(mysqli_num_rows($notif5)>0){
            while($result1=mysqli_fetch_assoc($notif5)){
                echo '<li style="word-wrap: break-word;
   width: 225px; margin-bottom: 10px; background:#8B0000;" class="border-bottom"><a class="dropdown-item" href="assistant-index.php" name="removeNotif"><i class="fa fa-exclamation  mr-2" aria-hidden="true"></i>This Clinics Request<br>for verification is<br><strong>Denied</strong>.<br> Contact us for further<br> verification.</a></li>';
     }
        }
        ?>
       </ul>
      </li>
     </ul>
       <?php
    }else{
      ?>
      <ul class="nav navbar-nav navbar-left">
      <li class="dropdown" >
       <a href="#" style="text-decoration: none;" data-toggle="dropdown"><i class="fa fa-bell text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0" aria-hidden="true">Notifications</i>
       <?php
       $actNotif1 = mysqli_query($conn, "SELECT COUNT(*) as totalnums from clinic_tbl  WHERE `verify_status` ='0'");
       while($res1=mysqli_fetch_array($actNotif1)){
        $nums = $res1['totalnums'];
          if($nums == 0){
            echo '
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" style="padding-left: 10px;">
            <li style="word-wrap: break-word;
   width: 235px;">There is no notifications.</li></ul>';

           }else{
               
           
       ?>
       <span class="badge" style="
  position: absolute;
  top: -5px;
  right: 50px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
">
<?php
    $t = 0;

    $actNotif = mysqli_query($conn, "SELECT COUNT(*) as totals from clinic_tbl  WHERE `verify_status` =0");
    while($result1=mysqli_fetch_array($actNotif)){
        $tot = $result1["totals"];
        $t = $t + $tot;
     }
     echo $t;
?>
</span><?php
}
}
?></a>
       <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" style="padding-left: 10px; padding-right: 10px;">
        <?php
        $notifs4 = mysqli_query($conn, "SELECT * from clinic_tbl  WHERE `verify_status` =0 LIMIT 5");
        if(mysqli_num_rows($notifs4)>0){
        while($results=mysqli_fetch_assoc($notifs4)){
            echo '<li style="word-wrap: break-word;
        width: 225px; margin-bottom: 10px; background:#fd9f35; :hover:" class="border-bottom"><a class="dropdown-item" href="admin-clinic.php?clinic_id='.$results['clinic_id'].'" name="removeNotif"><i class="fa fa-exclamation  mr-2" aria-hidden="true"></i>New Clinic has<br>been registered as<br><strong>'.$results['clinic_name'].'</strong></a></li>';
        }
            }
           
        ?>
       </ul>
      </li>
     </ul>
<?php
    }
       ?>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Home</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="assistant-index.php" class="nav-link text-dark bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Dashboard
            </a>
    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Transactions</p>

    <ul class="nav flex-column bg-white mb-0">
        <?php
        $email = $_SESSION['login_admin1'];
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <li class="nav-item">
                <a href="assistant-patient_list.php" class="nav-link text-dark">
                    <i class="fas fa-user mr-3 text-primary fa-fw"></i>
                    Patient
                </a>
            </li>
        <?php }
        $email = $_SESSION['login_admin1'];
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <li class="nav-item">
                <a href="assistant-appointment_list.php" class="nav-link text-dark">
                    <i class="fas fa-calendar mr-3 text-primary fa-fw"></i>
                    Appointment
                </a>
            </li>

            </li>
        <?php } ?>
        <?php
        $email = $_SESSION['login_admin1'];
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <li class="nav-item">
                <a href="assistant-billing_appointments.php" class="nav-link text-dark">
                    <i class="fas fa-money-bill mr-3 text-primary fa-fw"></i>
                    Billing
                </a>
            </li>
        <?php }
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <li class="nav-item">
                <a href="assistant-billing_appointments.php" class="nav-link text-dark">
                    <i class="fas fa-money-bill mr-3 text-primary fa-fw"></i>
                    Payment
                </a>
            </li>


        <?php }
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <li class="nav-item">
                <a href="admin-clinic.php" class="nav-link text-dark">
                    <i class="fas fa-file mr-3 text-primary fa-fw"></i>
                    Clinic List
                </a>
            </li>
        <?php }
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>

            <li class="nav-item">
                <a href="admin-registered-user.php" class="nav-link text-dark">
                    <i class="fas fa-user mr-3 text-primary fa-fw"></i>
                    Registered User
                </a>
            </li>
        <?php }
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>

            <li class="nav-item">
                <a href="assistant-customize-backup.php" class="nav-link text-dark">
                    <i class="fas fa-folder mr-3 text-primary fa-fw"></i>
                    Backup
                </a>
            </li>

        <?php } ?>
    </ul>


    <?php
    $email = $_SESSION['login_admin1'];
    $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    ?>
        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Data Management</p>

        <ul class="nav flex-column bg-white mb-0">



        <?php }
    $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        ?>

            
            <li class="nav-item">
                <a href="assistant-feedback-clinic.php" class="nav-link text-dark">
                    <i class="fas fa-folder mr-3 text-primary fa-fw"></i>
                    Feedback
                </a>
            </li>
            
<li class="nav-item">
                <a href="admin-archive.php" class="nav-link text-dark">
                    <i class="fas fa-trash mr-3 text-primary fa-fw"></i>
                    Archive
                </a>
            </li>
            
            
            
        <?php } ?>

    

        <?php
        $email = $_SESSION['login_admin1'];
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Data Management</p>

            <ul class="nav flex-column bg-white mb-0">



            <?php }
        $email = $_SESSION['login_admin1'];
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Doctor'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            ?>
                <li class="nav-item">
                    <a href="assistant-doctors.php" class="nav-link text-dark">
                        <i class="fas fa-user-md mr-3 text-primary fa-fw"></i>
                        Doctors
                    </a>
                </li>
            <?php }

        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            ?>
                <li class="nav-item">
                    <a href="assistant-doctors.php" class="nav-link text-dark">
                        <i class="fas fa-user-md mr-3 text-primary fa-fw"></i>
                        Doctors
                    </a>
                </li>
            <?php }
            
            $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            ?>
                <li class="nav-item">
                    <a href="assistant-profile.php" class="nav-link text-dark">
                        <i class="fa fa-key mr-4 text-primary" aria-hidden="true"></i>Profile
                    </a>
                </li>
            <?php }
            

        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            ?>
                <li class="nav-item">
                    <a href="assistant-clinic-management.php" class="nav-link text-dark">
                        <i class="fas fa-list-alt mr-3 text-primary fa-fw"></i>
                        Clinic Management
                    </a>
                </li>
            <?php }
        $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            ?>
                <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Reports</p>

                <ul class="nav flex-column bg-white mb-0">

                    <li class="nav-item">
                        <a href="assistant-report.php" class="nav-link text-dark">
                            <i class="fas fa-copy mr-3 text-primary fa-fw"></i>
                            Report
                        </a>
                    </li>
                <?php } ?>
                </ul>
                <?php
                $email = $_SESSION['login_admin1'];
                $sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='ClinicAdmin'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Settings</p>

                    <ul class="nav flex-column bg-white mb-0">




                        <li class="nav-item">
                            <a href="assistant-feedback.php" class="nav-link text-dark">
                                <i class="fas fa-list-alt mr-3 text-primary fa-fw"></i>
                                Feedbacks
                            </a>
                        </li>



                        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0"></p>
                        <ul class="nav flex-column bg-white mb-0">

                            <li class="nav-item">
                           <!-- here -->
                            <hr>
                            </ul>
                            <li class="nav-item">
                                <a href="website-feedback.php" class="nav-link text-dark">
                                    <i class="fa fa-commenting-o mr-3 text-primary" aria-hidden="true"></i><small>Send us feedback!</small>
                                </a>
                            </li>
                             <?php } ?>
                             <ul class="nav flex-column bg-white mb-0">
                             <li class="nav-item">
                            <a href="logout1.php" class="nav-link text-dark">

                                <i class="fas fa-sign-out-alt mr-3 text-primary fa-fw"></i>

                                Log-out
                            </a>
                            </li>

                        </ul>


</div>
<!-- End vertical navbar -->
</php>