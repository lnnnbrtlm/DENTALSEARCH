<?php
include('session.php');
include('conn.php');
if (isset($_SESSION['login_admin1'])) {
 header("location: ../dc-assistant-doctor/index-branch-picker.php");
}
if (isset($_SESSION['login_admin'])) {
  header("location: index.php");
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="img/tooth.ico">
    <link rel="stylesheet" href="login-style.css">
    <title>LOGIN | DENTALSEARCH</title>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">

        <form class="login-form text-center" method="post">
        <?php include('loginvalidation.php') ?>

                <div class="mb-5"><span class="text-dark mx-1 logo-nav">DENTAL<span style="color:#fd9f35">SEARCH</span></span><br>
                <p>For Patient</p></div>

            
                    <?php include('errors.php'); ?>
            <div class="form-group">
                <input type="email" class="form-control rounded-pill form-control-lg" name="email"
                    placeholder="Email" id="email" onKeyDown="limitText(this,100);" 
onKeyUp="limitText(this,100)">
            </div>
            <div class="form-group">
                
<div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" name="password" id="password" placeholder="Password" onKeyDown="limitText(this,30);" 
onKeyUp="limitText(this,30)">
            </div>
            
            <div class="forgot-link form-group d-flex justify-content-between align-items-center">
                
                <a href="index-login-forget-1.php">Forgot Password?</a>
            </div>
            <button type="submit" <?php echo $msg1; ?> onclick="myFunction()" name="loginsubmit" value="login"
                class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
            <p class="mt-3 font-weight-normal">Not registered?
            <a href="registration-1.php"><strong> Register here.</strong></a></p>
                    <div id="result"><?php echo $msg;?></div>

                    <a href="../dc-assistant-doctor/index.php"><p style="font-size:20px; font-weight:bold; text-decoration: underline;" class="text-muted">Login as Admin</p><a>
        </form>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
     <script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>
</body>


</html>

