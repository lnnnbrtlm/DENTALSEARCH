<!-- NAVIGATION -->

  <nav class="navbar navbar-expand-lg navbar-dark  py-3 px-5 bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
      <span class="text-light logo-nav">DENTAL<span style=color:#fd9f35;">SEARCH</span></span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">

          <li class="nav-item" style="margin-top:6px;">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          <li class="nav-item" style="margin-top:6px;">
            <a class="nav-link" href="index.php#about">About</a>
          </li>
          
          <li class="nav-item" style="margin-top:6px;">
            <a class="nav-link" href="index.php#team">Our Team</a>
          </li>
          
          <li class="nav-item" style="margin-top:6px;">
            <a class="nav-link" href="index.php#contacts">Contact</a>
          </li>
          
          <li class="nav-item" style="margin-top:6px;">
            <a class="nav-link" href="records-appointments.php">My Appointment</a>
          </li>
          


          <li class="nav-item">
            <a class="nav-link" href="search-clinics.php"><button class="btn btn-primary" type="button">Clinics</button></a>
          </li>
        </ul>


        <ul class="navbar-nav ms-auto">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle position-relative" href="#" role="button" data-bs-toggle="dropdown">
              <img src="profile pictures/<?php $email = $_SESSION['login_admin'];
                                                $sql = "SELECT * FROM patient_record WHERE email='$email'";
                                                $result = mysqli_query($conn, $sql);
                                                if(mysqli_num_rows($result)>0){
                                                  while($row = mysqli_fetch_assoc($result)) {
                                                    if($row['profile_img'] == ""){
                                                      echo 'placeholder.png';
                                                    }else{
                                                    echo $row['profile_img'];  } }
                                                    
                                                    } ?>" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
              <span class="visually-hidden">Unread Notifications</span></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="records-x-ray.php">My X-rays</a></li>
              <hr>
              <li><a class="dropdown-item" href="logout.php">Log-out</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <!-- END NAVIGATION -->
