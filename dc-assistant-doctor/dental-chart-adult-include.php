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
                    for ($i = 18; $i > 10; $i--) {
                        echo '<td><input class="temp"  id="upper1" type="text" value="' . showToothPro($conn, $ref_no, $i) . '" readonly></td>';
                    }
                    ?>

                </tr>
                <br>
                <tr>
                    <td scope="col"><b>Cond</b></td>
                    <?php
                    for ($i = 18; $i > 10; $i--) {
                        echo '<td><input class="temp"  id="upper1" type="text" value="' . showToothCond($conn,$ref_no, $i) . '" readonly></td>';
                    }
                    ?>

                </tr>

                <tbody>
                    <tr>
                        <td scope="col">Right</td>
                        <td scope="col">18</td>
                        <td scope="col">17</td>
                        <td scope="col">16</td>
                        <td scope="col">15</td>
                        <td scope="col">14</td>
                        <td scope="col">13</td>
                        <td scope="col">12</td>
                        <td scope="col">11</td>

                    </tr>
                    <tr>
                        <td scope="col">Temporary<br>
                            Teeth</td>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="18" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/1.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="17" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/2.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="16" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/3.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="15" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/4.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="14" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/5.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="13" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/6.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="12" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/7.png"></a></button></th>
                        <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="11" id="tooth"><a onclick="setImg(this);"><img class="tooth" src="img/upper/8.png"></a></button></th>
                       
                    </tr>
                    <tr>
                        <td scope="col">&nbsp;</td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                                
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='18'";
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
                           break; }
                    
                        ?>
                                  
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='17'";
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
                       break; }
                
                        
                        ?>
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='16'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='15'";
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
                        break;}
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
                       break; }
                

                        
                        ?>
                            </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='14'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='13'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='12'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                            </svg></td>
                        <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                        <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='11'";
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
                        break; }
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
                       break; }
                

                        
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
                    for ($i = 21; $i < 29; $i++) {
                        echo '<td><input class="temp" id="upper1" type="text" value="' . showToothPro($conn, $ref_no, $i) . '" readonly></td>';
                    }
                    ?> <td scope="col">&nbsp;</td>
                </tr>
                <br>
                <tr>

                    <?php
                    for ($i = 21; $i < 29; $i++) {
                        echo '<td><input class="temp"  id="upper1" type="text" value="' . showToothCond($conn,$ref_no, $i) . '" readonly></td>';
                    }
                    ?> <td scope="col">&nbsp;</td>


                    <tbody>
                        <tr>

                            <td scope="col">21</td>
                            <td scope="col">22</td>
                            <td scope="col">23</td>
                            <td scope="col">24</td>
                            <td scope="col">25</td>
                            <td scope="col">26</td>
                            <td scope="col">27</td>
                            <td scope="col">28</td>
                            <td scope="col">Left</td>
                        </tr>
                        <tr>

                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="21" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/9.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="22" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/10.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="23" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/11.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="24" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/12.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="25" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/13.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="26" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/14.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="27" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/15.png"></a></button></th>
                            <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="28" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/upper/16.png"></a></button></th>
                            <td scope="col">&nbsp;</td>
                        </tr>
                        <tr>

                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='21'";
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
                                        break; }
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
                                       break; }
                                
                
                                        
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='22'";
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
                                        break; }
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
                                       break; }
                                
                
                
                                        
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='23'";
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
                                        break; }
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
                                       break; }
                                
                                        
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='24'";
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
                                        break; }
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
                                       break; }
                                
                
                                        
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='25'";
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
                                        break; }
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
                                       break; }
                                
                                        
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='26'";
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
                                        break; }
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
                                       break; }
                                        
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='27'";
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
                                        break; }
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
                                       break; }
                                
                                        
                                        ?>
                                </svg></td>
                            <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                            <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='28'";
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
                                    break; }
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
                                   break; }
                            
            
                                    
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
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='48'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='47'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='46'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='45'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='44'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='43'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='42'";
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
                        break; }
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
                       break; }
                
                        
                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='41'";
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
                        break; }
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
                       break; }
                
                        
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
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                </tr>

                <tr>
                    <td scope="col">Temporary<br>
                        Teeth</td>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="48" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/1.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="47" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/2.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="46" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/3.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="45" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/4.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="44" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/5.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="43" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/6.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="42" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/7.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="41" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/8.png"></a></button></th>
                </tr>

                <tr>
                    <td scope="col">Right</td>
                    <td scope="col">48</td>
                    <td scope="col">47</td>
                    <td scope="col">46</td>
                    <td scope="col">45</td>
                    <td scope="col">44</td>
                    <td scope="col">43</td>
                    <td scope="col">42</td>
                    <td scope="col">41</td>
                </tr>

                <tr>
                    <td scope="col"><b>Cond</b></td>
                    <?php
                    for ($i = 48; $i > 40; $i--) {
                        echo '<td><input class="temp"  id="lower1" type="text" value="' . showToothCond($conn,$ref_no, $i) . '" readonly></td>';
                    }
                    ?>
                </tr>
                <tr>
                    <td scope="col"><b>Proc</b></td>
                    <?php
                    for ($i = 48; $i > 40; $i--) {
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
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='31'";
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
                                        break; }
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
                                       break; }
                                
                                        
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='32'";
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
                                       break; }
                                
                                        
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='33'";
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
                                        break; }
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
                                       break; }
                                
                                        
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='34'";
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
                                        break; }
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
                                       break; }
                                
                                        
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='35'";
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
                                        break; }
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
                                       break; }
                                
                                        
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='36'";
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
                                        break; }
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
                                       break; }
                                
                                        
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='37'";
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
                                        break; }
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
                       break; }
                

                                        
                                        ?>
                        </svg></td>
                    <td scope="col"><svg width="30" height="50" transform="scale(2,-2)" class="molar">
                    <?php
                            
                            $refno = $ref_no;
                                $sql = "SELECT * FROM dentalchart WHERE ref_no='$refno' AND tooth_id='38'";
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
                                        break; }
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
                                       break; }
                                
                                        
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
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                    <td scope="col">&nbsp;</td>
                </tr>

                <tr>

                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="31" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/9.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="32" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/10.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="33" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/11.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="34" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/12.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="35" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/13.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="36" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/14.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="37" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/15.png"></a></button></th>
                    <td scope="col"><button class="buttont" type="button" onclick="smoothScroll(document.getElementById('second')); CopyToLabel(this)" value="38" id="tooth"><a onclick="setImg(this)"><img class="tooth" src="img/lower/16.png"></a></button></th>
                    <td scope="col">&nbsp;</td>
                </tr>

                <tr>

                    <td scope="col">31</td>
                    <td scope="col">32</td>
                    <td scope="col">33</td>
                    <td scope="col">34</td>
                    <td scope="col">35</td>
                    <td scope="col">36</td>
                    <td scope="col">37</td>
                    <td scope="col">38</td>
                    <td scope="col">Left</td>
                </tr>

 

                <tr>

                    <?php
                    for ($i = 31; $i < 39; $i++) {
                        echo '<td><input class="temp"  id="lower1" type="text" value="' . showToothPro($conn, $ref_no, $i) . '" readonly></td>';
                    }
                    ?>
                    <td scope="col">&nbsp;</td>

                </tr>

                <tr>

                <?php
                    for ($i = 31; $i < 39; $i++) {
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