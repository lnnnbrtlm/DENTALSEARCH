<?php
include('session.php');
include('conn.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HOME | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link href="css/style-new.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://cdn.lordicon.com/lusqsztk.js"></script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">

</head>

<body style="">

  <!-- NAVIGATION -->


  <!-- This will appear when client is not logged in -->

  <?php

  if (isset($_SESSION['login_admin'])) {
    include('navbar (logged-in).php');

  ?>
    <!-- This will appear when client is logged in -->
  <?php
  } else {
    include('navbar (not logged-in).php');
  }
  ?>


  <!-- HERO -->

 <div class="container-flex text-center" style="background: linear-gradient(to right, #00aeef , #2d388a); padding-top:150px; padding-bottom:250px;">
 <div id="outer" class="container">
  <div id="inner">
    <img src="img/hero-logo.png" style="height: 300px;" class="pb-3">
    <h1 class="text-light">Welcome to <strong>DENTAL<span style="color:#fd9f35">SEARCH</span>!</strong></h1>
    
    <p class="text-light">Find your preferred clinic to book an appointment.</p>
    <a href="search-clinics.php"><button type="button" class="btn btn-outline-warning">Find</button></a>
  </div>
</div>
 </div>
 <div class="contianer py-5" id=about>
 <div class="container pb-3">

<h1 style="font-weight:bold;">ABOUT US</h1>

<p><strong>DENTAL<span style="color:#00adee">SEARCH</span></strong> is a website and tool for both patients and dental clinics made by the group of <strong>YOKAI (Youth of Knowledge and Information)</strong> of SBIT-4R that conducted research about systems of dental clinics and come up with the solution via creating this website. </p><p> It is a tool for patients to find their preferred clinic to book an appointment. They can view the information of all the dental clinics registered on the website. Dates available for appointments will be shown. As for the dental clinics, they can register their dental clinics and manage appointments via their admin modules. </p>
 </div>
 <div class="container pb-3">

<h1 style="font-weight:bold;">FEATURES</h1>
 </div>

 <div class="container">

 <div class="row">
   <div class="col-md text-center py-2">
   <lord-icon
    src="https://cdn.lordicon.com/pvbutfdk.json"
    trigger="hover"
    style="width:150px;height:150px"
    colors="primary:#fd9f35">
</lord-icon>
<h5 style="font-weight:bold;">SEARCH</h5>
<p>Search for dental clinics.</p>
   </div>
   <div class="col-md text-center py-2">
   <lord-icon
    src="https://cdn.lordicon.com/drtetngs.json"
    trigger="hover"
    style="width:150px;height:150px"
    colors="primary:#fd9f35">
</lord-icon>

<h5 style="font-weight:bold;">BOOK</h5>
<p>Book an appointment for any clinics and services your preferred.</p>
   </div>
   <div class="col-md text-center py-2">
   <lord-icon
    src="https://cdn.lordicon.com/diyeocup.json"
    trigger="hover"
    style="width:150px;height:150px"
    colors="primary:#fd9f35">
    
</lord-icon>

<h5 style="font-weight:bold;">REGISTER</h5>
<p>Register and manage your clinic using <strong>DENTAL<span style="color:#00adee">SEARCH</span></strong>.</p>
   </div>
 </div>

 </div>
 <div class="container py-3">
<h1 style="font-weight:bold;">FAQs</h1>
 </div>

 <div class="container pb-3">
 <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
      What type of toothbrush and toothpaste should I use?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
      Buy toothbrushes with soft bristles. Medium and firm ones can damage teeth and gums. Use soft pressure, for 2 minutes, two times a day.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
      Do I really need to floss?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
      There's no getting around the need to get around your teeth daily with dental floss. It clears food and plaque from between teeth and under the gumline. If you don't, plaque hardens into tartar, which forms wedges and widens the space between teeth and gums, causing pockets. Over time, gums pull away and teeth loosen.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
      Does a rinse or mouthwash help?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
      Mouthwashes for cavity protection, sensitivity, and fresh breath may help when you use them with regular brushing and flossing -- but not instead of daily cleanings. Your dentist can recommend the best type for you.
      </div>
    </div>
  </div>
</div>
 </div>


 </div>

 <div class="container-flex py-5" style="background: linear-gradient(to right, #00aeef , #2d388a);">
  <div class="container pt-3 pb-3 text-center">

<h1 class="text-light"style="font-weight:bold;" id="team">OUR TEAM</h1>

<img src="img/yokai.png" alt="" class="src" height="150px"><br>
<small class="text-light">Youth of Knowledge and Information</small>

<hr class="text-light">
<h5 class="text-center" style="font-style:italic; color:white;">"Great things in business are never done by one person. They're done by a team of people."</h5>
<p class="text-light pt-3">We are the YOKAI's, a group of people who challege and inspire you as you spend a lot of time with us. We can share our way to make your lives much way easier and better by using our development. </p>

<p class="text-light pt-3">Keeping together is a progress, Working together is a success.</p>
<p class="text-light pt-3">We all hope that we see each worth of the work.</p>

<small><p class="text-light">- YOKAI 2022</p></small>
<!-- <img src="img/team.png" alt="" class="src" width="1000px"> -->
 </div>





 </div>

 <div class="container py-5 text-center">
 
<lord-icon
    src="https://cdn.lordicon.com/zpxybbhl.json"
    trigger="hover"
    colors="primary:#242424,secondary:#fd9f35"
    style="width:150px;height:150px">
    
</lord-icon>
<h1 style="font-weight:bold;" id=contacts>CONTACT US</h1>


<p class="pt-3"><i class="fas fa-phone me-3"></i>09991234321</p>
<p><i class="fas fa-envelope me-3"></i>yokai_youthofknwoledge@gmail.com<p>






 </div>

 



  <!-- FAQ -->

 

  <!-- FOOTER -->

  <?php include 'footer.php';
  ?>





</body>

</html>