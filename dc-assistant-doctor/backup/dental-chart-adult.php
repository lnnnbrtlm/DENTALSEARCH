

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/tooth.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Chart | Adult</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="dental.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.10.2/css/all.css">

    <style>
        #selectAll {
            top: 0
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid d-flex justify-content-around">
            <a href="dental-chart-picker.php" style="text-decoration: none; color: white;"><i class="fas fa-long-arrow-alt-left fa-2x"></i></a>
        </div>
        <div class="container-fluid  d-flex justify-content-around">
            <h2 style="color: white;">Dental Chart</h2>
        </div>
        <div class="container-fluid  d-flex justify-content-around">
            <a href="#" style="text-decoration: none; color: white;">Reset</a>
        </div>

    </nav>

    <!-- END NAVBAR -->


    
    <div class="bg-light">
        <div class="container-lg py-5">
            <h3 style="text-align: center;">Upper Teeth</h3>
            <table class="table ">
                <tbody>
                    <tr>
                        <td>
                            <h6>Proc</h6>
                        </td>
                        <?php
                        for ($i = 1; $i < 17; $i++) {
                            echo '<td><input class="form-control temp" id="upper1" type="text" value="' . showToothPro($conn, $_GET['ref_no'], $i) . '" readonly></td>';
                        }
                        ?>
                    </tr>

                    <tr>
                        <td>
                            <h6>Cond</h6>
                        </td>
                        <?php
                        for ($i = 1; $i < 17; $i++) {
                            echo '<td><input class="form-control temp" type="text" value="' . showToothCond($conn, $_GET['ref_no'], $i) . '" readonly></td>';
                        }
                        ?>

                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th scope="col"><span style="padding-left: 20px;">1</span></th>
                        <th scope="col"><span style="padding-left: 20px;">2</span></th>
                        <th scope="col"><span style="padding-left: 20px;">3</span></th>
                        <th scope="col"><span style="padding-left: 20px;">4</span></th>
                        <th scope="col"><span style="padding-left: 20px;">5</span></th>
                        <th scope="col"><span style="padding-left: 20px;">6</span></th>
                        <th scope="col"><span style="padding-left: 20px;">7</span></th>
                        <th scope="col"><span style="padding-left: 20px;">8</span></th>
                        <th scope="col"><span style="padding-left: 20px;">9</span></th>
                        <th scope="col"><span style="padding-left: 15px;">10</span></th>
                        <th scope="col"><span style="padding-left: 15px;">11</span></th>
                        <th scope="col"><span style="padding-left: 15px;">12</span></th>
                        <th scope="col"><span style="padding-left: 15px;">13</span></th>
                        <th scope="col"><span style="padding-left: 15px;">14</span></th>
                        <th scope="col"><span style="padding-left: 15px;">15</span></th>
                        <th scope="col"><span style="padding-left: 15px;">16</span></th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <!--<td><img class="tooth" src="img/upper/1.png"></td>
                        <td><img class="tooth" src="img/upper/2.png"></td>
                        <td><img class="tooth" src="img/upper/3.png"></td>
                        <td><img class="tooth" src="img/upper/4.png"></td>-->
                        <!--<td><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second'))"><img class="tooth" src="img/upper/5.png"></button></td>-->
                        <td><button class="buttont" type="button" value="1" id="tooth" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this); change(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/1.png"></a></button></td>
                        <td><button class="buttont" type="button" value="2" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/2.png"></a></button></td>
                        <td><button class="buttont" type="button" value="3" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/3.png"></a></button></td>
                        <td><button class="buttont" type="button" value="4" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/4.png"></a></button></td>
                        <td><button class="buttont" type="button" value="5" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/5.png"></a></button></td>
                        <td><button class="buttont" type="button" value="6" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/6.png"></a></button></td>
                        <td><button class="buttont" type="button" value="7" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/7.png"></a></button></td>
                        <td><button class="buttont" type="button" value="8" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/8.png"></a></button></td>
                        <td><button class="buttont" type="button" value="9" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/9.png"></a></button></td>
                        <td><button class="buttont" type="button" value="10" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/10.png"></a></button></td>
                        <td><button class="buttont" type="button" value="11" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/11.png"></a></button></td>
                        <td><button class="buttont" type="button" value="12" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/12.png"></a></button></td>
                        <td><button class="buttont" type="button" value="13" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/13.png"></a></button></td>
                        <td><button class="buttont" type="button" value="14" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/14.png"></a></button></td>
                        <td><button class="buttont" type="button" value="15" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/15.png"></a></button></td>
                        <td><button class="buttont" type="button" value="16" id="tooth" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/upper/16.png"></a></button></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 1 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='1'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- color changer for tooth 2 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='2'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!--- END -------------->

                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 1 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='3'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->

                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">

                                <!-- COLOR CHANGER FOR TOOTH 4 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='4'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">

                                <!-- COLOR CHANGER FOR TOOTH 5 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='5'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">

                                <!-- COLOR CHANGER FOR TOOTH 6 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='6'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 7 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='7'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 8 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='8'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 9 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='9'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 10 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='10'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 11 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='11'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 12 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='12'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 13 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='13'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 14 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='14'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 15 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='15'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 16 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='16'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                    </tr>
                </tbody>
            </table>


            <hr>
            <table class="table ">

                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 32 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='32'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 31 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='31'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 30 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='30'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 29 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='29'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 28 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='28'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 27 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='27'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 26 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='26'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 25 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='25'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 24 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='24'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 23 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='23'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 22 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='22'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 21 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='21'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 20 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='20'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 19 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='19'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 18 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='18'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                        <td style="padding: 0; margin: 0;">
                            <div class="container" style="padding: 0; margin: 0;">
                                <!-- COLOR CHANGER FOR TOOTH 17 ---------------------->
                                <?php

                                $refno = $_GET['ref_no'];
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='17'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $left = $row['left_side'];
                                        $right = $row['right_side'];
                                        $top = $row['top_side'];
                                        $back = $row['back_side'];
                                        $front = $row['front_side'];
                                    }
                                } else {
                                    $left = "";
                                    $right = "";
                                    $top = "";
                                    $back = "";
                                    $front = "";
                                }
                                ?>
                                <button class="surface1" disabled></button>
                                <?php
                                switch ($back) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>
                                <?php
                                switch ($left) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($top) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                switch ($right) {
                                    case "":
                                        echo " <button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo " <button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <br>

                                <button class="surface1" disabled></button>
                                <?php
                                switch ($front) {
                                    case "":
                                        echo "<button class='surface'></button>";
                                        break;
                                    case 1:
                                        echo "<button class='surface' style='background-color: black;'></button>";

                                        break;
                                }
                                ?>
                                <button class="surface1" disabled></button><br>

                            </div>
                        </td>
                        <!-- END ------->
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td><button class="buttont" type="button" value="32" id="lower1" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/1.png"></a></button></td>
                        <td><button class="buttont" type="button" value="31" id="lower2" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/2.png"></a></button></td>
                        <td><button class="buttont" type="button" value="30" id="lower3" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/3.png"></a></button></td>
                        <td><button class="buttont" type="button" value="29" id="lower4" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/4.png"></a></button></td>
                        <td><button class="buttont" type="button" value="28" id="lower5" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/5.png"></a></button></td>
                        <td><button class="buttont" type="button" value="27" id="lower6" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/6.png"></a></button></td>
                        <td><button class="buttont" type="button" value="26" id="lower7" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/7.png"></a></button></td>
                        <td><button class="buttont" type="button" value="25" id="lower8" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/8.png"></a></button></td>
                        <td><button class="buttont" type="button" value="24" id="lower9" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/9.png"></a></button></td>
                        <td><button class="buttont" type="button" value="23" id="lower10" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/10.png"></a></button></td>
                        <td><button class="buttont" type="button" value="22" id="lower11" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/11.png"></a></button></td>
                        <td><button class="buttont" type="button" value="21" id="lower12" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/12.png"></a></button></td>
                        <td><button class="buttont" type="button" value="20" id="lower13" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/13.png"></a></button></td>
                        <td><button class="buttont" type="button" value="19" id="lower14" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/14.png"></a></button></td>
                        <td><button class="buttont" type="button" value="18" id="lower15" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/15.png"></a></button></td>
                        <td><button class="buttont" type="button" value="17" id="lower16" onclick="smoothScroll(document.getElementById('second'));  CopyToLabel(this)"><a href="#" onclick="setImg(this)"><img class="tooth" src="img/lower/16.png"></a></button></td>

                    </tr>

                    <tr>
                        <th>&nbsp;</th>
                        <th scope="col"><span style="padding-left: 15px;">32</span></th>
                        <th scope="col"><span style="padding-left: 15px;">31</span></th>
                        <th scope="col"><span style="padding-left: 15px;">30</span></th>
                        <th scope="col"><span style="padding-left: 15px;">29</span></th>
                        <th scope="col"><span style="padding-left: 15px;">28</span></th>
                        <th scope="col"><span style="padding-left: 15px;">27</span></th>
                        <th scope="col"><span style="padding-left: 15px;">26</span></th>
                        <th scope="col"><span style="padding-left: 15px;">25</span></th>
                        <th scope="col"><span style="padding-left: 15px;">24</span></th>
                        <th scope="col"><span style="padding-left: 15px;">23</span></th>
                        <th scope="col"><span style="padding-left: 15px;">22</span></th>
                        <th scope="col"><span style="padding-left: 15px;">21</span></th>
                        <th scope="col"><span style="padding-left: 15px;">20</span></th>
                        <th scope="col"><span style="padding-left: 15px;">19</span></th>
                        <th scope="col"><span style="padding-left: 15px;">18</span></th>
                        <th scope="col"><span style="padding-left: 15px;">17</span></th>

                    </tr>


                    <tr>
                        <td>
                            <h6>Cond</h6>
                        </td>
                        <?php
                        for ($i = 32; $i > 16; $i--) {
                            echo '<td><input class="form-control temp" type="text" value="' . showToothCond($conn, $_GET['ref_no'], $i) . '" readonly></td>';
                        }
                        ?>

                    </tr>
                    <tr>
                        <td>
                            <h6>Proc</h6>
                        </td>
                        <?php
                        for ($i = 32; $i > 16; $i--) {
                            echo '<td><input class="form-control temp" type="text" value="' . showToothPro($conn, $_GET['ref_no'], $i) . '" readonly></td>';
                        }
                        ?>

                    </tr>







                </tbody>


            </table>

            <h3 style="text-align: center;">Lower Teeth</h3>



            <div>

            </div>

        </div>
    </div>

    <div class="bgimage py-5">
        <h2 id="second" style="text-align: center; color: white;"><i class="fas fa-tooth"></i> Tooth Information</h2>
    </div>

    <div class="container-lg py-5">


        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="#">
                            <h3>Patient Information</h3>
                            <label for="pid" class="form-label">Appointment Reference No.: </label>
                            <input id="pid" class="form-control" type="text" value="<?php echo $appointment_refno; ?>" disabled readonly><br>
                            <label for="name" class="form-label">Patient Name: </label>
                            <input class="form-control" id="patientname1" onload="copyText(this)" type="text" name='patientname1' value="<?php echo $patient_name; ?>" readonly /><br>

                            <hr>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medical-history">
                                Medical History
                            </button>

                    </div>
                </div>
            </div>

            <div class="col-md-8">

                <div class="card">
                    <div class="card-body ">

                        <div class="row ">
                            <div class="col">
                                <input type="hidden" name="ref_no" id="ref_no" value="<?php echo $_GET['ref_no'] ?>">
                                <input type="hidden" name="patientname2" id="patientname2" value="<?php echo $patient_name; ?>">
                                <center>Selected tooth #: <input type="text" name="toothNumber" id="selectedTooth" style="font-weight: bold; border: none;" value=""></input><br>
                                    <span style="font-weight: bold;"></span><br>
                                    <!--<img style="height: 80px; padding-top: 20px;" src="img/upper/5.png">-->
                                    <img id="ImageFrame" src="img/upper/select.png" height="80px" />
                                </center>
                            </div>
                            <div class="col">
                                <center>Surface:<br><br>
                                    <div class="container">


                                        <button class="surface1" disabled></button>
                                        <button class="surface" id="surface-back"></button>
                                        <button class="surface1" disabled></button><br>

                                        <button class="surface" id="surface-left"></button>
                                        <button class="surface" id="surface-top"></button>
                                        <button class="surface" id="surface-right"></button><br>

                                        <button class="surface1" disabled></button>
                                        <button class="surface" id="surface-front"></button>
                                        <button class="surface1" disabled></button><br>

                                    </div>
                                </center>
                            </div>
                        </div>


                        <hr>

                        <label for="surface" class="form-label">Selected Surface: </label>
                        <select for="surface" class="form-select" name="position" aria-label="Default select example" id="position">
                            <option selected>Select</option>
                            <option value="top">Top</option>
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                            <option value="back">Back</option>
                            <option value="front">Front</option>

                        </select><br>

                        <hr>


                        <label for="condition" class="form-label">Condition:</label>
                        <select for="condition" name="condition" class="form-select" id="conditionSelect" aria-label="Default select example">
                            <option selected>Select</option>
                            <?php showAllToothCond($conn); ?>
                        </select><br>

                        <label for="rp" class="form-label">Restorations & Prosthetics:</label>
                        <select for="rp" name="procedure" class="form-select" id="restoSelect" aria-label="Default select example">
                            <option selected>Select</option>
                            <?php showAllToothPro($conn); ?>

                        </select><br>

                        <button style="" name="submit" type="submit" class="btn btn-success" value="Save">Submit</button>
                        </form>
                        <button style="float: right;" name="submit" type="button" onclick="saveChart()" class="btn btn-danger" value="Save">Save</button>
                    </div>
                </div>

            </div>
        </div>




        <!-- Modal -->
        <div class="modal fade" id="medical-history" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Medical History</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php include 'questions-output.php'; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





    </div>
    </div>
    </div>

    <div class="container-fluid bgimage2 py-5">
        <h2 style="text-align: center; color: white;"><i class="fas fa-teeth-open"></i> Planned Procedures</h2>
    </div>
    <div class="container py-5">
        <div class="card ">
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Service</th>
                            <th scope="col">Tooth</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date Completed</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        showDentalTable($conn, $_GET['ref_no']);
                        /*
                    $ref_no = $_GET['ref_no'];

                    
                    $sql = "SELECT * FROM dentalchart WHERE ref_no = '$ref_no'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  ?><tr>
          <form method='POST' action='include/modifyDentalStatus.inc.php'>
          <td name='ref_no' value='<?php echo $row['ref_no']; ?>'><?php echo $row['ref_no']; ?></td>
          <td><?php echo $row['patient_id']; ?></td>
          <td><?php echo $row['patient_name']; ?></td>
          <td><?php echo $row['pro_legend']." ".$row['t_procedure'];?></td>
          <td><?php echo $row['tooth_id']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <?php

          if($row['status'] == 'Planned'){
            ?>
            <input type='hidden' name='ref' value='<?php echo $row['ref_no']; ?>'/>
            <input type='hidden' name='stats' value='<?php echo $row['status']; ?>'/>
          <td>
          <span  name="status" value='<?php echo $row['status']; ?>' class='badge bg-secondary'><?php echo $row['status']; ?></span></td>
          <td><?php echo $row['dentaldate']; ?></td>
          <td>
          <button type='submit' name='toProgress' class='btn btn-primary'><i class='fas fa-spinner'></i></button>
                          </form></td>
                          </tr>
            <?php
                        }if($row['status'] == 'In Progress'){
            ?>
            <td><span class='badge bg-primary'><?php echo$row['status']; ?></span></td><td><?php echo $row['dentaldate']; ?></td>
                    <td><button type='button' class='btn btn-success'><i class='fas fa-check'></i></button>
                            </td>
                            </tr>
                            <?php
          }if($row['status'] == 'Completed'){
            ?>
            <td><span class='badge bg-success'><?php echo $row['status']; ?>"</span></td><td><?php echo $row['dentaldate']; ?>"</td>
                            </td>
                            </tr>

                            <?php

             }

    }
  }
  
  */ ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <center>
            <h3 style="color: white;">DENTAL CLINIC</h3>
            <p style="color: white;">Current Date and Time is <span id='date-time'></span>.</p>
        </center>
    </footer>
    <script type="text/javascript">
        function copyText(b) {
            //Reference the TextBox.

            //Reference the Label.
            var lblName1 = document.getElementById("patientname2");
            // get input value
            //Copy the TextBox value to Label.
            lblName1.value = b.value;
        }
    </script>


    <script>
        var selectedSurface = '';
        var selectedSurfaceColor = '';

        $('#optionSurface').change(function() {
            selectedSurface = $('#optionSurface').find(":selected").text();
            selectedSurfaceColor = '';
        });

        $('#optionSurfaceColor').change(function() {
            selectedSurfaceColor = $('#optionSurfaceColor').find(":selected").text();

            switch (selectedSurface) {
                case "Top":
                    document.getElementById("surface-top").style.background = selectedSurfaceColor;
                    break;
                case "Left":
                    document.getElementById("surface-left").style.background = selectedSurfaceColor;
                    break;
                case "Right":
                    document.getElementById("surface-right").style.background = selectedSurfaceColor;
                    break;
                case "Back":
                    document.getElementById("surface-back").style.background = selectedSurfaceColor;
                    break;
                case "Front":
                    document.getElementById("surface-front").style.background = selectedSurfaceColor;
                    break;
                default:
                    // code block
            }



        });

        function saveChart() {

            var ref_no = $('#ref_no').val();
            var patientname2 = $('#patientname2').val();
            var selectedTooth = $('#selectedTooth').val();
            var selectedTooth = $('#selectedTooth').val();
            var conditionSelect = $('#conditionSelect').val();
            var restoSelect = $('#restoSelect').val();
            var position = $('#position').val();

            var form_data = new FormData();

            form_data.append("ref_no", ref_no);
            form_data.append("patientname2", patientname2);
            form_data.append("selectedTooth", selectedTooth);
            form_data.append("conditionSelect", conditionSelect);
            form_data.append("restoSelect", restoSelect);
            form_data.append("position", position);

            //Ajax to send file to upload
            $.ajax({
                url: "include/dental_chart.inc.php", //Server api to receive the file
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(dat2) {

                    if (dat2 == 1) {
                        // swalFunc("Event", "Event Successful Added", "success", window.location.href);
                        location.reload();
                    } else {
                        $('#resultAdd').html(dat2);
                        console.log(dat2);
                    }

                }
            });
        }





        window.smoothScroll = function(target) {
            var scrollContainer = target;
            do { //find scroll container
                scrollContainer = scrollContainer.parentNode;
                if (!scrollContainer) return;
                scrollContainer.scrollTop += 1;
            } while (scrollContainer.scrollTop == 0);

            var targetY = 0;
            do { //find the top of target relatively to the container
                if (target == scrollContainer) break;
                targetY += target.offsetTop;
            } while (target = target.offsetParent);

            scroll = function(c, a, b, i) {
                i++;
                if (i > 30) return;
                c.scrollTop = a + (b - a) / 30 * i;
                setTimeout(function() {
                    scroll(c, a, b, i);
                }, 20);
            }
            // start scrolling
            scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
        }

        var dt = new Date();
        document.getElementById('date-time').innerHTML = dt;
    </script>
</body>



</html>

<script type="text/javascript">
    function setImg(a) {
        //alert(a.getElementsByTagName('img')[0].src);
        document.getElementById('ImageFrame').src =
            a.getElementsByTagName('img')[0].src
    }
</script>

<script type="text/javascript">
    function CopyToLabel(a) {
        //Reference the TextBox.

        //Reference the Label.
        var lblName = document.getElementById("selectedTooth");
        // get input value
        //Copy the TextBox value to Label.
        lblName.value = a.value;
    }
</script>