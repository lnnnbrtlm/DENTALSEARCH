<?php

$query1 = "SELECT * FROM control_panel WHERE panel_id= 1";
$query_run1 = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_array($query_run1)) {
?>
    <footer class="bg-dark text-white pt-4 pb-4">
        <div class="container text-center text-md-start">

            <div class="row align-items-center">
                <div class="col-md-4 col-lg-4">
                    <p>© 2022. All Rights Reserved by:</p><img src="img/yokai.png" style="width: 50px;" alt="Youth of Knowledge and Information"> <small>Youth of Knowledge and Information</small></p>
                </div>
                <div class="col-md-4 col-lg-4 text-center">
                    <img src="img/logo2.png" style="width: 60px;" alt="Youth of Knowledge and Information">
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="text-center text-md-end"> 
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>