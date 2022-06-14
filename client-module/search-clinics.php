<?php
include('conn.php');
include('session.php');
include('function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Find Dental | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link href="css/style-new.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
</head>

<body class="bg-light">

  <!-- NAVIGATION -->

  <!-- This will appear when client is not logged in -->

  <?php
  if (isset($_SESSION['login_admin'])) {
    include 'navbar (logged-in).php';
  ?>

    <!-- This will appear when client is logged in -->

  <?php } else {
    include 'navbar (not logged-in).php';
  } ?>

  <!-- HERO -->
  <?php 

if(isset($_POST['submit'])){
  
$sql = "SELECT * FROM clinic_tbl WHERE `status` = 'ACTIVE' AND (clinic_address LIKE '%".$_POST['search']."%' OR clinic_name LIKE '%".$_POST['search']."%')";
}else{
$sql = "SELECT * FROM clinic_tbl WHERE `status` = 'ACTIVE'";
}
?>
  <div class="container-flex home">
    <div class="container py-3 ">
      <form method="post">
      <h1 class="text-light">Find your preferred <strong>Dental Clinics</strong></h1>
      <input class="form-control form-control-lg mt-3" type="text" placeholder="Search location" autocomplete="off" name="search" aria-label="Search location">
      <button type="submit" name="submit"class="btn btn-primary btn-lg mt-3">Search</button>
</form>
    </div>
  </div>

<div class="container-flex py-3 bg-light" id="titleMain" style="padding-bottom:800px">
    <div class="container">
      <div class="row">

      <?php
$result = mysqli_query($conn, $sql);
      
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
echo ' 

        <div class="col-md-4 d-flex justify-content-center" style="padding-bottom: 2rem;">
          <a href="clinic.php?clinic_id='.$row['clinic_id'].'" style="text-decoration: none; color:black;">
            <div class="card h-100 mb-3 rounded" style="max-width:420px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../dc-assistant-doctor/img/'.$row["logo"].'" class="img-fluid rounded-start" style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title" >'.$row["clinic_name"].'</h5>
                    <p class="card-text" style="    display: -webkit-box;
    max-width: 390px;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden; text-align:justify">'.$row["clinic_desc"].'</p>
                    <p class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt me-3"></i>'.$row["clinic_address"].'</small></p>

                    </div>
                </div>
              </div>
            </div>
          </a>
        </div>';
      }
    } else {
      echo "0 results";
    }
    ?>


        
  </div>
  </div> 



  <!-- FOOTER -->
  </div>
<br><br>
<br>
<br><br>
<br>

<br><br>
<br>  <?php include 'footer.php';
  ?>

 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

const searchBar = document.forms['search-dental'].querySelector('input');
searchBar.addEventListener('keyup', function(e) {
  const term = e.target.value.toLocaleLowerCase();
  const books = document.getElementsByTagName('h5');
  var notAvailable = document.getElementById('notAvailable');
  $("#titleMain").toggle($('input').val().length == 0);
  var hasResults = false;
  Array.from(books).forEach(function(book) {
    const title = book.textContent;
    if (title.toLowerCase().indexOf(term) != -1) {
      book.parentElement.parentElement.style.display = 'flex';
      hasResults = true;
    } else {
      book.parentElement.parentElement.style.display = 'none';
    }
  });
  notAvailable.style.display = hasResults ? 'none' : 'block';
});


</script>
</body>

</html>
