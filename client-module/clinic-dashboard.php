<?php

include('session.php');
if (!isset($_SESSION['login_admin'])) {
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>APPOINTMENT | Dental Clinic</title>

  <link href="style.css" rel="stylesheet" />
  <link rel="icon" type="image/ico" href="img/tooth.ico" sizes="16x16">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!--data -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css  ">
  <!-- data tables -->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</head>

<style>

</style>

<body>

  <!-- NAVIGATION -->

  <!-- This will appear when client is not logged in -->

  <?php include 'navbar (logged-in).php';
  ?>

  <!-- This will appear when client is logged in -->

  <?php // include 'navbar (not logged-in).php';
  ?>

  <!-- HERO -->
  <div class="container-fluid bg-light">
    <div class="container py-5">
      <div class="card">
        <div class="card-body">

          <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Add Clinic</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Clinic List</button>
            </li>

          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <h3 class="pt-3">Dental Clinic Information</h3>
              <hr>
  
              <div class="row">
                <div class="col-md">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Dental Clinic">
                  </div>
                  <div class="mb-3">
                    <label for="specialty" class="form-label">Specialty <span class="text-muted">(Can select multiple)</span></label>
                    <select id="specialty" class="form-select" multiple aria-label="multiple select example">
                      <option selected>Open this select menu</option>
                      <option value="1">Orthodontics</option>
                      <option value="2">Pediatric</option>
                      <option value="3">Dentist</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                  </div>


                </div>

                <div class="col-md">

                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contact</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Contact number">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@email.com">
                  </div>


                  <label for="days" class="form-label">Schedule </label>
                  <div class="mb-3" id="days">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Sunday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Monday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Tuesday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Wednesday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Thursday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Friday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Saturday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Select All
                      </label>
                    </div>
                  </div>
                  <h5>Clinic Time</h5>
                  <label for="appt">Open</label>
                  <input class="me-2" type="time" id="appt" name="appt">
                  <label for="appt">Close</label>
                  <input type="time" id="appt" name="appt">
                </div>
                <h5 class="pt-3">Address</h5>
              <div class="row">
                <div class="col">

                <div class="mb-3">
                  <input type="email" class="form-control" id="" placeholder="Blk/Street No."></select>
                  </div>

                  <div class="mb-3">
                  <select type="email" class="form-control" id="region" placeholder="Street"></select>
                  </div>

                  <div class="mb-3">
                    <select type="email" class="form-control" id="province" placeholder="City"></select>
                  </div>


                </div>
                <div class="col">
                  <div class="mb-3">
                    <select type="email" class="form-control" id="city" placeholder="Barangay"></select>
                  </div>

                  <div class="mb-3">
                    <select type="email" class="form-control" id="barangay" placeholder="Zip Code"></select>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md">

                      <label for="logo" class="form-label">Logo</label>
                      <div id="logo" class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02">

                  </div>
                </div>

                <div class="col-md">
                  <label for="photo" class="form-label">Photos</label>
                  <div id="photo" class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">

                  </div>
                </div>
                
              </div>

              
           



              </div>
              <img src="img/logo1.png" height="80px">
              <div style="text-align:right;">
          <button type="button" class="btn btn-success">Add</button>
            
            </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Dental Clinic</th>
                      <th scope="col">Location</th>
                      <th scope="col">Type</th>
                      <th scope="col">Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Dental Clinic #1</th>
                      <td>Novaliches</td>
                      <td>Orthodontics</td>
                      <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fas fa-ban"></i></button></td>


                    </tr>
                    <tr>
                      <th scope="row">Dental Clinic #2</th>
                      <td>Fairview</td>
                      <td>Orthodontics</td>
                      <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fas fa-ban"></i></button></td>


                    </tr>
                    <tr>
                      <th scope="row">Dental Clinic #3</th>
                      <td>Sauyo</td>
                      <td>Orthodontics</td>
                      <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger" ><i class="fas fa-ban"></i></button></td>

                    </tr>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
          <div style="text-align:right;">
        


        </div>
        
      </div>
      



    </div>

  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Clinic</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

  
              <div class="row">
                <div class="col-md">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Dental Clinic">
                  </div>
                  <div class="mb-3">
                    <label for="specialty" class="form-label">Specialty <span class="text-muted">(Can select multiple)</span></label>
                    <select id="specialty" class="form-select" multiple aria-label="multiple select example">
                      <option selected>Open this select menu</option>
                      <option value="1">Orthodontics</option>
                      <option value="2">Pediatric</option>
                      <option value="3">Dentist</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                  </div>


                </div>

                <div class="col-md">

                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contact</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Contact number">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@email.com">
                  </div>


                  <label for="days" class="form-label">Schedule </label>
                  <div class="mb-3" id="days">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Sunday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Monday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Tuesday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Wednesday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Thursday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Friday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Saturday
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Select All
                      </label>
                    </div>
                  </div>
                  <h5>Clinic Time</h5>
                  <label for="appt">Open</label>
                  <input class="me-2" type="time" id="appt" name="appt">
                  <label for="appt">Close</label>
                  <input type="time" id="appt" name="appt">
                </div>
                <h5 class="pt-3">Address</h5>
              <div class="row">
                <div class="col">

                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Street">

                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="City">
                  </div>


                </div>
                <div class="col">
                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Barangay">
                  </div>

                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Zip Code">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md">

                      <label for="logo" class="form-label">Logo</label>
                      <div id="logo" class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02">

                  </div>
                </div>

                <div class="col-md">
                  <label for="photo" class="form-label">Photos</label>
                  <div id="photo" class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">

                  </div>
                </div>
              </div>

              
           



              </div>
              <img src="img/logo1.png" height="80px"><br>
              
              

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning">Edit</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
        <script type="text/javascript">
            
            var my_handlers = {

                fill_provinces:  function(){

                    var region_code = $(this).val();
                    $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
                    
                },

                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
                $('#region').on('change', my_handlers.fill_provinces);
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

                $('#region').ph_locations({'location_type': 'regions'});
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#region').ph_locations('fetch_list');
            });
        </script> 




  <!-- FOOTER -->

  <?php include 'footer.php';
  ?>

</body>

</html>