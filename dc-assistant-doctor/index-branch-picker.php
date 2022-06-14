<?php
include('session.php');
include('include/function.php');
if (!isset($_SESSION['login_admin1'])) {
    header("location: logout1.php");
}
$user_id = $_SESSION['user_id'];

if(isset($_POST['chooseClinic'])){
    if(!empty($_POST['clinic'])){
    $clinic = $_POST['clinic'];
    $_SESSION['clinic'] = $clinic;
    $_SESSION['user_type'] = 'ClinicAdmin';
    }else{
        $_SESSION['clinic'] = null;
    }

header('location: assistant-index.php');
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="img/tooth.ico">
    <link rel="stylesheet" href="login-style.css">
    <title>LOGIN | Dental Clinic</title>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">

        <form class="login-form text-center" method="post">


            <div class="mb-5"><span class="text-light mx-1 logo-nav">DENTAL<span style="color:#fd9f35;">SEARCH</span></div>
            <div class="form-group">
                <select style="height:40px; width:320px;" id="clinic" name="clinic" class="form-select rounded-pill text-center" aria-label="Default select example">
                    <option value='' selected>Choose Clinic</option>
                    <?php showClinicDD($conn,$user_id); ?>
                </select>
            </div>

            <input type="submit" id="submit" name="chooseClinic" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" value="Submit"></input>
            <p class="mt-3 font-weight-normal">Add clinic. <a href="index-add-clinic.php"><strong>Add</strong></a></p><br>
            <a href="logout1.php"><button type="button" href="logou1.php" class="btn btn-outline-warning">Logout</button>
        </a>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript">
        function limitText(limitField, limitNum) {
            if (limitField.value.length > limitNum) {
                limitField.value = limitField.value.substring(0, limitNum);
            }
        }
    </script>
    <script>
        $( document ).ready(function() {
            $(':input[type="submit"]').prop('disabled', true);
            $('#clinic').change(function() {
                if ($('#clinic').val() != ''){
                    $(':input[type="submit"]').prop('disabled', false);
                }else{
                $(':input[type="submit"]').prop('disabled', true);
                }
});
});
        </script>
</body>

</html>