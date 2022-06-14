<?php
include('session.php');
if (!isset($_SESSION['login_admin1'])) {
  header("location: logout1.php");
}
$clinic = $_SESSION['clinic'];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Feedbacks | Online</title>
  <link rel="icon" href="img/tooth.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="stylesheet-new.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!--data table -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">


</head>

<body>

  <?php

  include "./navbar.php";
  include 'include/connection.php';
  include 'include/function.php';
  ?>

  <!-- Page content holder -->
  <div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- CONTENT -->





    <div>
      <h1 style="color: white;"><i class="fas fa-list-alt mr-3"></i>Feedback</h1>
    </div><br>


    <div class="container pt-3 pb-3 bg-light rounded shadow-lg">


      <h2>Send us feedback!</h2>
      What do you think about our website? Send us your feedback below.<br><hr>
      <form id="myRating">
      <strong>Ratings: </strong>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="rate1" value="1">
        <label class="form-check-label" for="inlineRadio1">★ 1</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="rate2" value="2">
        <label class="form-check-label" for="inlineRadio2">★ 2</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="rate3" value="3">
        <label class="form-check-label" for="inlineRadio3">★ 3</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="rate4" value="4">
        <label class="form-check-label" for="inlineRadio4">★ 4</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="rating" id="rate5" value="5">
        <label class="form-check-label" for="inlineRadio5">★ 5</label>
      </div><br><br>

      <input type="hidden" value="<?php echo $clinic; ?>" id="clinic_id">
      <input type="hidden" value="<?php getClinicName($conn,$clinic); ?>" id="clinic_name">
      <div class="form-group">
    <label for="exampleFormControlTextarea1"><strong>Feedback:</strong></label>
    <textarea class="form-control" id="comment" rows="3"></textarea>
  </div><br><br>
<div style="text-align:right">
  <input type="submit" class="btn btn-success" value="Submit"></input>
  </div>


    </div>


        </div>

      </div>
      </form>
    </div>


    <!-- End demo content -->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- data tables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();

      });
    </script>
    <script>
      $('#myRating').on('submit', (e) => {
      e.preventDefault();

      var clinic_name = $('#clinic_name');
      var clinic_id = $('#clinic_id');
      var rating = $('input[name="rating"]:checked');
      var comment = $('#comment');

      if((clinic_name.val() != '') &&
      (clinic_id.val() != '') &&
      (rating.val() != '')
      )
      {
        $.ajax({
          url: 'addSiteFeedback.php',
          method: 'POST',
          dataType: 'html',
          data: {
            clinic_name: clinic_name.val(),
            clinic_id: clinic_id.val(),
            rating: rating.val(),
            comment: comment.val()
          },
          success: function(response) {
            console.log(response);
            swalFunc("Feedback", "Feedback Successfully Submitted", "success", window.location.href);
            $('#myRating')[0].reset();

      }
    });
  }
      });

      function swalFunc(newtitle, text, icon, link) {
      swal({
          title: newtitle,
          text: text,
          icon: icon,
        })
        .then((responseSwal) => {
          if (responseSwal) {
            location.href = link;
          }
        });
    }
      </script>
</body>

</html>