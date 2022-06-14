<div class="container-flex px-5 py-5 bg-dc">
    <div class="container">
        <div class="row d-flex justify-content-around text-center pb-4">
            <div class="col">
                <h1>I</h1>
            </div>
            <div class="col">
                <h2>Upper</h2>
            </div>
            <div class="col">
                <h1>II</h1>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">



        <div class="col-5 ">

            <table class="table table-borderless text-center">
                <tr>
                    <td scope="col"><b>Proc</b></td>
                    <?php
                    for ($i = 55; $i > 50; $i--) {
                        echo '<td><input class="temp"  id="upper1" type="text" value="' . showToothPro($conn, $ref_no, $i) . '" readonly></td>';
                    }
                    ?>

                </tr>
                <br>
                <tr>
                    <td scope="col"><b>Cond</b></td>
                    <?php
                    for ($i = 55; $i > 50; $i--) {
                        echo '<td><input class="temp"  id="upper1" type="text" value="' . showToothCond($conn,$ref_no, $i) . '" readonly></td>';
                    }
                    ?>

                </tr>

                <tbody>
                    <tr>
                        <td scope="col">Right</td>
                        <td scope="col">55</td>
                        <td scope="col">54</td>
                        <td scope="col">53</td>
                        <td scope="col">52</td>
                        <td scope="col">51</td>

                    </tr>
                    <tr>
                        <td scope="col">Temporary<br>
                            Teeth</td>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="55" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/4.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="54" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/5.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="53" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/6.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="52" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/7.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="51" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/8.png"></a></button></th>
                       
                    </tr>
                    <tr>
                        <td scope="col">&nbsp;</td>
                        
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='55'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }
                        
                        switch($all){
                        case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;}
                        ?>
                            </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='54'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }

                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            break;}
                        ?>
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='53'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }

                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;}
                        ?>
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='52'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }
                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;}
                        ?>
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='51'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }

                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;}
                        ?>
                            </svg></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="col-2 d-flex justify-content-center" style="padding: 0; margin: 0; width: 3px;">
            <div id="vertical-line"></div>
        </div>

        <div class="col-5">

            <table class="table table-borderless text-center">
                <tr>

                    <?php
                    for ($i = 61; $i < 66; $i++) {
                        echo '<td><input class="temp" id="upper1" type="text" value="' . showToothPro($conn, $ref_no, $i) . '" readonly></td>';
                    }
                    ?> <td scope="col">&nbsp;</td>
                </tr>
                <br>
                <tr>

                    <?php
                    for ($i = 61; $i < 66; $i++) {
                        echo '<td><input class="temp"  id="upper1" type="text" value="' . showToothCond($conn,$ref_no, $i) . '" readonly></td>';
                    }
                    ?> <td scope="col">&nbsp;</td>


                    <tbody>
                        <tr>

                            <td scope="col">61</td>
                            <td scope="col">62</td>
                            <td scope="col">63</td>
                            <td scope="col">64</td>
                            <td scope="col">65</td>
                            
                            <td scope="col">Left</td>
                        </tr>
                        <tr>

                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="61" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/9.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="62" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/10.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="63" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/11.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="64" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/12.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="65" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/13.png"></a></button></th>
                            <td scope="col">&nbsp;</td>
                        </tr>
                        <tr>

                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='61'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;}
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='62'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;}
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='63'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;}
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='64'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;}
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='65'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;}
                                        ?>
                                </svg></td>
                            
                            <td scope="col">&nbsp;</td>
                        </tr>
                    </tbody>
            </table>


        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div id="horizontal-line" style="padding: 0; margin: 0;">
            Permanent Teeth</div>

    </div>

    <div class="row d-flex justify-content-center">

        <div class="col-5">

            <table class="table table-borderless text-center">

                <tr>
                    <td scope="col">&nbsp;</td>
                    
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='75'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }
                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;
                        }
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='74'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }
                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;
                        }
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='73'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }
                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;
                        }
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='72'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }
                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;
                        }
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='71'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                        switch($bottomright){
                        case ' ':        
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                        break;
                        }
                        switch($bottomleft){
                        case ' ':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                        break;
                        }
                        switch($leftbottom){    
                        case ' ':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($lefttop){
                        case ' ':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                        break;
                        case '1':  
                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                        break;
                        }
                        switch($topleft){
                        case ' ':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }  
                        switch($topright){
                        case ' ':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':         
                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($rightbottom){
                        case ' ':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                        break;
                        }
                        switch($righttop){
                        case ' ':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                        break;            
                        }
                        switch($center){
                        case ' ':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                        break;
                        case '1':
                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                        break;
                        }
                        switch($all){
                            case '1':
                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                            
                            
                            break;
                        }
                        ?>
                        </svg></td>
                </tr>

                <tr>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                </tr>

                <tr>
                    <td scope="col">Temporary<br>
                        Teeth</td>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="75" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/4.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="74" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/5.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="73" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/6.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="72" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/7.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="71" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/8.png"></a></button></th>
                </tr>

                <tr>
                    <td scope="col">Right</td>
                    <td scope="col">75</td>
                    <td scope="col">74</td>
                    <td scope="col">73</td>
                    <td scope="col">72</td>
                    <td scope="col">71</td>
                </tr>

                <tr>
                    <td scope="col"><b>Cond</b></td>
                    <?php
                    for ($i = 65; $i > 60; $i--) {
                        echo '<td><input class="temp"  id="lower1" type="text" value="' . showToothCond($conn,$ref_no, $i) . '" readonly></td>';
                    }
                    ?>
                </tr>
                <tr>
                    <td scope="col"><b>Proc</b></td>
                    <?php
                    for ($i = 65; $i > 60; $i--) {
                        echo '<td><input class="temp"  id="lower1" type="text" value="' . showToothPro($conn, $ref_no, $i) . '" readonly></td>';
                    }
                    ?>
                </tr>


            </table>

        </div>

        <div class="col-2 d-flex justify-content-center" style="padding: 0; margin: 0; width: 3px;">
            <div id="vertical-line"> </div>
        </div>


        <div class="col-5">

            <table class="table table-borderless text-center">

                <tr>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='81'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;
                                        }
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='82'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;
                                        }
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='83'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;
                                        }
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='84'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;
                                        }
                                        
                                        
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='85'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                
                                    while($row = mysqli_fetch_assoc($result)) {
                                $bottomright = $row['bottomright'];
                                $bottomleft = $row['bottomleft'];
                                $leftbottom = $row['leftbottom'];
                                $lefttop = $row['lefttop'];
                                $topleft = $row['topleft'];
                                $topright = $row['topright'];
                                $rightbottom = $row['rightbottom'];
                                $righttop = $row['righttop'];
                                $center = $row['center'];
                                $all = $row['all'];
                                    }
                                }else{
                                    $bottomright = " ";
                                $bottomleft = " ";
                                $leftbottom = " ";
                                $lefttop = " ";
                                $topleft = " ";
                                $topright = " ";
                                $rightbottom = " ";
                                $righttop = " ";
                                $center = " ";
                                $all = " ";
                                }
                                
                                switch($bottomleft){
                                    case ' ':        
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon unmarked" />';
                                    break;
                                    case '1':
                                    echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />';
                                    break;
                                            }
                                        switch($bottomright){
                                        case ' ':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />';
                                        break;
                                        }
                                        switch($rightbottom){    
                                        case ' ':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($righttop){
                                        case ' ':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon unmarked" />';
                                        break;
                                        case '1':  
                                        echo '<polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($topright){
                                        case ' ':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }  
                                        switch($topleft){
                                        case ' ':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':         
                                        echo '<polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($leftbottom){
                                        case ' ':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />';
                                        break;
                                        }
                                        switch($lefttop){
                                        case ' ':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />';
                                        break;            
                                        }
                                        switch($center){
                                        case ' ':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon unmarked" />';
                                        break;
                                        case '1':
                                        echo '<polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                        break;
                                        }
                                        switch($all){
                                            case '1':
                                            echo '<polygon id="bottomright2" points="0,0 30,0 20,10 10,10" class="polygon marked" />
                                            <polygon id="bottomleft" points="15,0 15,10 10,10 0,0" class="polygon marked" />
                                            <polygon id="leftbottom" points="0,0 10,10 10,20 0,30" class="polygon marked" />
                                            <polygon id="lefttop" points="0,15 10,15 10,20 0,30" class="polygon marked" />
                                            <polygon id="topleft" points="0,30 10,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="topright" points="15,30 15,20 20,20 30,30" class="polygon marked" />
                                            <polygon id="rightbottom" points="30,0 20,10 20,20 30,30" class="polygon marked" />
                                            <polygon id="righttop" points="30,15 20,15 20,20 30,30" class="polygon marked" />
                                            <polygon id="centerr" value="1" points="10,10, 20,10 20,20 10,20" class="polygon marked" />';
                                            
                                            
                                            break;
                                        } 
                                        
                                        ?>
                        </svg></td>
                   
                    <td scope="col">&nbsp;</td>
                </tr>

                <tr>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                </tr>

                <tr>

                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="81" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/9.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="82" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/10.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="83" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/11.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="84" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/12.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="85" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/13.png"></a></button></th>
                    <td scope="col">&nbsp;</td>
                </tr>

                <tr>

                    <td scope="col">81</td>
                    <td scope="col">82</td>
                    <td scope="col">83</td>
                    <td scope="col">84</td>
                    <td scope="col">85</td>
                    <td scope="col">Left</td>
                </tr>

 

                <tr>

                    <?php
                    for ($i = 81; $i < 86; $i++) {
                        echo '<td><input class="temp"  id="lower1" type="text" value="' . showToothPro($conn, $ref_no, $i) . '" readonly></td>';
                    }
                    ?>
                    <td scope="col">&nbsp;</td>

                </tr>

                <tr>

                <?php
                    for ($i = 81; $i < 86; $i++) {
                        echo '<td><input class="temp"  id="lower1" type="text" value="' . showToothPro($conn, $ref_no, $i) . '" readonly></td>';
                    }
                    ?>
                    <td scope="col">&nbsp;</td>
                    
                </tr>
            </table>

        </div>

    </div>
    <div class="container">
        <div class="row d-flex justify-content-around text-center pt-4">
            <div class="col">
                <h1>IV</h1>
            </div>
            <div class="col">
                <h2>Lower</h2>
            </div>
            <div class="col">
                <h1>III</h1>
            </div>
        </div>
    </div>
</div>