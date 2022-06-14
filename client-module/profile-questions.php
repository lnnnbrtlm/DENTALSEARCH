<?php 

include('session.php');
if(!isset($_SESSION['login_admin'])){
	header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PROFILE | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
</head>

<body>

  <!-- NAVIGATION -->


  <!-- This will appear when client is not logged in -->

  <?php include 'navbar (logged-in).php'; 
  ?>

  <!-- This will appear when client is logged in -->

  <?php // include 'navbar (not logged-in).php';
  ?>


  <!-- HERO -->

  <div class="bgimage-4">

        <div class="container py-5">


                        <h1 class="header-1">Profile</h1>


        </div>
    </div>



  <div class="container-fluid bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 ">
          <div class="mb-4">
            <div class="card-body bg-white mt-4 border border-1">

              <div class="container text-center pt-5 pb-2">
                <div style="padding-bottom: 10px;"><img src="profile pictures/<?php
                $email = $_SESSION['login_admin'];
            $query1= "SELECT *FROM patient_record WHERE email='$email'";
            $query_run1=mysqli_query($conn,$query1);    
            while ($row=mysqli_fetch_array($query_run1)) {
              echo $row['profile_img']; }?>" alt="Avatar Logo" style="width:150px; background-color: white;" class="rounded-pill"></div>
                <h3><?php $email = $_SESSION['login_admin'];
            $query= "SELECT *FROM patient_record WHERE email='$email'";
            $query_run=mysqli_query($conn,$query);    
            while ($row1=mysqli_fetch_array($query_run)) { echo $row1['fullname']; }?></h3>
                <hr>
                <p style="font-size: 14px; margin-top: -10px; color: #0D6EFD;"><i class="fas fa-certificate"></i> Verified</p>

              </div>


            </div>
          </div>

        </div>
        <div class="col-md-9">
          <div class="mb-4">
            <div class="card-body bg-white mt-4 border border-1">

              <div class="container pt-5 pb-4">

                <h1>Profile</h1><br>

                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="profile.php">Personal Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="profile-questions.php">Questions</a>
                  </li>

                </ul><br>

                <h4>Questions</h4>

<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Question</th>
        <th>Answer</th>
        <th>Input</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Are you in good health?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" disabled></td>
      </tr>
      <tr>
        <td>Are you under medical treatment now? If so, what is the condition being treated?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>
      <tr>
        <td>Have you ever had serious illness or surgical operation? If so, what illness or operation?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>

      <tr>
        <td>Have you ever been hospitalized? If so, when and why?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>

      <tr>
        <td>Are you taking any prescription/non-prescription medication? If so, please specify</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>

      <tr>
        <td>Do you use tobacco products?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions6" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" disabled></td>
      </tr>

      <tr>
        <td>Do you use alcohol, cocaine or other dangerous drugs?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions7" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" disabled></td>
      </tr>

      <tr>
        <td>Are you allergic to any of the following:</td>
        <td>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Local Anesthetic (ex. Lidocaine)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Penicillin, Antibiotics
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Sulfa Drugs
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Aspirin
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Latex
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Others (Type what)
            </label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>

      <tr>
        <td>Bleeding Time</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions8" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>

      <tr>
        <td><b>For Women only</b></td>

      </tr>

      <tr>
        <td>Are you pregnant?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions9" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" disabled></td>
      </tr>

      <tr>
        <td>Are you nursing?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions10" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions10" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" disabled></td>
      </tr>

      <tr>
        <td>Are you taking birth control pills?</td>
        <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions11" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions11" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio3">No</label>
          </div>
        </td>
        <td><input type="answer" class="form-control" id="answer" disabled></td>
      </tr>

      <tr>
        <td>Blood type</td>
        <td></td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>

      <tr>
        <td>Blood pressure</td>
        <td></td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>

      <tr>
        <td>Do you have or have you had any of the following? Check which apply</td>
        <td>


            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            High Blood Pressure
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Low Blood Pressure
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Epilepsy / Convulsions
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            AIDS / HIV Infection
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Sexualy Transmitted disease
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Stomach Troubles / Ulcers
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Fainting Seizure
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Rapid Weight Loss
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Radiation Therapy
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Joint Replacement
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Heart Surgery
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Heart Attack
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Thyroid Problem
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Heart Disease
            </label><br>
            
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Heart Murmur
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Hepatitis / Liver Disease
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Rheumatic Fever
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Hay Fever / Allergies
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Respiratory / Problems
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Hepatitis / Jaundice
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Tuberculosis
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Swollen ankles
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Kidney disease
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Diabetes
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Chest Pain
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Stroke
            </label><br>

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Cancer / Tumors
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Anemia
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Angina
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Asthma
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Emphysema
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Bleeding Problems
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Blood Diseasesv
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Head Injuries
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Arthritis / Rheumatism
            </label><br>
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Other (Type)
            </label><br>


          </div>

          
          
        </td>
        <td><input type="answer" class="form-control" id="answer"></td>
      </tr>

    </tbody>
  </table>



              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  </div>


  <!-- FOOTER -->


  <?php include 'footer.php';
  ?>

</body>

</html>