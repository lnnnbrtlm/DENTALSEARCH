
<?php
include('session.php');

if(!isset($_SESSION['login_admin1'])){
	header("location: logout1.php");
}
$email = $_SESSION['login_admin1'];
$sql = "SELECT * FROM user_accounts WHERE email = '$email' AND user_type='Admin'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0){
header("location: assistant-index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Backup and Restore | Customize</title>
    <link rel="icon" href="img/tooth.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/73a2031efe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet-new.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


#frm-restore {
	background: #aee5ef;
	padding: 20px;
	border-radius: 2px;
	border: #a3d7e0 1px solid;
}

.form-row {
	margin-bottom: 20px;
}

.input-file {
	
	padding: 10px;
	margin-top: 5px;
	border-radius: 2px;
}

.btn-action {
	background: #333;
	border: 0;
	padding: 10px 40px;
	color: #FFF;
	border-radius: 2px;
}

.response {
	padding: 10px;
	margin-bottom: 20px;
    border-radius: 2px;
}

.error {
    background: #fbd3d3;
    border: #efc7c7 1px solid;
}

.success {
    background: #cdf3e6;
    border: #bee2d6 1px solid;
}
</style>
</head>
<?php
$conn = mysqli_connect("127.0.0.1", "mrdesgm_user1", "eZNCMGiV7iUg6bBT", "mrdesgm_dbdental");
if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
        exec('rm ' . $filePath);
    } // end if file exists
    
    return $response;
}

?>
<body>

    <?php include "./navbar.php" ?>



    <!-- Page content holder -->
    <div class="page-content p-5" id="content">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

        <!-- CONTENT -->

        <div>
            <h1 style="color: white;"><i class="fas fa-tools fa-fw mr-3"></i>Backup Data</h1>
        </div><br>

        <div class="container pt-3 pb-5 bg-light rounded shadow-lg">

        <ul class="nav nav-pills nav-fill">
         

                <li class="nav-item">
                    <a class="nav-link active" href="assistant-customize-backup.php">Back-up and Restore</a>
                </li>

            </ul><br>
            <!-- MESSAGE  -->
            <?php 
              if (isset($_SESSION['upPatientErr'])) {

                       if ($_SESSION['upPatientErr'] == "upSuccess") {
                          echo '
                            <div class="alert alert-primary alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Success!</strong> Control Panel Updated.
                            </div>
                          ';
                          $_SESSION['upPatientErr'] = "";
                        }

              }
              ?>

            <h4>Restore and Backup</h4>
            <hr>

            
            <?php
if (! empty($response)) {
    ?>
<div class="response <?php echo $response["type"]; ?>">
<?php echo nl2br($response["message"]); ?>
</div>
<?php
}
?>
    <form method="post" action="backup_db.php" enctype="multipart/form-data"
        id="frm-restore">
        <div class="form-row">
            
        <div>
        

            <table class="table" id="example">
  <thead>
    <tr>
    
    
      <th>Features</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <td>Export Database </td>
  <td> <input type="submit" name="backup" value="Backup Database"
                class="btn-action" ></td>
                </form>
   </tbody>
   <tbody>
   <form method="post" action="" enctype="multipart/form-data" id="frm-restore">
  <td>Restore Database <br><input type="file" style="float: right; margin-right: 2rem;"name="backup_file" class="input-file" ></td>
  <td><input type="submit" name="restore" value="Restore Database" class="btn-action"></td>
</form>
   </tbody>
</table>     
        </div>
        <!--  END CONTENT -->
    </div>

            
            
            
           
</script>
</body>

</html>

